<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class htmltemplate extends CI_Controller 
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata("id_memp")==""){redirect('authen/');}
		$this->ctl="htmltemplate";
		$this->load->model('mdl_htmltemplate');
 	}

  public function get_sel_province()
      {

          $result=$this->mdl_htmltemplate->sel_province();
          foreach ($result as $row)
          {
            $arr[] = $row;
          }
          echo json_encode($arr);
      }
  public function get_sel_district()
  {
      $result=$this->mdl_htmltemplate->sel_district($this->input->post('province_id'));
      foreach ($result as $row)
      {
        $arr[] = $row;
      }
      echo json_encode($arr);
  }

  public function get_sel_mzone()
  {
      $result=$this->mdl_htmltemplate->sel_mzone();
      foreach ($result as $row)
      {
        $arr[] = $row;
      }
      echo json_encode($arr);
  }

  public function get_mcmp_detail()
  {
      $result=$this->mdl_htmltemplate->get_mcmp_detail($this->input->post('id_mcmp'));
      foreach ($result as $row)
      {
        $arr[] = $row;
      }
      echo json_encode($arr);
  }

  public function get_sel_mcmp_auto()
  {
      $result=$this->mdl_htmltemplate->sel_mcmp_auto($this->input->post('id_mcmp'));
      foreach ($result as $row)
      {
        $arr[] = $row;
      }
      echo json_encode($arr);
  }

  public function get_mcmp_ajax_search()
  {
        $keyword = trim($_POST['keyword']);
        $result = $this->mdl_htmltemplate->get_mcmp_ajax_search($keyword);
        echo json_encode($result);
  }


}//class
?>
     

