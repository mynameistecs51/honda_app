<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authen extends CI_Controller 
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_authen');
		$this->load->library('Template_authen'); 
		date_default_timezone_set('Asia/Bangkok');
 	}

public function index()
   {
	if($this->session->userdata("id_memp")==""){
      if($this->input->post("btnOk") != null)
      {
         $this->data = array  (
         "username"     => $this->input->post('username'),
         "password" => $this->input->post('password')
                           );
         $this->doCheckLogin($this->data);
      }
      else
      {
        $SCREENNAME = "login"; 
		$this->data['base_url'] = $this->config->item('base_url');
		$this->load->view($SCREENNAME ,$this->data);
      }
	}else{
		redirect('dashboard/');
	}
   }


	public function logout()
   {
      if ( $this->session->userdata("id_memp") != null )
      {
		 $this->session->unset_userdata("id_memp");
		 $this->session->unset_userdata("email");
		 $this->session->unset_userdata("memp_code");
		 $this->session->unset_userdata("memp_name");
		 $this->session->unset_userdata("id_mpst");
		 $this->session->unset_userdata("mpst_name");
      }
      $screenID = "login";
      $this->data['base_url'] = $this->config->item('base_url');
      $this->load->view($screenID ,$this->data);
   }
   public function alert($massage, $url)
		{
			echo "<meta charset='UTF-8'>
					<SCRIPT LANGUAGE='JavaScript'>
					window.alert('$massage')
					window.location.href='".site_url($url)."';
					</SCRIPT>";
		}


   public function doCheckLogin()
   { 
      if ( $this->mdl_authen->doCheckValidUserLogin($this->data["username"], $this->data["password"]) )
      {
        $this->data["id_memp"]   = $this->mdl_authen->getMempID($this->data["username"]);
        $result   = $this->mdl_authen->getDataUser($this->data["id_memp"]); 
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$loginData = array(
			"id_memp" => $this->data["id_memp"],
			"is_login"  => '1',
			"id_create" => '1',
			"dt_create" => $now->format('Y-m-d H:i:s')
		 );
		 $this->mdl_authen->doInsert('tlog_lgn', $loginData);
		 
		 $this->data["lastLogin"] = $this->mdl_authen->getLastLogin($this->data["id_memp"]);
		 $this->loginSession = array(
			"id_memp"    => $result->id_memp,
			"memp_code"  => $result->memp_code,
			"email"   	 => $result->email,
			"memp_name"  => $result->name_th,
			"id_mpst"  	 => $result->id_mpst,
			"mpst_name"  => $result->mpst_name,
			"lastLogin"  => $this->data["lastLogin"]
		); 
		$this->session->set_userdata($this->loginSession);


		redirect('dashboard/');

      }
      else
      {
        $massage = "ข้อมูล ผิดพลาด !"; 
		$url = "authen/";
		$this->alert($massage, $url);
		exit();
      }

   }

}

?>
     

