<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style> 
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบ<?php echo $pagename; ?></p><p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="RR58070001"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >     
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่จัดส่ง</p>
  <p class="required">*</p>
  <input type="text" name="name_req[]" id="name_req" value="Call Center" class="form-control text_open" >
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้จัดส่ง</p> 
  <p class="required">*</p> 
  <input type="text" name="call_req[]" id="call_req" value="ดิษฐพงษ์ นิลนามะ" class="form-control text_open" >  
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
 
<!-- <div class="row form_input header_table" style="margin-top:-20px;">
  <div class="col-md-6">
    <div class="add adddtl" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
    </div>
    <div class="add deldtl" style="margin-bottom:10px;">
    - ลบรายการ
    </div>
  </div>
  <div class="col-md-6" style="text-align:right;">
   จำนวนเครื่อง <input type="text" class="input form-control" id="total" name="total" style="width:20%;float:right;" value="1">     
  </div>
</div> -->

<div class="row form_input header_table"> 
<div class="col-md-12" > 
  <table class="table table-striped" id="tbdetail" >
    <thead>
      <tr>
<!--       <th width="30"><input type="checkbox" id="cballmodal"></th> -->
      <th width="50">ลำดับ</th>
      <th width="200">รายการแจ้ง</th>
      <th width="200">ISSUE NO.</th>
      <th width="200">เลขที่ใบ DR</th>
      <th width="200">เลขที่ใบรับเครื่องซ่อม</th> 
      <th width="280">รหัสผลิตภัณฑ์ [S/N]</th>  
      <th width="200">Model</th>   
      </tr>
    </thead>
    <tbody>
      <tr id="1">
<!--       <td><input type="checkbox" class="cbdtl"></td> -->
      <td width="2%">1</td>
      <td><input type="text" class="form-control" name="treq[]" value="เปิดบิล+ส่งเครื่องซ่อม"></td> 
      <td><input type="text" class="form-control" name="issue[]" value="1501-0311"></td>  
      <td><input type="text" class="form-control" name="dr[]" value="5801-0024"></td> 
      <td class="treq_repair1"> 
        <select name="treq_repair" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">
          <option style="font-size:12px;" value="" >-- เลือก --</option> 
          <option style="font-size:12px;" value="1"selected>TREQ58080001</option>   
        </select>  
      </td> 
      <td class="sn1"> 
        <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">
          <option style="font-size:12px;" value="" >-- เลือก --</option> 
          <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   
        </select>  
      </td>
      <td class="medel1"> AAAA</td> 
      </tr>
    </tbody>
  </table>    
</div> 
</div> 



<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<div class="row form_input" style="text-align:left;">
  <div class="col-md-12">
    <fieldset ><legend>สรุปผลการปฏิบัติงาน</legend> 
    <div class="row form_input" style="text-align:left;margin-top:-10px;">
      <div class="col-md-8" style="text-align:left;">
        <p>สรุปผลการปฏิบัติงาน</p>
        <input type="radio" name="chk_issue" value="1" checked="checked"> Accept
        <input type="radio" name="chk_issue" value="0">  Un Accept       
      </div>
      <div class="col-md-3" style="text-align:left;">
        <p>แนบไฟล์สรุปผลการปฏิบัติงาน</p>
        <input type="file" title="Search for a file to add">
      </div>
    </div>
    <div class="row form_input" style="text-align:left;">
      <div class="col-md-8" style="text-align:left;">
        <p>ระบุปัญหา</p>  
        <textarea class="form-control issue" readonly="true"></textarea>
      </div>
    </div>
    </fieldset>
  </div>
</div>


<div class="col-md-12" style="text-align:left;">
<fieldset>
<legend>ปิดงาน</legend> 
<div class="row form_input"> 
<div class="col-md-3" style="text-align:left;">
  <p>ผู้ปิดงาน</p>
  <div class="form-group">
  <p class="required">*</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp close_status"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" >ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2" selected="true">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>
  <div class="help-block with-errors"></div>
  </div>   
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ผู้ตรวจสอบ</p>
  <div class="form-group">
  <p class="required">*</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp close_status"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" >ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2" selected="true">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>
  <div class="help-block with-errors"></div>
  </div>   
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้อนุมัติ</p>
  <div class="form-group">
  <p class="required">*</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp close_status"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" >ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2" selected="true">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>
  <div class="help-block with-errors"></div>
  </div>   
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>วันที่-เวลา ปิดงาน</p> 
  <p class="required">*</p> 
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="dtclosed" ID="dtclosed"  value="<?=$dtnow?>" class="form-control" readonly="readonly" style="background-color:#FFFFFF;"><span class="input-group-addon" style="background-color:#FFFFFF;"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>   
</div>     
</div> 

