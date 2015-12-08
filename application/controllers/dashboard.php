<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller 
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_menu');
		$this->load->library('template');
		date_default_timezone_set('Asia/Bangkok');
		if($this->session->userdata("id_memp")==""){
			redirect('authen/');
		}
	}

public function index()
	{
		$SCREENNAME="DASHBOARD";
		$SCREENID="dashboard"; 
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

public function mainpage($SCREENNAME)
{
 		$ctl="memp";
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst");
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["footer"] = $this->template->getFooter();
}


} ?>

