<?php
class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/headerLogin');
		$this->load->view('Login');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$this->load->model('Auth_model');
		$this->load->library('form_validation');

		$rules = $this->Auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view('template/header');
			$this->load->view('Login');
			$this->load->view('template/footer');

		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->Auth_model->login($username, $password)){
			redirect('Librarian');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('template/headerLogin');
		$this->load->view('Login');
		$this->load->view('template/footer');
	}

	public function logout()
	{
		$this->load->model('Auth_model');
		$this->Auth_model->logout();
		redirect(site_url());
	}
}