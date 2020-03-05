<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

    function save()
    {
    	$this->db->insert('contact',[
    		'name'=>$this->input->post('name'),
    		'email'=>$this->input->post('email'),
    		'mobile'=>$this->input->post('phone'),
    		'subject'=>$this->input->post('subject'),
    		'message'=>$this->input->post('message'),
            'date'=>date('Y-m-d'),
    		'check_status'=>0,
    		'delete_status'=>0
    	]);
    }


    function view()
    {
        return $this->db->where('id',$this->uri->segment(4))->get('contact')->row();
    }
	

    var $table = "contact";
    var $order_column = array("","name", "email", "mobile","subject", "message","check_status","");

    function make_query()
    {
        $this->db->from($this->table);
        $this->db->where('delete_status =',0);

        if($this->input->post('action')== 'checked')
        {
            $this->db->where('check_status =',1);
        }
        else
        {
            $this->db->where('check_status =',0);
        }
        
        if(isset($_POST["search"]["value"]))
        {
            $this->db->group_start();
                $this->db->like("name", $_POST["search"]["value"]);
                $this->db->or_like("email", $_POST["search"]["value"]);
                $this->db->or_like("mobile", $_POST["search"]["value"]);
                $this->db->or_like("subject", $_POST["search"]["value"]);
                $this->db->or_like("message", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by('date', 'ASC');
        }
    }

    function fetch_data()
    {
        $this->make_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    function checked($action)
    {
        $this->db->where('id',$this->uri->segment(5));

        if($action =='checked')
        {
            return $this->db->update('contact',['check_status'=>1]);
        }
        else
        {
            return $this->db->update('contact',['check_status'=>0]);
        }
        
    }

    function delete()
    {
        $this->db->where('application_id',$this->uri->segment(4))->update('applications',['delete_status'=>1]);
    }


}




?>