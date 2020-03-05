<?php
class Career extends CI_Controller 
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
		$data['vacancy'] = $this->Vacancy_Model->get();

		$this->layouts->title('career');
		$this->layouts->view('pages/career',$data,'template');

	}

	public function getdetails()
	{
		$data = $this->Vacancy_Model->single($this->input->post('id'),'id');

		echo json_encode($data);
	}

	public function save()
	{
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['upload_path'] = './ressumes/';
		$config['file_name'] = $this->input->post('fname').$this->input->post('phone').rand(1000,10000);
		$config['max_size'] = 20000;

		$this->load->library('upload',$config);


		if($this->upload->do_upload('fileupload'))
		{
			$this->Career_Model->save();
		}
		else
		{
			echo $this->upload->display_errors('<p>', '</p>');
		}
		
		header("Location: ".base_url()."/career");
	}



}
?>