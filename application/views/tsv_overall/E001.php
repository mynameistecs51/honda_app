<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#issuedate" ).datetimepicker({ 
	    changeMonth: true,
	    changeYear: true, 
	    dateFormat: 'dd/mm/yy',
	    yearRange: "-100:+0",
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting

    });

	click_transport_radio();
	checkbox_check_all();
	click_control();
	select_control();
	sumtotal();
	saveData();
	showhideBtn("");
	click_rdo_install();
	datetimepiker_control(0);
 });

function datetimepiker_control(trNo)
{
	$("#startdate"+trNo).datetimepicker({
      dateFormat: 'dd/mm/yy',
      yearRange: "-20:+20",
      changeMonth: true,
      changeYear: true, 
      monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], 
      defaultDate: "+1w",
      onClose: function( selectedDate ) {
        $( "#enddate" ).datepicker( "option", "minDate", selectedDate );
      }
    });
  $("#enddate"+trNo).datetimepicker({
      dateFormat: 'dd/mm/yy',
      yearRange: "-20:+20",
      changeMonth: true,
      changeYear: true, 
      monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
      defaultDate: "+1w",
      onClose: function( selectedDate ) {
        $( "#startdate" ).datepicker( "option", "maxDate", selectedDate );
      }
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

function click_control()
{
	$('.add_equip').on('click', function(){
 		add_equip_tr();
 	});

 	$('.del_equip').on('click', function(){
 	 	if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_equip').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_equip:checkbox:checked').parents('#tb_equip tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_equip').is(':checked')){
               $('#tb_equip tbody tr').remove();
               }
         }
 	sumtotal();
 	showhideBtn("equip");
 	});

	$('.add_detail').on('click', function(){
 		add_detail_tr();
 	});

 	$('.del_detail').on('click', function(){
 	 	if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_detail').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_detail:checkbox:checked').parents('#tb_detail tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_detail').is(':checked')){
               $('#tb_detail tbody tr').remove();
               }
         }
 	sumtotal();
 	showhideBtn("detail");
 	});

	$('.add_eng').on('click', function(){
 		add_eng_tr();
 	});

 	$('.del_eng').on('click', function(){
 	 	if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_eng').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_eng:checkbox:checked').parents('#tb_eng tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_eng').is(':checked')){
               $('#tb_eng tbody tr').remove();
               }
         }
 	sumtotal();
 	showhideBtn("eng");
 	});

 	$('.add_product').on('click', function(){
 		add_product_tr();
 	});

 	$('.del_product').on('click', function(){
 	 	if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
			if($('input[type="checkbox"].cbsmodal_product').is(':checked')||$('input[type="checkbox"]#cballmodal_product').is(':checked'))
			{
				$('input[type="checkbox"].cbsmodal_product:checkbox:checked').parents('#tb_product tbody tr').remove();
			}
   }
 	sumtotal();
 	showhideBtn();
 	});

}

function select_control()
{
	$('#tclaim_mcmp.selectpicker').on('change', function(){
		if($(this).val()==1){
		$('#tclaim_address').val('ที่อยู่ A');
	    }else{
	    $('#tclaim_address').val('ที่อยู่ B');
	    }
	});


}

function add_equip_tr()
{
	var trhtml ='<tr>';
 	 	trhtml +='<td><input type="checkbox" class="cbsmodal_equip"></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
 	   trhtml +='</tr>';
 	 $('#tb_equip tbody').append(trhtml);
  	click_checkbox_all('cballmodal_equip','cbsmodal_equip','tb_equip');
  	checkbox_check_all('cballmodal_equip','cbsmodal_equip');
 	 sumtotal();
 	 showhideBtn("equip");
 	 $('.selectpicker').selectpicker('refresh');
}

function add_detail_tr()
{
	var trhtml ='<tr>';
 	 	trhtml +='<td><input type="checkbox" class="cbsmodal_detail"></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
		trhtml +='<td><input type="text" class="form-control" name="namemodel[]" ></td>';
 	   trhtml +='</tr>';
 	 $('#tb_detail tbody').append(trhtml);
  	click_checkbox_all('cballmodal_detail','cbsmodal_detail','tb_detail');
  	checkbox_check_all('cballmodal_detail','cbsmodal_detail');
 	 sumtotal();
 	 showhideBtn("detail");
 	 $('.selectpicker').selectpicker('refresh');
}

