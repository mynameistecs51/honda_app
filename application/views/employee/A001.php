<script type='text/javascript'>
$(function(){  

	$( "#birthdate" ).datepicker({ 
	    yearRange: "-100:+0",
	});
	$("#startdate").datepicker();
	$("#resigndate").datepicker();

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
            var form = $('#form').serialize();
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                   $('.modal').modal('hide');
	                   location.reload();
	                   alert("#บันทึกข้อมูล เรียบร้อย !");
	                },
	                error: function()
	                {
	                    alert("#เกิดข้อผิดพลาด");
	                }
	            });                   
            }
          });
      }
</script> 
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="col-md-3" >
		<p>เลขที่ใบแจ้งซ่อม</p>
		<input type="text" class="form-control" name="telephone" value="CM-20150001" readonly>
	</div>
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="memp_code" required > 
	</div>
	<div class="col-md-3" >
		<p>ตำแหน่ง</p>
		<p class="required">*</p>
		<select name="id_mpst" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMpst as $Mpst)
			{ 
				echo "<option value='".$Mpst->id_mpst."'>".$Mpst->name_th."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>แผนก</p>
		<p class="required">*</p>
		<select name="id_mdept" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMdept as $Mdept)
			{ 
				echo "<option value='".$Mdept->id_mdept."'>".$Mdept->name_th."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>เพศ</p> 
		<select name="sex" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1"> ชาย </option>
			<option value="2"> หญิง </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_memp_tit" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1"> นาย </option>
			<option value="2"> นาง </option>
			<option value="3"> นางสาว </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" required> 
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p> 
		<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" required>
	</div>
	<div class="col-md-3" >
		<p>สถานะภาพ</p>
		<select name="status_marriaged" class ="form-control" > 
			<option value="1"> โสด </option>
			<option value="2"> สมรส </option>
			<option value="3"> หย่าร้าง </option>
			<option value="4"> แยกกันอยู่ </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  >
	</div>
	<div class="col-md-3" >
		<p>วันเริ่มงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="startdate" id="startdate"  >
		<p>วันที่สิ้นสุดการเป็นพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="resigndate" id="resigndate"  >
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<p class="required">*</p>
		<textarea  class="input" rows='5' name="adr_line1" required></textarea>
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<p class="required">*</p>
		<textarea  class="input" rows='5' name="adr_line2" ></textarea>
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="input" name="idcard_num"  required>
		<p>เลขใบอนุญาตขับขี่</p>
		<p class="required">*</p>
		<input type="text" class="input" name="drv_lcn_num"  >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="input" name="email" ID="email" >
		<p>โทรศัพท์</p>
		<input type="text" class="input" name="telephone"  >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="input" ID="mobile" name="mobile" >
		<p>แฟกซ์</p>
		<input type="text" class="input" name="fax" >
		<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="input" name="username" ID="user" required>
		<p>รหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="input" name="userpassword" id="userpassword" required>
		<p>ยืนยันรหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="input" name="con_pass" id="confirmpw" required>
		<p>หมายเหตุ</p>
		<textarea  class="input" rows='5' name="comment"></textarea>
</div>