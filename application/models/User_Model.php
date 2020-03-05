<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

    function save()
    {
    	$this->db->insert('user',[
    		'username'=>$this->input->get('email'),
    		'password'=>md5($this->input->get('password'))
    	]);
    }


    function check_user($email)
    {
        return $this->db->where('username',$email)->get('user')->first_row();
    }
	


}




?>