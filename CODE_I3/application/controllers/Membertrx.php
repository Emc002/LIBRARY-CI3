<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membertrx extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->load->model("Membertrx_model"); 
   $this->load->model("Member_model"); 
   $this->load->model("Subs_model"); 
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
		$data ['membertrx'] = $this->Membertrx_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('membertrx/Membertrx', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$data ['member'] = $this->Member_model->all();
    $data ['subs'] = $this->Subs_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('membertrx/addMembertrx', $data);
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('subs_id', 'ID SUBSCRIPTION', 'required');
    $this->form_validation->set_rules('trx_date', 'DATE TRX', 'required');
    $this->form_validation->set_rules('active_at', 'ACTIVE AT', 'required');
    $this->form_validation->set_rules('status', 'STATUS', 'required');
    $this->form_validation->set_rules('total_order', 'TOTAL ORDER', 'required');
    $this->form_validation->set_rules('created_at', 'CREATED AT', 'required');


		if($this->input->method()=='post')
    {
      $data['member_id'] = $this->input->post('member_id');
			$data['subs_id'] = $this->input->post('subs_id');
			$data['trx_date'] = $this->input->post('trx_date');
			$data['active_at'] = $this->input->post('active_at');
      $idEX = $data['subs_id'];
      $date = $this->Subs_model->findIdEX($idEX);
      $arrival = new DateTime();
      die(var_dump($arrival));
      $newDate =  date_add($arrival, date_interval_create_from_date_string("".$date->month." months"));
      $data['expire_at'] = $newDate->format("Y-m-d");
			$data['status'] = $this->input->post('status');
			$data['total_order'] = $this->input->post('total_order');
			$data['note'] = $this->input->post('note');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Membertrx_model->insert($data);
                  redirect('Membertrx');
                  return;
                }  
              
    }
    $data ['member'] = $this->Member_model->all();
    $data ['subs'] = $this->Subs_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('membertrx/addMembertrx',$data);
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['membertrx'] = $this->Membertrx_model->findId($id);
    $data ['member'] = $this->Member_model->all();
    $data ['subs'] = $this->Subs_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('membertrx/editMembertrx', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('member_id', 'ID MEMBER', 'required');
    $this->form_validation->set_rules('subs_id', 'ID SUBSCRIPTION', 'required');
    $this->form_validation->set_rules('trx_date', 'DATE TRX', 'required');
    $this->form_validation->set_rules('active_at', 'ACTIVE AT', 'required');
    $this->form_validation->set_rules('status', 'STATUS', 'required');
    $this->form_validation->set_rules('total_order', 'TOTAL ORDER', 'required');
    $this->form_validation->set_rules('updated_at', 'UPDATE AT', 'required');


		if($this->input->method()=='post')
    {
      $id = $this->input->post('id');
      $data['member_id'] = $this->input->post('member_id');
			$data['subs_id'] = $this->input->post('subs_id');
			$data['trx_date'] = $this->input->post('trx_date');
			$data['active_at'] = $this->input->post('active_at');
			$data['status'] = $this->input->post('status');
			$data['total_order'] = $this->input->post('total_order');
			$data['note'] = $this->input->post('note');
			$data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Membertrx_model->update($id,$data);
                  redirect('Membertrx');
                  return;
                }     
    }
    $data ['membertrx'] = $this->Membertrx_model->findId($id);
    $data ['member'] = $this->Member_model->all();
    $data ['subs'] = $this->Subs_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('membertrx/editMembertrx',$data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$this->Membertrx_model->delete($id);
		redirect('Membertrx');
	}


}
