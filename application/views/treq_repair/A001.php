<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style> 
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">

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
  <div class="col-md-4">
    <p>ชื่อจังหวัด</p> 
      <select name="mprv_site" ID="mprv_site" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >-- เลือก --</option>
        <option style="font-size:12px;" value="1" selected>สมุทรปราการ</option>  
     </select> 
  </div>
  <div class="col-md-3">
    <div class="row form_input" style="text-align:left; margin:0;">    
    <p>พื้นที่บริการ</p>
    <select name="mamp_site" ID="mamp_site" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >-- เลือก --</option>
        <option style="font-size:12px;" value="1" selected>1</option>
        <option style="font-size:12px;" value="2" >2</option>
        <option style="font-size:12px;" value="3" >3</option>
        <option style="font-size:12px;" value="4" >4</option>
     </select> 
  </div>
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
 
<div class="row form_input header_table" style="margin-top:-20px;">
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
</div>

<div class="row form_input header_table"> 
<div class="col-md-12" >
  <div style="overflow-x:scroll;overflow-y: hidden;">
  <table class="table table-striped" id="tbdetail" style="table-layout: fixed;word-wrap: break-word;" >
    <thead>
      <tr>
      <th width="30"><input type="checkbox" id="cballmodal"></th>
      <th width="50">ลำดับ</th>
      <th width="280">เลขที่ผลิตภัณฑ์</th> 
      <th width="200">Issue No</th>
      <th width="200">Model</th>
      <th width="200">Brand</th>   
      <th width="200">Product Type</th> 
      <th width="200">Rated Power</th>
      <th width="200">ประเภทการรับประกัน</th>
      <th width="200">อาการที่เสียที่แจ้ง</th> 
      <th width="200">อ้างอิงเลขที่ใบรับส่งผลิตภัณฑ์</th>
      <th width="150">ลำดับงาน</th> 
      </tr>
    </thead>
    <tbody>
      <tr id="1">
      <td><input type="checkbox" class="cbdtl"></td>
      <td width="2%">1</td>
      <td>
        <div style="width:40px;float:right;"> 
          <input type="checkbox" id="chk_oth1"> อื่นๆ  
        </div>
        <div style="width:81%;float:left;"> 
          <div ID="sn1" style="display: true;">
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;">
            <option style="font-size:12px;" value="" selected>-- เลือก --</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option>  
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option>  
          </select> 
          </div>
          <div ID="oth1" style="display: none;">
          <input type="text" class="form-control" name="reference[]" placeholder="-- กรุณาระบุ เลขที่อ้างอิง --">   
          </div>
        </div>      
      </td> 
      <td><input type="text" class="form-control" name="brand[]"></td>  
      <td><input type="text" class="form-control" name="product_type[]"></td> 
      <td><input type="text" class="form-control" name="rated_power[]"></td> 
      <td><input type="text" class="form-control" name="model[]"></td>
      <td><input type="text" class="form-control" name="issue[]"></td>
      <td> 
        <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="" selected>-- เลือก --</option>
          <option style="font-size:12px;" value="1">Product Warranty</option> 
          <option style="font-size:12px;" value="2">Service Warranty</option> 
          <option style="font-size:12px;" value="3_1">Contract Warranty[Minor]</option> 
          <option style="font-size:12px;" value="3_2">Contract Warranty[Normal]</option> 
          <option style="font-size:12px;" value="3_3">Contract Warranty[Major]</option> 
          <option style="font-size:12px;" value="3_4">Contract Warranty[Critical]</option> 
          <option style="font-size:12px;" value="7">Out of Warranty</option> 
        </select>  
      </td>
      <td><textarea class="form-control" rows="1" ></textarea></td>
      <td><input type="text" class="form-control" name="requestno[]"></td>  
      <td><select name="priority_ref[]" ID="priority_ref" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
      <option style="font-size:12px;" value="" selected>----เลือก----</option> 
      <option style="font-size:12px;" value="1" >Routine</option>
      <option style="font-size:12px;" value="2" >Priority</option>
      <option style="font-size:12px;" value="3" >Urgent</option>
      </select> 
      </td>
      </tr>
    </tbody>
  </table>   
  </div>  
</div> 
</div>   

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบ<?php echo $pagename; ?></p><p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >     
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่รับแจ้ง</p>
  <p class="required">*</p>
  <input type="text" name="name_req[]" id="name_req" value="Call Center" class="form-control" readonly="true">
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้รับแจ้ง</p> 
  <p class="required">*</p> 
  <input type="text" name="call_req[]" id="call_req" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="true">  
</div>    
</div>

