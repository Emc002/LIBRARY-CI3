<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowBook extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("BorrowBook_model");
   $this->load->model("Member_model");
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
		$data ['borrowbook'] = $this->BorrowBook_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowbook/BorrowBook', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
    $data ['member'] = $this->Member_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowbook/addBorrowBook', $data);
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('trx_date', 'DATE TRX', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');

		if($this->input->method()=='post')
    {

      $data['member_id'] = $this->input->post('member_id');
			$data['trx_date'] = $this->input->post('trx_date');
			$data['note'] = $this->input->post('note');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->BorrowBook_model->insert($data);
                  redirect('BorrowBook');
                  return;
                }  
              
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowbook/addBorrowBook');
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['borrowbook'] = $this->BorrowBook_model->findId($id);
    $data ['member'] = $this->Member_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowbook/editBorrowBook', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('updated_at', 'UPDATED AT', 'required');
		if($this->input->method()=='post')
    {

      if($data1['trx_date'] = $this->input->post('trx_date') == ""){      
       $id = $this->input->post('id');
       $data['member_id'] = $this->input->post('member_id');
       $data['note'] = $this->input->post('note');
       $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->BorrowBook_model->update($id,$data);
                  redirect('BorrowBook');
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
                  $this->BorrowBook_model->update($id,$data);
                  redirect('BorrowBook');
                  return;
                }
              } 
    }
    $data ['borrowbook'] = $this->BorrowBook_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('borrowbook/editBorrowBook', $data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$this->BorrowBook_model->delete($id);
		redirect('BorrowBook');
	}


}
