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
	$("#confirmpw").change(function(){
		var npw = $("#newpassword").val();
		var cpw = $("#confirmpw").val();
		if(npw != cpw){ 
			alert("รหัสผ่าน  ไม่ถูกต้อง !");
			$("#newpassword").val("");
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
	                url: '<?php echo base_url(); ?>mst/checkUser/',
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
	                url: '<?php echo base_url(); ?>mst/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                   $('.modal').modal('hide');
	                   location.reload();
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
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="form_input">  
	<p>รหัสรายการคลังสินค้า/อะไหล่</p><p class="required">*</p>
	<input type="text" class="inputDate" name="mst_code" placeholder="รหัสคลังรายการสินค้า/อะไหล่" required>	
	<p>หน่วยงานที่ดูแลคลังสินค้า</p><p class="required">*</p>
		<select name="id_mdept" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMdept as $mdept)
			{ 
				echo "<option value='".$mdept->id_mdept."'>".$mdept->name_th."</option>";
			}
			?>
		</select>
	<p>บริษัทเจ้าของคลังสินค้า</p><p class="required">*</p>
		<select name="id_mcmp" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMcmp as $mcmp)
			{ 
				echo "<option value='".$mcmp->id_mcmp."'>".$mcmp->name_th."</option>";
			}
			?>
		</select>
	<p>ชื่อรายการคลังสินค้า/อะไหล่(ENG)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_en" placeholder="ชื่อรายการคลังสินค้า/อะไหล่(ENG)">
	<p>ชื่อรายการคลังสินค้า/อะไหล่(TH)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_th" placeholder="ชื่อรายการคลังสินค้า/อะไหล่(TH)">
	<p>หมายเหตุ</p>
	<textarea  class="input" rows='5' name="comment"></textarea>
</div>