<script type='text/javascript'>
$(function(){  	
	$("#transfer_date").datepicker();   
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
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" placeholder="--สร้างโดยระบบ--" readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p><p class="required">*</p> 
		<input type="text" class="form-control" id="transfer_date" name="transfer_date" value="<?php echo $datenow; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p>
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
		<p>เลขที่รับเข้าสต๊อก</p><p class="required">*</p> 
		<input type="text" class="form-control" id="stock_code" name="stock_code" placeholder="--ระบุ--"  required>
		<input type="hidden" class="form-control" id="id_stock" name="id_stock" >
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="" readonly>
	</div> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง</p><p class="required">*</p>
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
