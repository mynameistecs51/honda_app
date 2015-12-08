<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style> 
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบ<?php echo $pagename; ?></p><p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="TREQD-58080001"  class="form-control"  readonly="true" >     
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่แจ้ง</p>
  <p class="required">*</p>
  <input type="text" name="name_req[]" id="name_req" value="Call Center" class="form-control" readonly="true">
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้แจ้ง</p> 
  <p class="required">*</p> 
  <input type="text" name="call_req[]" id="call_req" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="true">  
</div>    
</div>

<div class="row form_input" style="text-align:left;"> 
<div class="col-md-6">
      <fieldset>
      <legend>ข้อมูลบริษัทหลัก</legend>     
        <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ชื่อบริษัทหลัก</p><p class="required">*</p> 
            <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
              <option style="font-size:12px;" value="" >-- เลือก --</option>
              <option style="font-size:12px;" value="1" selected>THAINOLOGY</option> 
              <option style="font-size:12px;" value="2">TNLG</option> 
           </select> 
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
          <p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
          <input type="text" class="input form-control" name="telephone" value="ดิษฐพงษ์ นิลนามะ" ID="memp_main" >
        </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p><p class="required">*</p>
          <textarea class="form-control" ID="adr_main" style="height: 100px; padding:5px;">148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>เบอร์โทรศัพท์</p><p class="required">*</p>
            <input type="text" class="input form-control" ID="call_main" name="call_main" value="0821428742">
          </div>
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>Fax.</p>
            <input type="text" class="input form-control" ID="fax_main" name="fax_main" value="027549336">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
      <div class="col-md-7">
        <p>ชื่อจังหวัด</p> 
          <select name="PROVINCE_ID1" ID="mprv_main" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
            <option style="font-size:12px;" value="">-- เลือก --</option>
            <option style="font-size:12px;" value="1" selected>สมุทรปราการ</option>  
         </select> 
      </div>
      <div class="col-md-5">
        <div class="row form_input" style="text-align:left; margin:0;">     
        <p>ชื่ออำเภอ/เขต</p>
        <select name="AMPHUR_ID1" ID="mamp_main" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
            <option style="font-size:12px;" value="">-- เลือก --</option>
            <option style="font-size:12px;" value="1" selected>เมืองสมุทรปราการ</option> 
         </select> 
      </div>
      </div>
    </div>
    </fieldset>
    </div>    

    <div class="col-md-6">
    <fieldset>
      <legend>ข้อมูลไซต์งาน</legend>     
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-12" style="margin-top:-21px;">
          <input type="checkbox" id="chk_main_site"> เลือกที่เดียวกับบริษัท
        </div>
        <div class="col-md-7">
          <p>สถานที่ไซต์งาน</p><p class="required">*</p>
          <select name="id_mcmp_site" ID="selmcmp_site" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" >
            <option style="font-size:12px;" value="" >-- เลือก --</option>
            <option style="font-size:12px;" value="1" selected>THAINOLOGY</option> 
            <option style="font-size:12px;" value="2">TNLG</option> 
          </select> 
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
          <p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
          <input type="text" class="input form-control" name="memp_site" value="ดิษฐพงษ์ นิลนามะ" ID="memp_site" >
        </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ที่อยู่ใซต์งาน</p><p class="required">*</p>
          <textarea class="form-control" ID="adr_site" style="height: 100px; padding:5px;">148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>เบอร์โทรศัพท์</p><p class="required">*</p>
            <input type="text" class="input form-control" ID="call_site" name="call_site" value="0821428742">
          </div>
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>Fax.</p>
            <input type="text" class="input form-control" ID="fax_site" name="fax_site" value="027549336">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
      <div class="col-md-7">
        <p>ชื่อจังหวัด</p> 
          <select name="mprv_site" ID="mprv_site" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" >-- เลือก --</option>
            <option style="font-size:12px;" value="1" selected>สมุทรปราการ</option>  
         </select> 
      </div>
      <div class="col-md-5">
        <div class="row form_input" style="text-align:left; margin:0;">    
        <p>ชื่ออำเภอ/เขต</p>
        <select name="mamp_site" ID="mamp_site" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" >-- เลือก --</option>
            <option style="font-size:12px;" value="1" selected>เมืองสมุทรปราการ</option> 
         </select> 
      </div>
      </div>
    </div>
    </fieldset>
    </div>
</div>
 
 <div style="overflow-x:scroll;overflow-y: hidden;"> 
