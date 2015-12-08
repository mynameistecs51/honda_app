<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('mdl_menu');
	}
   public function getHeader($base_url,$SCREENNAME,$memp_name,$lastLogin,$id_memp)
   {
        return "
 <!DOCTYPE html>
	<html>
	<head>
	 	<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title> .:: CHUPHOTIC ::.</title>
		<link rel='icon' href='".$base_url."images/logo.ico' type='image/x-icon'> 
		<link rel='stylesheet' href='".$base_url."css/styles.css'>
		<link rel='stylesheet' media='all' type='text/css' href='".$base_url."js/jquerydatepicker/jquery-ui.css' />
		<script src='".$base_url."js/jquery-latest.min.js' type='text/javascript'></script>
		<script type='text/javascript' src='".$base_url."js/jquerydatepicker/jquery-ui-1.10.3.custom.js'></script>
		<script type='text/javascript' src='".$base_url."js/jquerydatepicker/jquery-ui-datepicker-th.js'></script>
		<link href='".$base_url."bootstrap/css/bootstrap-select.css' rel='stylesheet' type='text/css'>
		<link href='".$base_url."bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
		<link href='".$base_url."bootstrap/css/ajax-bootstrap-select.css' rel='stylesheet' type='text/css'>
		<link href='".$base_url."bootstrap/css/bootstrap-dialog.min.css' rel='stylesheet' type='text/css'>
		<script src='".$base_url."bootstrap/js/bootstrap.min.js'></script>
		<script src='".$base_url."bootstrap/js/bootstrap-select.js'></script>
		<script src='".$base_url."bootstrap/js/ajax-bootstrap-select.min.js'></script>
		<script src='".$base_url."bootstrap/js/ajax-bootstrap-select.th-TH.js'></script>
		<script src='".$base_url."bootstrap/js/bootstrap-dialog.min.js'></script>
		<script src='".$base_url."js/inputmask/inputmask.min.js' type='text/javascript'></script>
		<script src='".$base_url."js/inputmask/jquery.inputmask.min.js' type='text/javascript'></script>
		<link rel='stylesheet' type='text/css' href='".$base_url."bootstrap/css/dataTables.bootstrap.css'>
		<link rel='stylesheet' type='text/css' href='".$base_url."css/dataTables.tableTools.css'> 
		<script type='text/javascript' language='javascript' src='".$base_url."js/jquery.dataTables.min.js'></script>
		<script type='text/javascript' language='javascript' src='".$base_url."js/dataTables.bootstrap.js'></script>
		<script type='text/javascript' language='javascript' src='".$base_url."js/dataTables.tableTools.min.js'></script>
		<script type='text/javascript' language='javascript' src='".$base_url."js/dataTables.fixedHeader.js'></script>
		<script type='text/javascript' language='javascript' src='".$base_url."js/dataTables.fixedColumns.js'></script>
		<script type='text/javascript' src='".$base_url."js/jquerydatepicker/jquery-ui-timepicker-addon.js'></script>
        <script type='text/javascript' src='".$base_url."js/jquerydatepicker/i18n/jquery-ui-timepicker-th.js'></script>
        <script type='text/javascript' src='".$base_url."js/jquerydatepicker/jquery-ui-sliderAccess.js'></script>
        <link rel='stylesheet' type='text/css' href='".$base_url."js/jquerydatepicker/jquery-ui-timepicker-addon.min.css'> 
		<link href='".$base_url."css/main.css' rel='stylesheet' type='text/css'>

	</head>
	<body>
	<center>
	<div class='template_Header'>
		<div class='logo'><img src='".$base_url."images/logo-sms.png' height='60px;'></div>
		<div class='user_login'><img src='".$base_url."images/company.PNG' height='20px'> 
		CHUPHOTIC <img src='".$base_url."images/user.png' height='20px'> ".$memp_name." 
		<img src='".$base_url."images/lastlogin.png' height='20px'> ".$lastLogin." 
		<img src='".$base_url."images/setting.png' class='setting' title='แก้ไขรหัสผ่าน' height='20px'></div>
	</div>
	<div class='template_menu'>
		<div id='cssmenu'>
			".$this->menu($base_url,$id_memp)."  
		</div>
	</div>
	";
   }

   public function getFooter()
   {
   	return "
	</center>
	</body>
	</html>
	";
	/*
      return "
	</div>
	<div class='template_footer'>
		Copyright © Thainology and Solutions Co.,Ltd. <br/>
		This copy is licensed to chuphotic <br/>
		www.thainology.com
	</div>
	</center>
	</body>
	</html>
	";
	*/
   }

   public function checkBtnAuthen($id_mpst,$ctl){ 
		$btn=$this->CI->mdl_menu->getBtn($id_mpst,$ctl);
		return $btn;
    }

public function menu($base_url,$id_memp)
{ 
	$lavle1=  $this->CI->mdl_menu->getMenu('1',$id_memp);
	$lavle2=  $this->CI->mdl_menu->getMenu('2',$id_memp); 
	$menu ="<ul>";
	$menu .="<li><a href='".$base_url."dashboard/'>HOME</a>";
	foreach ($lavle1["result"] as $row)
	{ 
		$menu .="<li class='active'><a href='#'>". $row->name_th."</a>";
		$menu .="<ul>";
				foreach ($lavle2["result"] as $row2)
				{ 
					if($row->id_mmnu==$row2->id_parent){

						$menu .="<li class='active' style='text-align:left;'><a href='".$base_url.$row2->filelocation."'>".$row2->name_th."</a></li>";
 					}
				}
		$menu .="</ul>";
		
		$menu .= "</li>";
	}
	$menu .="<li><a href='".$base_url."authen/logout'>LOGOUT</a>";
	$menu .=" </ul>";

	return $menu;
}

public function CheckAuthen($id_mpst,$ctl)
{
	return $this->CI->mdl_menu->CheckAuthen($id_mpst,$ctl);
}

public function getScreenName($ctl_name)
{
	return $this->CI->mdl_menu->getScreenName($ctl_name);
}

public function getPageName($ctl_name)
{
	return $this->CI->mdl_menu->getPageName($ctl_name);
}

public function dt_now()
{
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));  
	return $now->format('Y-m-d H:i:s');
}
public function dtnow()
{
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
	$Y=($now->format('Y')+543); 
	return $now->format('d/m/').$Y.$now->format(' H:i');
}
public function datefrom()
{
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
	$Y=($now->format('Y')+543); 
	return "01/".$now->format('m/').$Y.$now->format(' H:i');
}
public function dateto()
{
	date_default_timezone_set('Asia/Bangkok');
	$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
	$Y=($now->format('Y')+543);
	return $now->format('d/m/').$Y.$now->format(' H:i');
}



}
?>