<?php
class About extends CI_Controller 
{
	public function __construct()
	{
	
		parent::__construct();

		$this->load->database();

		$this->load->helper(array('form', 'url','html'));

		$this->load->model(array('Vacancy_Model','Career_Model'));

		$this->load->library('session');

		$this->load->library('form_validation');

		$this->load->library(array('encryption','Layouts'));

	
	}

	public function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('about');
		$this->layouts->view('pages/about','','template');

	}


}?>