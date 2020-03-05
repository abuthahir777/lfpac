<?php

class Login extends CI_Controller
{
	public function __construct()
	{
	
		parent::__construct();

		$this->load->database();

		$this->load->helper(array('form', 'url','html'));

		$this->load->model('User_Model');

		$this->load->library('session');

		$this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('pages/admin/login');
	}


	public function login_validation()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run())
		{
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$data=$this->User_Model->check_user($email);

			if(md5($password)==$data->password)
			{
				$userdata = array('email'=>$data->username,'user'=>'Admin','loggedin'=> TRUE);
				$this->session->set_userdata('userdata',$userdata);

				header("Location:".$this->config->item("base_url")."/admin/vacancy");
			}
			else
			{
				$this->session->set_flashdata('error','Invalid name or password');
				header("Location:".$this->config->item("base_url")."/admin");
			}
	
		}
		else
		{
			$this->index();
		}

	}


	// function register()
	// {
	// 	$this->load->view('pages/admin/register');
	// }

	// function register_form()
	// {
	// 	$this->User_Model->save();
	// }


	public function logout()
	{
			$this->session->unset_userdata('userdata');
			redirect('admin');
	}


}

?>