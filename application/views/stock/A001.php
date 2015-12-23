<script type='text/javascript'>
$(function(){  	
	$("#tstock_date").datepicker();
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
	                		$("#valid").html(" :"+code+" มีการใช้งานอยู่แล้ว");
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
		}else{
			$(".transfer").attr("style","display:none;");
		}
	});
}
</script> 
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>เลขที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" name="mposition_code" placeholder="--สร้างโดยระบบ--" readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
		<input type="text" class="form-control" id="tstock_date" name="tstock_date" value="<?php echo $datenow; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $mbranch_name; ?>"  readonly>
	</div>
	<div class="col-md-3" style="text-align:left;">
        <p>ประเภทการรับ</p> 
        <input type="radio"  name="is_recive_type" class="is_recive_type" value="1" checked>  รับเข้าใหม่  
        <input type="radio"  name="is_recive_type" class="is_recive_type" value="2" > รับโอนจากสาขาอื่น
    </div>
</div>
<div class="row form_input transfer" style="display:none;"> 
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" placeholder="--ระบุ--"  required>
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p> 
		<input type="text" class="form-control" id="transfer_date" name="transfer_date"  readonly>
	</div>
	<div class="col-md-3" >
		<p>สาขาที่โยกมา</p> 
		<input type="text" class="form-control" id="transfer_date" name="transfer_date"  readonly>
	</div>
</div>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง</p><p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number" placeholder="--ระบุ--"  required>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number" required>
	</div> 
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<select name="id_model" class ="form-control" required>
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
		<select name="id_gen"  class ="form-control" required>
			<option  value="" selected>--เลือก--</option> 
			<?php 
			foreach ($listMgen as $Mgen)
			{ 
				echo "<option value='".$Mgen->id_gen."'>".$Mgen->gen_name."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<select name="id_color" class ="form-control" required>
			<option value="" selected>--เลือก--</option> 
			<?php 
			foreach ($listMcolor as $Mcolor)
			{ 
				echo "<option value='".$Mcolor->id_color."'>".$Mcolor->color_name."</option>";
			}
			?>
		</select>
	</div> 
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $datenow; ?>" required>
	</div> 
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<select name="id_mbranch" class ="form-control" required>
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
		<input type="text" class="form-control" id="plan" name="plan" >
	</div> 
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div> 
</div>
