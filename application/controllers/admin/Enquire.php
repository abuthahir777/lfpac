<?php
class Enquire extends CI_Controller 
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

		$this->load->library('pagination');

		if($this->session->userdata('userdata') == NULL)
		{
			header("Location:".$this->config->item("base_url")."/admin");
		}
	
	}


	function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Enquires');
		$this->layouts->view('pages/admin/enquire_table','','header');
	}

	function checked()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Enquires');
		$this->layouts->view('pages/admin/enquire_checked','','header');
	}


	function fetch()
	{
		$fetch_data = $this->Contact_Model->fetch_data();  
           $data = array();  
           $i=1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array[] = $i;   
                $sub_array[] = $row->name;
                $sub_array[] = $row->email;
                $sub_array[] = $row->mobile;
                $sub_array[] = $row->subject;
                $sub_array[] = $row->message;

                if($row->check_status == 0)
                {
                	$sub_array[] = '<span class="badge badge-danger">Not Checked</span>';
                	$status = '<a href ="'.base_url('admin/enquire').'/status/checked/'.$row->id.'" type="submit" name="delete" id="'.$row->id.'" class="update" ><i class="fa fa-check-square"></i></a>';
                }
                else
                {
                	$sub_array[] = '<span class="badge badge-success">Checked</span>'; 
                	$status = '<a href ="'.base_url('admin/enquire').'/status/notchecked/'.$row->id.'" type="submit" name="delete" id="'.$row->id.'" class="update" ><i class="fa fa-check"></i></a>';
                }
                
                 
                $sub_array[] = '<div align="center">
                				<a href ="'.base_url('admin/enquire').'/view/'.$row->id.'" type="submit" name="update" id="'.$row->id.'" class="update" value=""><i class="fas fa-eye"></i></a>&nbsp&nbsp
                				'.$status.
                				'</div>';   
                $data[] = $sub_array;  
                $i++;
                
           }  
           $output = array(  
                "draw"                  =>     intval($_POST["draw"]),  
                "recordsTotal"          =>     $this->Contact_Model->get_all_data(),  
                "recordsFiltered"     	=>     $this->Contact_Model->get_filtered_data(),  
                "data"                  =>     $data  
           );  
           echo json_encode($output);
	}


	function view()
	{
		$data['view'] = $this->uri->segment(3);
		$data['details'] = $this->Contact_Model->view();

		$this->layouts->title('Enquire');
		$this->layouts->view('pages/admin/enquire_view',$data,'header');
	}


	function status()
	{
		header("Access-Control-Allow-Origin: *");
		$this->Contact_Model->checked($this->uri->segment(4));
		header("Location:".$this->config->item("base_url")."/admin/enquire");
	}


	// function delete()
	// {
	// 	$this->Contact_Model->delete();
	// 	redirect('admin/applications');

	// }



}
?>