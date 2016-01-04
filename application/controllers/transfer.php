<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transfer extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->ctl="transfer";
		$this->load->model('mdl_transfer'); 
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
	$this->load->view('transfer/'.$SCREENID,$this->data);
	
}
public function getList()
{
    $requestData= $_REQUEST; 
    $sqlQuery= $this->mdl_transfer->getList($requestData);  
    $this->datatables->getDatatables($requestData,$sqlQuery);
} 

public function getstock_code()
{  
	if ($_POST['stock_code']) 
	{
		if($_POST['stock_old']!=$_POST['stock_code']){
			$rs=$this->mdl_transfer->getStock(1,$_POST['stock_code']);
		}else{
			$rs=$this->mdl_transfer->getStock(3,$_POST['stock_code']);
		}
		echo json_encode($rs);
	}
} 

public function getchassis_number()
{  
	if ($_POST['chassis_number'])
	{ 
		if($_POST['chassis_old']!=$_POST['chassis_number']){
			$rs=$this->mdl_transfer->getStock(2,$_POST['chassis_number']);
		}else{
			$rs=$this->mdl_transfer->getStock(4,$_POST['chassis_number']);
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
		$SCREENNAME="EMPLOYEE transfer";
		$this->data["namepage"] ='รับเข้าสต๊อก';
		$this->data['controller'] = $this->ctl;
		$this->data['pagename']=$this->template->getPageName($this->ctl); 
		$this->data['mmember_name'] = $this->session->userdata("mmember_name");
		$this->data['mbranch_name'] = $this->session->userdata("mbranch_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_mmember"] =$this->session->userdata("id_mmember");
		$this->data["id_mposition"] =$this->session->userdata("id_mposition");  
		$this->data['id_mbranch'] = $this->id_mbranch;
		$this->data['listMbranch']= $this->mdl_transfer->getmbranch(); 
		$this->data["datenow"] = $this->datenow;
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->data["id_mposition"],$this->data['mbranch_name']);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mposition"],$this->ctl);
		$this->data['url_add']=base_url().$this->ctl."/add/";
		$this->data['url_edit']=base_url().$this->ctl."/edit/";
		$this->data['url_detail']=base_url().$this->ctl."/detail/";
		$this->data['url_print']=base_url().$this->ctl."/print/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function ADD()
	{
			$SCREENID="A001";
			$this->data['pagename']=$this->SCREENNAME;
			$this->data["datenow"] =$this->datenow;
			$this->mainpage($SCREENID); 
			$this->load->view('transfer/'.$SCREENID,$this->data); 
	}
public function DETAIL($id)
	{
			$SCREENID="D001";
			$this->data['pagename']=$this->SCREENNAME;
			$this->data["datenow"] =$this->datenow;
			$this->mainpage($SCREENID); 
			$this->data['listtransfer']= $this->mdl_transfer->getTransfer($id);
			$this->load->view('transfer/'.$SCREENID,$this->data);
	}
public function EDIT($id,$idx)
	{
			$SCREENID="E001"; 
			$this->data['pagename']=$this->SCREENNAME;
			$this->data["datenow"] =$this->datenow;
			$this->mainpage($SCREENID); 
			$this->data['idx']=$idx;
			$this->data['listtransfer']= $this->mdl_transfer->getTransfer($id);
			$this->load->view('transfer/'.$SCREENID,$this->data);
	}

	public function saveadd() 
	{
		if($_POST):
	    	parse_str($_POST['form'], $post);
			$data = array(
				"transfer_code"		=> $this->mdl_transfer->getCode(),
				"transfer_date"		=> $this->convert_date($post['transfer_date']),
				"id_stock"			=> $post['id_stock'],
				"id_mbranch"		=> $this->id_mbranch,
				"id_mbranch_recive"	=> $post['id_mbranch_recive'],
				"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
				"status"			=> 1,
				"id_create"			=> $this->id_mmember,
				"dt_create"			=> $this->dt_now,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_transfer->addTransfer($data);

			$data4 = array( 
				"comment"			=> 'โยกรถ',
				"status"			=> 4,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_transfer->updateStock($post['id_stock'],$data4);
	    endif;
	}					

	public function saveUpdate()
	{
		if($_POST):
	    	parse_str($_POST['form'], $post);
			$data = array(
				"transfer_date"		=> $this->convert_date($post['transfer_date']),
				"id_stock"			=> $post['id_stock'],
				"id_mbranch"		=> $this->id_mbranch,
				"id_mbranch_recive"	=> $post['id_mbranch_recive'],
				"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
				"status"			=> $post['status'],
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_transfer->updateTransfer($post['id_transfer'],$data);

			$data1 = array( 
				"comment"			=> 'ยกเลิกการโยก คืนรถเข้าสต๊อกแล้ว',
				"status"			=> 1,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_transfer->updateStock($post['id_stock_old'],$data1);
		if($post['status']==0){

			$this->mdl_transfer->updateStock($post['id_stock'],$data1);

		}else{

			$data4 = array( 
				"comment"			=> 'โยกรถ',
				"status"			=> 4,
				"id_update"			=> $this->id_mmember,
				"dt_update"			=> $this->dt_now
			); 
			$this->mdl_transfer->updateStock($post['id_stock'],$data4);

		}
			
	    endif; 
	}
} ?>