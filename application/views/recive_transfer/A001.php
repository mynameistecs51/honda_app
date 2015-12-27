<script type='text/javascript'>
$(function(){  	
	$("#stock_date").datepicker();
	$("#recive_doc_date").datepicker();  
	$("#chassis_number").change(function(){
		$("#valid").html("");
		var code = $("#chassis_number").val(); 
		if(code != ""){
			$.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/checkchassis_number/',
	                data: {"chassis_number":code}, //your form datas to post          
	                success: function(rs)
	                {   
	                	console.log(rs); 
	                	if(rs==1){ 
	                		$("#valid").html("รายการนี้ทำรับแล้ว");
	                		$("#chassis_number").val('');
	                	}
	                }
	            });      
			
		}else{
			$("#valid").html("");
		}
	});  	
	saveData();
	getTransfer();
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
function getTransfer(){
	$('.is_recive_type').change(function(){ 
		var val= $(".is_recive_type:checked").val();
		if(val==2){
			$(".transfer").attr("style","display:true;");
			$("#transfer_code").attr('required', 'required');
		}else{
			$(".transfer").attr("style","display:none;");
			$("#transfer_code").removeAttr('required');
		}
	});
	$('#id_mmodel').change(function(){ 
		var id_mmodel= $(this).val();
		if(id_mmodel!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/getMgen/',
	                data: {"id_mmodel":id_mmodel}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {  
	                	var res="<option >---เลือก---</option>";
						$.each(rs, function( index, value){ 

							res += "<option value="+value.id_gen+"> "+value.gen_name+"</option>";
						});
	                   $("#id_mgen").html(res);
	                },
	                error: function()
	                {
	                    alert("#เกิดข้อผิดพลาด");
	                }
	            });                   
		}else{
			var none="<option value=''>---เลือก---</option>";
			$("#id_mgen").html(none);
		}
	});
	$('#id_mgen').change(function(){ 
		var id_mgen= $(this).val();
		if(id_mgen!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/getMcolor/',
	                data: {"id_mgen":id_mgen}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {  
	                	var res="<option >---เลือก---</option>";
						$.each(rs, function( index, value){ 

							res += "<option value="+value.id_color+"> "+value.color_name+"</option>";
						});
	                   $("#id_mcolor").html(res);
	                },
	                error: function()
	                {
	                    alert("#เกิดข้อผิดพลาด");
	                }
	            });                   
		}else{
			var none="<option value=''>---เลือก---</option>";
			$("#id_mcolor").html(none);
		}
	});
}
</script> 
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>เลขที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" name="stock_code" placeholder="--สร้างโดยระบบ--" readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $datenow; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $mbranch_name; ?>"  readonly>
	</div> 
</div>
<div class="row form_input transfer" style="display:none;"> 
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ</p><p class="required">*</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" placeholder="--ระบุ--" >
		<input type="hidden" id="id_transfer" name="id_transfer"  >
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p> 
		<input type="text" class="form-control" id="transfer_date" name="transfer_date"  readonly>
	</div>
	<div class="col-md-3" >
		<p>สาขาที่โยกมา</p> 
		<input type="text" class="form-control" id="branch_transfer" name="branch_transfer"  readonly>
	</div>
</div>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number" placeholder="--ระบุ--"  required>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number" required>
	</div> 
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<select name="id_mmodel" id="id_mmodel" class ="form-control" required>
			<option value="" selected>--เลือก--</option> 
			<?php 
			foreach ($listMmodel as $Mmodel)
			{ 
				echo "<option value='".$Mmodel->id_model."'>".$Mmodel->mmodel_name."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<select name="id_mgen" id="id_mgen" class ="form-control" required> 
		</select>
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<select name="id_mcolor" id="id_mcolor" class ="form-control" required> 
		</select>
	</div> 
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $datenow; ?>" required>
	</div> 
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<select name="id_zone" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMzone as $Mzone)
			{ 
				echo "<option value='".$Mzone->id_zone."'>".$Mzone->zone_name."</option>";
			}
			?>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>เลขที่เอกสารอ้างอิง</p>
		<input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" >
	</div> 
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div> 
</div>
