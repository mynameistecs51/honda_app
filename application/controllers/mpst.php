<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mpst extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="mpst";
		$this->load->model('mdl_mpst');
		$this->load->library('template');
		$this->load->library('datatables');
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datefrom = "01/".$now->format('m/Y');
		$this->dateto = $now->format('d/m/Y');
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
	$this->load->view('mpst/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_mpst->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

/*public function getCode()
{
	$mpst_code='M';
	$lastCode=$this->mdl_mpst->getCodeLast($mpst_code);
	return $lastCode;
}

public function checkUser()
{  
	if ($_POST['user'])
	{ 
		echo $this->mdl_mpst->getUser($_POST['user']);
	}
}*/
 
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
		$SCREENNAME="EMPLOYEE POSITION";
		$this->data['pagename']=$this->template->getPageName($this->ctl);
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst"); 
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mpst"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function ADD()
	{
			$SCREENID="A001";
			$this->mainpage($SCREENID); 
			$this->load->view('mpst/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->mainpage($SCREENID); 
			$this->data['listMpst']= $this->mdl_mpst->getMpst($id);
			$this->load->view('mpst/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
			$SCREENID="E001"; 
			$this->mainpage($SCREENID); 
			$this->data['idx']=$idx;
			$this->data['listMpst']= $this->mdl_mpst->getMpst($id);
			$this->load->view('mpst/'.$SCREENID,$this->data);
	}

public function saveadd()
{
	if($_POST):
     parse_str($_POST['form'], $post);
		//$code= $this->getCode();  
		$data = array(
			"mpst_code"			=> $post['mpst_code'],
			"name_en"			=> $post['name_en'],
			"name_th"			=> $post['name_th'],
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			"status"			=> 1,
			"id_create"			=> $this->id_memp,
			"dt_create"			=> $this->dt_now,
			"id_update"			=> $this->id_memp,
			"dt_update"			=> $this->dt_now
		);
		//print_r($data);exit();
			$this->mdl_mpst->addMpst($data);
			$massage = "บันทึกข้อมูล เรียบร้อย !";
			$this->alert($massage);
    endif;
}

public function saveUpdate()
{
	if($_POST):
    parse_str($_POST['form'], $post);
	$id=$post['id_mpst'];
					$data = array(
						"name_en"			=> $post['name_en'], 
						"name_th"			=> $post['name_th'],
						"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
						"status"			=> $post['status'],
						"id_update"			=> $this->id_memp,
						"dt_update"			=> $this->dt_now
					);
			$this->mdl_mpst->updateMpst($id,$data);
			$massage = "แก้ไขข้อมูล เรียบร้อย !";
			$this->alert($massage);
	endif;
}
} ?>