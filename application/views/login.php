    <!DOCTYPE html>
	<html lang='thai'>
	<head>
	<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
	<title> .::Login::.</title>
	<link rel='icon' href='<?php echo $base_url; ?>/images/honda.ico' type='image/x-icon'>
	<link href='<?php echo $base_url; ?>/css/main.css' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<center>
  <?php
$attibutes = array('id'=>'form','name'=>'main', 'method'=>'post','autocomplete'=>'off');
echo form_open('authen/', $attibutes); ?>
<div class="login">
   <div class="head_login">SIGN IN</div> 
 		<div class="input">
		<br>
			<input type="text" name="username" class="textbox" placeholder=" ชื่อผู้ใช้" autofocus>
		<br><br>
			<input type="password" name="password" class="textbox" placeholder=" รหัสผ่าน">
			<br><br>
 		<?php 
		if (isset($loginFail))
		{
			echo "<div class=\"TEXT_ERROR\">\n";
			echo $loginFail;
			echo "</div>\n";
		}
		?>
   </div>
   <div class="footer_login">
      <input type="submit" class="button" name="btnOk" value="เข้าสู่ระบบ" >
   </div>
</div>
<?php 
   echo form_close();
?>
</center>
</body>
</html>
 