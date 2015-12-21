<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Position extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="position";
		$this->load->model('mdl_mposition'); 
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datefrom = "01/".$now->format('m/Y');
		$this->dateto = $now->format('d/m/Y');
		$this->id_mmember = $this->session->userdata('id_mmember');
		$this->id_mposition=$this->session->userdata("id_mposition");
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);
		if($this->session->userdata("id_mmember")==""){
			redirect('authen/');
		}else if($this->template->CheckAuthen($this->id_mposition,$this->ctl)=="0"){
			redirect('authen/');
		}
	}

public function index()
{
	$SCREENID="L001";
	$this->mainpage($SCREENID);
	$this->load->view('position/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_mposition->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}
 
public function alert($massage)
{
	echo "<meta charset='UTF-8'>
			<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')';
			</SCRIPT>";
}

public function checkCode()
{  
	if ($_POST['code'])
	{ 
		echo $this->mdl_mposition->getCode($_POST['code']);
	}
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
		$this->data['controller'] = $this->ctl;
		$this->data['pagename']=$this->template->getPageName($this->ctl);
		$this->data['base_url'] = base_url();
		$this->data['mmember_name'] = $this->session->userdata("mmember_name");
		$this->data['mbranch_name'] = $this->session->userdata("mbranch_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_mmember"] =$this->session->userdata("id_mmember");
		$this->data["id_mposition"] =$this->session->userdata("id_mposition"); 
		$this->data['listMbranch']= $this->mdl_mposition->getmbranch();
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->data["id_mposition"],$this->data['mbranch_name']);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mposition"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function ADD()
	{
			$SCREENID="A001";
			$this->data['pagename']=$this->SCREENNAME;
			$this->mainpage($SCREENID); 
			$this->load->view('position/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->data['pagename']=$this->SCREENNAME;
			$this->mainpage($SCREENID); 
			$this->data['listMposition']= $this->mdl_mposition->getmposition($id);
			$this->load->view('position/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
			$SCREENID="E001"; 
			$this->data['pagename']=$this->SCREENNAME;
			$this->mainpage($SCREENID); 
			$this->data['idx']=$idx;
			$this->data['listMposition']= $this->mdl_mposition->getmposition($id);
			$this->load->view('position/'.$SCREENID,$this->data);
	}

public function saveadd()
{
	if($_POST):
     	parse_str($_POST['form'], $post);
		$data = array(
			"mposition_code"	=> $post['mposition_code'],
			"mposition_name"	=> $post['mposition_name'],
			"id_mbranch"		=> $post['id_mbranch'],
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			"status"			=> 1,
			"id_create"			=> $this->id_mmember,
			"dt_create"			=> $this->dt_now,
			"id_update"			=> $this->id_mmember,
			"dt_update"			=> $this->dt_now
		);
		$id_mposition = $this->mdl_mposition->addmposition($data); 

		// Insert Controlpanel Position map Menu
		$rs = $this->mdl_mposition->getmenu(); // Get Menu All
		foreach ($rs as $menu) {
			$data_cpn = array(
				"id_cusersetting"	=> $post['mposition_code'],
				"id_mposition"		=> $id_mposition,
				"id_mmenu"			=> $menu->id_mmenu,
				"can_view"			=> 1,
				"can_create"		=> 1,
				"can_edit"			=> 1,
				"can_print"			=> 1,
				"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
				"status"			=> 1,
				"id_create"			=> $this->id_mmember,
				"dt_create"			=> $this->dt_now,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now 
			);
			$this->mdl_mposition->addUsersetting($data_cpn);
		}
		// End insert
    endif;
}

public function saveUpdate()
{
	if($_POST):
			parse_str($_POST['form'], $post); 
			$data = array(
				"mposition_code"=> $post['mposition_code'],
				"mposition_name"=> $post['mposition_name'],
				"id_mbranch"	=> $post['id_mbranch'],
				"comment"		=> str_replace("\n", "<br>\n",$post['comment']),
				"status"		=> $post['status'],
				"id_update"		=> $this->id_mmember,
				"dt_update"		=> $this->dt_now
			);
			$this->mdl_mposition->updatemposition($post['id_mposition'],$data); 
	endif;
}
} ?>