function add_eng_tr()
{
	var i = $('#tb_eng tbody tr:last').attr('id');
	i++;
	var trhtml ='<tr id="'+i+'">';
		trhtml +='<td><input type="checkbox" class="cbsmodal_eng" ></td>';
		trhtml +='<td>';
		trhtml +='<div class="form-group">';
		trhtml +='<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
		trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
		trhtml +='<option style="font-size:12px;" value="">นาย A</option> ';
		trhtml +='<option style="font-size:12px;" value="">นาย B</option> ';
		trhtml +='</select>';
		trhtml +='<div class="help-block with-errors"></div>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td>';
		trhtml +='<div class="form-group">';
		trhtml +='<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
		trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
		trhtml +='<option style="font-size:12px;" value="">หัวหน้าช่าง</option> ';
		trhtml +='<option style="font-size:12px;" value="">ช่างผู้ปฏิบัติงาน</option> ';
		trhtml +='</select>';
		trhtml +='<div class="help-block with-errors"></div>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td>';
		trhtml +='<div class="input-group" style="z-index:99999  !important;">';
		trhtml +='<input type="text" name="startdate" id="startdate'+i+'" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td>';
		trhtml +='<div class="input-group" style="z-index:99999  !important;">';
		trhtml +='<input type="text" name="enddate" id="enddate'+i+'" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td><textarea class="form-control" style="padding:5px; margin:0;"></textarea></td>';
		trhtml +='</tr>';
 	$('#tb_eng tbody').append(trhtml);
  	click_checkbox_all('cballmodal_eng','cbsmodal_eng','tb_eng');
  	checkbox_check_all('cballmodal_eng','cbsmodal_eng');
 	sumtotal();
 	showhideBtn("eng");
 	$('.selectpicker').selectpicker('refresh');
 	datetimepiker_control(i);
}

function add_product_tr()
{
	var trhtml ='<tr class="sub">';
 	 	trhtml +='<td><input type="checkbox" class="cbsmodal_product"></td>';
		trhtml +='<td>';
		trhtml +='<div style="width:30%;float:left">';
		trhtml +='<input type="text" name="part[]" value="PPPPP" class="form-control">';
		trhtml +='</div>';
		trhtml +='<b style="padding-top:0px;font-size:20px;float:left"> - </b>';
		trhtml +='<div style="width:39%;float:left">';
		trhtml +='<input type="text" name="serial[]" value="SSYYLXXX" class="form-control">';
		trhtml +='</div>';
		trhtml +='<b style="padding-top:0px;font-size:20px;float:left"> - </b>';
		trhtml +='<div style="width:25%;float:right">';
		trhtml +='<input type="text" name="version[]" value="VVVV" class="form-control">';
		trhtml +='</div> ';
		trhtml +='</td>';
		trhtml +='<td><input type="text" class="form-control" name="telephone" value=""></td>';
		trhtml +='<td><input type="text" class="form-control" name="telephone" value=""></td>';
		trhtml +='<td><input type="text" class="form-control" name="telephone" value=""></td>';
		trhtml +='<td><input type="text" class="form-control" name="telephone" value=""></td>';
		trhtml +='<td><input type="text" class="form-control" name="telephone" value=""></td>';
		trhtml +='</tr>';
 	$('#tb_product tbody').append(trhtml);
  	click_checkbox_all('cballmodal_product','cbsmodal_product','tb_product');
  	checkbox_check_all('cballmodal_product','cbsmodal_product');
 	sumtotal();
 	showhideBtn("product");
 	$('.selectpicker').selectpicker('refresh');
}


function showhideBtn(x)
{
	var trtotal=$('#tb_'+x+' tbody tr').length;
 	 if(trtotal>4)
 	 	{
 	 	$('div.footer_table_'+x).show();
  		}else
 		{
 		$('div.footer_table_'+x).hide();
 		}
}

function click_transport_radio()
{
	$('.optradio').on('click',function(){
		if($(this).val()==4){
		$('#other_transport').attr('readonly',false);
	   }else{
	   	$('#other_transport').attr('readonly',true);
	   }
	});
}

