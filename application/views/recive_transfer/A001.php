<script type='text/javascript'>
$(function(){  	
	$("#stock_date").datepicker();
	$("#recive_doc_date").datepicker();   
	saveData();
	getdata();
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
function getdata(){ 
	$('#transfer_code').keyup(function(){ 
		var transfer_code= $(this).val();
		var transfer_old="";
		if(transfer_code!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/gettransfer_code/',
	                data: {"transfer_code":transfer_code,"transfer_old":transfer_old}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {   
	                	if(rs != false){ 
							$.each(rs, function( index, value){  
								$("#er_tf_code").html("");
								$("#er_cha_code").html("");
								$("#id_transfer").val(value.id_transfer);
								$("#transfer_date").val(value.transfer_date);
								$("#branch_transfer").val(value.branch_transfer);
								$("#chassis_number").val(value.chassis_number);
								$("#engine_number").val(value.engine_number);
								$("#mmodel_name").val(value.mmodel_name);
								$("#gen_name").val(value.gen_name);
								$("#color_name").val(value.color_name);   
								$("#id_mmodel").val(value.id_mmodel);
								$("#id_mgen").val(value.id_mgen);
								$("#id_mcolor").val(value.id_mcolor);
							});
	                   }else{ 
		                    $("#er_tf_code").html("ไม่พบข้อมูล");
		                    $("#id_transfer").val("");
		                    $("#transfer_date").val("");
		                    $("#branch_transfer").val("");
							$("#chassis_number").val("");
							$("#engine_number").val("");
							$("#mmodel_name").val("");
							$("#gen_name").val("");
							$("#color_name").val(""); 
							$("#id_mmodel").val("");
							$("#id_mgen").val("");
							$("#id_mcolor").val(""); 
	                   }
	                },
	                error: function()
	                {
	                	alert('ข้อมูลผิดพลาด ​​​!');
	                    $("#er_tf_code").html("");
	                    $("#transfer_code").val("");
	                    $("#id_transfer").val("");
	                    $("#transfer_date").val("");
	                    $("#branch_transfer").val("");
						$("#chassis_number").val("");
						$("#engine_number").val("");
						$("#mmodel_name").val("");
						$("#gen_name").val("");
						$("#color_name").val(""); 
						$("#id_mmodel").val("");
						$("#id_mgen").val("");
						$("#id_mcolor").val(""); 
	                }
	            });                   
		}else{
			$("#transfer_code").val("");
            $("#id_transfer").val("");
            $("#transfer_date").val("");
            $("#branch_transfer").val("");
			$("#chassis_number").val("");
			$("#engine_number").val("");
			$("#mmodel_name").val("");
			$("#gen_name").val("");
			$("#color_name").val("");
			$("#id_mmodel").val("");
			$("#id_mgen").val("");
			$("#id_mcolor").val(""); 
		}
	});
	$('#chassis_number').keyup(function(){ 
		var chassis_number= $(this).val();
		var chassis_old="";
		if(chassis_number!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/getchassis_number/',
	                data: {"chassis_number":chassis_number,"chassis_old":chassis_old}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {   
	                	if(rs != false){ 
							$.each(rs, function( index, value){  
								$("#er_st_code").html("");
								$("#er_cha_code").html("");
								$("#transfer_code").val(value.transfer_code);
								$("#id_transfer").val(value.id_transfer);
								$("#transfer_date").val(value.transfer_date);
								$("#branch_transfer").val(value.branch_transfer);
								$("#engine_number").val(value.engine_number);
								$("#mmodel_name").val(value.mmodel_name);
								$("#gen_name").val(value.gen_name);
								$("#color_name").val(value.color_name);
								$("#id_mmodel").val(value.id_mmodel);
								$("#id_mgen").val(value.id_mgen);
								$("#id_mcolor").val(value.id_mcolor); 
							});
	                   }else{ 
		                    $("#er_cha_code").html("ไม่พบข้อมูล");
		                    $("#transfer_code").val("");
		                    $("#id_transfer").val("");
		                    $("#transfer_date").val(""); 
		                    $("#branch_transfer").val("");
							$("#engine_number").val("");
							$("#mmodel_name").val("");
							$("#gen_name").val("");
							$("#color_name").val("");
							$("#id_mmodel").val("");
							$("#id_mgen").val("");
							$("#id_mcolor").val(""); 
	                   }
	                },
	                error: function()
	                {
	                	alert('ข้อมูลผิดพลาด ​​​!');
	                    $("#er_st_code").html("");
	                    $("#transfer_code").val("");
	                    $("#id_transfer").val("");
	                    $("#transfer_date").val("");
	                    $("#branch_transfer").val("");
						$("#chassis_number").val("");
						$("#engine_number").val("");
						$("#mmodel_name").val("");
						$("#gen_name").val("");
						$("#color_name").val(""); 
						$("#id_mmodel").val("");
						$("#id_mgen").val("");
						$("#id_mcolor").val(""); 
	                }
	            });                   
		}else{
			$("#transfer_code").val("");
            $("#id_transfer").val("");
            $("#transfer_date").val("");
            $("#branch_transfer").val("");
			$("#chassis_number").val("");
			$("#engine_number").val("");
			$("#mmodel_name").val("");
			$("#gen_name").val("");
			$("#color_name").val(""); 
			$("#id_mmodel").val("");
			$("#id_mgen").val("");
			$("#id_mcolor").val(""); 
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
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $datenow; ?>" style="background:#fff;" readonly required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $mbranch_name; ?>"  readonly>
	</div> 
	<div class="col-md-3" >
		<p>สาขาที่โยกมา</p>
		<input type="text" class="form-control" id="branch_transfer" name="branch_transfer"  readonly>
	</div>
</div>
<div class="row form_input transfer"> 
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ <b ID="er_tf_code"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" placeholder="--ระบุ--" >
		<input type="hidden" id="id_transfer" name="id_transfer"  >
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p>
		<input type="text" class="form-control" id="transfer_date" name="transfer_date"  readonly>
	</div> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง <b ID="er_cha_code"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number" placeholder="--ระบุ--"  required>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number" readonly>
	</div> 
</div>
<div class="row form_input">  
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mmodel_name" name="mmodel_name"  readonly>
		<input type="hidden" id="id_mmodel" name="id_mmodel"  >
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<input type="text" class="form-control" id="gen_name" name="gen_name"  readonly>
		<input type="hidden" id="id_mgen" name="id_mgen"  >
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<input type="text" class="form-control" id="color_name" name="color_name"  readonly>
		<input type="hidden" id="id_mcolor" name="id_mcolor"  >
	</div> 
</div>
<div class="row form_input">  
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $datenow; ?>" style="background:#fff;" readonly required>
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
