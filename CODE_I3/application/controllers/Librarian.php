<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Librarian extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("Librarian_model"); 
   $this->load->library('form_validation');
   $this->load->helper(array('form', 'url'));
   $this->load->model('Auth_model');
   if(!$this->Auth_model->current_user()){
     redirect('auth/login');
   }
  }

	public function index()
	{
		$data ['librarian'] = $this->Librarian_model->all();
    $data['current_user'] = $this->Auth_model->current_user();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('librarian/Librarian', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('librarian/addLibrarian');
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');


		if($this->input->method()=='post')
    {

      $config['upload_path']          = './assets/profile/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['overwrite']            = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('avatar')){

      }
      $gambar = $this->upload->data();
      $data['username'] = $this->input->post('username');
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['password'] = password_hash ($this->input->post('name'), PASSWORD_DEFAULT);
      $data['avatar'] = $gambar['file_name'];
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Librarian_model->insert($data);
                  redirect('Librarian');
                  return;
                }  
              
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('librarian/addLibrarian');
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['librarian'] = $this->Librarian_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('librarian/editLibrarian', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('updated_at', 'updated_at', 'required');


		if($this->input->method()=='post')
    {
      $config['upload_path']          = './assets/profile/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['overwrite']            = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('avatar')){

      }
      $gambar = $this->upload->data();
      if($gambar["file_name"] == "" ){
		 	$id = $this->input->post('id');
      $data['username'] = $this->input->post('username');
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['password'] = password_hash ($this->input->post('name'), PASSWORD_DEFAULT);
			$data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Librarian_model->update($id,$data);
                  redirect('Librarian');
                  return;
                }  

      }
		 	$id = $this->input->post('id');
      $data['username'] = $this->input->post('username');
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['password'] = password_hash ($this->input->post('name'), PASSWORD_DEFAULT);
			$data['avatar'] = $gambar['file_name'];
			$data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Librarian_model->update($id,$data);
                  redirect('Librarian');
                  return;
                }     
    }
    $data ['librarian'] = $this->Librarian_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('librarian/editLibrarian', $data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$pict = $this->Librarian_model->findIdAV($id);
    unlink('./assets/profile/'.$pict->avatar);
		$this->Librarian_model->delete($id);
		redirect('Librarian');
	}


}