function click_checkbox_all(_id,_class,_tb)
{
  $('#'+_id).on('click',function(){
    var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].'+_class).prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#'+_tb+' tr.sub').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr.sub').removeAttr('style','background-color: #ECFFB3;');
      }
  });

  $('#'+_tb+' tbody tr .'+_class).on('click',function(){
    var cb_status = $(this).is(':checked');
    var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#'+_tb+' tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
      }

  });

}

 function checkbox_check_all(_id,_class)
  {
    $('input[type="checkbox"].'+_class).each(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
        }
    });

     $('input[type="checkbox"].'+_class).click(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
        }
    });
  }

function sumtotal()
{
	var grand_total_qty=0;
	    $('.tclaim_amount').each(function(){
	       var val = $(this).val();
	       if(!val){val=0;}
	       grand_total_qty += parseFloat(val);
	    });
	$('#tclaim_total').val(grand_total_qty);
}

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
	                url: '<?php echo base_url(); ?>ctl_memp/saveadd/',
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
<div class="row form_input" style="text-align:left;">
	<div class="col-md-2">
		<p>เลขที่ใบจองช่าง</p>
		<input type="text" class="form-control" name="telephone" readonly value="RS-20150001">
	</div>
	<div class="col-md-2">
		<p>เลขที่ใบเปิดงานสำรวจสถาที่</p>
		<input type="text" class="form-control" name="telephone" style="background-color:#81BEF7; color:#ffffff;" value="-สร้างโดยระบบ-" readonly>
	</div>
	<div class="col-md-2">
		<p>วันที่เปิดงานสำรวจสถาที่</p>
	    <div class="input-group" style="z-index:99999  !important;">
	    <input type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
	    </div>
	</div>
  	<div class="col-md-3" style="text-align:left;">
    	<p>ประเภทการปฏิบัติงาน</p><p class="required">*</p>
    	<div class="form-group">
      	<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				<option style="font-size:12px;" value="">Standrd</option> 
				<option style="font-size:12px;" value="">Special</option> 
	      </select>
      <div class="help-block with-errors"></div>
    	</div>
  	</div>
  	<div class="col-md-3" style="text-align:left;">
    	<p>ลำดับงาน</p><p class="required">*</p>
    	<div class="form-group">
      	<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				<option style="font-size:12px;" value="">Routine</option> 
				<option style="font-size:12px;" value="">Priority</option> 
				<option style="font-size:12px;" value="">Urgent</option> 
	      </select>
      <div class="help-block with-errors"></div>
    	</div>
  	</div>
</div>

