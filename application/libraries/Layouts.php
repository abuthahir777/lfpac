<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
/** 
 * Layouts Class. PHP5 only. 
 * 
 */
class Layouts { 
    
  // Will hold a CodeIgniter instance 
  private $CI; 

  public $page_title=NULL;

  private $name;
    
  public function __construct()  
  { 
    $this->CI =& get_instance(); 
  } 

  public function title($title)
  {
    $this->page_title = $title;
  }

  public function set_name($name)
  {
    $this->name = $name;
  }
    
  public function view($view_name, $params=array(), $layout = '') 
  { 
    if($this->page_title != NULL)
    {
      $title = $this->page_title;
    }

    // Load the view's content, with the params passed 
    $view_content = $this->CI->load->view($view_name, $params, TRUE); 
  
    // Now load the layout, and pass the view we just rendered 
    $this->CI->load->view('templates/' . $layout, array( 
      'content' => $view_content,
      'title'  => $title
    )); 
  } 
}