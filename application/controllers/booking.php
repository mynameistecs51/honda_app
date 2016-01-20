<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->ctl="booking";
		$this->load->model('mdl_customer');
		$this->load->model('mdl_booking');
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow =$now->format('d/m/').($now->format('Y')+543);
		$this->datefrom = "01/".$now->format('m/Y');
		$this->dateto = $now->format('d/m/Y');
		$this->id_mmember = $this->session->userdata('id_mmember');
		$this->mmember_code = $this->session->userdata('mmember_code');
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
		$this->load->view('booking/'.$SCREENID,$this->data);
	}
	public function getList()
	{
		$requestData= $_REQUEST;
		$sqlQuery= $this->mdl_booking->getList($requestData);
		$this->datatables->getDatatables($requestData,$sqlQuery);
	}

	public function getCode()
	{
		$mcmp_code='M';
		$lastCode=$this->mdl_booking->getCodeLast($mcmp_code);
		return $lastCode;
	}

	public function getCustomer()
	{
		// $name = $_POST['cus_name'];
		// echo $name;
		$listCustomer = $this->mdl_booking->getCustomer();
		echo json_encode($listCustomer);
	}

	public function checkUser()
	{
		if ($_POST['user'])
		{
			echo $this->mdl_booking->getUser($_POST['user']);
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
		$d=$date[0].$date[1];
		$m=$date[3].$date[4];
		$y=$date[6].$date[7].$date[8].$date[9];
		$y=intval($y)-543;
		$date = $y."-".$m."-".$d;
			//$date = date("Y-m-d", strtotime($date));
		return $date;
	}

	public function mainpage($SCREENID)
	{
		$SCREENNAME="MEMBER";
		$this->data['controller'] = $this->ctl;
		$this->data['pagename']=$this->template->getPageName($this->ctl);
		$this->data['mmember_name'] = $this->session->userdata("mmember_name");
		$this->data['mbranch_name'] = $this->session->userdata("mbranch_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_mmember"] =$this->session->userdata("id_mmember");
		$this->data['mmember_code'] = $this->session->userdata('mmember_code');
		$this->data["id_mposition"] =$this->session->userdata("id_mposition");
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data['listSale']= $this->mdl_customer->getTypeSale();
		$this->data['Sale'] = $this->mdl_booking->getSale($this->id_mmember);
		// $this->data['listmposition']= $this->mdl_booking->getmposition();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->data["id_mposition"],$this->data['mbranch_name']);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mposition"],$this->ctl);
		$this->data["show_cusCode"] = base_url().$this->ctl."/show_cusCode/";
		$this->data['url_add']=base_url().$this->ctl."/add/";
		$this->data['url_edit']=base_url().$this->ctl."/edit/";
		$this->data['url_detail']=base_url().$this->ctl."/detail/";
		$this->data['url_print']=base_url().$this->ctl."/printpdf/";
		$this->data['dtnow'] = $this->template->dtnow();
		$this->data["datenow"] =$this->datenow;
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] =$this->SCREENNAME;
	}

	public function ADD()
	{
		$SCREENID="A001";
		$this->data["datenow"] =$this->datenow;
		$this->mainpage($SCREENID);
		$this->load->view('booking/'.$SCREENID,$this->data);
	}
	public function DETAIL($id)
	{
		$SCREENID="D001";
		$this->mainpage($SCREENID);
		$this->data['listemployee']= $this->mdl_booking->getemployee($id);
		$this->load->view('booking/'.$SCREENID,$this->data);
	}
	public function EDIT($id,$idx)
	{
		$SCREENID="E001";
		$this->mainpage($SCREENID);
		$this->data['idx']=$idx;
		$this->data['listemployee']= $this->mdl_booking->getemployee($id);
		$this->load->view('booking/'.$SCREENID,$this->data);
	}

	public function saveadd()
	{
		if($_POST):
			parse_str($_POST['form'], $post);
		//$code= $this->getCode();
		$data = array(
			"id_mposition"		=> $post['id_mposition'],
			//"employee_code"	=> $code,
			"id_mdept"			=> $post['id_mdept'],
			"employee_code"		=> $post['employee_code'],
			"sex"				=> $post['sex'],
			"status_marriaged"	=> $post['status_marriaged'],
			"id_employee_tit"	=> $post['id_employee_tit'],
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
			"email"				=> $post['email'],
			"telephone"			=> $post['telephone'],
			"mobile"			=> $post['mobile'],
			"fax"				=> $post['fax'],
			"username"			=> $post['username'],
			"password"			=> MD5($post['password']),
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			"status"			=> 1,
			"id_create"			=> $this->id_employee,
			"dt_create"			=> $this->dt_now,
			"id_update"			=> $this->id_employee,
			"dt_update"			=> $this->dt_now
			);
		         ///print_r($data);exit();
		$this->mdl_booking->addemployee($data);
		$massage = "บันทึกข้อมูล เรียบร้อย !";
		$this->alert($massage);
			//echo json_encode($getId_tmnf);
		endif;
		}

public function saveUpdate()
{
	if($_POST):
		parse_str($_POST['form'], $post);

	$id=$post['id_employee'];
	if($post['old_pass']!=''){
		$old_pass=$this->mdl_booking->checkOldPass($id,MD5($post['old_pass']));
	}else{
		$old_pass=1;
	}
	if($old_pass=='1'){

		if($post['pass']!=''){
			$data = array(
				"id_mposition"			=> $post['id_mposition'],
				"id_mdept"			=> $post['id_mdept'],
				"sex"				=> $post['sex'],
				"status_marriaged"	=> $post['status_marriaged'],
				"id_employee_tit"		=> $post['id_employee_tit'],
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
				"email"				=> $post['email'],
				"telephone"			=> $post['telephone'],
				"mobile"			=> $post['mobile'],
				"fax"				=> $post['fax'],
				"userpassword"		=> MD5($post['pass']),
				"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
				"status"			=> $post['status'],
				"id_update"			=> $this->id_employee,
				"dt_update"			=> $this->dt_now
				);
}else{
	$data = array(
		"id_mposition"		=> $post['id_mposition'],
		"id_mdept"			=> $post['id_mdept'],
		"sex"				=> $post['sex'],
		"status_marriaged"	=> $post['status_marriaged'],
		"id_employee_tit"		=> $post['id_employee_tit'],
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
		"email"				=> $post['email'],
		"telephone"			=> $post['telephone'],
		"mobile"			=> $post['mobile'],
		"fax"				=> $post['fax'],
		"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
		"status"			=> $post['status'],
		"id_update"			=> $this->id_employee,
		"dt_update"			=> $this->dt_now
		);
}
$this->mdl_booking->updateemployee($id,$data);

$massage = "แก้ไขข้อมูล เรียบร้อย !";
$this->alert($massage);
}else{
	$massage = "รหัสผ่านเดิมไม่ถูกต้อง !";
	$this->alert($massage);
}

endif;
}

} ?>