<div class="row form_input" style="text-align:left;"> 
	<div class="col-md-6">
		<fieldset>
			<legend>ข้อมูลบริษัทหลัก</legend>     
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-7">
					<p>ชื่อบริษัท</p>
					<select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
						<option style="font-size:12px;" value="">----เลือก----</option>
						<option style="font-size:12px;" value="1">THAINOLOGY</option> 
						<option style="font-size:12px;" value="2" selected>TNLG</option> 
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">    
						<p>ชื่อผู้ติดต่อ</p>
						<input type="text" class="input form-control" name="telephone" ID="memp_com" value="นาย A">
					</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-7">
					<p>ที่อยู่บริษัท</p>
					<textarea class="form-control" ID="adr_com" style="height: 100px; padding:5px;">1346 (ห้อง 3) หมู่ 2 ซ.เบญจพล1(เทพารักษ์ 88) ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ 10270</textarea>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">
						<p>เบอร์โทรศัพท์</p>
						<input type="text" class="input form-control" ID="call_com" name="telephone" value="0812345678">
					</div>
					<div class="row form_input" style="text-align:left; margin:0;">
						<p>Fax.</p>
						<input type="text" class="input form-control" ID="fax_com" name="telephone" value="02345678">
					</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-7">
					<p>ชื่อจังหวัด</p> 
					<select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
						<option style="font-size:12px;" value="">----เลือก----</option>
						<option style="font-size:12px;" value="1" selected>กรุงเทพมหานคร</option> 
						<option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">    
						<p>ชื่ออำเภอ/เขต</p>
						<select name="AMPHUR_ID1" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก">
							<option style="font-size:12px;" value="" selected>บางกะปิ</option>
						</select>
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>
		</fieldset>
	</div>    

	<div class="col-md-6">
		<fieldset>
			<legend>ข้อมูลไซต์งาน</legend>     
			<div class="row form_input" style="text-align:left; margin-top:-20px; ">
				<div class="col-md-12">
					<input type="checkbox" id="chk_com_sit"> สถานที่เดียวกับบริษัทหลัก
				</div>
			</div> 
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-7">
					<p>สถานที่ไซต์งาน</p><p class="required">*</p>
					<select name="id_mcmp_sit" ID="selmcmp_sit" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
						<option style="font-size:12px;" value="" selected>----เลือก----</option>
						<option style="font-size:12px;" value="1">THAINOLOGY</option> 
						<option style="font-size:12px;" value="2">TNLG</option> 
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">
						<p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
						<input type="text" class="input form-control" name="telephone" ID="memp_sit">
					</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-7">
					<p>ที่อยู่ใซต์งาน</p><p class="required">*</p>
					<textarea class="form-control" style="height: 100px; padding:5px;" ID="adr_sit"></textarea>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">
						<p>เบอร์โทรศัพท์</p><p class="required">*</p>
						<input type="text" class="input form-control" name="telephone" ID="call_sit">
					</div>
					<div class="row form_input" style="text-align:left; margin:0;">
						<p>Fax.</p><p class="required">*</p>
						<input type="text" class="input form-control" name="telephone" ID="fax_sit">
					</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left; margin:0;">
				<div class="col-md-4">
					<p>ชื่อจังหวัด</p>
					<select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
						<option style="font-size:12px;" value="" selected>----เลือก----</option>
						<option style="font-size:12px;" value="1">กรุงเทพมหานคร</option> 
						<option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-md-3">
					<p>พื้นที่บริการ</p>
					<select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
						<option style="font-size:12px;" value="" selected>----เลือก----</option>
						<option style="font-size:12px;" value="1">1</option> 
						<option style="font-size:12px;" value="2">2</option> 
						<option style="font-size:12px;" value="3">3</option> 
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-md-5">
					<div class="row form_input" style="text-align:left; margin:0;">    
						<p>ชื่ออำเภอ/เขต</p><p class="required">*</p>
						<select name="AMPHUR_ID2" ID="AMPHUR_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
							<option style="font-size:12px;" value="" selected>----เลือก----</option>
							<option style="font-size:12px;" value="1">เขตดุสิต</option> 
							<option style="font-size:12px;" value="2">เขตดอนเมือง</option>
						</select>
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>    
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<fieldset >
			<legend>ข้อมูลผลิตภัณฑ์</legend>
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-3">
					<div class="add add_product" style="margin-bottom:10px; margin-right:10px;">
				    	+ เพิ่มรายการ
					</div>
					<div class="add del_product" style="margin-bottom:10px;">
				    	- ลบรายการ
					</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left;">
				<div class="col-md-12">
				 <table class="table table-striped" id="tb_product" style="margin:0px; padding:0px; width:100%" >
				 	<thead>
					 	<tr>
					 		<th width="1%"><input type="checkbox" id="cballmodal_product" ></th>
					 		<th width="25%">เลขที่ผลิตภัณฑ์</th>
					 		<th width="15%">Issue</th>
					 		<th width="15%">Model</th>
					 		<th width="15%">Brand</th>
					 		<th width="15%">Product Type</th>
					 		<th width="15%">Rated Power</th>
					 	</tr>
				 	</thead>
				 	<tbody>
					 	<tr class="0">
					 		<td></td>
					 		<td>
								<div style="width:30%;float:left">
									<input type="text" name="part[]" value="PPPPP" class="form-control">
								</div>
								<b style="padding-top:0px;font-size:20px;float:left"> - </b>
								<div style="width:39%;float:left">
									<input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
								</div>
								<b style="padding-top:0px;font-size:20px;float:left"> - </b>
								<div style="width:25%;float:right">
									<input type="text" name="version[]" value="VVVV" class="form-control">
								</div> 
					 		</td>
					 		<td><input type="text" class="form-control" name="telephone" value=""></td>
					 		<td><input type="text" class="form-control" name="telephone" value=""></td>
					 		<td><input type="text" class="form-control" name="telephone" value=""></td>
					 		<td><input type="text" class="form-control" name="telephone" value=""></td>
					 		<td><input type="text" class="form-control" name="telephone" value=""></td>
					 	</tr>
				 	</tbody>
				 </table>	
				</div>	
			</div>	
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-6">
		<fieldset>
			<legend>แผนผังสถานที่ติดตั้ง</legend>
				<div class="col-md-12" style="margin-top:-22px;">
					<input type="file" title="Search for a file to add">
				</div>
				<div class="col-md-12" style="text-align:center; height:200px;">
					<div style="width:100%;height:100%;margin:auto;"><object data="<?php echo base_url(); ?>pd.pdf#navpanes=1&amp;view=FitV&amp;pagemode=thumbs" type="application/pdf" height="100%" width="100%"></object></div>
				</div>
		</fieldset>
	</div>
	<div class="col-md-6">
		<fieldset>
			<legend>Single line diagram</legend>
				<div class="col-md-12" style="margin-top:-22px;">
					<input type="file" title="Search for a file to add">
				</div>
				<div class="col-md-12" style="text-align:center; height:200px;">
					<div style="width:100%;height:100%;margin:auto;"><object data="<?php echo base_url(); ?>pdf/testpdf.pdf#navpanes=1&amp;view=FitV&amp;pagemode=thumbs" type="application/pdf" height="100%" width="100%"></object></div>					
				</div>
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<fieldset >
			<legend>อุปกรณ์ติดตั้ง</legend> 
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-12">
					<input type="radio" name="type" class="rdo_install" id="standard"> Standard <input type="radio" name="type" class="rdo_install" id="special"> Special
				</div>
			</div>
			<div class="row form_input divequip_standard" style="text-align:left; margin-top:-25px; display:none;">
				<div class="col-md-12">
					<input type="text" class="form-control" name="" >
				</div>
			</div>
			<div class="divequip_special" style="display:none;">
				<div class="row form_input" style="text-align:left;">
					<div class="col-md-3">
					<div class="add add_equip" style="margin-bottom:10px; margin-right:10px;">
					    + เพิ่มรายการ
					</div>
					<div class="add del_equip" style="margin-bottom:10px;">
					    - ลบรายการ
					</div>
					</div>
				</div>
				<div class="row form_input" style="text-align:left;">
					<div class="col-md-12">
					 <table class="table table-striped" id="tb_equip" style="margin:0px; padding:0px;" >
					 	<thead>
					 	<tr>
					 		<th width="1%"><input type="checkbox" id="cballmodal_equip" ></th>
					 		<th width="35%">Part No.</th>
					 		<th width="35%">Part Name</th>
					 		<th width="10%">Unit</th>
					 		<th width="19%">Q'ty</th>
					 	</tr>
					 	</thead>
					 	<tbody>
					 	<tr>
					 		<td><input type="checkbox" class="cbsmodal_equip" ></td>
					 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
					 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
					 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
					 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
					 	</tr>
					 	</tbody>
					 </table>	
					</div>	
				</div>
				<div class="row form_input footer_table_equip" style="display:none;">
					<div class="col-md-3">
						<div class="add add_equip" style="margin-bottom:10px; margin-right:10px;">
						    + เพิ่มรายการ
						</div>
						<div class="add del_equip" style="margin-bottom:10px;">
						    - ลบรายการ
						</div>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<fieldset >
			<legend>รายละเอียดโหลด</legend> 
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-3">
				<div class="add add_detail" style="margin-bottom:10px; margin-right:10px;">
				    + เพิ่มรายการ
				</div>
				<div class="add del_detail" style="margin-bottom:10px;">
				    - ลบรายการ
				</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left;">
				<div class="col-md-12">
				 <table class="table table-striped" id="tb_detail" style="margin:0px; padding:0px; width:100%" >
				 	<thead>
				 	<tr>
				 		<th width="1%"><input type="checkbox" id="cballmodal_detail" ></th>
				 		<th width="70%">รายการ (กรุณากรอกรายละเอียดให้ครบถ้วน)</th>
				 		<th width="29%">กำลังไฟฟ้า (W)</th>
				 	</tr>
				 	</thead>
				 	<tbody>
				 	<tr>
				 		<td><input type="checkbox" class="cbsmodal_detail" ></td>
				 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
				 		<td> <input type="text" class="form-control" name="namemodel[]" ></td>
				 	</tr>
				 	</tbody>
				 </table>	
				</div>	
			</div>	
			<div class="row form_input footer_table_detail" style="display:none;">
				<div class="col-md-3">
					<div class="add add_detail" style="margin-bottom:10px; margin-right:10px;">
					    + เพิ่มรายการ
					</div>
					<div class="add del_detail" style="margin-bottom:10px;">
					    - ลบรายการ
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<fieldset >
			<legend>ช่างผู้ดำเนินการ</legend> 
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-3">
				<div class="add add_eng" style="margin-bottom:10px; margin-right:10px;">
				    + เพิ่มรายการ
				</div>
				<div class="add del_eng" style="margin-bottom:10px;">
				    - ลบรายการ
				</div>
				</div>
			</div>
			<div class="row form_input" style="text-align:left;">
				<div class="col-md-12">
				 <table class="table table-striped" id="tb_eng" style="margin:0px; padding:0px; width:100%" >
				 	<thead>
				 	<tr>
				 		<th width="1%"><input type="checkbox" id="cballmodal_eng" ></th>
				 		<th width="20%">ชื่อช่าง</th>
				 		<th width="15%">ตำแหน่ง</th>
				 		<th width="20%">วันที่ดำเนินงาน</th>
				 		<th width="20%">วันที่ดำเงินงานเสร็จ</th>
				 		<th width="24%">สรุปผลการปฏิบัติงาน</th>
				 	</tr>
				 	</thead>
				 	<tbody>
				 	<tr id="0">
				 		<td><input type="checkbox" class="cbsmodal_eng" ></td>
				 		<td>			
				 			<div class="form-group">
								<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
							   <option style="font-size:12px;" value="">----เลือก----</option>
						    	<option style="font-size:12px;" value="" selected>นาย A</option> 
						    	<option style="font-size:12px;" value="">นาย B</option> 
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</td>
				 		<td>			
				 			<div class="form-group">
								<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
							   <option style="font-size:12px;" value="">----เลือก----</option>
						    	<option style="font-size:12px;" value="">หัวหน้าช่าง</option> 
						    	<option style="font-size:12px;" value="">ช่างผู้ปฏิบัติงาน</option> 
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</td>
				 		<td>
				 			<div class="input-group" style="z-index:99999  !important;">
								<input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</td>
				 		<td>
				 			<div class="input-group" style="z-index:99999  !important;">
								<input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</td>
				 		<td><textarea class="form-control" style="padding:5px; margin:0;"></textarea></td>
				 	</tr>
				 	</tbody>
				 </table>	
				</div>	
			</div>	
			<div class="row form_input footer_table_eng" style="display:none;">
				<div class="col-md-3">
					<div class="add add_eng" style="margin-bottom:10px; margin-right:10px;">
					    + เพิ่มรายการ
					</div>
					<div class="add del_eng" style="margin-bottom:10px;">
					    - ลบรายการ
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<fieldset >
			<legend>สรุปผลการปฏิบัติงาน</legend> 
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-12">
					<input type="radio" name="type" class="rdo_summary" id="Accept"> Accept <input type="radio" name="type" class="rdo" id="Unaccept"> Un Accept
				</div>
			</div>
			<div class="row form_input" style="text-align:left; margin-top:-25px;">
				<div class="col-md-12">
					<input type="text" class="form-control" name="" >
				</div>
			</div>
		</fieldset>
	</div>
