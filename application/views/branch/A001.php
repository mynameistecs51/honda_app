<script type='text/javascript'>
$(function(){  	
	$("#mbranch_code").change(function(){
		$("#valid").html("");
		var code = $("#mbranch_code").val(); 
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
	                		$("#mbranch_code").val('');
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
	                  alert(" บันทึกข้อมูล เรียบร้อย !");
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
<div class="row form_input"> 
	<div class="col-md-4" >
		<p>รหัส<?php echo $pagename; ?> <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="mbranch_code" id="mbranch_code" required>
	</div>
	<div class="col-md-8" >
		<p>ชื่อ<?php echo $pagename; ?></p><p class="required">*</p>
		<input type="text" class="form-control" name="mbranch_name" required>
	</div> 
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
</div>