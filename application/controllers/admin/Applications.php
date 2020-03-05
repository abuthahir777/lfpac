<?php
class Applications extends CI_Controller 
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

		$this->load->library('pagination');

		if($this->session->userdata('userdata') == NULL)
		{
			header("Location:".$this->config->item("base_url")."/admin");
		}
	
	}


	function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Applications');
		$this->layouts->view('pages/admin/application_table','','header');
	}

	function checked()
	{
		$this->layouts->title('Applications');
		$this->layouts->view('pages/admin/application_checked','','header');
	}

	function form()
	{
		header("Access-Control-Allow-Origin: *");
		$this->layouts->title('Vacancy Table');
		$this->layouts->view('pages/admin/vacancy_form','','header');
	}

	function fetch()
	{
		$fetch_data = $this->Career_Model->fetch_data();  
           $data = array();  
           $i=1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array[] = $i;   
                $sub_array[] = $row->fname;
                $sub_array[] = $row->lname;
                $sub_array[] = $row->email;
                $sub_array[] = $row->mobile;
                $sub_array[] = $row->hospital_name;

                if($row->check_status == 0)
                {
                	$sub_array[] = '<span class="badge badge-danger">Not Checked</span>';
                	$status = '<a href ="'.base_url('admin/applications').'/status/checked/'.$row->application_id.'" type="submit" name="delete" id="'.$row->application_id.'" class="update" ><i class="fa fa-check-square"></i></a>';
                }
                else
                {
                	$sub_array[] = '<span class="badge badge-success">Checked</span>'; 
                	$status = '<a href ="'.base_url('admin/applications').'/status/notchecked/'.$row->application_id.'" type="submit" name="delete" id="'.$row->application_id.'" class="update" ><i class="fa fa-check"></i></a>';
                }
                
                 
                $sub_array[] = '<div align="center">
                				<a href ="'.base_url('admin/applications').'/view/'.$row->application_id.'" type="submit" name="update" id="'.$row->application_id.'" class="update" value=""><i class="fas fa-eye"></i></a>&nbsp&nbsp
                				'.$status.'&nbsp&nbsp
                				<a href ="'.base_url('admin/applications').'/download/'.$row->application_id.'" type="submit" name="delete" id="'.$row->application_id.'" class="update" ><i class="fa fa-download"></i></a>
                				</div>';   
                $data[] = $sub_array;  
                $i++;
                
           }  
           $output = array(  
                "draw"                  =>     intval($_POST["draw"]),  
                "recordsTotal"          =>     $this->Career_Model->get_all_data(),  
                "recordsFiltered"     	=>     $this->Career_Model->get_filtered_data(),  
                "data"                  =>     $data  
           );  
           echo json_encode($output);
	}

	public function download()
	{
		$this->load->helper('download');
		$getfile = $this->Career_Model->getfile();

		$file = 'ressumes/'.$getfile->file_name;

		force_download($file,NULL);
	}


	function view()
	{
		$data['view'] = $this->uri->segment(3);
		$data['application'] = $this->Career_Model->getfile();

		$this->layouts->title('View Vacancy');
		$this->layouts->view('pages/admin/application_view',$data,'header');
	}


	function status()
	{
		$this->Career_Model->checked($this->uri->segment(4));
		header("Location:".$this->config->item("base_url")."/admin/applications");
	}


	function delete()
	{
		$this->Career_Model->delete();
		redirect('admin/applications');
		header("Location:".$this->config->item("base_url")."/admin/applications");

	}

	
	


}
?>