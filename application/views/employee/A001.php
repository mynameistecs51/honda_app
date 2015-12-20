<script type='text/javascript'>
$(function(){  
	$( "#birthdate" ).datepicker({ 
	    yearRange: "-70:+0",
	});

	$("#confirmpw").change(function(){
	var npw = $("#userpassword").val();
	var cpw = $("#confirmpw").val();
	if(npw != cpw){ 
		alert("รหัสผ่าน  ไม่ถูกต้อง !");
		$("#userpassword").val("");
		$("#confirmpw").val("");
		} 
	});
	
	$("#user").keyup(function(){
		$("#valid").html("");
	});

	$("#email").change(function(){
		var email = $("#email").val();   
		if(email.indexOf('@')==-1  || email.indexOf('.')==-1) { 
			$("#valid_email").html("รูปแบบ Email ไม่ถูกต้อง !");
			$("#email").focus();			
		}else{ 
			$("#valid_email").html("");
		}	
	});

	$("#mobile").change(function(){
		var mobile = $("#mobile").val();   
		if(isNaN(mobile)) { 
			$("#valid_mobile").html("กรุณากรอกตัวเลขเท่านั้น และไม่มีช่องว่าง !"); 
			$("#mobile").value('');
			$("#mobile").focus();			
		}else{ 
			$("#valid_mobile").html("");
		}	
	});

	$("#user").change(function(){
		var user = $("#user").val(); 
		if(user != ""){
			$.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/checkUser/',
	                data: {"user":user}, //your form datas to post          
	                success: function(rs)
	                {   
	                	console.log(rs); 
	                	if(rs==1){ 
	                		$("#valid").html("ชื่อเข้าใช้ :"+user+" มีการใช้งานอยู่แล้ว");
	                		$("#user").val('');
	                	}
	                } 
	            });     

			
		}else{
			$("#valid").html("");
		}
	});
	saveData();
 });

function saveData()
      {
         $('#form').on('submit', function (e) {
            if (e.isDefaultPrevented()) {
              alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
            e.preventDefault();
            var form = $('#form').serialize(); // ค่าข้อมูล ที่อยู่ใน ฟอร์ม ทั้งหมด
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {    
	                   //$('.modal').modal('hide');
	                   //location.reload();
	                   //alert(" บันทึกข้อมูล เรียบร้อย !");
	                },
	                error: function()
	                {
	                    alert(" เกิดข้อผิดพลาด");
	                }
	            });                   
            }
          });
      }
</script> 
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="mmember_code" required > 
	</div>
	<div class="col-md-3" >
		<p>กลุ่มผู้ใช้</p>
		<p class="required">*</p>
		<select name="id_mposition" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMposition as $Mposition)
			{ 
				echo "<option value='".$Mposition->id_mposition."'>".$Mposition->mposition_name."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขา</p>
		<p class="required">*</p>
		<select name="id_mbranch" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMbranch as $Mbranch)
			{ 
				echo "<option value='".$Mbranch->id_mbranch."'>".$Mbranch->mbranch_name."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num"  required>
	</div>
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_mmember_tit" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1"> นาย </option>
			<option value="2"> นาง </option>
			<option value="3"> นางสาว </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname" placeholder="ชื่อ" required> 
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p> 
		<input type="text" class="form-control"  name="lastname" placeholder="สกุล" required>
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  >
	</div> 
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p> 
		<input type="text" class="form-control" name="drv_lcn_num" >
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email"  required>
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  >
	</div>
	<div class="col-md-3" >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" ID="mobile" name="mobile" required>
	</div>
	<div class="col-md-3" >
		<p>แฟกซ์</p>
		<input type="text" class="form-control" name="fax" >
	</div>
	<div class="col-md-3" >
		<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="username" ID="user" required>
	</div>
	<div class="col-md-3" >
		<p>รหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="form-control" name="password" id="userpassword" required>
	</div>
	<div class="col-md-3" >
		<p>ยืนยันรหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="form-control" name="con_pass" id="confirmpw" required>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line1" required></textarea>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line2" ></textarea> 
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>