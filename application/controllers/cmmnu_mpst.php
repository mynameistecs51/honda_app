<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cmmnu_mpst extends CI_Controller 
{ 
public function __construct()
{
	parent::__construct();
	$this->ctl="cmmnu_mpst";
	$this->load->model('mdl_cmmnu_mpst');
	$this->load->library('template');
	$this->load->library('datatables');
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
	$this->dt_now = $now->format('Y-m-d H:i:s');
	$this->datefrom = "01/".$now->format('m/Y');
	$this->dateto = $now->format('d/m/Y');
	$this->id_memp = $this->session->userdata('id_memp');
	$this->id_mpst=$this->session->userdata("id_mpst");
	$this->SCREENNAME='Control Panel > กำหนดสิทธิ์';
	if($this->session->userdata("id_memp")==""){
		redirect('authen/');
	}else if($this->template->CheckAuthen($this->id_mpst,$this->ctl)=="0"){
		redirect('authen/');
	}
}

public function index()
{
	$SCREENID="CEM001C";
	$this->mainpage($SCREENID);
	$this->data['select'] = $this->id_mpst;
	$this->data['lavle1']= $this->mdl_cmmnu_mpst->getMenu('1',$this->id_mpst);
	$this->data['lavle2']= $this->mdl_cmmnu_mpst->getMenu('2',$this->id_mpst); 
	$this->load->view('cmmnu_mpst/'.$SCREENID,$this->data);
	
}  
public function select()
{
	$SCREENID="CEM001C";
	$this->mainpage($SCREENID); 
	if( $this->input->post('id_mpst')=="")
	{
	  $this->data['select']=0;
	}else{
	  $this->data['select']=$this->input->post('id_mpst');
	} 
	$this->data['lavle1']= $this->mdl_cmmnu_mpst->getMenu('1',$this->data['select']);
	$this->data['lavle2']= $this->mdl_cmmnu_mpst->getMenu('2',$this->data['select']); 
	$this->load->view('cmmnu_mpst/'.$SCREENID,$this->data);

}

public function alert($massage,$url)
{
	echo "
			<meta charset='UTF-8'>
			<SCRIPT LANGUAGE='JavaScript'>
		    window.alert('$massage')
		    window.location.href='".site_url($url)."';
		    </SCRIPT>
		    ";
}


public function mainpage($SCREENID)
{ 
		$SCREENNAME="MEMBER";
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst"); 
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data['listMpst']= $this->mdl_cmmnu_mpst->getMpst();
		$this->data["header"]=$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mpst"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function update()
   {
       if( $this->input->post('id_mpst')=="")
        {
                echo "ข้อมูลผิดพลาด !";
        }else{
               $id_mpst=$this->input->post('id_mpst'); 
               $data = array(
                "can_view" 	 =>0,
                "can_create" =>0,
                "can_edit"   =>0,
                "can_print"  =>0,
                "status"     =>0,
                "id_update"	 =>1,
                "dt_update"	 =>$this->dt_now
               );
              // $this->mdl_cmmnu_mpst->clearstatus($data,$id_mpst);
            } 
        $num = count($_POST["id_cmmnu_mpst"]);
      	if($num >'0')
         {
          
                for($i=0;$i<$num;$i++)
                {
                        if(trim($_POST["id_cmmnu_mpst"][$i]) != "")
                        {
                        	$id=$_POST["id_cmmnu_mpst"][$i]; 

	                        	if(isset($_POST["can_view"][$id]))
	                        	{
	                        		$can_view=1;
	                        	}else{
	                        		$can_view=0;
	                        	}
	                        	if(isset($_POST["can_create"][$id]))
	                        	{
	                        		$can_create=1;
	                        	}else{
	                        		$can_create=0;
	                        	}
	                        	if(isset($_POST["can_edit"][$id]))
	                        	{
	                        		$can_edit=1;
	                        	}else{
	                        		$can_edit=0;
	                        	}
	                        	if(isset($_POST["can_print"][$id]))
	                        	{
	                        		$can_print=1;
	                        	}else{
	                        		$can_print=0;
	                        	}
	                        	if(isset($_POST["status"][$id]))
	                        	{
	                        		$status=1;
	                        	}else{
	                        		$status=0;
	                        	}
	                            
	                            $data_update = array(
					                "can_view" 	 =>$can_view,
					                "can_create" =>$can_create,
					                "can_edit"   =>$can_edit,
					                "can_print"  =>$can_print,
					                "status"     =>$status,
					                "id_update"	 =>$this->id_memp,
					                "dt_update"	 =>$this->dt_now
					               );
					            $this->mdl_cmmnu_mpst->updatestatus($data_update,$id);  
                        }
                  } 
	            $massage = "แก้ไขข้อมูล เรียบร้อย !";
	            $url='cmmnu_mpst/select';
				$this->alert($massage,$url);
 
            }else{ 
            	$massage = "ข้อมูลผิดพลาด !";
	            $url='cmmnu_mpst/select';
				$this->alert($massage,$url); 
            }

   }

} ?>