<div class="row form_input"> 
<div class="col-md-6" style="text-align:left;">
    <p>ประเภทการรับแจ้ง</p>
    <div class="form-group"> 
      <input type="radio"  name="is_type" class="is_type" value="1" checked="true"> โทรศัพท์
      <input type="radio"  name="is_type" class="is_type" value="2" > อีเมล์ 
      <input type="radio"  name="is_type" class="is_type" value="3" > อื่นๆ  
      <input type="hidden" name="is_type_other" ID="type_other" class="form-control" placeholder="--กรุณาระบุ--" style="width:47%;float:right;" value="">
    </div>
</div>
<div class="col-md-6" style="text-align:left;">
    <p>การเดินทาง</p>
    <div class="form-group"> 
      <input type="radio"  name="is_tour" class="is_tour" value="1" checked="true"> รถบริษัท
      <input type="radio"  name="is_tour" class="is_tour" value="2" > รถรับจ้าง
      <input type="radio"  name="is_tour" class="is_tour" value="3" > รถส่วนตัว
      <input type="radio"  name="is_tour" class="is_tour" value="4" > อื่นๆ  
      <input type="hidden" name="tour_other" ID="tour_other" class="form-control" placeholder="--กรุณาระบุ--" style="width:47%;float:right;" value="">
    </div>
</div>
</div>

<div class="row form_input"> 
<div class="col-md-3" style="text-align:left;">
<p>การดำเนินงาน</p>
  <select name="process_type" ID="process_type" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"   >
    <option style="font-size:12px;" value="" >-- เลือก --</option>
    <option style="font-size:12px;" value="1" selected>จัดรถรับเครื่อง</option> 
    <option style="font-size:12px;" value="2">ลูกค้าจัดส่ง</option> 
    <option style="font-size:12px;" value="2">ส่งช่างไปซ่อม</option> 
    <option style="font-size:12px;" value="2">ส่งช่างไปตรวจเช็ค</option> 
    <option style="font-size:12px;" value="2">วางเครื่อง Stanby</option>
    <option style="font-size:12px;" value="2">Claim</option> 
    <option style="font-size:12px;" value="2">เสนอราคา</option> 
    <option style="font-size:12px;" value="2">รอติดตามผล</option>  
  </select> 
</div>  
<div class="col-md-3" style="text-align:left;">
    <p>วันที่นัดหมาย</p>
    <div class="input-group" style="z-index:9  !important;">
      <input type="text" name="dateTrecv" ID="dateTrecv"  value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
</div> 
<div class="col-md-3" style="text-align:left;">
    <p>หน่วยงานที่รับเรื่องต่อ</p> 
    <p class="required">*</p> 
    <select name="sn" ID="selsn" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="">-- เลือก --</option>
      <option style="font-size:12px;" value="1" selected>Work Shop</option> 
      <option style="font-size:12px;" value="2">On Site</option> 
      <option style="font-size:12px;" value="3">Sales-Claim</option>  
    </select>  
</div>
</div> 
 
<div class="row form_input">
<div class="col-md-6" style="text-align:left;">
    <p>วิเคราะห์อาการเสียเบื้องต้น</p> 
    <textarea class="form-control"></textarea> 
</div> 
<div class="col-md-6" style="text-align:left;">
    <p>แนวทางการปฏิบัติงาน</p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<div class="row form_input">
<div class="col-md-6" style="text-align:left;">
    <p>อุปกรณ์ที่ต้องจัดเตรียม</p> 
    <div class="form-group"> 
      <input type="radio"  name="is_spare" class="is_spare" value="1" checked="true"> ไม่ระบุ
      <input type="radio"  name="is_spare" class="is_spare" value="2" > เครื่อง Stanby
      <input type="radio"  name="is_spare" class="is_spare" value="3" > Spare part 
      <input type="radio"  name="is_spare" class="is_spare" value="4" > General part
    </div>
