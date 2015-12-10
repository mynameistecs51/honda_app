<script type='text/javascript'>
$(function(){
	
	$( "#birthdate" ).datepicker({ 
	    yearRange: "-100:+0",
	});
	$("#startdate").datepicker();
	$("#resigndate").datepicker();
	
	$('#changePass').click(function(){
			var cb_status = $(this).is(':checked');
			if(cb_status==true){
					$(".userpassword").removeAttr("style");
					$("#oldpassword").prop("required", true);
					$("#newpassword").prop("required", true);
					$("#confirmpw").prop("required", true);
			}else{
					$(".userpassword").css({ 'display': "none" }); 
			}
		});
	
	$("#confirmpw").change(function(){
		var npw = $("#newpassword").val();
		var cpw = $("#confirmpw").val();
			if(npw != cpw){ 
				alert ("รหัสผ่าน  ไม่ถูกต้อง !");
				$("#newpassword").val("");
				$("#confirmpw").val("");
			} 
		});

	$("#email").change(function(){
		var email = $("#email").val();   
		if(email.indexOf('@')==-1  || email.indexOf('.')==-1) { 
			$("#valid_email").html("รูปแบบ Email ไม่ถูกต้อง !"); 			
		}else{ 
			$("#valid_email").html("");
		}	
	});
	updateMemp();
});

