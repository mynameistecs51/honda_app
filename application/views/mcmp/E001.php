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
	updateMemp();
});

function cancle() {
	if(confirm("ยกเลิกการดำเนินการ หรือไม่ ?"))
	{
		var base=$("#base_url").val();
		location = base+"/mcmp";
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
        var name_th= $('#name_th').val();   
        var name_en= $('#name_en').val();   
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
                url: '<?php echo base_url(); ?>mcmp/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name_th); 
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(name_en);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(mobile);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(4)').html(email)
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
<?php  foreach ($listMcmp as $detail) { ?>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="form_input">
		<input type="hidden" class="input" name="id_mcmp" value="<?php echo $detail->id_mcmp; ?>"readonly>
		<p>รหัสบริษัท</p>
		<input type="text" class="input" name="mcmp_code" value="<?php echo $detail->mcmp_code; ?>"readonly>
		<p>รหัสกลุ่มบริษัท</p>
		<select name="id_mcmp_grp" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
				foreach ($listMcmp_grp as $mcmp_grp) 
				{
						$m= "<option value='".$mcmp_grp->id_mcmp_grp."' ";
						if($detail->id_mcmp_grp==$mcmp_grp->id_mcmp_grp){
							$m .= "selected";
						}
						$m .=">".$mcmp_grp->name_th."</option>";
						echo $m;
				}
			?>		
			</select>
		<p> เลขประจำตัวผู้เสียภาษี</p>
		<input type="text" class="input" name="tax_id" value="<?php echo $detail->tax_id; ?>"required>
		<p>ชื่อบริษัท(TH)</p>
		<input type="text" class="input" name="name_th" value="CHUPHOTIC" placeholder="ชื่อบริษัท(TH)">
		<p>ชื่อบริษัท(ENG)</p>
		<input type="text" class="input" name="tax_id" value="CHUPHOTIC" placeholder="ชื่อบริษัท(ENG)">
		<p>เป็นสาขา หรือ สำนักงานใหญ่</p>
		<div class="status" >
			<input type="radio" name="is_owner" value="1" checked="checked" > สำนักงานใหญ่ 
			<input type="radio"  name="is_owner" value="2" > สาขา 
		</div>
		<p>ที่อยู่จัดส่งสินค้า 1</p>
		<textarea  class="input" rows='5' name="adr_line_1" required><?php echo $detail->adr_line_1; ?></textarea>
		<p>ที่อยู่จัดส่งสินค้า 2</p>
		<textarea  class="input" rows='5' name="adr_line_2" required><?php echo $detail->adr_line_2; ?></textarea>
		<p>ที่อยู่จัดส่งสินค้า 3</p>
		<textarea  class="input" rows='5' name="adr_line_3" required><?php echo $detail->adr_line_3; ?></textarea>
		<p> ที่อยู่จัดส่งสินค้า 4</p>
		<textarea  class="input" rows='5' name="adr_line_4" required><?php echo $detail->adr_line_4; ?></textarea>
		<p>เว็บไซต์</p>
		<input type="text" class="input" name="website" value="<?php echo $detail->website; ?>"required>
		<p> อีเมลล์</p>
		<input type="text" class="input" name="email" id="email" value="<?php echo $detail->email; ?>"required>
		<p>ชื่อผู้ติดต่อ</p>
		<input type="text" class="input" name="contact" value="<?php echo $detail->contact; ?>"required>
		<p>เบอร์โทรศัพท์</p>
		<input type="text" class="input" name="telephone" value="<?php echo $detail->telephone; ?>"required>
		<p>เบอร์มือถือ</p>
		<input type="text" class="input" name="mobile" id="mobile" value="<?php echo $detail->mobile; ?>"required>
		<p>เบอร์แฟกซ์</p>
		<input type="text" class="input" name="fax" value="<?php echo $detail->fax; ?>"required>
		<p>เป็นองค์กรณ์เจ้าของระบบหรือไม่</p>
		<div class="status">
			<input type="radio" name="is_owner" value="1"required <?php if($detail->is_owner=='1'){ echo "checked=checked"; } ?> > ใช่ 
			<input type="radio"  name="is_owner" value="2"required <?php if($detail->is_owner=='2'){ echo "checked=checked"; } ?> > ไม่ใช่ 
		</div>
		<p>เป็น Supplier หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_supplier" value="1" required <?php if($detail->is_supplier=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_supplier" value="2" required <?php if($detail->is_supplier=='2'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>เป็น Dealer หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_dealer" value="1" required <?php if($detail->is_dealer=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_dealer" value="2" required <?php if($detail->is_dealer=='2'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>เป็นลูกค้าหรือไม่</p> 
		<div class="status">
			<input type="radio" name="is_customer" value="1" required <?php if($detail->is_customer=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_customer" value="2" required <?php if($detail->is_customer=='2'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>หมายเหตุ </p>
		<textarea  class="input" rows='5' name="comment" id="comment" required ><?php echo $detail->comment; ?></textarea>
		<p>ผู้สร้าง</p>
		<input type="text" class="input" name="name_create" value="<?php  echo $detail->name_create; ?>" readonly>
		<p>วันที่สร้าง</p>
		<input type="text" class="input" name="dt_create" value="<?php echo $detail->dt_create; ?>" readonly>
		<p>ผู้แก้ไข</p>
		<input type="text" class="input" name="name_update" value="<?php echo $detail->name_update; ?>" readonly>
		<p>วันที่แก้ไข</p>
		<input type="text" class="input" name="dt_update" value="<?php echo $detail->dt_update; ?>" readonly>
		
				
</div>
<?php } ?> 