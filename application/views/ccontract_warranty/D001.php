<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="row form_input" style="text-align:left;"> 
<div class="col-md-6">
<fieldset>
<legend>ข้อมูลสัญญา</legend>   
<div class="row form_input">
<div class="col-md-6" style="text-align:left;">
  <p>เลขที่ <?php echo $pagename; ?></p>
  <div class="form-group">
  <p class="required">*</p>
  <input type="text" class="form-control" name="contract_code"  value="CTA00158080001" readonly>   
  </div>   
</div> 
<div class="col-md-6" style="text-align:left;">
  <p>ประเภท <?php echo $pagename; ?></p>
  <div class="form-group"><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" >--เลือก--</option>
    <option style="font-size:12px;" value="1" selected>Minor</option> 
    <option style="font-size:12px;" value="2">Normal</option> 
    <option style="font-size:12px;" value="2">Major</option> 
    <option style="font-size:12px;" value="2">Critical</option> 
  </select> 
  </div>
</div>
</div>
<div class="row form_input">
<div class="col-md-6" style="text-align:left;">
  <p>วันที่เริ่มสัญญา</p><p class="required">*</p>
  <div class="input-group" style="z-index:10  !important;">
  <input type="text" name="ctfrom" id="ctfrom" value="<?=$datefrom?>" readonly="readonly" class="form-control"><span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div> 
</div>  
<div class="col-md-6" style="text-align:left;">
  <p>วันที่สิ้นสุดสัญญา</p><p class="required">*</p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="ctto" id="ctto" value="<?=$dateto?>" readonly="true" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div> 
</div>
<div class="row form_input" style="margin-top:15px;">
<div class="col-md-6" style="text-align:left;">
<p>อ้างอิงเลขที่ Contract Warranty [ฉบับจริง]</p>
<input type="text" class="form-control" name="ref_contract_code" value="CC580800001" readonly="true"> 
</div>
<div class="col-md-6" style="text-align:left;">
  <p>แนบไฟล์เอกสารอ้างอิง Contract Warranty</p>  
  <input id="input-1a" type="file" class="file" data-show-preview="true"><label class="control-label"></label>
  <br/><br/> <br/>
</div> 
</div>   
</fieldset>
</div> 

<div class="row form_input" style="text-align:left;"> 
<div class="col-md-6">
      <fieldset>
      <legend>ข้อมูลบริษัทหลัก</legend>     
        <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ชื่อบริษัทหลัก</p><p class="required">*</p> 
            <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
              <option style="font-size:12px;" value="" >----เลือก----</option>
              <option style="font-size:12px;" value="1" selected>THAINOLOGY</option> 
              <option style="font-size:12px;" value="2">TNLG</option> 
           </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
          <p>ชื่อผู้ติดต่อ</p><p class="required">*</p>
          <input type="text" class="input form-control" name="telephone" value="ดิษฐพงษ์ นิลนามะ" ID="memp_com" >
        </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p><p class="required">*</p>
          <textarea class="form-control" ID="adr_com" style="height: 100px; padding:5px;">148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>เบอร์โทรศัพท์</p><p class="required">*</p>
            <input type="text" class="input form-control" ID="call_com" name="telephone" value="0821428742">
          </div>
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>Fax.</p>
            <input type="text" class="input form-control" ID="fax_com" name="telephone" value="027549336">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
      <div class="col-md-7">
        <p>ชื่อจังหวัด</p> 
          <select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="1" selected>สมุทรปราการ</option>  
         </select>
        <div class="help-block with-errors"></div>
      </div>
      <div class="col-md-5">
        <div class="row form_input" style="text-align:left; margin:0;">    
        <p>ชื่ออำเภอ/เขต</p>
        <select name="AMPHUR_ID1" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="1" selected>เมืองสมุทรปราการ</option> 
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
  <p>เงื่อนไขสัญญา</p>  
  <textarea class="form-control" rows="5"  readonly="true"></textarea>
</div> 
</div> 

