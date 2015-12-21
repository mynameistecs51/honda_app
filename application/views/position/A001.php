<script type='text/javascript'>
$(function(){
	$("#mposition_code").change(function(){
		$("#valid").html("");
		var code = $("#mposition_code").val(); 
		if(code != ""){
			$.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/checkCode/',
	                data: {"code":code}, //your form datas to post          
	                success: function(rs)
	                {   
	                	console.log(rs); 
	                	if(rs==1){ 
	                		$("#valid").html("รหัส :"+code+" มีการใช้งานอยู่แล้ว");
	                		$("#mposition_code").val('');
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
            //console.log()
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                  $('.modal').modal('hide');
	                  location.reload();
	                  alert("บันทึกข้อมูล เรียบร้อย !");
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
<div class="row form_input"> 
	<div class="col-md-4" >
		<p>รหัส<?php echo $pagename; ?> <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="mposition_code" id="mposition_code" required>
	</div>
	<div class="col-md-4" >
		<p>ชื่อ<?php echo $pagename; ?></p><p class="required">*</p>
		<input type="text" class="form-control" name="mposition_name" required>
	</div>
	<div class="col-md-4" >
		<p>สำนักงาน/สาขา</p><p class="required">*</p>
		<select name="id_mbranch" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1" selected> อุดรธานี </option>
			<option value="2"> หนองบัวลำภู </option>
			<option value="3"> หนองคาย </option>
			<option value="3"> สว่างแดนดิน </option>
		</select> 
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
</div>