<div class="row form_input"> 
        <div class="col-md-3" style="text-align:left;">
          <p>แนบไฟล์ประกอบ</p>
          <input type="file" title="Search for a file to add">
        </div>
        <div class="col-md-3" style="padding-top:20px;">
          <input type="checkbox" id="cfm_close"> ยืนยันการปิดงาน
        </div>
        <div class="col-md-6" >
          <p>ลูกค้ารับเครื่องหรือไม่?</p>
          <label class="radio-inline"><input type="radio" name="status_completed" class="status_completed" value="1"> รับ </label>
          <label class="radio-inline"><input type="radio" class="status_completed" name="status_completed" value="2"> ไม่รับ</label>
          <label class="radio-inline"><textarea id="other_note" rows="1" readonly="true" class="form-control" placeholder="--กรุณาระบุเหตผลให้ครบถ้วน--" style="width:400px; height:35px;"></textarea> </label>
        </div>
</div> 
</fieldset>
</div>


<div class="row form_input"> 
  <div class="col-md-12" style="text-align:left;">
    <fieldset>
      <legend>ประเมินผลการปฏิบัติงาน</legend> 
      <div class="row form_input"  style="margin-top:-20px;"> 
        <div class="col-md-3" style="text-align:left;">
             <p>ผลการปฏิบัติงาน</p>
             <input type="radio" class="result_work" id="accept" name="accept"  value="1" checked="true"> Pass
             <input type="radio" class="result_work"  id="unaccept" name="accept"  value="2"> Fail
        </div> 
        <div class="col-md-3" style="text-align:left;">
            <p>ระบุชนิดปัญหา</p>
            <div class="input-group">
            <select name="issuelog" id="issuelog" class="form-control" disabled="true">
              <option value="0">--</option>
              <option value="1">Normal</option>
              <option value="2">Miner</option>
              <option value="3">Major</option>
              <option value="4">Critical</option>            
            </select>
            <p class="required">*</p>
            </div>   
        </div>  
      <div class="col-md-3" style="text-align:left;">
          <p>แนบไฟล์ผลการปฏิบัติงาน</p> 
          <input type="file" title="Search for a file to add">
        </div>
      </div>
    </fieldset>
  </div>
</div>


<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
</div></div>







<script type='text/javascript'>
$(function(){ 
    $('textarea,input.form-control').attr('readonly',true);
    $('input:radio,input:checkbox,select.form-control').attr('disabled',true);
    $('.close_status').attr('disabled',false);
    $('#cfm_close').prop('disabled',false);
    $('.status_completed').prop('disabled',false);
    $('#other_note').hide();
    $('.selectpicker').selectpicker('refresh');
    $( "#treq_repair_date,#dateTrecv").datetimepicker(); 
    $('.result_work').prop('disabled',false);
    $('input[name="chk_issue"]').prop('disabled',false);
    $('textarea.issue').prop('readonly',false);
    click_control();   
    saveData();  
    click_status_completed_radio();
    radio_click();
 });

function click_status_completed_radio()
{
  $('.status_completed').on('click',function(){
    if($(this).val()==2){
    $('#other_note').show();
    $('#other_note').attr('readonly',false);
     }else{
      $('#other_note').hide();
      $('#other_note').attr('readonly',true);
     }
  });
}

function radio_click()
{
  $('.result_work').on('click',function(){
    if($(this).val()==2){
      $('select#issuelog').prop('disabled',false);
    }else{
      $('select#issuelog').prop('disabled',true);
      $('select#issuelog option[value="0"]').prop('selected',true);
    }
  });
}

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
      html +='<td class="treq_repair'+rows+'">';
      html +='<select name="treq_repair" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>';
      html +='<option style="font-size:12px;" value="1">TREQ58080001</option>';
      html +='</select>';
      html +='</td>';
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