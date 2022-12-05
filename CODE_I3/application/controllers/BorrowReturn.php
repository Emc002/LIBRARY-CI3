<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowReturn extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("BorrowDetail_model");
   $this->load->model("Book_model");
   $this->load->model("BorrowReturn_model");
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
		$data ['borrowreturn'] = $this->BorrowReturn_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowreturn/BorrowReturn', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
    $data ['borrowreturn'] = $this->BorrowReturn_model->all();
    $data ['borrowdetail'] = $this->BorrowDetail_model->all();
    $data ['book'] = $this->Book_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowreturn/addBorrowReturn', $data);
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('book_id', 'ID BOOK', 'required');
    $this->form_validation->set_rules('return_at', 'RETURN AT', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');

		if($this->input->method()=='post')
    {

      $data['book_id'] = $this->input->post('book_id');
			$data['return_at'] = $this->input->post('return_at');
			$data['note'] = $this->input->post('note');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->BorrowReturn_model->insert($data);
                  redirect('BorrowReturn');
                  return;
                }  
              
    }
    $data ['borrowreturn'] = $this->BorrowReturn_model->all();
    $data ['borrowdetail'] = $this->BorrowDetail_model->all();
    $data ['book'] = $this->Book_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowreturn/addBorrowReturn', $data);
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['borrowreturn'] = $this->BorrowReturn_model->findId($id);
    $data ['book'] = $this->Book_model->all();
    $data ['borrowreturnAll'] = $this->BorrowReturn_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowreturn/editBorrowReturn', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('book_id', 'ID BOOK', 'required');
    $this->form_validation->set_rules('return_at', 'RETURN AT', 'required');
    $this->form_validation->set_rules('updated_at', 'UPDATED AT', 'required');
		if($this->input->method()=='post')
    {

      if($data1['trx_date'] = $this->input->post('trx_date') == ""){      
       $id = $this->input->post('id');
       $data['book_id'] = $this->input->post('book_id');
			$data['return_at'] = $this->input->post('return_at');
       $data['note'] = $this->input->post('note');
       $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {

                  $this->BorrowReturn_model->update($id,$data);
                  redirect('BorrowReturn');
                  return;
                }
      }
      else
      {
		 	 $id = $this->input->post('id');
       $data['member_id'] = $this->input->post('member_id');
       $data['note'] = $this->input->post('note');
       $data['trx_date'] = $this->input->post('trx_date');
       $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->BorrowDetail_model->update($id,$data);
                  redirect('BorrowReturn');
                  return;
                }
              } 
    }
    $data ['borrowreturn'] = $this->BorrowReturn_model->findId($id);
    $data ['book'] = $this->Book_model->all();
    $data ['borrowreturnAll'] = $this->BorrowReturn_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowreturn/editBorrowReturn', $data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$this->BorrowReturn_model->delete($id);
		redirect('BorrowReturn');
	}


}
