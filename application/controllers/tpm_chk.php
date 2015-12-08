<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tpm_chk extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="tpm_chk";
		$this->load->model('mdl_tpm_chk');
		$this->id_memp = $this->session->userdata('id_memp');
		$this->id_mpst=$this->session->userdata("id_mpst"); 
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);
		if($this->session->userdata("id_memp")==""){
			redirect('authen/');
		}else if($this->template->CheckAuthen($this->id_mpst,$this->ctl)=="0"){
			redirect('authen/');
		}
	}

public function index()
{
	$SCREENID="L001";
	$this->mainpage($SCREENID);
	$this->load->view($this->ctl.'/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_tpm_chk->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

public function getCode()
{
	$mcmp_code='M';
	$lastCode=$this->mdl_tpm_chk->getCodeLast($mcmp_code);
	return $lastCode;
}
public function checkUser()
{  
	if ($_POST['user'])
	{ 
		echo $this->mdl_tpm_chk->getUser($_POST['user']);
	}
}
 
public function alert($massage)
{
	echo "<meta charset='UTF-8'>
			<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')';
			</SCRIPT>";
}

public function convert_date($val_date)
{
			$date = str_replace('/', '-',$val_date);
			$date = date("Y-m-d", strtotime($date));
			return $date;
}

public function mainpage()
{ 
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['pagename'] =$this->template->getPageName($this->ctl);
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp"); 
		$this->data["id_mpst"] =$this->session->userdata("id_mpst"); 
		$this->data["datefrom"] =$this->template->datefrom();
		$this->data["dtnow"] =$this->template->dtnow();
		$this->data["dateto"] =$this->template->dateto(); 
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$this->SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mpst"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data['url_print']=$this->data['base_url'].$this->ctl."/print/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function ADD($id)
	{
			$SCREENID="A001";
			$this->mainpage(); 
			$this->load->view($this->ctl.'/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->mainpage($SCREENID); 
		 	//$this->data['code']= $this->mdl_tpm_chk->gettpm_chkHdr($id);
		 	$this->data['code']="PM00".$id;
			$this->load->view($this->ctl.'/'.$SCREENID,$this->data);
	}

} ?>

