<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usersetting extends CI_Controller 
{ 
public function __construct()
{
	parent::__construct();
	$this->ctl="usersetting";
	$this->load->model('mdl_usersetting'); 
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
	$this->dt_now = $now->format('Y-m-d H:i:s');
	$this->datefrom = "01/".$now->format('m/Y');
	$this->dateto = $now->format('d/m/Y');
	$this->id_mmember = $this->session->userdata('id_mmember');
	$this->id_mposition=$this->session->userdata("id_mposition");
	$this->SCREENNAME='Control Panel > กำหนดสิทธิ์';
	if($this->session->userdata("id_mmember")==""){
		redirect('authen/');
	}else if($this->template->CheckAuthen($this->id_mposition,$this->ctl)=="0"){
		redirect('authen/');
	}
}

public function index()
{
	$SCREENID="CEM001C";
	$this->mainpage($SCREENID);
	$this->data['select'] = $this->id_mposition;
	$this->data['lavle1']= $this->mdl_usersetting->getMenu('1',$this->id_mposition);
	$this->data['lavle2']= $this->mdl_usersetting->getMenu('2',$this->id_mposition); 
	$this->load->view('cusersetting/'.$SCREENID,$this->data);
	
}  
public function select()
{
	$SCREENID="CEM001C";
	$this->mainpage($SCREENID); 
	if( $this->input->post('id_mposition')=="")
	{
	  $this->data['select']=0;
	}else{
	  $this->data['select']=$this->input->post('id_mposition');
	} 
	$this->data['lavle1']= $this->mdl_usersetting->getMenu('1',$this->data['select']);
	$this->data['lavle2']= $this->mdl_usersetting->getMenu('2',$this->data['select']); 
	$this->load->view('cusersetting/'.$SCREENID,$this->data);

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
		$SCREENNAME="USER SETTING";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data['mmember_name'] = $this->session->userdata("mmember_name");
		$this->data['mbranch_name'] = $this->session->userdata("mbranch_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_mmember"] =$this->session->userdata("id_mmember");
		$this->data["id_mposition"] =$this->session->userdata("id_mposition"); 
		$this->data["datefrom"] =$this->datefrom;
		$this->data["dateto"] =$this->dateto;
		$this->data['listmposition']= $this->mdl_usersetting->getmposition();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME,$this->data['mmember_name'],$this->data["lastLogin"],$this->data["id_mposition"],$this->data['mbranch_name']);
		$this->data["btn"] =$this->template->checkBtnAuthen($this->data["id_mposition"],$this->ctl);
		$this->data['url_add']=$this->data['base_url'].$this->ctl."/add/";
		$this->data['url_edit']=$this->data['base_url'].$this->ctl."/edit/";
		$this->data['url_detail']=$this->data['base_url'].$this->ctl."/detail/";
		$this->data["footer"] = $this->template->getFooter(); 
		$this->data['NAV'] =$this->SCREENNAME; 		
}

public function update()
   {
       if( $this->input->post('id_mposition')=="")
        {
                echo "ข้อมูลผิดพลาด !";
        }else{
               $id_mposition=$this->input->post('id_mposition'); 
               $data = array(
                "can_view" 	 =>0,
                "can_create" =>0,
                "can_edit"   =>0,
                "can_print"  =>0,
                "status"     =>0,
                "id_update"	 =>1,
                "dt_update"	 =>$this->dt_now
               );
              // $this->mdl_usersetting->clearstatus($data,$id_mposition);
            } 
        $num = count($_POST["id_cusersetting"]);
      	if($num >'0')
         {
          
                for($i=0;$i<$num;$i++)
                {
                        if(trim($_POST["id_cusersetting"][$i]) != "")
                        {
                        	$id=$_POST["id_cusersetting"][$i]; 

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
					                "id_update"	 =>$this->id_mmember,
					                "dt_update"	 =>$this->dt_now
					               );
					            $this->mdl_usersetting->updatestatus($data_update,$id);  
                        }
                  } 
	            $massage = "แก้ไขข้อมูล เรียบร้อย !";
	            $url='cusersetting/select';
				$this->alert($massage,$url);
 
            }else{ 
            	$massage = "ข้อมูลผิดพลาด !";
	            $url='cusersetting/select';
				$this->alert($massage,$url); 
            }

   }

} ?>