<div class="col-md-12" style="text-align:left;">
<fieldset><legend>วันที่นัดหมาย PM จำนวน <input type="text" style="width:30px;font-size:14px;padding:3px;" ID="pm_num" value="4"> ครั้ง</legend>  
<div class="row form_input pmgroup" style="margin-top:-20px;" > 
<div class="col-md-3" style="text-align:left;" ID="PM1">
  <p>ครั้งที่ 1</p> 
  <p class="required">*</p> 
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="pmdate1" id="pmdate1" value="<?=$dateto?>" readonly="readonly" class="form-control pmdate"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div> 
<div class="col-md-3" style="text-align:left;" ID="PM2">
  <p>ครั้งที่ 2</p> 
  <p class="required">*</p> 
  <div class="input-group" style="z-index:9  !important;"> 
  <input type="text" name="pmdate2" id="pmdate2" value="<?=$dateto?>" readonly="readonly" class="form-control pmdate"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;" ID="PM3">
  <p>ครั้งที่ 3</p> 
  <p class="required">*</p> 
  <div class="input-group" style="z-index:9  !important;"> 
  <input type="text" name="pmdate4" id="pmdate3" value="<?=$dateto?>" readonly="readonly" class="form-control pmdate"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>  
</div> 
<div class="col-md-3" style="text-align:left;" ID="PM4">
  <p>ครั้งที่ 4</p> 
  <p class="required">*</p> 
  <div class="input-group" style="z-index:9  !important;"> 
  <input type="text" name="pmdate4" id="pmdate4" value="<?=$dateto?>" readonly="readonly" class="form-control pmdate"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div> 
</div> 
</div>
</fieldset>
</div>

<div class="col-md-12" style="text-align:left;">
<fieldset><legend>รายการผลิตภัณฑ์</legend>   
<div class="row form_input header_table spare-table"  style="margin-top:-10px;"> 
<div class="col-md-12" > 
  <table class="table table-striped" id="tbspare">
    <thead>
      <tr> 
      <th width="270">เลขที่ผลิตภัณฑ์</th>
      <th width="250">ชื่อผลิตภัณฑ์</th>  
      <th width="150">ประเภทการขาย</th> 
      <th>สถานที่ไซต์งาน</th>
      </tr>
    </thead>
    <tbody>
      <tr id="1"> 
      <td> 
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">
            <option style="font-size:12px;" value="" >-- เลือก --</option> 
            <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   
          </select>  
      </td>  
      <td><input type="text" class="form-control" name="part_name[]" value="UPS-MODEL-001"></td>   
      <td> 
        <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>งานขายปกติ</option>   
        </select>  
      </td> 
      <td> 
          <input type="checkbox" id="chk_main_site" checked="true"> เลือกที่เดียวกับบริษัทหลัก<p class="required">*</p>
          <textarea class="form-control addr" rows="6" placeholder="-- เลือก --" ></textarea>
      </td>
      </tr>
      <tr id="2"> 
      <td> 
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">
            <option style="font-size:12px;" value="" >-- เลือก --</option> 
            <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   
          </select>  
      </td>  
      <td><input type="text" class="form-control" name="part_name[]" value="UPS-MODEL-001"></td>   
      <td> 
        <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>งานขายปกติ</option>   
        </select>  
      </td> 
      <td> 
          <input type="checkbox" id="chk_main_site" checked="true"> เลือกที่เดียวกับบริษัทหลัก<p class="required">*</p>
          <textarea class="form-control addr" rows="6" placeholder="-- เลือก --" ></textarea>
      </td>
      </tr>
      <tr id="3"> 
      <td> 
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">
            <option style="font-size:12px;" value="" >-- เลือก --</option> 
            <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   
          </select>  
      </td>  
      <td><input type="text" class="form-control" name="part_name[]" value="UPS-MODEL-001"></td>   
      <td> 
        <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>งานขายปกติ</option>   
        </select>  
      </td> 
      <td> 
          <input type="checkbox" id="chk_main_site" checked="true"> เลือกที่เดียวกับบริษัทหลัก<p class="required">*</p>
          <textarea class="form-control addr" rows="6" placeholder="-- เลือก --" ></textarea>
      </td>
      </tr>
    </tbody>
  </table>   
  </div>  
  </div>
</div> 
</fieldset>
</div>

