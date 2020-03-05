<?php
class Vacancy extends CI_Controller 
{
	public function __construct()
	{
	
		parent::__construct();

		$this->load->database();

		$this->load->helper(array('form', 'url','html'));

		$this->load->model(array('Vacancy_Model'));

		$this->load->library('session');

		$this->load->library('form_validation');

		$this->load->library(array('encryption','Layouts'));

		$this->load->library('pagination');

		if($this->session->userdata('userdata') == NULL)
		{
			header("Location:".$this->config->item("base_url")."/admin");
		}
	
	}


	function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Vacancy Table');
		$this->layouts->view('pages/admin/vacancy_table','','header');
	}



	function fetch()
	{
		$fetch_data = $this->Vacancy_Model->fetch_data();  
           $data = array();  
           $i=1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array[] = $i;   
                $sub_array[] = $row->hospital_name;
                $sub_array[] = $row->category;
                $sub_array[] = $row->description;
                $sub_array[] = $row->city;
                $sub_array[] = $row->expiry_date;

                if($row->active_status == 0)
                {
                	$sub_array[] = '<span class="badge badge-success">Active</span>';
                	$status = '<a href ="vacancy/status/deactivate/'.$row->vacancy_id.'" type="submit" name="delete" id="'.$row->vacancy_id.'" class="update" ><i class="fa fa-check-square"></i></a>';
                }
                else
                {
                	$sub_array[] = '<span class="badge badge-danger">In-Active</span>'; 
                	$status = '<a href ="vacancy/status/activate/'.$row->vacancy_id.'" type="submit" name="delete" id="'.$row->vacancy_id.'" class="update" ><i class="fa fa-check"></i></a>';
                }
                
                 
                $sub_array[] = '<div align="center">
                				<a href ="vacancy/view/'.$row->vacancy_id.'" type="submit" name="update" id="'.$row->vacancy_id.'" class="update" value=""><i class="fas fa-eye"></i></a>&nbsp&nbsp
                				<a href ="vacancy/edit/'.$row->vacancy_id.'" type="submit" name="update" id="'.$row->vacancy_id.'" class="update" value=""><i class="fas fa-edit"></i></a>&nbsp&nbsp'.
                				$status
                				.'&nbsp&nbsp
                				<a href ="vacancy/delete/'.$row->vacancy_id.'" type="submit" name="delete" id="'.$row->vacancy_id.'" class="update" ><i class="fa fa-trash"></i></a></div>';   
                $data[] = $sub_array;  
                $i++;
                
           }  
           $output = array(  
                "draw"                  =>     intval($_POST["draw"]),  
                "recordsTotal"          =>     $this->Vacancy_Model->get_all_data(),  
                "recordsFiltered"     	=>     $this->Vacancy_Model->get_filtered_data(),  
                "data"                  =>     $data  
           );  
           echo json_encode($output);
	}


	function form()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Vacancy');
		$this->layouts->view('pages/admin/vacancy_form','','header');
	}

	
	function save()
	{
		header("Access-Control-Allow-Origin: *");
		$data['data'] = $this->Vacancy_Model->save();
		$this->session->set_flashdata('save','Saved Successfully');
		header("Location:".$this->config->item("base_url")."/admin/vacancy");
	}

	
	function view()
	{
		header("Access-Control-Allow-Origin: *");
		$data['view'] = $this->uri->segment(3);
		$data['vacancy'] = $this->Vacancy_Model->edit();

		$this->layouts->title('Vacancy');
		$this->layouts->view('pages/admin/vacancy_edit',$data,'header');
	}


	function status()
	{
		$this->Vacancy_Model->status($this->uri->segment(5),$this->uri->segment(4));
		redirect('admin/vacancy');
	}

	function edit()
	{
		header("Access-Control-Allow-Origin: *");
		$data['vacancy'] = $this->Vacancy_Model->edit();

		$date= date_create($data['vacancy']->expiry_date);
		$data ['exp'] = date_format($date,"Y-m-d");

		$this->layouts->title($data['vacancy']->hospital_name);
		$this->layouts->view('pages/admin/vacancy_edit',$data,'header');
	}

	function update()
	{
		$this->Vacancy_Model->update();
		$this->session->set_flashdata('update','Updated Successfully');
		header("Location:".$this->config->item("base_url")."/admin/vacancy");
	}

	function delete()
	{
		$this->Vacancy_Model->delete();
		header("Location:".$this->config->item("base_url")."/admin/vacancy");

	}



	// public function get_permission($role_id,$table)
	// {
	// 	$rights = $this->Admin_Model->get_access($role_id,$table);
	// 	$data = array();


	// 	foreach ($rights as $row)
	// 	{

	// 		if($row->operation_id == 1)
	// 		{
	// 			$data['view'] = true;
	// 		}
	// 		elseif($row->operation_id == 2)
	// 		{
	// 			$data['insert'] = true;
	// 		}
	// 		elseif($row->operation_id == 3)
	// 		{
	// 			$data['update'] = true;
	// 		}
	// 		elseif ($row->operation_id == 4)
	// 		{
	// 			$data['delete'] = true;
	// 		}
	// 		elseif ($row->operation_id == 5)
	// 		{
	// 			$data['activate'] = true;
	// 		}

	// 	}

	// 	return $data;

	// }

	
	



}