<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#sn1date" ).datetimepicker();

	select_mcmp('is_main_company2');
	select_province('PROVINCE_ID1','AMPHUR_ID1');
	click_rdo_install();
	saveMcmp();
 });

function get_sel_mcmp(_mcmp)
{
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>mcmp/get_sel_mcmp/',
        dataType: "JSON"
        }).done(function(rs){  
          $('#'+_mcmp+' option').remove();
          var option='';
              option+='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
              $('#'+_mcmp+'').append(option);
          $.each( rs, function( i, op ) {
             var option='';
                 option+='<option style="font-size:12px;" value="'+op.id_mcmp+'">'+op.name_th+'</option>';
                 $('#'+_mcmp+'').append(option);
        });
          $('#'+_mcmp+'.selectpicker').selectpicker('refresh');
        });
}

function get_sel_province(_province)
{
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>index.php/mcmp/get_sel_province/',
        dataType: "JSON"
        }).done(function(rs){  
          $('#'+_province+' option').remove();
          var option='';
              option+='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
              $('#'+_province+'').append(option);
          $.each( rs, function( i, op ) {
             var option='';
                 option+='<option style="font-size:12px;" value="'+op.PROVINCE_ID+'">'+op.PROVINCE_NAME+'</option>';
                 $('#'+_province+'').append(option);
        });
          $('#'+_province+'.selectpicker').selectpicker('refresh');
        });
}

function get_sel_amphur(_amphur,_province)
{
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>mcmp/get_sel_amphur/',
        data: {province_id: $('#'+_province+' option:selected').val()},
        dataType: "JSON"
        }).done(function(rs){  
          $('#'+_amphur+' option').remove();
          var option='';
              option+='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
              $('#'+_amphur+'').append(option);
          $.each( rs, function( i, op ) {
             var option='';
                 option+='<option style="font-size:12px;" value="'+op.AMPHUR_ID+'">'+op.AMPHUR_NAME+'</option>';
                 $('#'+_amphur+'').append(option);
        });
          $('#'+_amphur+'.selectpicker').selectpicker('refresh');
        });
}

function select_mcmp(_mcmp)
{
    get_sel_mcmp(_mcmp);
    $('#'+_mcmp+'').on('change', function(){
  });
}

function select_province(_province,_amphur)
{
    get_sel_province(_province);
    $('#'+_province+'').on('change', function(){
    get_sel_amphur(_amphur,_province);
      $('#'+_amphur+'').prop('disabled',false);
  });
}

function click_rdo_install()
{
	$('.rdo_install').on('click',function(){
		if($('input[type="radio"].rdo_install#standard').is(':checked')){
 	 		$('div.divequip_standard').show();
 	 		$('div.divequip_special').hide();
		}
		if($('input[type="radio"].rdo_install#special').is(':checked')){
			$('div.divequip_special').show();
			$('div.divequip_standard').hide();
		}
	});

}

