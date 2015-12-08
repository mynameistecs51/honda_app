<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tpm_closed extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="tpm_closed";
		$this->load->model('mdl_tpm');
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
	$this->mainpage();
	$this->load->view($this->ctl.'/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_tpm->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

public function getCode()
{
	$mcmp_code='M';
	$lastCode=$this->mdl_tpm->getCodeLast($mcmp_code);
	return $lastCode;
}
public function checkUser()
{  
	if ($_POST['user'])
	{ 
		echo $this->mdl_tpm->getUser($_POST['user']);
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
		$this->data['pagename']=$this->template->getPageName($this->ctl);
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp"); 
		$this->data["id_mpst"] =$this->session->userdata("id_mpst"); 
		$this->data["datefrom"] =$this->template->datefrom();
		$this->data["dtnow"] =$this->template->dtnow();
		$this->data["dateto"] =$this->template->dateto();
		$this->data['listMempCat']= $this->mdl_tpm->getMempCat();
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$this->SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
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
			$this->mainpage(); 
			$this->load->view($this->ctl.'/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->mainpage(); 
		//	$this->data['listtpm_closed']= $this->mdl_tpm->gettpm_closedHdr($id);
			$this->load->view($this->ctl.'/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
			$SCREENID="E001"; 
			$this->mainpage(); 
			$this->data['idx']=$idx;
		//	$this->data['listtpm_closed']= $this->mdl_tpm->gettpm_closed($id);
			$this->load->view($this->ctl.'/'.$SCREENID,$this->data);
	}

public function saveadd()
{
	if($_POST):
     parse_str($_POST['form'], $post);
		$code= $this->getCode();  

		$data = array(
			"id_memp"			=> '',
			"id_memp_cat"		=> $post['id_memp_cat'], 
			"memp_code"			=> $code,
			"sex"				=> $post['sex'],
			"status_marriaged"	=> $post['status_marriaged'],
			"id_memp_tit"		=> $post['id_memp_tit'],
			"firstname_en"		=> $post['firstname_en'],
			"lastname_en"		=> $post['lastname_en'],
			"firstname_th"		=> $post['firstname_th'],
			"lastname_th"		=> $post['lastname_th'],
			"birthdate"			=> $this->convert_date($post['birthdate']),
			"startdate"			=> $this->convert_date($post['startdate']),
			"resigndate"		=> $this->convert_date($post['resigndate']),
			"adr_line1"			=> str_replace("\n", "<br>\n",$post['adr_line1']),
			"adr_line2"			=> str_replace("\n", "<br>\n",$post['adr_line2']),
			"idcard_num"		=> $post['idcard_num'],
			"drv_lcn_num"		=> $post['drv_lcn_num'],
			"id_drv_cat"		=> $post['id_drv_cat'],
			"email"				=> $post['email'],
			"telephone"			=> $post['telephone'],
			"mobile"			=> $post['mobile'],
			"fax"				=> $post['fax'],
			"username"			=> $post['user'],
			"userpassword"		=> MD5($post['pass']),
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			"status"			=> 1,
			"id_create"			=> $this->id_memp,
			"dt_create"			=> $this->dt_now,
			"id_update"			=> $this->id_memp,
			"dt_update"			=> $this->dt_now
		);
			$this->mdl_tpm->addMemp($data);
	//echo json_encode($getId_tmnf);
    endif;
}

public function saveUpdate()
{
	if($_POST):
    parse_str($_POST['form'], $post);

		$id=$post['id_memp'];
		if($post['old_pass']!=''){
 			$old_pass=$this->mdl_tpm->checkOldPass($id,MD5($post['old_pass']));
		}else{
			$old_pass=1;
		}
		if($old_pass=='1'){

		if($post['pass']!=''){
					$data = array(
						"id_memp_cat"		=> $post['id_memp_cat'], 
						"sex"				=> $post['sex'],
						"status_marriaged"	=> $post['status_marriaged'],
						"id_memp_tit"		=> $post['id_memp_tit'],
						"firstname_en"		=> $post['firstname_en'],
						"lastname_en"		=> $post['lastname_en'],
						"firstname_th"		=> $post['firstname_th'],
						"lastname_th"		=> $post['lastname_th'],
						"birthdate"			=> $this->convert_date($post['birthdate']),
						"startdate"			=> $this->convert_date($post['startdate']),
						"resigndate"		=> $this->convert_date($post['resigndate']),
						"adr_line1"			=> str_replace("\n", "<br>\n",$post['adr_line1']),
						"adr_line2"			=> str_replace("\n", "<br>\n",$post['adr_line2']),
						"idcard_num"		=> $post['idcard_num'],
						"drv_lcn_num"		=> $post['drv_lcn_num'],
						"id_drv_cat"		=> $post['id_drv_cat'],
						"email"				=> $post['email'],
						"telephone"			=> $post['telephone'],
						"mobile"			=> $post['mobile'],
						"fax"				=> $post['fax'],
						"userpassword"		=> MD5($post['pass']),
						"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
						"status"			=> $post['status'],
						"id_update"			=> $this->id_memp,
						"dt_update"			=> $this->dt_now
					);
		}else{
					$data = array(
						"id_memp_cat"		=> $post['id_memp_cat'], 
						"sex"				=> $post['sex'],
						"status_marriaged"	=> $post['status_marriaged'],
						"id_memp_tit"		=> $post['id_memp_tit'],
						"firstname_en"		=> $post['firstname_en'],
						"lastname_en"		=> $post['lastname_en'],
						"firstname_th"		=> $post['firstname_th'],
						"lastname_th"		=> $post['lastname_th'],
						"birthdate"			=> $this->convert_date($post['birthdate']),
						"startdate"			=> $this->convert_date($post['startdate']),
						"resigndate"		=> $this->convert_date($post['resigndate']),
						"adr_line1"			=> str_replace("\n", "<br>\n",$post['adr_line1']),
						"adr_line2"			=> str_replace("\n", "<br>\n",$post['adr_line2']),
						"idcard_num"		=> $post['idcard_num'],
						"drv_lcn_num"		=> $post['drv_lcn_num'],
						"id_drv_cat"		=> $post['id_drv_cat'],
						"email"				=> $post['email'],
						"telephone"			=> $post['telephone'],
						"mobile"			=> $post['mobile'],
						"fax"				=> $post['fax'], 
						"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
						"status"			=> $post['status'],
						"id_update"			=> $this->id_memp,
						"dt_update"			=> $this->dt_now
					);
		}
			$this->mdl_tpm->updateMemp($id,$data);

			$massage = "แก้ไขข้อมูล เรียบร้อย !";
			$this->alert($massage);
		}else{
			$massage = "รหัสผ่านเดิมไม่ถูกต้อง !";
			$this->alert($massage);
		}
	
	endif;
}

} ?>

