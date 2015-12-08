<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>

<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="row form_input">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบเปิดงานการบำรุงรักษาเชิงป้องกัน</p>
  <div class="form-group">
  <p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="PM001"  class="form-control"  readonly="true" >   
  </div>   
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่เปิดงานการบำรุงรักษาเชิงป้องกัน</p><p class="required">*</p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="dateTpm" ID="dateTpm-"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>อ้างอิงสัญญาบริการเลขที่</p>
  <div class="form-group">
  <p class="required">*</p>
  <select name="id_tcontact" ID="seltcontact" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" selected>CT58WT00001-THAINOLOGY</option> 
    <option style="font-size:12px;" value="2">CT58WT00002-THAINOLOGY</option> 
  </select>
  <div class="help-block with-errors"></div>  
  </div>   
</div>   
<div class="col-md-1" style="text-align:left;">
  <p>ครั้งที่</p>
  <div class="form-group">
  <p class="required">*</p> 
  <select name="tpm_dtl_sub_batch" ID="seltpmdtlsubbatch" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
    <option style="font-size:12px;" value="" >----เลือก----</option> 
    <option style="font-size:12px;" value="4" selected>4</option>
  </select> 
  </div>   
</div>
<div class="col-md-2" style="text-align:left;">
  <p>ลำดับงาน</p>
  <div class="form-group">
  <p class="required">*</p> 
  <select name="tpm_dtl_sub_batch" ID="seltpmdtlsubbatch" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
    <option style="font-size:12px;" value="" >----เลือก----</option> 
    <option style="font-size:12px;" value="4" selected>Routine</option>
    <option style="font-size:12px;" value="4" >Priority</option>
    <option style="font-size:12px;" value="4" >Urgent</option>
  </select> 
  </div>   
</div>   
</div>

<div class="row form_input">
<div class="col-md-3" style="text-align:left;">
    <p>ประเภทสัญญาบริการ</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="Normal" class="form-control" readonly="true">
    </div>
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่นัดหมาย MA</p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="dateCpm" ID="dateCpm"  value="01/09/2558 10:00" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ผู้ขาย</p>  
  <select name="id_mcmp" ID="selsale" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" >ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2" selected>พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>  
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>ผู้<?php echo $pagename; ?></p> 
  <p class="required">*</p> 
  <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value="1" selected>ดิษฐพงษ์ นิลนามะ</option> 
    <option style="font-size:12px;" value="2">พุฒิพงษ์ ห้วงน้ำ</option> 
  </select>  
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

<div class="col-md-12" style="text-align:left;">
<fieldset><legend>ผลิตภัณฑ์</legend>   
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>เลขที่ผลิตภัณฑ์</p>
    <div class="form-group">  
      <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" >
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   
      </select>
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ชื่อผลิตภัณฑ์</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS-Model 001" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Brand</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="CHUPHOTIC" class="form-control" readonly="true">
    </div>
</div> 
</div>
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>Type</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS 1 PHASE" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>รุ่น</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="V01" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ประเภทการติดตั้ง</p> 
      <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>1 PHASE</option>   
      </select>   
</div> 
</div>
</fieldset>
</div>

<div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset >
        <legend>ช่างผู้ดำเนินการ</legend> 
        <div class="row form_input" style="text-align:left; margin-top:-25px;">
          <div class="col-md-3">
          <div class="add add_egn" style="margin-bottom:10px; margin-right:10px;">
              + เพิ่มรายการ
          </div>
          <div class="add del_egn" style="margin-bottom:10px;">
              - ลบรายการ
          </div>
          </div>
        </div>
        <div class="row form_input" style="text-align:left;">
          <div class="col-md-12">
           <table class="table table-striped" id="tb_egn" style="margin:0px; padding:0px; width:100%" >
            <thead>
            <tr>
              <th width="1%"><input type="checkbox" id="cball_egn" ></th>
              <th width="25%">ชื่อช่าง</th>
              <th width="25%">วันที่ดำเนินงาน</th>
              <th width="25%">วันที่ดำเงินงานเสร็จ</th>
              <th width="24%">สรุปผลการปฏิบัติงาน</th>
            </tr>
            </thead>
            <tbody>
            <tr  class="num_dtl">
              <td><input type="checkbox" class="cbtr_egn" ></td>
              <td>       
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option style="font-size:12px;" value="">----เลือก----</option>
                    <option style="font-size:12px;" value="" selected>ดิษฐพงษ์ นิลนามะ</option> 
                    <option style="font-size:12px;" value="">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>  
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
              <td><textarea class="form-control" rows="1" ></textarea></td>
            </tr>
            </tbody>
           </table> 
          </div>  
        </div>   
      </fieldset>
    </div>
  </div>