</div>
<div class="col-md-6 spare-area" style="text-align:left;display:none;" >
    <p class="spare-name"></p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<div class="row form_input spare-table" style="display:none;">
  <div class="col-md-3">
    <div class="add addspare" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
    </div>
    <div class="add delspare" style="margin-bottom:10px;">
    - ลบรายการ
    </div>
  </div> 
  </div>
  <div class="row form_input header_table spare-table" style="display:none;"> 
  <div class="col-md-12" > 
  <table class="table table-striped" id="tbspare">
    <thead>
      <tr>
      <th width="30"><input type="checkbox" id="cballspare"></th>
      <th width="280">Part No</th>
      <th>Part Name</th>
      <th width="100">ภาคการทำงาน</th> 
      <th width="150">Qty</th>    
      </tr>
    </thead>
    <tbody>
      <tr id="1">
      <td><input type="checkbox" class="cbpart"></td> 
      <td>
        <div style="width:40px;float:right;"> 
          <input type="checkbox" id="chk_oth_spare1"> อื่นๆ  
        </div>
        <div style="width:81%;float:left;"> 
          <div ID="sn_spare1" style="display: true;">
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">
            <option style="font-size:12px;" value="" selected>-- เลือก --</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option>  
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option> 
            <option style="font-size:12px;" value="1">PPPPP-SSYYLXXX-VVV</option>  
          </select> 
          </div>
          <div ID="oth_spare1" style="display: none;">
          <input type="text" class="form-control" name="reference[]" placeholder="-- กรุณาระบุ เลขที่อ้างอิง --">   
          </div>
        </div>      
      </td> 
      <td><input type="text" class="form-control" name="part_name[]"></td>
      <td><input type="text" class="form-control" name="worksection[]"></td>   
      <td> 
        <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="" selected>-- เลือก --</option>
          <option style="font-size:12px;" value="1">เครื่อง</option>  
          <option style="font-size:12px;" value="2">กล่อง</option> 
        </select>  
      </td> 
      </tr>
    </tbody>
  </table>   
  </div>  
  </div>
</div> 

