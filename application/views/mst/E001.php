<script type='text/javascript'>
$(function(){
	$( "#birthdate" ).datepicker({ 
	    dateFormat: 'dd/mm/yy',
	    yearRange: "-100:+0",
	    changeMonth: true,
	    changeYear: true, 
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting
    });
	$("#startdate").datepicker({
		dateFormat: 'dd/mm/yy',
	    yearRange: "-100:+20",
	    changeMonth: true,
	    changeYear: true, 
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting
	});
	$("#resigndate").datepicker({
		dateFormat: 'dd/mm/yy',
	    yearRange: "-100:+100",
	    changeMonth: true,
	    changeYear: true, 
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting
	});
	$('#changePass').click(function(){
			var cb_status = $(this).is(':checked');
			if(cb_status==true){
					$(".pass").removeAttr("style");
					$("#oldpassword").prop("required", true);
					$("#newpassword").prop("required", true);
					$("#confirmpw").prop("required", true);
			}else{
					$(".pass").css({ 'display': "none" }); 
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
		location = base+"/mst";
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
                url: '<?php echo base_url(); ?>mst/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name); 
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(mobile);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(4)').html(email);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(5)').html(status);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(6)').html(comment);
                   $('.modal').modal('hide');
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
<?php  foreach ($listMst as $detail) { ?>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="form_input">
	<p>รหัสรายการสินค้า/อะไหล่</p>
	<input type="text" class="input" name="mst_code" value="<?php echo $detail->mst_code;   ?>" readonly>
	<input type="hidden" class="input" name="id_mst" value="<?php echo $detail->id_mst;   ?>" >
	<p>บริษัทเจ้าของคลังสินค้า</p>
	<select name="id_mdept" class ="select" required>
	<option value="">--เลือก--</option> 
	<?php 
		foreach ($listMdept as $mdept) 
		{
				$m= "<option value='".$mdept->id_mdept."' ";
				if($detail->id_mdept==$mdept->id_mdept){
					$m .= "selected";
				}
				$m .=">".$mdept->name_th."</option>";
				echo $m;
		}
	?>		
	</select>
	<p>บริษัทเจ้าของสินค้า</p>
	<select name="id_mcmp" class ="select" required>
	<option value="">--เลือก--</option> 
	<?php 
		foreach ($listMcmp as $mcmp) 
		{
				$m= "<option value='".$mcmp->id_mcmp."' ";
				if($detail->id_mcmp==$mcmp->id_mcmp){
					$m .= "selected";
				}
				$m .=">".$mcmp->name_th."</option>";
				echo $m;
		}
	?>		
	</select>
	<p>ชื่อรายการคลังสินค้า/อะไหล่(ENG)</p>
	<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>" >
	<p>ชื่อรายการคลังสินค้า/อะไหล่(TH)</p>
	<input type="text" class="input" name="name_th" value="<?php echo $detail->name_th;   ?>" >
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
</div>
<?php } ?> 