</div>

<div class="row form_input" style="text-align:left;">
	<div class="col-md-12">
		<p>หมายเหตุ</p>
		<textarea class="form-control" style="padding:5px; margin:0;"></textarea>
	</div>
</div>

<div class="row form_input" style="margin-top:10px;">
	<div class="col-md-12" style="text-align:left;">
		<p>สถานะ</p>  
			<input type="radio"  name="status" value="1"  disabled checked=checked> ในประกัน
			<input type="radio"  name="status" value="2" disabled >  นอกประกัน  
			<input type="radio"  name="status" value="0" disabled >  ยกเลิกการรับประกัน 
	</div>
</div>
<div class="row form_input" style="margin-top:10px;">
	<div class="col-md-3" style="text-align:left;">
		<p>ผู้สร้าง : <?php echo $memp_name; ?></p>  
	</div>
	<div class="col-md-3" style="text-align:left;">
		<p>วันที่สร้าง : <?php echo $datefrom; ?></p>   
	</div>
	<div class="col-md-3" style="text-align:left;">
		<p>ผู้แก้ไขล่าสุด : <?php echo $memp_name; ?></p>    
	</div>
	<div class="col-md-3" style="text-align:left;">
		<p>วันที่แก้ไขล่าสุด : <?php echo $dateto; ?></p> 
	</div>
</div>