<div class="row form_input header_table"> 
<div class="col-md-12" > 
  <table class="table table-striped" id="tbdetail" style="table-layout: fixed;word-wrap: break-word;">
    <thead>
      <tr>
      <th width="30"><input type="checkbox" id="cballmodal"></th>
      <th width="50">ลำดับ</th>
      <th width="200">รายการแจ้ง</th>
      <th width="200">เลขที่ใบเบิดงานซ่อมผลิตภัณฑ์</th>
      <th width="200">เลขที่ใบ DR</th>
      <th width="200">เลขที่ใบรับส่งผลิตภัณฑ์</th>
      <th width="280">เลขที่ผลิตภัณฑ์ [S/N]</th>  
      <th width="200">Model</th>
      <th width="200">วันที่กำหนดส่ง</th>   
      <th width="200">ประเภทการส่ง</th>
      <th width="200">ประเภทการแพ็ค</th>
      </tr>
    </thead>
    <tbody>
      <tr id="1">
      <td><input type="checkbox" class="cbdtl"></td>
      <td width="2%">1</td>
      <td><input type="text" class="form-control" name="treq[]"></td> 
      <td><input type="text" class="form-control" name="issue[]"></td>  
      <td><input type="text" class="form-control" name="dr[]"></td> 
      <td><input type="text" class="form-control" name="receive_deliver[]"></td> 
      <td class="sn1"> 
        <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">
          <option style="font-size:12px;" value="" selected>-- เลือก --</option> 
          <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option>   
        </select>  
      </td>
      <td class="medel1"></td>
      <td>
      <div class="input-group" style="z-index:9  !important;">
      <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div></td>
      <td><select name="delivery_type" id="delivery_type" class="form-control">
        <option>--เลือก--</option>
        <option selected="true">รถบริษัท</option>
        <option>รถรับจ้าง</option>
        <option>ขนส่งตา่งจังหวัด</option>
        <option>ฝ่ายบริการดำเนินการ</option>
        <option>Sub ดำเนินการ</option>
      </select></td>
      <td>
        <select name="pack_type" id="pack_type" class="form-control">
          <option>--เลือก--</option>
          <option selected="true">มาตรฐาน</option>
          <option>ขนส่งต่างจังหวัด</option>
          <option>ตีลังไม้</option>
          <option>ไม่แพ็ค</option>
        </select>
      </td> 
      </tr>
    </tbody>
  </table>    
</div> 
</div>
</div>   
<div class="row form_input" style="text-align:left; margin:0;">
<div class="col-md-6" style="text-align:left;">
    <p>หมายเหตุ</p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<script type='text/javascript'>
$(function(){  
    
    $('textarea.form-control,input.form-control').attr('readonly',true);
    $('input:radio,input:checkbox,select.form-control').attr('disabled',true);
    $('.selectpicker').selectpicker('refresh');
    $( "#treq_repair_date,#dateTrecv").datetimepicker(); 
    click_control();   
    saveData();  
 });
