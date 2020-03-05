<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacancy_Model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

    function get()
    {	
    	return $this->db->where('active_status=',0)->where('delete_status=',0)->get('vacancy')->result();
    }

    function single($id,$action)
    {
    	return $this->db->where('vacancy_id',$id)->get('vacancy')->first_row();

    }

	function save()
	{		
		$expiry = date_create($this->input->post('date'));

		return $this->db->insert('vacancy',[
			'hospital_name' => $this->input->post('hospital'),
			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'city' => $this->input->post('city'),
			'job_type' => $this->input->post('jobtype'),
			'post_date' => date('F d Y'),
			'expiry_date' => date_format($expiry,"F d Y"),
			'active_status'=> 1,
			'delete_status'=> 0]);

	}


	var $table = "vacancy";
	var $select_column = array("vacancy_id","hospital_name","category", "description", "city","post_date","expiry_date","active_status");
	var $order_column = array("","hospital_name","category", "description", "city","expiry_date","active_status","");

	function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->where('delete_status =',0);
		if(isset($_POST["search"]["value"]))
		{
			$this->db->group_start();
				$this->db->like("hospital_name", $_POST["search"]["value"]);
				$this->db->or_like("description", $_POST["search"]["value"]);
				$this->db->or_like("category", $_POST["search"]["value"]);
				$this->db->or_like("city", $_POST["search"]["value"]);
			$this->db->group_end();
		}
		if(isset($_POST["order"]))
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('post_date', 'ASC');
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


	function status($id,$action)
	{
		$this->db->where('vacancy_id',$id);
		if($action == 'activate')
		{
			return $this->db->update('vacancy',['active_status'=>0]);
		}
		else
		{
			return $this->db->update('vacancy',['active_status'=>1]);
		}
	}

	function edit()
	{
		return $this->db->where('vacancy_id',$this->uri->segment(4))
					->get('vacancy')
					->first_row();
	}

	function update()
	{
		$expiry = date_create($this->input->post('date'));

		return $this->db->where('vacancy_id',$this->input->post('id'))
		->update('vacancy',[
			'hospital_name' => $this->input->post('hospital'),
			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'city' => $this->input->post('city'),
			'job_type' => $this->input->post('jobtype'),
			'expiry_date' => date_format($expiry,"F d Y"),
			'active_status'=> 0,
			'delete_status'=> 0]);
	}

	function delete()
	{
		$this->db->where('vacancy_id',$this->uri->segment(4))->update('vacancy',['delete_status'=>1]);
	}
	
}




?>