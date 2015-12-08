<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctrl_mmnu extends CI_Controller {

   public $data;
   public $id_memp=1;
   public $id_mpst=0;

   public function __construct()
   {
		parent::__construct();
		$this->load->model('mdl_ctrl_mmnu');
		$this->load->library('template');
 		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->id_memp = $this->session->userdata('id_memp');
		$id_mpst=$this->session->userdata("id_mpst");
		$ctl="mpst";
		if($this->session->userdata("id_memp")==""){
			redirect('authen/');
		}else if($this->template->CheckAuthen($id_mpst,$ctl)=="0"){
			redirect('authen/');
		}

   }
   public function mainpage($sub_menu)
{
 		$ctl="mpst";
		$SCREENNAME="MEMBER CATEGORY";
		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['memp_name'] = $this->session->userdata("memp_name");
		$this->data["lastLogin"] = $this->session->userdata('lastLogin');
		$this->data["id_memp"] =$this->session->userdata("id_memp");
		$this->data["id_mpst"] =$this->session->userdata("id_mpst");
		$this->data["header"] =$this->template->getHeader($this->data['base_url'],$SCREENNAME,$this->data['memp_name'],$this->data["lastLogin"],$this->data["id_mpst"]);
		$this->data["submenu"] =$this->template->getSubMenu($this->data['base_url'],$SCREENNAME."-".$sub_menu,$ctl,$sub_menu);
		$this->data["footer"] = $this->template->getFooter();
}

   public function index()
   {
		$SCREENID="CEM001C";
		$sub_menu="LIST"; // LIST ADD EDIT CHANGE
		$this->mainpage($sub_menu);
		$this->data['select']=""; 
		$this->data['listMempCat']= $this->mdl_ctrl_mmnu->getMempCat("");
		$this->load->view('ctrl_mmnu/'.$SCREENID,$this->data);
   }

      public function select()
   {
		$SCREENID = "CEM001C"; 
		$sub_menu="LIST"; // LIST ADD EDIT CHANGE
		$this->mainpage($sub_menu);
		$this->data['select']=$this->input->post('id_mpst'); 
		$this->data['listMempCat']= $this->mdl_ctrl_mmnu->getMempCat("");
		$this->data['lavle1']= $this->mdl_ctrl_mmnu->getMenu('1',$this->data['select']);
		$this->data['lavle2']= $this->mdl_ctrl_mmnu->getMenu('2',$this->data['select']);
 		$this->load->view('ctrl_mmnu/'.$SCREENID,$this->data);
   }

   public function update()
   {
       if( $this->input->post('id_mpst')=="")
            {
                echo "มีปัญหา";
            }else{
               $id_mpst=$this->input->post('id_mpst');
                $data = array(
                  "status" =>0,
                  "id_update"=>$this->id_memp,
                  "dt_update"=> $this->dt_now,
               );
               $this->mdl_ctrl_mmnu->clearstatus($data,$id_mpst);
            }
      if(@$_POST['status']=="")
         {
         echo " <meta http-equiv='refresh' content='0;url=".$this->config->item('base_url')."/ctrl_mmnu/select'>";
         exit();
         }
         else
            {
                  $id_mpst=$this->input->post('id_mpst');
                  $this->data ="IN( \n";
                  for($i=0;$i<count($_POST["status"]);$i++)
                  {
                        if(trim($_POST["status"][$i]) != "")
                        {
                           $id=$_POST["status"][$i];

                           if(($i+1)==count($_POST["status"]))
                           {
                              $this->data .="".$id."\n";
                           }else  
                              {
                                 $this->data .="".$id.",\n";
                              }
                        }
                  }
                  $this->data .=" );";
                  $data_id=$this->data;
                   $dt_update= $this->dt_now;
                  $id_memp=$this->id_memp;
                  $this->mdl_ctrl_mmnu->updatestatus($data_id,$id_memp,$dt_update);
            }
   }


}
