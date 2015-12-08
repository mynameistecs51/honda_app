<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tret_inv extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="tret_inv";
		$this->load->model('mdl_tret_inv');
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
	$this->load->view('tret_inv/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_tret_inv->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

public function getCode()
{
	$mcmp_code='M';
	$lastCode=$this->mdl_mbom->getCodeLast($mcmp_code);
	return $lastCode;
}
public function checkUser()
{  
	if ($_POST['user'])
	{ 
		echo $this->mdl_mbom->getUser($_POST['user']);
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

public function mainpage($SCREENID)
{ 
		$SCREENNAME="INVENTORY MASTER";
		$this->data['pagename']=$this->template->getPageName($this->ctl);
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst"); 
		$this->data["dtnow"] =$this->template->dtnow();
		$this->data["datefrom"] =$this->template->datefrom();
		$this->data["dateto"] =$this->template->dateto();
		//$this->data['listMempCat']= $this->mdl_mbom->getMempCat();
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mpst"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data['url_print']=$this->data['base_url'].$this->ctl."/print/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function ADD()
	{
			$SCREENID="A001";
			$this->mainpage($SCREENID); 
			$this->load->view('tret_inv/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->mainpage($SCREENID); 
		//	$this->data['listmbom']= $this->mdl_mbom->getMbomHdr($id);
			$this->load->view('tret_inv/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
			$SCREENID="E001"; 
			$this->mainpage($SCREENID); 
			$this->data['idx']=$idx;
		//	$this->data['listmbom']= $this->mdl_mbom->getmbom($id);
			$this->load->view('tret_inv/'.$SCREENID,$this->data);
	}

} ?>