<div class="col-md-6" style="text-align:left;">
<fieldset><legend>สำหรับฝ่าย Sale</legend>  
<div class="row form_input" style="margin-top:-20px;" >
<div class="col-md-6" style="text-align:left;">
  <p>ผู้ขออนุมัติ</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>--เลือก--</option>
    <option style="font-size:12px;" value="1">ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>  
</div>  
<div class="col-md-6" style="text-align:left;">
  <p>วันที่ขออนุมัติ</p> 
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="datereq" id="datereq" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
</div>

<div class="row form_input">
<div class="col-md-6" style="text-align:left;"> 
  <p>ผู้อนุมัติ</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>--เลือก--</option>
    <option style="font-size:12px;" value="1">ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>
  <div class="help-block with-errors"></div>   
</div> 
<div class="col-md-6" style="text-align:left;">
  <p>วันที่อนุมัติ</p> 
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="dateapp" id="dateapp" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div> 
</div>
</fieldset>
</div>

<div class="col-md-6" style="text-align:left;">
<fieldset><legend>สำหรับฝ่ายบริการ</legend>  
<div class="row form_input" style="margin-top:-20px;" >
<div class="col-md-6" style="text-align:left;">
  <p>ผู้รับเรื่อง</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>--เลือก--</option>
    <option style="font-size:12px;" value="1">ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>  
</div>  
<div class="col-md-6" style="text-align:left;">
  <p>วันที่รับเรื่อง</p>
  <div class="input-group" style="z-index:9  !important;">  
  <input type="text" name="datesv" id="datesv" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
</div>

<div class="row form_input">
<div class="col-md-6" style="text-align:left;"> 
  <p>ผู้อนุมัติ</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>--เลือก--</option>
    <option style="font-size:12px;" value="1">ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>
  <div class="help-block with-errors"></div>   
</div> 
<div class="col-md-6" style="text-align:left;">
  <p>วันที่อนุมัติ</p> 
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="datesvapp" id="datesvapp" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div> 
</div>
</fieldset>
</div>

<div class="row form_input">
  <div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p> 
      <textarea class="form-control"></textarea> 
  </div>
</div>

<div class="row form_input" style="margin-top:10px;">
<div class="col-md-12" style="text-align:left;">
<p>สถานะ</p>  
  <input type="radio"  name="status" value="1" checked=checked> ในสัญญา
  <input type="radio"  name="status" value="2" >  สิ้นสุดสัญญา  
  <input type="radio"  name="status" value="0" >  ยกเลิกสัญญา 
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


<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $("#datereq,#dateapp,#datesv,#datesvapp").datetimepicker(); 
    $("#ctfrom").datetimepicker({ 
      onClose: function( selectedDate ) {
        $( "#ctto" ).datetimepicker( "option", "minDate", selectedDate );
      }
    });
  $("#ctto").datetimepicker({ 
      onClose: function( selectedDate ) {
        $( "#ctfrom" ).datetimepicker( "option", "maxDate", selectedDate );
      }
    }); 
    
  var adr = 'Thainology and Solutions CO.,LTD.\n';
      adr +='ที่อยู่ : 148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ\n'; 
      adr +='ชื่อผู้ติดต่อ :ดิษฐพงษ์ นิลนามะ\n';
      adr +='เบอร์โทรศัพท์: 0821428742\n';
      adr +='Fax.: 027549336';
  $(".addr").html(adr);

  click_control();  
    saveData();     
    selectDate(4);
    selmcmp(); 
 });

function selectDate(num){
  for(i=1;i<=num;i++){ 
     $("#pmdate"+i+"").datetimepicker(); 
  }
}

function selmcmp(){
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
} 

