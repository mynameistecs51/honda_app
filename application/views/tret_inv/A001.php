<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
	click_transport_radio();
	checkbox_check_all();
	click_control();
	select_control();
	sumtotal();
	saveData();
	showhideBtn();
  testData();

  select_province('PROVINCE_ID1','AMPHUR_ID1');
  select_province('PROVINCE_ID2','AMPHUR_ID2');

 });

function testData()
{
    $('#cm').on('change',function(){
       run_auto();
    })

    $('#selmcmp').on('change', function(){   
    var id_mcmp= $(this).val();
    if(id_mcmp==1){
      $('#memp_com').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_com').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_com').val("0821428742");
      $('#fax_com').val("027549336");
    }else{
      $('#memp_sit').val("");
      $('#adr_sit').val("");
      $('#call_sit').val("");
      $('#fax_sit').val("");
    }
  });

  $('#selmcmp_sit').on('change', function(){   
    var id_mcmp= $(this).val();
    if(id_mcmp==1){
      $('#memp_sit').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_sit').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_sit').val("0821428742");
      $('#fax_sit').val("027549336");
    }else{
      $('#memp_sit').val("");
      $('#adr_sit').val("");
      $('#call_sit').val("");
      $('#fax_sit').val("");
    }
  });

    $('#chk_com_sit').on('click', function(){   
    if($('input[type="checkbox"]#chk_com_sit').is(':checked'))
    { 
      var id = $('#selmcmp').val();
      if(id != ""){ 
        $('#selmcmp_sit option[value="'+id+'"]').prop('selected',true);
        $('#memp_sit').val($('#memp_com').val());
        $('#adr_sit').val($('#adr_com').val());
        $('#call_sit').val($('#call_com').val());
        $('#fax_sit').val($('#fax_com').val());
        $('.selectpicker').selectpicker('refresh');
      }else{
        alert('กรุณาเลือก : ชื่อบริษัทที่ติดตั้ง');
        $('input[type="checkbox"]#chk_com_sit').prop('checked',false);
        $('#selmcmp_sit option[value=""]').prop('selected',true);
        $('#memp_sit').val("");
        $('#adr_sit').val("");
        $('#call_sit').val("");
        $('#fax_sit').val("");
        $('.selectpicker').selectpicker('refresh');
      }
    }else{
      $('#selmcmp_sit option[value=""]').prop('selected',true);
        $('#memp_sit').val("");
        $('#adr_sit').val("");
        $('#call_sit').val("");
        $('#fax_sit').val("");
        $('.selectpicker').selectpicker('refresh');
    }
  });

  $('#selsn').on('change', function(){
  if($('#selsn').val()==1)
  {
    $('#memp_com,#memp_sit').val("ดิษฐพงษ์ นิลนามะ");
    $('#adr_com,#adr_sit').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
    $('#call_com,#call_sit').val("0821428742");
    $('#fax_com,#fax_sit').val("027549336");
    $('#gen').val("Barth RS5kp");
    $('#sn').val("SN1500001");
    $('#brand').val("CHUPHOTIC");
    $('#dateCpm').val("01/09/2558");
    $('#selmcmp option[value="1"]').prop('selected',true); 
    $('#selmcmp_sit option[value="1"]').prop('selected',true); 
    $('#selwrt option[value="3"]').prop('selected',true); 
    $('#chk_com_sit').prop('checked',true);
    $('.selectpicker').selectpicker('refresh');
  }else{
    $('#memp_com,#memp_sit').val("");
    $('#adr_com,#adr_sit').val("");
    $('#call_com,#call_sit').val("");
    $('#fax_com,#fax_sit').val("");
    $('#gen').val("");
    $('#sn').val("");
    $('#brand').val("");
    $('#dateCpm').val("");
    $('#selmcmp option[value=""]').prop('selected',true);  
    $('#selmcmp_sit option[value=""]').prop('selected',true);
    $('#selwrt option[value=""]').prop('selected',true);
    $('#chk_com_sit').prop('checked',false);
    $('.selectpicker').selectpicker('refresh');
  }
  });
}

