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
        var name= $('#firstname').val()+" "+$('#lastname').val();   
        var mobile= $('#mobile').val(); 
        var mmember_code= $('#mmember_code').val(); 
        var sta= $('.chk_sta:checked').val();
        if(sta=='1'){ 
        	var status="ใช้งาน"; 
        }else{ 
        	var status="ยกเลิก"; 
        } 
            $.ajax(
            {
                type: 'POST',
                url: '<?php echo base_url().$controller;; ?>/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
					$('.modal').modal('hide'); 
					alert("แก้ไขข้อมูล เรียบร้อยแล้ว !");
					location.reload();
					$('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(mmember_code);  
					$('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(name);
					$('#employee-grid tbody tr:eq('+idx+')').find('td:eq(4)').html(mobile);
					$('#employee-grid tbody tr:eq('+idx+')').find('td:eq(5)').html(status); 
                },
                error: function()
                {
                    alert("เกิดข้อผิดพลาด");
                }
            });                   
        }
    });
}
</script>
<?php  foreach ($listemployee as $empHdr) { ?>

<div class="row form_input" style="text-align:left; margin-bottom:20px; padding-left:10px;">
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="mmember_code" id="mmember_code" value="<?php echo $empHdr->mmember_code; ?>" required> 
		<input type="hidden" name="id_mmember" value="<?php echo $empHdr->id_mmember; ?>" > 
	</div>
	<div class="col-md-3">
		<p>ตำแหน่ง</p>
		<p class="required">*</p>
		<select name="id_mposition" class ="form-control" required>
			<option value="">--เลือก--</option>
			<?php 
			foreach($listMposition as $Mposition)
			{ 
				if($Mposition->id_mposition==$empHdr->id_mposition){
					echo "<option value='".$Mposition->id_mposition."' selected>".$Mposition->mposition_name."</option>";
				}else{
					echo "<option value='".$Mposition->id_mposition."' >".$Mposition->mposition_name."</option>";
				}
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
			foreach($listMbranch as $Mbranch)
			{  
				if($Mbranch->id_mbranch==$empHdr->id_mbranch){
					echo "<option value='".$Mbranch->id_mbranch."' selected>".$Mbranch->mbranch_name."</option>";
				}else{
					echo "<option value='".$Mbranch->id_mbranch."' >".$Mbranch->mbranch_name."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num" value="<?php echo $empHdr->idcard_num; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_mmember_tit" class ="form-control" required>
			<option value=""  <?php echo $empHdr->id_mmember_tit == '' ? 'selected':'' ; ?>  >--เลือก--</option> 
			<option value="1" <?php echo $empHdr->id_mmember_tit == '1' ? 'selected':'' ; ?> > นาย </option>
			<option value="2" <?php echo $empHdr->id_mmember_tit == '2' ? 'selected':'' ; ?> > นาง </option>
			<option value="3" <?php echo $empHdr->id_mmember_tit == '3' ? 'selected':'' ; ?> > นางสาว </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname" placeholder="ชื่อ" value="<?php echo $empHdr->firstname; ?>"  required> 
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p> 
		<input type="text" class="form-control"  name="lastname" placeholder="สกุล" value="<?php echo $empHdr->lastname; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  value="<?php echo $empHdr->birthdate; ?>"  >
	</div> 
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p>
		<input type="text" class="form-control" name="drv_lcn_num" value="<?php echo $empHdr->drv_lcn_num; ?>" >
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email" value="<?php echo $empHdr->email; ?>"  required>
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  value="<?php echo $empHdr->telephone; ?>" >
	</div>
	<div class="col-md-3" >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" ID="mobile" name="mobile" value="<?php echo $empHdr->mobile; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>แฟกซ์</p>
		<input type="text" class="form-control" name="fax" value="<?php echo $empHdr->fax; ?>" >
	</div>
	<div class="col-md-3" >
		<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="username" ID="user" value="<?php echo $empHdr->username; ?>"  disabled>
	</div> 
</div>
<div class="row form_input" style="padding-left:10px;">
	<div class="col-md-6" >
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line1" required><?php  echo str_replace('<br>',"",$empHdr->adr_line1); ?></textarea>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line2" ><?php  echo str_replace('<br>',"",$empHdr->adr_line2); ?></textarea> 
	</div> 
</div>
<div class="row form_input" style="padding-left:10px;">
	<div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" class="chk_sta" value="1" checked> ใช้งาน
        <input type="radio"  name="status" class="chk_sta" value="2" >  ยกเลิก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ </p>
        <textarea  class="form-control" rows='3' name="comment" id="comment"   ><?php  echo str_replace('<br>',"",$empHdr->comment); ?></textarea>
    </div>
    <div class="col-md-3" >
        <p>ผู้สร้าง</p>
        <input type="text" class="form-control" name="name_create" value="<?php  echo $empHdr->name_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่สร้าง</p>
        <input type="text" class="form-control" name="dt_create" value="<?php echo $empHdr->dt_create; ?> " disabled>
    </div>
    <div class="col-md-3" >
        <p>ผู้แก้ไข</p>
        <input type="text" class="form-control" name="name_update" value="<?php echo $empHdr->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php  echo $empHdr->dt_update; ?>" disabled>
    </div> 
</div>

<?php } ?> 