<div class="row form_input">
  <div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p>
    <div class="form-group">
      <textarea class="form-control"></textarea>
    </div>
  </div>
</div>
 
   
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#dateTpm").datetimepicker();
    $( "#dtstart").datetimepicker();
    $( "#dtend").datetimepicker();
 /*   var dtstart = $('#dtstart');
    var dtend = $('#dtend');
    $.timepicker.datetimeRange(dtstart,dtend,{ 
        start: {},// start picker options
        end: {} // end picker options         
    });
  */
  checkbox_check_all(); 
  click_control();  
  saveData();  
 });


function click_control() 
{
  $('.add_egn').on('click', function(){   
    var numrow= $('#tb_egn tbody tr.num_dtl').length;
    add_tr(numrow);
  });

  $('.del_egn').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
      if($('input[type="checkbox"].cbtr_egn').is(':checked'))
      {
         $('input[type="checkbox"].cbtr_egn:checkbox:checked').parents('#tb_egn tbody tr').remove(); 
         var numrow= $('#tb_egn tbody tr.num_dtl').length;
         $('#total_batch').val(numrow);
         for(i=0;i<numrow;i++){  
            $('#tb_egn tbody tr.num_dtl:eq('+i+')').find('td:eq(1)').html(i+1); 
         }
      }
     
     if($('input[type="checkbox"].cbsubdtl').is(':checked')){
     $('#tb_egn tbody tr.num_dtl').remove(); 
     }
   }  
  });

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

  $('#seltpmdtlsubbatch').on('change', function(){
  if($('#seltpmdtlsubbatch').val()==4)
  {
    $('#memp_com,#memp_sit').val("ดิษฐพงษ์ นิลนามะ");
    $('#adr_com,#adr_sit').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
    $('#call_com,#call_sit').val("0821428742");
    $('#fax_com,#fax_sit').val("027549336");
    $('#mwrt_cat').val("Minor");
    $('#sn').val("SN1500001");
    $('#brand').val("CHUPHOTIC");
    $('#dateCpm').val("01/09/2558 10:00");
    $('#selmcmp option[value="1"]').prop('selected',true); 
    $('#selmcmp_sit option[value="1"]').prop('selected',true); 
    $('.selectpicker').selectpicker('refresh');
  }else{
    $('#memp_com,#memp_sit').val("");
    $('#adr_com,#adr_sit').val("");
    $('#call_com,#call_sit').val("");
    $('#fax_com,#fax_sit').val("");
    $('#mwrt_cat').val("");
    $('#sn').val("");
    $('#brand').val("");
    $('#dateCpm').val("");
    $('#selmcmp option[value=""]').prop('selected',true);  
    $('#selmcmp_sit option[value=""]').prop('selected',true);
    $('.selectpicker').selectpicker('refresh');
  }
  });

  
}


function add_tr(numrow)
{
  var num=(numrow+1);
  var trhtml  ='<tr  class="num_dtl">';
      trhtml +='<td><input type="checkbox" class="cbtr_egn" ></td>';
      trhtml +='<td>';
      trhtml +='<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="">----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="" selected>ดิษฐพงษ์ นิลนามะ</option>';
      trhtml +='<option style="font-size:12px;" value="">พุฒิพงศ์ ห้วงน้ำ</option>';
      trhtml +='</select>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="input-group" style="z-index:99999  !important;">';
      trhtml +='<input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="input-group" style="z-index:99999  !important;">';
      trhtml +='<input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td><textarea class="form-control" rows="1" ></textarea></td>';
      trhtml +='</tr>';
   $('#tb_egn tbody').append(trhtml);  
   checkbox_check_all();  
   $('.selectpicker').selectpicker('refresh');
}

function checkbox_check_all(grp)
{
  $('#cballsub').on('click',function(){ 
    var cb_status = $(this).is(':checked'); 
    $('input[type="checkbox"].cbsubdtl').prop('checked',cb_status);
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