function run_auto()
  {
      $('#selsn option[value="1"]').prop('selected',true);
      $('#sn').val('SN15070001');
      $('#snbrand option[value="1"]').prop('selected',true);
      $('#sntype option[value="1"]').prop('selected',true);
      $('#snmodel option[value="1"]').prop('selected',true);
      $('#selmcmp option[value="1"]').prop('selected',true);
      $('#selmcmp_sit option[value="1"]').prop('selected',true);
      $('.selectpicker').selectpicker('refresh');
      $('#chk_com_sit').prop('checked',true);
      $('#memp_com').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_com').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_com').val("0821428742");
      $('#fax_com').val("027549336");
      $('#memp_sit').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_sit').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_sit').val("0821428742");
      $('#fax_sit').val("027549336");
      $('#tstock_mitm option[value="1"]').prop('selected',true);
      $('#tstock_mitm_name').val();
      $('#tstock_msku option[value="1"]').prop('selected',true);

  }

function select_province(_province,_amphur)
{
    get_sel_province(_province);
    $('#'+_province+'').on('change', function(){
    get_sel_amphur(_amphur,_province);
      $('#'+_amphur+'').prop('disabled',false);
  });
}

function get_sel_province(_province)
{
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>index.php/tclaim/get_sel_province/',
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
        url: '<?php echo base_url(); ?>tclaim/get_sel_amphur/',
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


function click_control()
{
  $('.addclaim').on('click', function(){   
    var tr = $('table#tb_tret_inv tbody tr:last').clone();
    $(tr).find('input:text.sn').val('');
    $('#tb_tret_inv tbody').append(tr);
    click_tbclaim_checkbox();
    checkbox_check_all();
    sumtotal();
    showhideBtn();
  });

  $('.delclaim').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_tret_inv tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_tret_inv tbody tr').remove();
                  add_tr();
                  sumtotal();
                  showhideBtn();
               }
         }  
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

