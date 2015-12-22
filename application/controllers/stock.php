<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stock extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="stock";
		$this->load->model('mdl_stock'); 
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$Y=$now->format('Y')+543;
		$this->datefrom = "01/".$now->format('m/').$Y;
		$this->dateto = $now->format('d/m/').$Y;
		$this->datenow = $now->format('d/m/').$Y;
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
	$this->load->view('stock/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_stock->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
}

public function checkCode()
{  
	if ($_POST['code'])
	{ 
		echo $this->mdl_stock->getCode($_POST['code']);
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
	$this->data['listMbranch']= $this->mdl_stock->getmbranch();
	$this->data['listMzone']= $this->mdl_stock->getmZone($this->session->userdata("id_mbranch"));
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
		$this->load->view('stock/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
		$SCREENID="D001";
		$this->data['pagename']=$this->SCREENNAME;
		$this->mainpage($SCREENID); 
		$this->data['listMstock']= $this->mdl_stock->getstock($id);
		$this->load->view('stock/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
		$SCREENID="E001"; 
		$this->data['pagename']=$this->SCREENNAME;
		$this->mainpage($SCREENID); 
		$this->data['idx']=$idx;
		$this->data['listMstock']= $this->mdl_stock->getstock($id);
		$this->load->view('stock/'.$SCREENID,$this->data);
	}
public function getCode(){
	return "STUDT581200001";
}

public function saveadd()
{
	if($_POST):
     	parse_str($_POST['form'], $post); 
		$data = array(
			"id_stock"		=> '', 
			"stock_code"	=> $this->getCode(), 
			"stock_date"	=> $this->convert_date($post['stock_date']), 
			"id_mbranch"	=> $post['id_mbranch'], 
			"is_recive_type"=> $post['is_recive_type'], 
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
		$this->mdl_stock->addmstock($data); 
    endif;
}

public function saveUpdate()
{
	if($_POST):
		parse_str($_POST['form'], $post);
		$data = array(
			"mstock_code"	=> $post['mstock_code'],
			"mstock_name"  => $post['mstock_name'],
			"comment"		=> str_replace("\n", "<br>\n",$post['comment']), 
			"status"		=> $post['status'],
			"id_update"		=> $this->id_mmember,
			"dt_update"		=> $this->dt_now
		);
		$this->mdl_stock->updatemstock($post['id_mstock'],$data);
	endif;
}

} ?>

