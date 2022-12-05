<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

  public function __construct()
  {
   parent::__construct();
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
		$data ['member'] = $this->Member_model->all();
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('member/Member', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('member/addMember');
		$this->load->view('template/footer');
	}

  public function saveAdd()
  {
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('full_name', 'full_name', 'required');
    $this->form_validation->set_rules('phone', 'phone', 'required');
    $this->form_validation->set_rules('address', 'address', 'required');
    $this->form_validation->set_rules('born_place', 'born_place', 'required');
    $this->form_validation->set_rules('born_date', 'born_date', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');
    $this->form_validation->set_rules('country', 'country', 'required');
    $this->form_validation->set_rules('nationality', 'nationality', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
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
      $data['nik'] = $this->input->post('nik');
			$data['full_name'] = $this->input->post('full_name');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['born_place'] = $this->input->post('born_place');
			$data['born_date'] = $this->input->post('born_date');
			$data['gender'] = $this->input->post('gender');
			$data['country'] = $this->input->post('country');
			$data['nationality'] = $this->input->post('nationality');
			$data['status'] = $this->input->post('status');
			$data['phone'] = $this->input->post('phone');
			$data['created_at'] = $this->input->post('created_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Member_model->insert($data);
                  redirect('Member');
                  return;
                }  
              
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('member/addMember');
		$this->load->view('template/footer');
  }

  public function edit($id)
	{
    $data ['member'] = $this->Member_model->findId($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('member/editMember', $data);
		$this->load->view('template/footer');
	}

  public function saveEdit()
  {
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('full_name', 'full_name', 'required');
    $this->form_validation->set_rules('phone', 'phone', 'required');
    $this->form_validation->set_rules('address', 'address', 'required');
    $this->form_validation->set_rules('born_place', 'born_place', 'required');
    $this->form_validation->set_rules('born_date', 'born_date', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');
    $this->form_validation->set_rules('country', 'country', 'required');
    $this->form_validation->set_rules('nationality', 'nationality', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    $this->form_validation->set_rules('updated_at', 'updated_at', 'required');


		if($this->input->method()=='post')
    {
      $config['upload_path']          = './assets/profile/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['overwrite']            = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('cover')){

      }
      $gambar = $this->upload->data();
      if($gambar["file_name"] == "" ){
		 	$id = $this->input->post('id');
       $data['nik'] = $this->input->post('nik');
       $data['full_name'] = $this->input->post('full_name');
       $data['phone'] = $this->input->post('phone');
       $data['address'] = $this->input->post('address');
       $data['born_place'] = $this->input->post('born_place');
       $data['born_date'] = $this->input->post('born_date');
       $data['gender'] = $this->input->post('gender');
       $data['country'] = $this->input->post('country');
       $data['nationality'] = $this->input->post('nationality');
       $data['status'] = $this->input->post('status');
       $data['phone'] = $this->input->post('phone');
       $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Member_model->update($id,$data);
                  redirect('Member');
                  return;
                }  

      }
		 	$id = $this->input->post('id');
       $data['nik'] = $this->input->post('nik');
       $data['full_name'] = $this->input->post('full_name');
       $data['phone'] = $this->input->post('phone');
       $data['address'] = $this->input->post('address');
       $data['born_place'] = $this->input->post('born_place');
       $data['born_date'] = $this->input->post('born_date');
       $data['gender'] = $this->input->post('gender');
       $data['country'] = $this->input->post('country');
       $data['nationality'] = $this->input->post('nationality');
       $data['status'] = $this->input->post('status');
       $data['phone'] = $this->input->post('phone');
       $data['updated_at'] = $this->input->post('updated_at');
      if ($this->form_validation->run()==true)
                {
                  $this->Member_model->update($id,$data);
                  redirect('Member');
                  return;
                }     
    }
		$this->load->view('template/header');
		$this->load->view('template/sidebarleft');
		$this->load->view('member/editMember');
		$this->load->view('template/footer');
  }

  public function delete($id)
	{
		$this->Member_model->delete($id);
		redirect('Member');
	}


}
