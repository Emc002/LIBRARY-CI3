<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subs extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
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
		$data ['subs'] = $this->Subs_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('subscription/Subs', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('subscription/addSubs');
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('title', 'TITLE', 'required');
    $this->form_validation->set_rules('month', 'MONTH', 'required');
    $this->form_validation->set_rules('price', 'PRICE', 'required');
    $this->form_validation->set_rules('status', 'STATUS', 'required');
    $this->form_validation->set_rules('created_at', 'Created_at', 'required');


		if($this->input->method()=='post')
    {

      $data['title'] = $this->input->post('title');
			$data['month'] = $this->input->post('month');
			$data['price'] = $this->input->post('price');
			$data['status'] = $this->input->post('status');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Subs_model->insert($data);
                  redirect('Subs');
                  return;
                }  
              
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('subscription/addSubs');
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['subs'] = $this->Subs_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('subscription/editSubs', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('title', 'TITLE', 'required');
    $this->form_validation->set_rules('month', 'MONTH', 'required');
    $this->form_validation->set_rules('price', 'PRICE', 'required');
    $this->form_validation->set_rules('status', 'STATUS', 'required');


		if($this->input->method()=='post')
    {
      $id = $this->input->post('id');
      $data['title'] = $this->input->post('title');
			$data['month'] = $this->input->post('month');
			$data['price'] = $this->input->post('price');
			$data['status'] = $this->input->post('status');
			$data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Subs_model->update($id,$data);
                  redirect('Subs');
                  return;
                }     
    }
    $data ['subs'] = $this->Subs_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('subscription/editSubs', $data);
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$this->Subs_model->delete($id);
		redirect('Subs');
	}


}
