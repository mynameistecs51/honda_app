<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mcmp extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->ctl="mcmp";
		$this->load->model('mdl_mcmp');
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
		$this->load->view('mcmp/'.$SCREENID,$this->data);
	}

	public function getList()
	{
        $requestData= $_REQUEST;  
        $sqlQuery= $this->mdl_mcmp->getList($requestData);  
        $this->datatables->getDatatables($requestData,$sqlQuery);
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
		$SCREENNAME="CUSTOMER";
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
		$this->load->view('mcmp/'.$SCREENID,$this->data);
	}

	public function DETAIL($id)
	{
		$SCREENID="D001";
		$this->mainpage($SCREENID); 
		$this->data['listMcmp']= $this->mdl_mcmp->getMcmp($id);
		$this->load->view('mcmp/'.$SCREENID,$this->data);
	}

	public function EDIT($id,$idx)
	{
		$SCREENID="E001"; 
		$this->mainpage($SCREENID); 
		$this->data['idx']=$idx;
		$this->data['listMcmp']= $this->mdl_mcmp->getMcmp($id);
		$this->load->view('mcmp/'.$SCREENID,$this->data);
	}

	public function CHANGE()
	{
		$SCREENID="C001";
		$this->mainpage($SCREENID);
		$this->load->view('mcmp/'.$SCREENID,$this->data);
	}

	public function saveadd()
	{
		if($_POST):
     	parse_str($_POST['form'], $post);
		//$code= "TES001"; //$this->getCode($this->input->post("id_mcmp_cat"));
		$data = array(
			"mcmp_code"			=> $post['mcmp_code'],
			"id_mcmp_main"		=> $post['id_mcmp_main'],
			"name_en"			=> $post['name_en'],
			"name_th"			=> $post['name_th'],
			"adr_line"			=> str_replace("\n", "<br>\n",$post['adr_line']),
			"id_mprv"			=> $post['id_mprv'],
			"id_mdist"			=> $post['id_mdist'],
			"is_mipt"			=> $post['is_mipt'],
			"tax_id"			=> $post['tax_id'],
			"website"			=> $post['website'],
			"email"				=> $post['email'],
			"contact"			=> $post['contact'],
			"telephone"			=> $post['telephone'],
			"mobile"			=> $post['mobile'],
			"fax"				=> $post['fax'],
			"is_owner"			=> $post['is_owner'],
			"is_main_company"	=> $post['is_main_company'],
			"is_dealer"			=> $post['is_dealer'],
			"is_supplier"		=> $post['is_supplier'],
			"is_customer"		=> $post['is_customer'],
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			"status"			=> 1,
			"id_create"			=> $this->id_memp,
			"dt_create"			=> $this->dt_now,
			"id_update"			=> $this->id_memp,
			"dt_update"			=> $this->dt_now
		);
		 //print_r($data);exit();
				$this->mdl_mcmp->addMcmp($data);
				$massage = "บันทึกข้อมูล เรียบร้อย !";
				$this->alert($massage);
	//echo json_encode($getId_tmnf);
    	endif;
	}

	public function saveUpdate()
	{
		if($_POST):
    	parse_str($_POST['form'], $post);
    	$id = $post["id_mcmp"];
		$data = array(
			"id_mcmp"			=> $post['id_mcmp'],
			"mcmp_code"			=> $post['mcmp_code'],
			"id_mcmp_group"		=> $post['id_mcmp_group'],
			"name_en"			=> $post['name_en'],
			"name_th"			=> $post['name_th'],
			"adr_number"		=> $post['adr_number'],
			"adr_moo"			=> $post['adr_moo'],
			"adr_village"		=> $post['adr_village'],
			"adr_soi"			=> $post['adr_soi'],
			"adr_road"			=> $post['adr_road'],
			"adr_subdistrict"	=> $post['adr_subdistrict'],
			"adr_district"		=> $post['adr_district'],
			"id_mprv"			=> $post['id_mprv'],
			"adr_country"		=> $post['adr_country'],
			"adr_postcode"		=> $post['adr_postcode'],
			"adr_line_1"		=> str_replace("\n", "<br>\n",$post['adr_line_1']),
			"adr_line_2"		=> str_replace("\n", "<br>\n",$post['adr_line_2']),
			"adr_line_3"		=> str_replace("\n", "<br>\n",$post['adr_line_3']),
			"adr_line_4"		=> str_replace("\n", "<br>\n",$post['adr_line_4']),
			"tax_id"				=> $post['tax_id'],
			"website"			=> $post['website'],
			"email"				=> $post['email'],
			"contact"			=> $post['contact'],
			"telephone"			=> $post['telephone'],
			"mobile"				=> $post['mobile'],
			"fax"					=> $post['fax'],
			"is_owner"			=> $post['is_owner'],
			"is_cheque_buyer"	=> $post['is_cheque_buyer'],
			"is_supplier"		=> $post['is_supplier'],
			"is_customer"		=> $post['is_customer'],
			"comment"			=> str_replace("\n", "<br>\n",$post['comment']),
			);

			$this->mdl_mcmp->updateMcmp($id,$data);
		endif;
	}


  public function get_sel_mcmp()
      {

          $result=$this->mdl_mcmp->sel_mcmp();
          foreach ($result as $row)
          {
            $arr[] = $row;
          }
          echo json_encode($arr);
      }
 
 public function get_sel_province()
      {

          $result=$this->mdl_mcmp->sel_province();
          foreach ($result as $row)
          {
            $arr[] = $row;
          }
          echo json_encode($arr);
      }
      
  public function get_sel_amphur()
  {
  	  $province_id = $this->input->post('province_id');
      $result=$this->mdl_mcmp->sel_amphur($province_id);
      foreach ($result as $row)
      {
        $arr[] = $row;
      }
      echo json_encode($arr);
  }

} ?>
     