function click_control() 
{
  $('#selmcmp').on('change', function(){   
    var id_mcmp= $(this).val(); 
    if(id_mcmp==1){
      $('#memp_main').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_main').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_main').val("0821428742");
      $('#fax_main').val("027549336");  
      $('#mprv_main option[value="1"]').prop('selected',true);
      $('#mamp_main option[value="1"]').prop('selected',true);
    }else{
      $('#memp_main').val("");
      $('#adr_main').val("");
      $('#call_main').val("");
      $('#fax_main').val("");
      $('#mprv_main option[value=""]').prop('selected',true);
      $('#mamp_main option[value=""]').prop('selected',true);
    }
    $('.selectpicker').selectpicker('refresh');
  });

  $('#selmcmp_site').on('change', function(){   
    var id_mcmp= $(this).val();
    if(id_mcmp==1){
      $('#memp_site').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_site').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_site').val("0821428742");
      $('#fax_site').val("027549336");
      $('#mprv_site option[value="1"]').prop('selected',true);
      $('#mamp_site option[value="1"]').prop('selected',true);
    }else{
      $('#memp_site').val("");
      $('#adr_site').val("");
      $('#call_site').val("");
      $('#fax_site').val("");
      $('#mprv_site option[value=""]').prop('selected',true);
      $('#mamp_site option[value=""]').prop('selected',true);
    }
    $('.selectpicker').selectpicker('refresh');
  });

  $('#chk_main_site').on('click', function(){   
    if($('input[type="checkbox"]#chk_main_site').is(':checked'))
    { 
      var id = $('#selmcmp').val();
      if(id != ""){ 
        $('#selmcmp_site option[value="'+id+'"]').prop('selected',true);
        $('#memp_site').val($('#memp_main').val());
        $('#adr_site').val($('#adr_main').val());
        $('#call_site').val($('#call_main').val());
        $('#fax_site').val($('#fax_main').val());
        $('#mprv_site option[value="'+$('#mprv_main').val()+'"]').prop('selected',true);
        $('#mamp_site option[value="'+$('#mamp_main').val()+'"]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
      }else{
        alert('กรุณาเลือก : ชื่อบริษัทหลัก');
        $('input[type="checkbox"]#chk_main_site').prop('checked',false);
        $('#selmcmp_site option[value=""]').prop('selected',true);
        $('#memp_site').val("");
        $('#adr_site').val("");
        $('#call_site').val("");
        $('#fax_site').val("");
        $('#mprv_site option[value=""]').prop('selected',true);
        $('#mamp_site option[value=""]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
      }
    }else{
      $('#selmcmp_site option[value=""]').prop('selected',true);
        $('#memp_site').val("");
        $('#adr_site').val("");
        $('#call_site').val("");
        $('#fax_site').val("");
        $('#mprv_site option[value=""]').prop('selected',true);
        $('#mamp_site option[value=""]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
    }
  });

  $('#selsn').on('change', function(){
  if($('#selsn').val()==1)
  {
    $('#memp_main,#memp_site').val("ดิษฐพงษ์ นิลนามะ");
    $('#adr_main,#adr_site').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
    $('#call_main,#call_site').val("0821428742");
    $('#fax_main,#fax_site').val("027549336");
    $('#gen').val("Barth RS5kp");
    $('#sn').val("SN1500001");
    $('#brand').val("CHUPHOTIC");
    $('#dateCpm').val("01/09/2558");
    $('#selmcmp option[value="1"]').prop('selected',true); 
    $('#selmcmp_site option[value="1"]').prop('selected',true); 
    $('#selwrt option[value="3"]').prop('selected',true); 
    $('#chk_main_site').prop('checked',true);
    $('.selectpicker').selectpicker('refresh');
  }else{
    $('#memp_main,#memp_site').val("");
    $('#adr_main,#adr_site').val("");
    $('#call_main,#call_site').val("");
    $('#fax_main,#fax_site').val("");
    $('#gen').val("");
    $('#sn').val("");
    $('#brand').val("");
    $('#dateCpm').val("");
    $('#selmcmp option[value=""]').prop('selected',true);  
    $('#selmcmp_site option[value=""]').prop('selected',true);
    $('#selwrt option[value=""]').prop('selected',true);
    $('#chk_main_site').prop('checked',false);
    $('.selectpicker').selectpicker('refresh');
  }
  }); 


  $('.adddtl').on('click', function(){
    add_row();
    update_total();
    $('.selectpicker').selectpicker('refresh');
  }); 

  $('.deldtl').on('click', function(){
    if($('input[type="checkbox"].cbdtl:checkbox:checked').length>0){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
        if($('input[type="checkbox"].cbdtl').is(':checked'))
        {
          $('input[type="checkbox"].cbdtl:checkbox:checked').parents('#tbdetail tbody tr').remove(); 
          update_total();
          update_order();
        }
      } 
    }else{
     alert("คุณไม่ได้เลือกรายการ !"); 
    } 
  });

  $('#total').on('change', function(){
    var rows  = $('.cbdtl').length;
    var total  = $('#total').val();
   // $('#modal_process').html('');
    if(total<=100){

      if(total>rows){
        var num = total-rows; 
        for (var i = num - 1; i >= 0; i--) {
          add_row();
        }   
      }else{  
        var num=parseInt(total)+1; 
        for(i=num; i<=rows; i++){ 
          $('#tbdetail tbody tr#'+i).remove();  
        } 
      } 
    }else{
      alert('ระบุไม่เกิน 100 รายการ !');
      $('#total').val("");
    }
  $('.selectpicker').selectpicker('refresh'); 
  });

  $('#cballmodal').on('click', function(){  
    if($('input[type="checkbox"]#cballmodal').is(':checked')){
      $('input[type="checkbox"].cbdtl').prop('checked',true);
    }else{
      $('input[type="checkbox"].cbdtl').prop('checked',false);
    }
  });

}
 
function add_row() 
{
  var rows  = $('.cbdtl').length+1;
  var html  ='<tr id="'+rows+'">';
      html +='<td><input type="checkbox" class="cbdtl"></td>';
      html +='<td width="2%">'+rows+'</td>';
      html +='<td><input type="text" class="form-control" name="treq[]"></td>';
      html +='<td><input type="text" class="form-control" name="issue[]"></td>'; 
      html +='<td><input type="text" class="form-control" name="dr[]"></td>';
      html +='<td class="sn'+rows+'">';
      html +='<select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>';
      html +='<option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> ';
      html +='</select>';
      html +='</td>';
      html +='<td class="medel'+rows+'"></td>';
      html +='</tr>'; 
      $('#tbdetail tbody').append(html);  
}

function update_total()
{ 
  var rows  = $('.cbdtl').length;
  $('#total').val(rows); 
}
function update_order()
{ 
  var rows  = $('.cbdtl').length;  
  for(i=0; i<rows; i++){ 
    $('#tbdetail tbody tr:eq('+i+')').attr("id",i+1);
    $('#tbdetail tbody tr:eq('+i+')').find('td:eq(1)').html(i+1);
  }
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