function cancle() {
	if(confirm("ยกเลิกการดำเนินการ หรือไม่ ?"))
	{
		var base=$("#base_url").val();
		location = base+"/memp";
	}
}
function updateMemp()
  {
    $('#form').on('submit', function (e) {

        if (e.isDefaultPrevented()) { 
          alert("ผิดพลาด : กรอกข้อมูลไม่ครบ!");
        } else {
          // everything looks good!
        e.preventDefault();
        var form= $('#form').serialize();
        var idx = $('#idx').val();
        var name= $('#firstname_th').val()+" "+$('#lastname_th').val();   
        var mobile= $('#mobile').val(); 
        var email= $('#email').val(); 
        var sta= $('.chk_stk:checked').val();
        if(sta=='1'){ 
        	var status="ใช้งาน"; 
        }else{ 
        	var status="ยกเลิก"; 
        }
        var comment= $('#comment').val(); 
            $.ajax(
            {
                type: 'POST',
                url: '<?php echo base_url(); ?>memp/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
					$('.modal').modal('hide'); 
					alert("#แก้ไขข้อมูล เรียบร้อยแล้ว !");
					location.reload();
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name); 
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(username);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(mobile);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(4)').html(status);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(5)').html(comment);
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
<?php  foreach ($listemployee as $detail) { ?>

<div class="row form_input" style="text-align:left; margin-bottom:20px">
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
		<p>สำนักงาน/สาขา</p>
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
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num"  required>
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
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  >
	</div> 
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="drv_lcn_num" >
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email" >
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  >
	</div>
	<div class="col-md-3" >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" ID="mobile" name="mobile" >
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
		<input type="password" class="form-control" name="userpassword" id="userpassword" required>
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

<!-- 
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo base_url(); ?>">
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="form_input">
	<p>รหัสพนักงาน</p>
	<input type="text" class="input" name="memp_code" value="<?php echo $detail->memp_code;   ?>" readonly>
	<input type="hidden" class="input" name="id_memp" value="<?php echo $detail->id_memp;   ?>" >
	<p>ตำแหน่ง</p>
	<select name="id_mpst" class ="select" required>
		<option value="">--เลือก--</option> 
		<?php 
		foreach ($listMpst as $Mpst)
		{
			$c= "<option value='".$Mpst->id_mpst."' ";
			if($detail->id_mpst==$Mpst->id_mpst){
				$c .= "selected";
			}
			$c .=">".$Mpst->name_th."</option>";
			echo $c;
		}
		?>
	</select>
	<p>แผนก</p>
	<select name="id_mdept" class ="select" required >
		<option value="">--เลือก--</option> 
		<?php 
		foreach ($listMdept as $Mdept)
		{
			$c= "<option value='".$Mdept->id_mdept."' ";
			if($detail->id_mdept==$Mdept->id_mdept){
				$c .= "selected";
			}
			$c .=">".$Mdept->name_th."</option>";
			echo $c;
		}
		?>
	</select>
	<p>เพศ</p>
	<select name="sex" class ="select" required>
		<option value="1" <?php if($detail->sex==''){ echo "selected"; } ?>> --เลือก-- </option>
		<option value="1" <?php if($detail->sex=='1'){ echo "selected"; } ?>> ชาย </option>
		<option value="2" <?php if($detail->sex=='2'){ echo "selected"; } ?>> หญิง </option> 
	</select> 
	<p>คำนำหน้าชื่อ</p>
	<select name="id_memp_tit" class ="select" required>
		<option value="1" <?php if($detail->id_memp_tit=='1'){ echo "selected"; } ?>> นาย </option>
		<option value="2" <?php if($detail->id_memp_tit=='2'){ echo "selected"; } ?>> นาง </option>
		<option value="3" <?php if($detail->id_memp_tit=='3'){ echo "selected"; } ?>> นางสาว </option>
	</select> 
	<p>ชื่อ (ภาษาไทย)</p>
	<input type="text" class="inputname" name="firstname_th" ID="firstname_th" value="<?php echo $detail->firstname_th;   ?>" placeholder="ชื่อ" >
	<input type="text" class="inputname" name="lastname_th" ID="lastname_th" value="<?php echo $detail->lastname_th; ?>" placeholder="สกุล" >
	<p>Name (English)</p>
	<input type="text" class="inputname" name="firstname_en" value="<?php echo $detail->firstname_en; ?>" placeholder="First Name">
	<input type="text" class="inputname" name="lastname_en" value="<?php echo $detail->lastname_en; ?>" placeholder="Last Name">
	<p>สถานะภาพ</p>
	<select name="status_marriaged" class ="select" > 
		<option value="1" <?php if($detail->status_marriaged=='1'){ echo "selected"; } ?>> โสด </option>
		<option value="2" <?php if($detail->status_marriaged=='2'){ echo "selected"; } ?>> สมรส </option>
		<option value="3" <?php if($detail->status_marriaged=='3'){ echo "selected"; } ?>> หย่าร้าง </option>
		<option value="4" <?php if($detail->status_marriaged=='4'){ echo "selected"; } ?>> แยกกันอยู่ </option>
	</select> 
	<p>วันเกิด</p>
	<input type="text" class="input" name="birthdate" ID="birthdate" value="<?php echo  $detail->birthdate; ?>" >
	<p>วันเริ่มงาน</p>
	<input type="text" class="input" name="startdate" ID="startdate" value="<?php echo $detail->startdate;  ?>" >
	<p>วันสิ้นสุดการเป็นพนักงาน </p>
	<input type="text" class="input" name="resigndate" ID="resigndate" value="<?php echo $detail->resigndate; ?>">
	<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
	<textarea  class="input" rows='5' name="adr_line1" ><?php echo str_replace('<br>',"",$detail->adr_line1); ?></textarea>
	<p>ที่อยู่ (ปัจจุบัน)</p>
	<textarea  class="input" rows='5' name="adr_line2" ><?php echo str_replace('<br>',"",$detail->adr_line2); ?></textarea>
	<p>รหัสประจำตัวประชาชน</p>
	<input type="text" class="input" name="idcard_num" value="<?php echo $detail->idcard_num;  ?>" >
	<p>เลขใบอนุญาตขับขี่</p>
	<input type="text" class="input" name="drv_lcn_num" value="<?php echo $detail->drv_lcn_num;  ?>" >
	<p>อีเมลล์ </p>
	<input type="email" class="input" name="email" ID="email" value="<?php echo $detail->email;  ?>" >
	<p>โทรศัพท์</p>
	<input type="text" class="input" name="telephone" value="<?php echo $detail->telephone; ?>">
	<p>มือถือ</p>
	<input type="text" class="input" name="mobile" ID="mobile" value="<?php echo $detail->mobile; ?>">
	<p>แฟกซ์</p>
	<input type="text" class="input" name="fax" value="<?php echo $detail->fax; ?>">
	<p>ชื่อเข้าใช้ระบบ</p>
	<input type="text" class="input" name="user" ID="user" value="<?php echo $detail->user; ?>" readonly> 
	<p><U><input type="checkbox" name="changePass" id="changePass" value="1">  แก้ไขรหัสผ่าน ?</U></p>
	<div class="userpassword" style="display:none">
	<p>รหัสผ่านเดิม</p>
	<input type="password" class="input" name="old_pass" id="oldpassword" value="" >
	<p>รหัสผ่านใหม่</p>
	<input type="password" class="input" name="pass" id="newpassword" value="" >
	<p>ยืนยันรหัสผ่านใหม่</p>
	<input type="password" class="input" name="con_pass" id="confirmpw" value="" >
	</div>
	<p>หมายเหตุ </p>
	<textarea  class="input" rows='5' name="comment" ID="comment" ><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
	<p>สถานะ</p>
	<div class="status" >
		<input type="radio" name="status"  class="chk_stk" value="1" <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
		<input type="radio"  name="status" class="chk_stk" value="0" <?php if($detail->status=='0'){ echo "checked=checked"; } ?>> ยกเลิก
	</div>
	<p>ผู้สร้าง</p>
	<input type="text" class="input" name="name_create" value="<?php echo $detail->name_create; ?>" readonly>
	<p>วันที่สร้าง</p>
	<input type="text" class="input" name="dt_create" value="<?php echo $detail->dt_create; ?>" readonly>
	<p>ผู้แก้ไข</p>
	<input type="text" class="input" name="name_update" value="<?php echo $detail->name_update; ?>" readonly>
	<p>วันที่แก้ไข</p>
	<input type="text" class="input" name="dt_update" value="<?php echo $detail->dt_update; ?>" readonly>
</div> -->
<?php } ?> 