function saveMcmp()
      {
         $('#form').on('submit', function (e) {
 
            if (e.isDefaultPrevented()) {
              // handle the invalid form...
              alert("ผิดพลาด : กรอกข้อมูลไม่ครบ!");
            } else {
              // everything looks good!
            e.preventDefault();
            var form = $('#form').serialize();
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url(); ?>mcmp/saveadd/',
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
</script>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="form_input"> 

		<p>เป็นบริษัทหลัก หรือ ไซต์งานลูกค้า</p>
		<div class="status" style="text-align:left;">
             <input type="radio" class="rdo_install"  id="standard" name="is_main_company"  value="1" checked="true"> บริษัทหลัก
             <input type="radio" class="rdo_install"  id="special"  name="is_main_company"  value="0"> ไซต์งานลูกค้า
        </div> 
		<div class="divequip_special" style="display:none;">
		 	<p>บริษัทหลักของไซต์งานลูกค้า</p><p class="required">*</p>
		 	<div class="col-md-12">
			<select name="id_mcmp_main" ID="is_main_company2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
			<option style="font-size:12px;" value="" selected>----เลือก----</option>
			</select>
			</div>
		</div>
		<p>ความสำคัญของลูกค้า</p>
		<div class="status">
			<input type="radio" name="is_mipt" value="1" checked="checked" >  ลูกค้า ธรรมดา
			<input type="radio" name="is_mipt" value="0"  > ลูกค้า VIP 
		</div>
		<p>รหัสบริษัท</p><p class="required">*</p>
		<input type="text" class="input" name="mcmp_code" value="" placeholder="รหัสบริษัท"required>		
		<p>ชื่อบริษัท(TH)</p><p class="required">*</p>
		<input type="text" class="input" name="name_th" value="" placeholder="ชื่อบริษัท(TH)"required>
		<p>ชื่อบริษัท(ENG)</p><p class="required">*</p>
		<input type="text" class="input" name="name_en" value="" placeholder="ชื่อบริษัท(ENG)"required>
		<p>ที่อยู่บริษัท</p><p class="required">*</p>
		<textarea  class="input" rows='5' name="adr_line" placeholder="ที่อยู่บริษัท"required></textarea>
		<div class="row form_input" style="text-align:left; margin:0;">
			<div class="col-md-12">
				<p>ชื่อจังหวัด</p><p class="required">*</p>
				<select name="id_mprv" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
	
			</div>
			<div class="col-md-6">
				<div class="row form_input" style="text-align:left; margin:0;">    
				<p>ชื่ออำเภอ/เขต</p><p class="required">*</p>
				<select name="id_mdist" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
				<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row form_input" style="text-align:left; margin:0;">    
				<p>พื้นที่บริการ</p>
				<select name="" ID="" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
				<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<p>เลขประจำตัวผู้เสียภาษี</p><p class="required">*</p>
		<input type="text" class="input" name="tax_id" value="" placeholder="เลขประจำตัวผู้เสียภาษี">
		<p>เว็บไซต์</p><p class="required">*</p>
		<input type="text" class="input" name="website" value="" placeholder="เว็บไซต์">
		<p>อีเมลล์</p><p class="required">*</p>
		<input type="text" class="input" name="email" value="" placeholder="อีเมลล์">
		<p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
		<input type="text" class="input" name="contact" value="" placeholder="ชื่อผู้ติดต่อ"required>
		<p>เบอร์โทรศัพท์</p><p class="required">*</p>
		<input type="text" class="input" name="telephone" value="" placeholder="เบอร์โทรศัพท์">
		<p>เบอร์มือถือ</p><p class="required">*</p>
		<input type="text" class="input" name="mobile" value="" placeholder="เบอร์มือถือ"required>
		<p>เบอร์แฟกซ์</p><p class="required">*</p>
		<input type="text" class="input" name="fax" value="" placeholder="เบอร์แฟกซ์">
		<p>เป็นองค์กรเจ้าของระบบหรือไม่</p>
		<div class="status">
			<input type="radio" name="is_owner" value="1"  > ใช่ 
			<input type="radio"  name="is_owner" value="0"  checked="checked"> ไม่ใช่ 
		</div>
		<p>เป็น Supplier หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_supplier" value="1"  > ใช่  
			<input type="radio" name="is_supplier" value="0" checked="checked"> ไม่ใช่ 
		</div>
		<p>เป็น Dealer หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_dealer" value="1"  > ใช่  
			<input type="radio" name="is_dealer" value="0" checked="checked"> ไม่ใช่ 
		</div>
		<p>เป็นลูกค้าหรือไม่</p> 
		<div class="status">
			<input type="radio" name="is_customer" value="1"  > ใช่  
			<input type="radio" name="is_customer" value="0" checked="checked"> ไม่ใช่ 
		</div>
		<p>หมายเหตุ </p>
		<textarea  class="input" rows='5' name="comment"  placeholder="หมายเหตุ"></textarea>
</div>