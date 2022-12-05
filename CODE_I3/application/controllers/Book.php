<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("Book_model"); 
   $this->load->library('form_validation');
   $this->load->helper(array('form', 'url'));
   $this->load->model('Auth_model');
		if(!$this->Auth_model->current_user()){
			redirect('auth/login');
		}
  }

	public function index()
	{
    $data['current_user'] = $this->Auth_model->current_user();
		$data ['book'] = $this->Book_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('book/Book', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('book/addBook');
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('isbn', 'ISBN', 'required');
    $this->form_validation->set_rules('title', 'TITLE', 'required');
    $this->form_validation->set_rules('synopsis', 'SYNOPSIS', 'required');
    $this->form_validation->set_rules('author', 'AUTHOR', 'required');
    $this->form_validation->set_rules('publisher', 'PUBLISHER', 'required');
    $this->form_validation->set_rules('category', 'CATEGORY', 'required');
    $this->form_validation->set_rules('language', 'LANGUAGES', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');


		if($this->input->method()=='post')
    {

      $config['upload_path']          = './assets/cover/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['overwrite']            = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('cover')){

      }
      $gambar = $this->upload->data();
      $data['isbn'] = $this->input->post('isbn');
			$data['title'] = $this->input->post('title');
			$data['synopsis'] = $this->input->post('synopsis');
      $data['author'] = $this->input->post('author');
      $data['publisher'] = $this->input->post('publisher');
      $data['category'] = $this->input->post('category');
      $data['language'] = $this->input->post('language');
      $data['cover'] = $gambar['file_name'];
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Book_model->insert($data);
                  redirect('Book');
                  return;
                }  
              
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('book/addBook');
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['book'] = $this->Book_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('book/editBook', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('isbn', 'ISBN', 'required');
    $this->form_validation->set_rules('title', 'TITLE', 'required');
    $this->form_validation->set_rules('synopsis', 'SYNOPSIS', 'required');
    $this->form_validation->set_rules('author', 'AUTHOR', 'required');
    $this->form_validation->set_rules('publisher', 'PUBLISHER', 'required');
    $this->form_validation->set_rules('category', 'CATEGORY', 'required');
    $this->form_validation->set_rules('language', 'LANGUAGES', 'required');


		if($this->input->method()=='post')
    {
      $config['upload_path']          = './assets/cover/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['overwrite']            = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('avatar')){

      }
      $gambar = $this->upload->data();
      if($gambar["file_name"] == "" ){
		$id = $this->input->post('id');
       $data['isbn'] = $this->input->post('isbn');
       $data['title'] = $this->input->post('title');
       $data['synopsis'] = $this->input->post('synopsis');
       $data['author'] = $this->input->post('author');
       $data['publisher'] = $this->input->post('publisher');
       $data['category'] = $this->input->post('category');
       $data['language'] = $this->input->post('language');
       $data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Book_model->update($id,$data);
                  redirect('Book');
                  return;
                }  

      }
		 	$id = $this->input->post('id');
       $data['isbn'] = $this->input->post('isbn');
       $data['title'] = $this->input->post('title');
       $data['synopsis'] = $this->input->post('synopsis');
       $data['author'] = $this->input->post('author');
       $data['publisher'] = $this->input->post('publisher');
       $data['category'] = $this->input->post('category');
       $data['language'] = $this->input->post('language');
       $data['cover'] = $gambar['file_name'];
       $data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Book_model->update($id,$data);
                  redirect('Book');
                  return;
                }     
    }
    $data ['book'] = $this->Book_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('book/editBook', $data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
    $pict = $this->Book_model->findIdCV($id);
    unlink('./assets/profile/'.$pict->avatar);
		$this->Book_model->delete($id);
		redirect('Book');
	}


}