<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<script type='text/javascript'>
$(function(){  
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

  $('.is_type').on('change', function(){   
    var is_type= $(this).val();  
   if(is_type==3){
      $('#type_other').val("");
      $('#type_other').attr("type","text");
    }else{ 
      $('#type_other').val("");
      $('#type_other').attr("type","hidden");
    }
  });
  $('.is_tour').on('change', function(){   
    var is_tour= $(this).val();  
   if(is_tour==4){
      $('#tour_other').val("");
      $('#tour_other').attr("type","text");
    }else{ 
      $('#tour_other').val("");
      $('#tour_other').attr("type","hidden");
    }
  }); 

  $('.is_spare').on('change', function(){   
    var is_spare= $(this).val();  
   if(is_spare==1){
      $('.spare-name').html("");
      $('.spare-area').attr("style","display:none");
      $('.spare-table').attr("style","display:none");
    }else if(is_spare==2){
      $('.spare-name').html("ระบุ เครื่อง Stanby");
      $('.spare-area').attr("style","display:true");
      $('.spare-table').attr("style","display:none");
    }else if(is_spare==3){
      $('.spare-name').html("");
      $('.spare-area').attr("style","display:none");
      $('.spare-table').attr("style","display:true");
    }else if(is_spare==4){
      $('.spare-name').html("ระบุ General part");
      $('.spare-area').attr("style","display:true");
      $('.spare-table').attr("style","display:none");
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

  $('.addspare').on('click', function(){
    add_row_spare(); 
    $('.selectpicker').selectpicker('refresh');
  }); 

  $('.delspare').on('click', function(){
    if($('input[type="checkbox"].cbpart:checkbox:checked').length>0){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
        if($('input[type="checkbox"].cbpart').is(':checked'))
        {
          $('input[type="checkbox"].cbpart:checkbox:checked').parents('#tbspare tbody tr').remove();  
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

  $('.is_recv').on('change', function(){
    var chk=$('input[type="radio"].is_recv:checked').val();
    if(chk==0){
      $('#dateTrecv').val("");
    }else{
      $('#dateTrecv').val($('#treq_repair_date').val());
    }
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
  $('#chk_oth_spare1').on('click', function(){  
    if($('input[type="checkbox"]#chk_oth_spare1').is(':checked')){
      $('#oth_spare1').attr("style","display:true;");
      $('#sn_spare1').attr("style","display:none;");
    }else{
      $('#oth_spare1').attr("style","display:none;");
      $('#sn_spare1').attr("style","display:true;");
    }
  });

  $('#cballmodal').on('click', function(){  
    if($('input[type="checkbox"]#cballmodal').is(':checked')){
      $('input[type="checkbox"].cbdtl').prop('checked',true);
    }else{
      $('input[type="checkbox"].cbdtl').prop('checked',false);
    }
  });

  $('#cballspare').on('click', function(){  
    if($('input[type="checkbox"]#cballspare').is(':checked')){
      $('input[type="checkbox"].cbpart').prop('checked',true);
    }else{
      $('input[type="checkbox"].cbpart').prop('checked',false);
    }
  });

}
 
function add_row() 
{
  var rows  = $('.cbdtl').length+1;
  var html='<tr id="'+rows+'">';
      html +='<td><input type="checkbox" class="cbdtl"></td>';
      html +='<td width="2%">'+rows+'</td>';
      html +='<td>'; 
      html +='<div style="width:40px;float:right;"><input type="checkbox" id="chk_oth'+rows+'"> อื่นๆ</div>';
      html +='<div style="width:81%;float:left;">';
      html +='<div ID="sn'+rows+'" style="display:true;">';
      html +='<select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>'; 
      html +='<option style="font-size:12px;" value="1">SN1500001</option>'; 
      html +='<option style="font-size:12px;" value="2">SN1500002</option>';  
      html +='</select>'; 
      html +='</div>';
      html +='<div ID="oth'+rows+'" style="display:none;"><input type="text" class="form-control" name="reference[]" placeholder="-- กรุณาระบุ เลขที่อ้างอิง --"></div>';
      html +='</div>';
      html +='</td>'; 
      html +='<td><input type="text" class="form-control" name="brand[]"></td>';
      html +='<td><input type="text" class="form-control" name="brand[]"></td>';
      html +='<td><input type="text" class="form-control" name="brand[]"></td>';
      html +='<td><input type="text" class="form-control" name="type[]"></td>';
      html +='<td><input type="text" class="form-control" name="gen[]"></td>';
      html +='<td>';
      html +='<select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>';
      html +='<option style="font-size:12px;" value="1">เครมประกัน</option>';
      html +='<option style="font-size:12px;" value="2">ในประกัน-หลังซ่อม</option>';
      html +='<option style="font-size:12px;" value="3">ในประกัน-หลังขาย</option>';
      html +='<option style="font-size:12px;" value="4">นอกประกัน</option> ';
      html +='</select> '; 
      html +='</td>';
      html +='<td><textarea class="form-control" rows="1" ></textarea></td>  ';
      html +='<td><input type="text" class="form-control" name="requestno[]"></td>';  
      html +='<td><select name="priority_ref[]" ID="priority_ref" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">';
      html +='<option style="font-size:12px;" value="" selected>----เลือก----</option> ';
      html +='<option style="font-size:12px;" value="1" >Routine</option>';
      html +='<option style="font-size:12px;" value="2" >Priority</option>';
      html +='<option style="font-size:12px;" value="3" >Urgent</option>';
      html +='</select> ';
      html +='</td>';
      html +='</tr>';
      $('#tbdetail tbody').append(html); 
      chk_other(rows) 
}

function add_row_spare() 
{ 
  var rows  = $('.cbpart').length+1;
  var html='<tr>';
      html +='<td><input type="checkbox" class="cbpart"></td>'; 
      html +='<td>'; 
      html +='<div style="width:40px;float:right;"><input type="checkbox" id="chk_oth_spare'+rows+'"> อื่นๆ</div>';
      html +='<div style="width:81%;float:left;">';
      html +='<div ID="sn_spare'+rows+'" style="display:true;">';
      html +='<select name="sn_spare" class="selectpicker show-tick form-control  input-sn-spare" data-live-search="true">';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>'; 
      html +='<option style="font-size:12px;" value="1">SN1500001</option>'; 
      html +='<option style="font-size:12px;" value="2">SN1500002</option>';  
      html +='</select>'; 
      html +='</div>';
      html +='<div ID="oth_spare'+rows+'" style="display:none;"><input type="text" class="form-control" name="reference_spare[]" placeholder="-- กรุณาระบุ เลขที่อ้างอิง --"></div>';
      html +='</div>';
      html +='</td>'; 
      html +='<td><input type="text" class="form-control" name="brand[]"></td>';
      htnk +='<td><input type="text" class="form-control" name="worksection[]"></td>';
      html +='<td>';
      html +='<select name="unit" ID="unit" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      html +='<option style="font-size:12px;" value="" selected>-- เลือก --</option>';
      html +='<option style="font-size:12px;" value="1">เครื่อง</option>';
      html +='<option style="font-size:12px;" value="2">กล่อง</option>';
      html +='</select> '; 
      html +='</td>'; 
      html +='</tr>';
      $('#tbspare tbody').append(html); 
      chk_other_spare(rows) 
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

function chk_other_spare(num){
  $('#chk_oth_spare'+num).on('click', function(){  
    if($('input[type="checkbox"]#chk_oth_spare'+num).is(':checked')){
      $('#oth_spare'+num).attr("style","display:true;");
      $('#sn_spare'+num).attr("style","display:none;");
    }else{
      $('#oth_spare'+num).attr("style","display:none;");
      $('#sn_spare'+num).attr("style","display:true;");
    }
  });
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