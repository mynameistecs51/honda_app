<script type='text/javascript'>
$(function(){  	
	$("#transfer_date").datepicker();  
	getdata(); 
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

function getdata(){ 
	$('#stock_code').change(function(){ 
		var stock_code= $(this).val();
		if(stock_code!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/getstock_code/',
	                data: {"stock_code":stock_code}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {   
	                	if(rs != false){ 
							$.each(rs, function( index, value){  
								$("#er_st_code").html("");
								$("#er_cha_code").html("");
								$("#id_stock").val(value.id_stock);
								$("#stock_date").val(value.stock_date);
								$("#chassis_number").val(value.chassis_number);
								$("#engine_number").val(value.engine_number);
								$("#mmodel_name").val(value.mmodel_name);
								$("#gen_name").val(value.gen_name);
								$("#color_name").val(value.color_name);
								$("#zone_name").val(value.zone_name);
								$("#recive_doc_date").val(value.recive_doc_date);
								$("#doc_reference_code").val(value.doc_reference_code);
							});
	                   }else{ 
		                    $("#er_st_code").html("ไม่พบข้อมูล");
		                    $("#stock_code").val("");
		                    $("#id_stock").val("");
		                    $("#stock_date").val("");
							$("#chassis_number").val("");
							$("#engine_number").val("");
							$("#mmodel_name").val("");
							$("#gen_name").val("");
							$("#color_name").val("");
							$("#zone_name").val("");
							$("#recive_doc_date").val("");
							$("#doc_reference_code").val("");
	                   }
	                },
	                error: function()
	                {
	                	alert('ข้อมูลผิดพลาด ​​​!');
	                    $("#er_st_code").html("");
	                    $("#stock_code").val("");
	                    $("#id_stock").val("");
	                    $("#stock_date").val("");
						$("#chassis_number").val("");
						$("#engine_number").val("");
						$("#mmodel_name").val("");
						$("#gen_name").val("");
						$("#color_name").val("");
						$("#zone_name").val("");
						$("#recive_doc_date").val("");
						$("#doc_reference_code").val("");
	                }
	            });                   
		}else{
			$("#stock_code").val("");
            $("#id_stock").val("");
            $("#stock_date").val("");
			$("#chassis_number").val("");
			$("#engine_number").val("");
			$("#mmodel_name").val("");
			$("#gen_name").val("");
			$("#color_name").val("");
			$("#zone_name").val("");
			$("#recive_doc_date").val("");
			$("#doc_reference_code").val("");
		}
	});
	$('#chassis_number').change(function(){ 
		var chassis_number= $(this).val();
		if(chassis_number!=''){  
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url().$controller; ?>/getchassis_number/',
	                data: {"chassis_number":chassis_number}, //your form datas to post  
	                dataType: 'json',        
	                success: function(rs)
	                {   
	                	if(rs != false){ 
							$.each(rs, function( index, value){  
								$("#er_st_code").html("");
								$("#er_cha_code").html("");
								$("#stock_code").val(value.stock_code);
								$("#id_stock").val(value.id_stock);
								$("#stock_date").val(value.stock_date);
								$("#chassis_number").val(value.chassis_number);
								$("#engine_number").val(value.engine_number);
								$("#mmodel_name").val(value.mmodel_name);
								$("#gen_name").val(value.gen_name);
								$("#color_name").val(value.color_name);
								$("#zone_name").val(value.zone_name);
								$("#recive_doc_date").val(value.recive_doc_date);
								$("#doc_reference_code").val(value.doc_reference_code);
							});
	                   }else{ 
		                    $("#er_cha_code").html("ไม่พบข้อมูล");
		                    $("#stock_code").val("");
		                    $("#id_stock").val("");
		                    $("#stock_date").val("");
							$("#chassis_number").val("");
							$("#engine_number").val("");
							$("#mmodel_name").val("");
							$("#gen_name").val("");
							$("#color_name").val("");
							$("#zone_name").val("");
							$("#recive_doc_date").val("");
							$("#doc_reference_code").val("");
	                   }
	                },
	                error: function()
	                {
	                	alert('ข้อมูลผิดพลาด ​​​!');
	                    $("#er_st_code").html("");
	                    $("#stock_code").val("");
	                    $("#id_stock").val("");
	                    $("#stock_date").val("");
						$("#chassis_number").val("");
						$("#engine_number").val("");
						$("#mmodel_name").val("");
						$("#gen_name").val("");
						$("#color_name").val("");
						$("#zone_name").val("");
						$("#recive_doc_date").val("");
						$("#doc_reference_code").val("");
	                }
	            });                   
		}else{
			$("#stock_code").val("");
            $("#id_stock").val("");
            $("#stock_date").val("");
			$("#chassis_number").val("");
			$("#engine_number").val("");
			$("#mmodel_name").val("");
			$("#gen_name").val("");
			$("#color_name").val("");
			$("#zone_name").val("");
			$("#recive_doc_date").val("");
			$("#doc_reference_code").val("");
		}
	});
}
</script> 
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" placeholder="--สร้างโดยระบบ--" readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p><p class="required">*</p> 
		<input type="text" class="form-control" id="transfer_date" name="transfer_date" value="<?php echo $datenow; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาเดิม</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $mbranch_name; ?>" readonly>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่โยกไป</p><p class="required">*</p> 
		<select name="id_mbranch_recive" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMbranch as $Mbranch)
			{ 
				echo "<option value='".$Mbranch->id_mbranch."'>".$Mbranch->mbranch_name."</option>";
			}
			?>
		</select> 
	</div> 
	<div class="col-md-3" >
		<p>เลขที่รับเข้าสต๊อก <b ID="er_st_code"></b></p>
		<p class="required">*</p> 
		<input type="text" class="form-control" id="stock_code" name="stock_code" placeholder="--ระบุ--"  required>
		<input type="hidden" class="form-control" id="id_stock" name="id_stock" required>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="" readonly>
	</div> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง <b ID="er_cha_code"></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number" placeholder="--ระบุ--"  >
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number" readonly>
	</div> 
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mmodel_name" name="mmodel_name" readonly>
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<input type="text" class="form-control" id="gen_name" name="gen_name" readonly>
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<input type="text" class="form-control" id="color_name" name="color_name" readonly>
	</div> 
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<input type="text" class="form-control" id="zone_name" name="zone_name" readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับจริง</p>
		<input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" readonly>
	</div>
	<div class="col-md-3" >
		<p>เลขที่เอกสารอ้างอิง</p>
		<input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" readonly>
	</div> 
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div> 
</div>
