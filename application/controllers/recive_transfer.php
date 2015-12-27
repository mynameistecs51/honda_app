<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recive_transfer extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="recive_transfer";
		$this->load->model('mdl_recive_transfer'); 
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$Y=$now->format('Y')+543;
		$this->datefrom = "01/".$now->format('m/').$Y;
		$this->dateto = $now->format('d/m/').$Y;
		$this->datenow = $now->format('d/m/').$Y;
		$this->id_mmember = $this->session->userdata('id_mmember');
		$this->id_mposition=$this->session->userdata("id_mposition");
		$this->id_mbranch=$this->session->userdata("id_mbranch");
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
	$this->load->view('recive_transfer/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST;
    $sqlQuery= $this->mdl_recive_transfer->getList($requestData);
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

public function gettransfer_code()
{  
	if ($_POST['transfer_code']) 
	{
		if($_POST['transfer_old']!=$_POST['transfer_code']){
			$rs=$this->mdl_recive_transfer->getTransfer(1,$_POST['transfer_code']);
		}else{
			$rs=$this->mdl_recive_transfer->getTransfer(3,$_POST['transfer_code']);
		}
		echo json_encode($rs);
	}
} 

public function getchassis_number()
{  
	if ($_POST['chassis_number'])
	{ 
		if($_POST['chassis_old']!=$_POST['chassis_number']){
			$rs=$this->mdl_recive_transfer->getTransfer(2,$_POST['chassis_number']);
		}else{
			$rs=$this->mdl_recive_transfer->getTransfer(4,$_POST['chassis_number']);
		}
		echo json_encode($rs);
	}
}

public function convert_date($val_date)
{
	$date =  str_replace('/', '-',$val_date);
	$date = (date("Y", strtotime($date))-543).date("-m-d", strtotime($date));
	return $date;
}

public function mainpage($SCREENID)
{ 
	$SCREENNAME="Stock";
	$this->data["namepage"] ='สำนักงาน/สาขา';
	$this->data['controller'] = $this->ctl;
	$this->data['pagename']=$this->template->getPageName($this->ctl);
	$this->data['base_url'] = base_url();
	$this->data['mmember_name'] = $this->session->userdata("mmember_name");
	$this->data['mbranch_name'] = $this->session->userdata("mbranch_name");
	$this->data["lastLogin"] = $this->session->userdata('lastLogin');
	$this->data["id_mmember"] =$this->session->userdata("id_mmember");
	$this->data["id_mposition"] =$this->session->userdata("id_mposition");  
	$this->data['listMbranch']= $this->mdl_recive_transfer->getmbranch();
	$this->data['listMzone']= $this->mdl_recive_transfer->getmZone($this->session->userdata("id_mbranch"));
	$this->data["datenow"] = $this->datenow;
	$this->data["datefrom"] =$this->datefrom;
	$this->data["dateto"] =$this->dateto;
	$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->data["id_mposition"],$this->data['mbranch_name']);
	$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mposition"],$this->ctl);
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
		$this->data['pagename']=$this->SCREENNAME;
		$this->mainpage($SCREENID); 
		$this->load->view('recive_transfer/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
		$SCREENID="D001";
		$this->data['pagename']=$this->SCREENNAME;
		$this->mainpage($SCREENID); 
		$this->data['listStock']= $this->mdl_recive_transfer->getstock($id);
		$this->load->view('recive_transfer/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
		$SCREENID="E001"; 
		$this->data['pagename']=$this->SCREENNAME;
		$this->mainpage($SCREENID); 
		$this->data['idx']=$idx;
		$this->data['listStock']= $this->mdl_recive_transfer->getstock($id);
		$this->load->view('recive_transfer/'.$SCREENID,$this->data);
	} 
	
public function saveadd()
{
	if($_POST):
     	parse_str($_POST['form'], $post);
		$data = array(
			"id_stock"		=> '', 
			"stock_code"	=> $this->mdl_recive_transfer->getCode(),
			"stock_date"	=> $this->convert_date($post['stock_date']),
			"id_mbranch"	=> $this->id_mbranch, 
			"is_recive_type"=> 2, 
			"id_transfer"	=> $post['id_transfer'], 
			"chassis_number"=> $post['chassis_number'], 
			"engine_number"	=> $post['engine_number'], 
			"id_mmodel"		=> $post['id_mmodel'], 
			"id_mgen"		=> $post['id_mgen'], 
			"id_mcolor"		=> $post['id_mcolor'], 
			"recive_doc_date"	 => $this->convert_date($post['recive_doc_date']), 
			"doc_reference_code" => $post['doc_reference_code'], 
			"id_zone"		=> $post['id_zone'], 
			"comment"		=> str_replace("\n", "<br>\n",$post['comment']),
			"status"		=> 1,
			"id_create"		=> $this->id_mmember,
			"dt_create"		=> $this->dt_now,
			"id_update"		=> $this->id_mmember,
			"dt_update"		=> $this->dt_now
		); 
		$this->mdl_recive_transfer->addStock($data); 

		// Update ใบโยกรถ ที่โยกมา
		$data2 = array( 
			"comment"			=> 'รับรถที่โยกมาเข้าสต๊อกแล้ว',
			"status"			=> 2,
			"id_update"			=> $this->id_mmember,
			"dt_update"			=> $this->dt_now
		); 
		$this->mdl_recive_transfer->updateTransfer($post['id_transfer'],$data2);

    endif;
}

public function saveUpdate()
{
	if($_POST):
     	parse_str($_POST['form'], $post);
		$data = array(
			"stock_date"	=> $this->convert_date($post['stock_date']),
			"id_mbranch"	=> $this->id_mbranch,
			"is_recive_type"=> 2,
			"id_transfer"	=> $post['id_transfer'], 
			"chassis_number"=> $post['chassis_number'], 
			"engine_number"	=> $post['engine_number'], 
			"id_mmodel"		=> $post['id_mmodel'], 
			"id_mgen"		=> $post['id_mgen'], 
			"id_mcolor"		=> $post['id_mcolor'], 
			"recive_doc_date"	 => $this->convert_date($post['recive_doc_date']), 
			"doc_reference_code" => $post['doc_reference_code'], 
			"id_zone"		=> $post['id_zone'], 
			"comment"		=> str_replace("\n", "<br>\n",$post['comment']),
			"status"		=> $post['status'],
			"id_update"		=> $this->id_mmember,
			"dt_update"		=> $this->dt_now
		); 
		$this->mdl_recive_transfer->updateStock($post['id_stock'],$data); 

		// คืนสถานะให้รายเดิม
		$data1 = array( 
			"comment"			=> 'ยกเลิกการรับเข้าสต๊อก',
			"status"			=> 1,
			"id_update"			=> $this->id_mmember,
			"dt_update"			=> $this->dt_now
		); 
		$this->mdl_recive_transfer->updateTransfer($post['id_transfer_old'],$data1);

		if($post['status']==0){ 
			$this->mdl_recive_transfer->updateTransfer($post['id_transfer'],$data1); 
		}else{  
		// Update ใบโยกรถ ที่โยกมา
			$data2 = array( 
				"comment"			=> 'รับรถที่โยกมาเข้าสต๊อกแล้ว',
				"status"			=> 2,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_recive_transfer->updateTransfer($post['id_transfer'],$data2);
		}

    endif;
}

} ?>