function add_tr()
{
	var trhtml ='<tr>';
      trhtml +='<td><input type="checkbox" class="cbsmodal"></td>';
      trhtml +='<td>'; 
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">85261FJ121</option> ';
      trhtml +='<option style="font-size:12px;" value="2">2488115885</option>';
      trhtml +='<option style="font-size:12px;" value="2">2316598451</option>  ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div> ';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">VGI6W-FD528-DKO7X-2GNDB</option> ';
      trhtml +='<option style="font-size:12px;" value="2">DEFRE-55532-DKO7X-RREEW</option>';
      trhtml +='<option style="font-size:12px;" value="2">KITPR-FPROM-88787-D85DF</option>  ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div> ';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<input type="text" name="" value=""   class="form-control">   ';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div> ';
      trhtml +='</td> ';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<input type="text" name="" value=""   class="form-control">   ';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div> ';
      trhtml +='</td>   ';
      trhtml +='<td><input type="text" class="input form-control tclaim_amount" name="amount[]" value="1"style="text-align:right;"></td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">เครื่อง</option> ';
      trhtml +='<option style="font-size:12px;" value="2">ก้อน</option>';
      trhtml +='<option style="font-size:12px;" value="2">ชิ้น</option>  ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div> ';
      trhtml +='</td>';
      trhtml +='<td><input type="text" class="input form-control" name="namesn_new[]"></td> ';
 	    trhtml +='</tr>';
 	 $('#tb_tret_inv tbody').append(trhtml);
 	 click_tbclaim_checkbox();
 	 checkbox_check_all();
 	 sumtotal();
 	 showhideBtn();
 	 $('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
	var trtotal=$('#tb_tret_inv tbody tr').length;
 	 if(trtotal>4)
 	 	{
 	 	$('div.footer_table').show();
  		}else
 		{
 		$('div.footer_table').hide();
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

function click_tbclaim_checkbox()
{
	$('#cballmodal').on('click',function(){
		var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].cbsmodal').prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#tb_tret_inv tbody tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_tret_inv tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
	});

	$('#tb_tret_inv tbody tr .cbsmodal').on('click',function(){
		var cb_status = $(this).is(':checked');
		var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#tb_tret_inv tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_tret_inv tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
      }
	});


}

 function checkbox_check_all()
  {
    $('input[type="checkbox"].cbsmodal').each(function(){
        var all_count=$('.cbsmodal').length;
        var now_count=$('input[type="checkbox"].cbsmodal:checked').length;
        if(now_count < all_count)
        {
          $('#cballmodal').prop('checked',false);
        }
        else
        {
          $('#cballmodal').prop('checked',true);
        }
    });

     $('input[type="checkbox"].cbsmodal').click(function(){
        var all_count=$('.cbsmodal').length;
        var now_count=$('input[type="checkbox"].cbsmodal:checked').length;
        if(now_count < all_count)
        {
          $('#cballmodal').prop('checked',false);
        }
        else
        {
          $('#cballmodal').prop('checked',true);
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
 <div class="row form_input">
    <div class="col-md-3" style="text-align:left;">
        <p>ประเภทงาน</p>
        <div class="form-group">
        <p class="required">*</p>
         <select id="jobtype" name="jobtype" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">ติดตั้ง</option> 
            <option style="font-size:12px;" value="2">ซ่อม</option>
            <option style="font-size:12px;" value="3">เคลม</option>  
          </select> 
        </div> 
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>เลขที่ใบเปิดงานซ่อมเครื่องลูกค้า</p>
      <p class="required">*</p><div class="form-group">
         <select id="cm" name="cm" data-show-subtext="true" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1" data-subtext="บริษัท THAINOLOGY">CM-20150001</option> 
            <option style="font-size:12px;" value="2" data-subtext="บริษัท TNLG">CM-20150002</option> 
         </select>
     <div class="help-block with-errors"></div>
  </div>
    </div>
  </div>

<div class="row form_input" style="text-align:left;">
    <div class="col-md-3">
      <p>รหัสผลิตภัณฑ์ [S/N]</p>
      <input type="text" class="form-control" name="SN" id="sn" readonly="true">
    </div>
    <div class="col-md-3">
      <p>Brand</p>
      <div class="form-group">
        <select id="snbrand" name="snbrand" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">Brand A</option> 
            <option style="font-size:12px;" value="2">Brand B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-3">
      <p>Type</p>
      <div class="form-group">
        <select id="sntype" name="sntype" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">Type A</option> 
            <option style="font-size:12px;" value="2">type B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-3">
      <p>รุ่น</p>
      <div class="form-group">
        <select id="snmodel" name="snmodel" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">รุ่น A</option> 
            <option style="font-size:12px;" value="2">รุ่น B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>


<div class="row form_input">
    <div class="col-md-3" style="text-align:left;">
      <p>เลขที่ใบ<?php echo "$pagename";?></p>
             <input type="text" name="" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true">  
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>วันที่-เวลา<?php echo "$pagename";?></p>     
      <div class="input-group" style="z-index:8  !important;">
        <input type="text" name="docdate" id="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
   <div class="col-md-3" style="text-align:left;">
        <p>แผนกที<?=$pagename?></p>
        <div class="form-group">
        <input type="text" name="" value="Admin Service" readonly="true" class="form-control"> 
        </div> 
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>ชื่อผู้<?=$pagename?></p>
        <div class="form-group">
        <input type="text" name="" value="พุฒิพงศ์ ห้วงน้ำ" readonly="true" class="form-control"> 
        </div> 
    </div>
    <div class="col-md-6" style="text-align:left;">
    </div>
</div>



<div class="row form_input" style="text-align:left;"> 
<div class="col-md-6">
<fieldset>
<legend>ข้อมูลบริษัทหลัก</legend>     
  <div class="row form_input" style="text-align:left; margin:0;">
  <div class="col-md-7">
    <p>ชื่อบริษัทที่ติดตั้ง</p><p class="required">*</p> 
      <select name="id_mcmp" ID="selmcmp"  class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1" >THAINOLOGY</option> 
        <option style="font-size:12px;" value="2" >TNLG</option> 
     </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="col-md-5">
    <div class="row form_input" style="text-align:left; margin:0;">    
    <p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
    <input type="text" class="input form-control" name="telephone" ID="memp_com" >
  </div>
  </div>
</div>
<div class="row form_input" style="text-align:left; margin:0;">
  <div class="col-md-7">
    <p>ที่อยู่บริษัท</p><p class="required">*</p>
    <textarea class="form-control" ID="adr_com" style="height: 100px; padding:5px;"></textarea>
  </div>
  <div class="col-md-5">
    <div class="row form_input" style="text-align:left; margin:0;">
      <p>เบอร์โทรศัพท์</p><p class="required">*</p>
      <input type="text" class="input form-control" ID="call_com" name="telephone" >
    </div>
    <div class="row form_input" style="text-align:left; margin:0;">
      <p>Fax.</p>
      <input type="text" class="input form-control" ID="fax_com" name="telephone" >
    </div>
  </div>
  </div>

  <div class="row form_input" style="text-align:left; margin:0;">
  <div class="col-md-7">
    <p>ชื่อจังหวัด</p> 
      <select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
     </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="col-md-5">
    <div class="row form_input" style="text-align:left; margin:0;">    
    <p>ชื่ออำเภอ/เขต</p>
    <select name="AMPHUR_ID1" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
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
          <input type="checkbox" id="chk_com_sit"> สถานที่เดียวกันกับบริษัทหลัก
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
            <p>Fax.</p>
            <input type="text" class="input form-control" name="telephone" ID="fax_sit">
          </div>
        </div>
      </div>

        <div class="row form_input" style="text-align:left; margin:0;">
  <div class="col-md-7">
    <p>ชื่อจังหวัด</p> 
     <select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
     </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="col-md-5">
    <div class="row form_input" style="text-align:left; margin:0;">    
    <p>ชื่ออำเภอ/เขต</p>
    <select name="AMPHUR_ID2" ID="AMPHUR_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
     </select>
    <div class="help-block with-errors"></div>
  </div>
  </div>
</div>  
    </fieldset>
    </div>
</div>

<div class="row form_input">
    <div class="col-md-12" style="text-align:left;">
      <p>หมายเหตุ</p>
      <textarea class="form-control"></textarea>
    </div>
</div>


    <div class="row form_input header_table" style="margin-top:20px;">
    <div class="col-md-3">
    <div class="add addclaim" style="margin-bottom:10px; margin-right:10px;">
        + เพิ่มรายการ
    </div>
    <div class="add delclaim" style="margin-bottom:10px;">
        - ลบรายการ
    </div>
    </div>

<div class="col-md-12">
 <table class="table table-striped" id="tb_tret_inv">
 	<thead>
  <tr>
    <th width="1%"><input type="checkbox" id="cballmodal"></th>
    <th width="19%">รหัสอะไหล่</th>
    <th width="25%">ชื่ออะไหล่</th>  
    <th width="10%">หน่วยนับ</th>
    <th width="10%">จำนวน</th>
    <th width="19%">หมายเหตุ</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td><input type="checkbox" class="cbsmodal"></td>
    <td><p class="required">*</p><div class="form-group">
         <select name="tstock_mitm[]" id="tstock_mitm" class="selectpicker show-tick form-control input-sm tstock_mitm"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" selected>--ค้นหา--</option>
            <option style="font-size:12px;" value="1">AAA-0001</option> 
            <option style="font-size:12px;" value="2">BBB-0002</option> 
         </select>
      <div class="help-block with-errors"></div>
    </div></td>
    <td><p class="required">*</p><input type="text" id="tstock_mitm_name" class="form-control" value="" readonly="true"></td>
    <td>
    <div class="form-group col-md-15">
     <select name="tstock_msku" id="tstock_msku" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1">เครื่อง</option> 
        <option style="font-size:12px;" value="2">ก้อน</option>
     </select>
    <div class="help-block with-errors"></div>
    </div> 
    </td>
    <td><p class="required">*</p><input type="text" class="form-control amount" name="amount[]"style="text-align:right;" required="true"></td>
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
  </tr>
  </tbody>
     	<tfoot>
     	<tr>
     		<th colspan="9" style="text-align:right;"> </th> 
     	</tr>
     	</tfoot>
 </table>	
</div>	
</div>

<div class="row form_input footer_table" style="display:none;">
<div class="col-md-3">
<div class="add addclaim" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
</div>
<div class="add delclaim" style="margin-bottom:10px;">
    - ลบรายการ
</div>
</div>
</div>