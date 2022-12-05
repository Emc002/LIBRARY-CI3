<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookTrx extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("BookTrx_model");
   $this->load->model("Member_model");
   $this->load->model("Book_model");
   $this->load->model("BorrowDetail_model"); 
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
		$data ['booktrx'] = $this->BookTrx_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('booktrx/Booktrx', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
    $data ['booktrx'] = $this->BookTrx_model->all();
    $data ['member'] = $this->Member_model->all();
    $data ['book'] = $this->Book_model->all();
    $data ['borrowdetail'] = $this->BorrowDetail_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('booktrx/addBooktrx', $data);
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('book_id', 'ID BOOK', 'required');
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('detail_id', 'ID BORROW DETAIL', 'required');
    $this->form_validation->set_rules('type', 'TYPE', 'required');
    $this->form_validation->set_rules('price', 'PRICE', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');

		if($this->input->method()=='post')
    {
      $data['book_id'] = $this->input->post('book_id');
      $data['member_id'] = $this->input->post('member_id');
      $data['detail_id'] = $this->input->post('detail_id');
			$data['type'] = $this->input->post('type');
			$data['price'] = $this->input->post('price');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->BookTrx_model->insert($data);
                  redirect('BookTrx');
                  return;
                }  
              
    }
    $data ['booktrx'] = $this->BookTrx_model->all();
    $data ['member'] = $this->Member_model->all();
    $data ['book'] = $this->Book_model->all();
    $data ['borrowdetail'] = $this->BorrowDetail_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('booktrx/addBooktrx', $data);
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['booktrx'] = $this->BookTrx_model->findId($id);
    $data ['book'] = $this->Book_model->all();
    $data ['member'] = $this->Member_model->all();
    $data ['borrowdetail'] = $this->BorrowDetail_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('booktrx/editBooktrx', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('book_id', 'ID BOOK', 'required');
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('detail_id', 'ID BORROW DETAIL', 'required');
    $this->form_validation->set_rules('type', 'TYPE', 'required');
    $this->form_validation->set_rules('price', 'PRICE', 'required');
    $this->form_validation->set_rules('updated_at', 'UPDATED AT', 'required');
    if ($this->input->method() == 'post') {

      $id = $this->input->post('id');
      $data['book_id'] = $this->input->post('book_id');
      $data['member_id'] = $this->input->post('member_id');
      $data['detail_id'] = $this->input->post('detail_id');
      $data['type'] = $this->input->post('type');
      $data['price'] = $this->input->post('price');
      $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run() == true) {
        $this->BookTrx_model->update($id, $data);
        redirect('BookTrx');
        return;
      }

    }

        $data['booktrx'] = $this->BookTrx_model->findId($id);
        $data['book'] = $this->Book_model->all();
        $data['member'] = $this->Member_model->all();
        $data['borrowdetail'] = $this->BorrowDetail_model->all();
        $this->load->view('template/header');
        $this->load->view('template/sidebarleft');
        $this->load->view('booktrx/editBooktrx', $data);
        $this->load->view('template/footer');
      
    
  }

  public function delete($id)
	{
		$this->BookTrx_model->delete($id);
		redirect('BookTrx');
	}


}
