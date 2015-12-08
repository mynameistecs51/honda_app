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
 
<div class="row form_input header_table"> 
<div class="col-md-12" >
  <div style="overflow-x:scroll;overflow-y: hidden;">
  <table class="table table-striped" id="tbdetail" style="table-layout: fixed;word-wrap: break-word;" >
    <thead>
      <tr> 
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
      <input type="radio"  name="is_spare" class="is_spare" value="1" > ไม่ระบุ
      <input type="radio"  name="is_spare" class="is_spare" value="2" > เครื่อง Stanby
      <input type="radio"  name="is_spare" class="is_spare" value="3" checked="true"> Spare part 
      <input type="radio"  name="is_spare" class="is_spare" value="4" > General part
    </div>
</div>
</div>

  <div class="row form_input header_table spare-table" > 
  <div class="col-md-12" > 
  <table class="table table-striped" id="tbspare">
    <thead>
      <tr> 
      <th width="280">Part No</th>
      <th>Part Name</th>
      <th width="100">ภาคการทำงาน</th>
      <th width="150">Qty</th>    
      </tr>
    </thead>
    <tbody>
      <tr> 
      <td>
        <div style="width:40px;float:right;"> 
          <input type="checkbox" id="chk_oth_spare1"> อื่นๆ  
        </div>
        <div style="width:81%;float:left;"> 
          <div ID="sn_spare1" style="display: true;">
          <select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true">
            <option style="font-size:12px;" value="" >-- เลือก --</option> 
            <option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>  
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


<div class="row form_input">
    <div class="col-md-12" style="text-align:left;">
    <p>สถานะ</p>  
      <input type="radio"  name="status" value="1"  disabled checked=checked> ใช้งาน
      <input type="radio"  name="status" value="2" disabled >  ยกเลิก  
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>ผู้สร้าง</p>   
      <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>วันที่สร้าง</p>   
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>ผู้แก้ไขล่าสุด</p>   
      <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>วันที่แก้ไขล่าสุด</p>   
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
</div>

<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#treq_repair_date,#dateTrecv").datetimepicker(); 
 });
</script>