function click_control()
{
  $('.addinv').on('click', function(){
    add_row(); 
    $('.selectpicker').selectpicker('refresh');
  }); 

  $('.delinv').on('click', function(){
    if($('input[type="checkbox"].cbtr:checkbox:checked').length>0){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
        if($('input[type="checkbox"].cbtr').is(':checked'))
        {
          $('input[type="checkbox"].cbtr:checkbox:checked').parents('#tbspare tbody tr').remove();  
        }
      } 
    }else{
     alert("คุณไม่ได้เลือกรายการ !"); 
    } 
  });

  $('#cball').on('click',function(){ 
    var cb_status = $(this).is(':checked'); 
    $('input[type="checkbox"].cbtr').prop('checked',cb_status);
  }); 

  $('#chk_oth1').on('click', function(){  
    if($('input[type="checkbox"]#chk_oth1').is(':checked')){
      $('#oth1').attr("style","display:true;");
      $('#sn1').attr("style","display:none;");
    }else{
      $('#oth1').attr("style","display:none;");
      $('#sn1').attr("style","display:true;");
    }
  });

  $('#pm_num').on('change', function(){   
    var pmnum=parseInt($('#pm_num').val());
    var all = $('.pmdate').length;
    if(pmnum>all){ 
      for (var i = all+1; i <= pmnum; i++) { 
        add_date(i); 
      };
    }else{  
      for (var j = pmnum+1; j <= all; j++) {  
        $('#PM'+j).remove();
      };

    }
  });
}

function add_row() 
{ 
  var rows  = $('.cbtr').length+1;
  var adr = 'Thainology and Solutions CO.,LTD.\n';
      adr +='ที่อยู่ : 148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ\n'; 
      adr +='ชื่อผู้ติดต่อ :ดิษฐพงษ์ นิลนามะ\n';
      adr +='เบอร์โทรศัพท์: 0821428742\n';
      adr +='Fax.: 027549336';

  var html='<tr>';
      html +='<td><input type="checkbox" class="cbtr"></td>'; 
      html +='<td>'; 
      html +='<div style="width:40px;float:right;"><input type="checkbox" id="chk_oth'+rows+'"> อื่นๆ</div>';
      html +='<div style="width:81%;float:left;">';
      html +='<div ID="sn'+rows+'" style="display:true;">';
      html +='<select name="sn" class="selectpicker show-tick form-control  input-sn-spare" data-live-search="true">';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>'; 
      html +='<option style="font-size:12px;" value="1">SN1500001</option>'; 
      html +='<option style="font-size:12px;" value="2">SN1500002</option>';  
      html +='</select>'; 
      html +='</div>';
      html +='<div ID="oth'+rows+'" style="display:none;"><input type="text" class="form-control" name="reference[]" placeholder="-- กรุณาระบุ เลขที่อ้างอิง --"></div>';
      html +='</div>';
      html +='</td>';  
      html +='<td><input type="text" class="form-control" name="brand[]"></td>';
      html +='<td>';
      html +='<select name="unit" ID="unit" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>'; 
      html +='<option style="font-size:12px;" value="1">งานขายปกติ</option>';  
      html +='<option style="font-size:12px;" value="2">งานซ่อม</option> ';
      html +='<option style="font-size:12px;" value="2">งาน MA</option>';
      html +='<option style="font-size:12px;" value="2">งาน Out off Warranty</option> '; 
      html +='<option style="font-size:12px;" value="2">งานต่อเนื่องในประกัน</option> ';
      html +='</select> '; 
      html +='</td>'; 
      html +='<td>';
      html +='<input type="checkbox" id="chk_main_site" checked="true"> เลือกที่เดียวกับบริษัทหลัก<p class="required">*</p>';
      html +='<textarea class="form-control" rows="6" placeholder="-- เลือก --">'+adr+'</textarea></td>';
      html +='</tr>';
      $('#tbspare tbody').append(html); 
      chk_other(rows); 
}

function add_date(num){
    html ='<div class="col-md-3" style="text-align:left;" ID="PM'+num+'">';
    html +='<p>ครั้งที่ '+num+'</p>';
    html +='<p class="required">*</p>';
    html +='<div class="input-group" style="z-index:9  !important;">';
    html +='<input type="text" name="pmdate'+num+'" id="pmdate'+num+'" value="<?=$dateto?>" readonly="readonly" class="form-control pmdate"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
    html +='</div>';
    html +='</div>';
    $('.pmgroup').append(html); 
    $("#pmdate"+num+"").datetimepicker();
}

function chk_other(num){
  $('#chk_oth'+num).on('click', function(){  
    if($('input[type="checkbox"]#chk_oth'+num).is(':checked')){
      $('#oth'+num).attr("style","display:true;");
      $('#sn'+num).attr("style","display:none;");
    }else{
      $('#oth'+num).attr("style","display:none;");
      $('#sn'+num).attr("style","display:true;");
    }
  });
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