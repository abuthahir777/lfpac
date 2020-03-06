<?php
class Contact extends CI_Controller 
{
	public function __construct()
	{
	
		parent::__construct();

		$this->load->database();

		$this->load->helper(array('form', 'url','html'));

		$this->load->model(array('Contact_Model'));

		$this->load->library('session');

		$this->load->library('form_validation');

		$this->load->library(array('encryption','Layouts'));

	
	}

	public function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('contact');
		$this->layouts->view('pages/contact','','template');

	}


	public function save()
	{
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

 

        $userIp=$this->input->ip_address();

     

        $secret = $this->config->item('google_secret');

   

        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

 

        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, $url); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 

        curl_close($ch);      

         

        $status= json_decode($output, true);

 

        if ($status['success'])
        {

            $this->Contact_Model->save();
            $this->session->set_flashdata('send', 'Message Successfully Send');
            header("Location:".$this->config->item('base_url')."/contact");

        }
        else
        {

         //    $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
        	// header("Location:".$this->config->item('base_url')."/contact");

        }

	}




}
?>