<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller 
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_menu');
		$this->load->library('template');
		$this->ctl="dashboard";  
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow =$now->format('d/m/').($now->format('Y')+543);
		$this->datefrom = "01/".$now->format('m/Y');
		$this->dateto = $now->format('d/m/Y');
		$this->id_mmember = $this->session->userdata('id_mmember');
		$this->id_mposition=$this->session->userdata("id_mposition");
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);

		if($this->session->userdata("id_mmember")==""){
			redirect('authen/');
		}
		$this->mposition  = $this->session->userdata("id_mposition");
		$this->id_mmember = $this->session->userdata("id_mmember");
		$this->mbranch_name = $this->session->userdata("mbranch_name");
	}

public function index()
	{
		$SCREENNAME="DASHBOARD";
		$SCREENID="dashboard"; 
		$this->data["controller"] =$this->ctl;
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

public function mainpage($SCREENNAME)
{
		$this->data['mmember_name'] = $this->session->userdata("mmember_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin'); 
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->mposition,$this->mbranch_name);
		$this->data["footer"] = $this->template->getFooter();
}


} ?>

