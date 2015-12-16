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
	<div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1"  disabled  checked> ใช้งาน
        <input type="radio"  name="status" value="2" disabled  >  ยกเลิก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ </p>
        <textarea  class="form-control" rows='3' name="comment"  ><?php // echo str_replace('<br>',"",$detail->comment); ?></textarea>
    </div>
    <div class="col-md-3" >
        <p>ผู้สร้าง</p>
        <input type="text" class="form-control" name="name_create" value="<?php //echo $detail->name_create; ?> ADMIN" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่สร้าง</p>
        <input type="text" class="form-control" name="dt_create" value="<?php //echo $detail->dt_create; ?> 12/12/2558 20:30 " disabled>
    </div>
    <div class="col-md-3" >
        <p>ผู้แก้ไข</p>
        <input type="text" class="form-control" name="name_update" value="<?php //echo $detail->name_update; ?>-" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php //echo $detail->dt_update; ?> - " disabled>
    </div> 
</div>

<?php } ?> 