<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="customer";
		$this->load->model('mdl_cbom');
		$this->load->library('template');
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);
		$this->id_memp = $this->session->userdata('id_memp');
		$this->id_mpst=$this->session->userdata("id_mpst");
		if($this->session->userdata("id_memp")==""){
			redirect('authen/');
		}else if($this->template->CheckAuthen($this->id_mpst,$this->ctl)=="0"){
			redirect('authen/');
		}
	}


	public function mainpage($SCREENID)
	{
		$SCREENNAME="BOM MASTER";
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst");
		$this->data["datefrom"] =$this->template->datefrom();
		$this->data["dtnow"] =$this->template->dtnow();
		$this->data["dateto"] =$this->template->dateto();
		$this->data["pagename"] =$this->template->getPageName($this->ctl);
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mpst"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data['url_print']=$this->data['base_url'].$this->ctl."/print/";
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] =$this->SCREENNAME;
	}

	public function index()
	{
		$SCREENID="customer";
		$this->mainpage($SCREENID);
		$this->load->view($this->ctl.'/'.$SCREENID,$this->data);

	}
}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */