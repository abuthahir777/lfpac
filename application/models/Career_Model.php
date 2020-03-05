<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career_Model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

    function getfile()
    {
        return $this->db->where('application_id',$this->uri->segment(4))->get('applications')->first_row();
    }

    function save()
    {
    	$this->db->insert('applications',[
    		'vacancy_id'=>$this->input->post('cid'),
    		'fname'=>$this->input->post('fname'),
    		'lname'=>$this->input->post('lname'),
    		'mobile'=>$this->input->post('phone'),
    		'email'=>$this->input->post('email'),
            'file_name'=>$this->upload->data('file_name'),
    		'date'=>date('Y-m-d'),
    		'check_status'=>0,
    		'delete_status'=>0
    	]);
    }

    var $table = "applications";
    var $select_column = array("applications.application_id","applications.fname", "applications.lname", "applications.mobile","applications.email","vacancy.hospital_name","applications.check_status");
    var $order_column = array("","applications.fname", "applications.lname", "applications.email","applications.mobile", "vacancy.hospital_name","","");

    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join('vacancy','vacancy.vacancy_id=applications.vacancy_id');
        $this->db->where('applications.delete_status =',0);

        if($this->input->post('action')=='unchecked')
        {
            $this->db->where('applications.check_status',0);
        }
        elseif($this->input->post('action')=='checked')
        {
            $this->db->where('applications.check_status',1);
        }
        if(isset($_POST["search"]["value"]))
        {
            $this->db->group_start();
                $this->db->like("applications.fname", $_POST["search"]["value"]);
                $this->db->or_like("applications.lname", $_POST["search"]["value"]);
                $this->db->or_like("applications.mobile", $_POST["search"]["value"]);
                $this->db->or_like("applications.email", $_POST["search"]["value"]);
                $this->db->or_like("vacancy.hospital_name", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by('applications.date', 'ASC');
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

    function view()
    {
        
    }

    function checked($action)
    {
        $this->db->where('application_id',$this->uri->segment(5));

        if($action =='checked')
        {
            return $this->db->update('applications',['check_status'=>1]);
        }
        else
        {
            return $this->db->update('applications',['check_status'=>0]);
        }
        
    }

    function delete()
    {
        $this->db->where('application_id',$this->uri->segment(4))->update('applications',['delete_status'=>1]);
    }
	
}




?>