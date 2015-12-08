<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
 <div class="row form_input">
 <div class="col-md-4" style="text-align:left;">
    <p>เลขที่ผลิตภัณฑ์  [Part-Serial-Version]</p>
  <div class="form-group">
  <p class="required">*</p> 
   <div style="width:30%;float:left">
    <input type="text" name="part[]" value="" class="form-control" >
  </div>
  <b style="padding-top:0px;font-size:20px;float:left"> - </b>
  <div style="width:39%;float:left">
    <input type="text" name="serial[]" value="" class="form-control">
  </div>
  <b style="padding-top:0px;font-size:20px;float:left"> - </b>
  <div style="width:26%;float:right">
    <input type="text" name="version[]" value="" class="form-control">
  </div> 
  </div>   
</div> 
<div class="col-md-4" style="text-align:left;">
  <p>รหัสสินค้า - ชื่อสินค้า</p>
  <div class="form-group" >
  <p class="required">*</p>
    <select id="id_minv" name="minv_name" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">PPPPP-UPS MODEL-001</option> 
      <option style="font-size:12px;" value="2">PPPPP-UPS MODEL-002</option> 
    </select>
   <div class="help-block with-errors"></div>
</div>
</div>
<div class="col-md-4" style="text-align:left;">
  <p>รหัสส่วนประกอบสินค้า</p>
  <div class="form-group">
    <input type="text" name="mbom_hdr_code" ID="mbom_hdr_code" value="" readonly="true" class="form-control">
  </div> 
</div>
</div>

<div class="row form_input">
<div class="col-md-4" style="text-align:left;"> 
<p>อ้างอิงเลขที่ใบ INVOICE</p>
<input type="text" name="ref_invoice_no" id="ref_invoice_no" class="form-control">
</div>
  <div class="col-md-4" style="text-align:left;"> 
    <p>วันที่เริ่มรับประกันสินค้า</p> 
      <div class="input-group" style="z-index:10  !important;">
      <input type="text" name="dtwarranty_from" id="dtwarranty_from" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div> 
  </div>
  <div class="col-md-4" style="text-align:left;"> 
    <p>วันที่สิ้นสุดรับประกันสินค้า</p> 
      <div class="input-group" style="z-index:10  !important;">
      <input type="text" name="dtwarranty_to" id="dtwarranty_to" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div> 
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

<div class="row form_input" style="text-align:left;"> 
<div class="col-md-12">
  <fieldset>
  <legend>รายการ Part การรับประกัน</legend>    
<div class="row form_input header_table" style="margin-top:-20px;">
<div class="col-md-3">
<div class="add addtr" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
</div>
<div class="add deltr" style="margin-bottom:10px;">
    - ลบรายการ
</div>
</div>
</div>
<div class="row form_input header_table" style="margin-top:10px;">
<div class="col-md-12">
 <table class="table table-striped" id="tbdetail">
 	<thead>
 	<tr>
 		<th width="30px"><input type="checkbox" id="cball"></th>  
 		<th width="26%">เลขที่ผลิตภัณฑ์ [ Part-Serial-Version ]</th> 
    <th width="15%">ชื่อส่วนประกอบ</th> 
 		<th width="15%">ประเภทการรับประกัน</th>
    <th width="15%">วันที่เริ่มรับประกัน</th>
    <th width="15%">วันที่สิ้นสุดรับประกัน</th>
    <th>หมายเหตุ</th>
 	</tr>
 	</thead>
 	<tbody ID="list_detail" style="display: none;" >
 	<tr> 
    <td><input type="checkbox" class="cbtr"></td>
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
    <td> 
    <div class="form-group col-md-15">
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>บอร์ด 001</option> 
        <option style="font-size:12px;" value="2">บอร์ด 002</option>  
     </select>
     <div class="help-block with-errors"></div>
    </div>
    </td> 
    <td>
    <div class="form-group col-md-15">
     <select name="wrt_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>ประกันหลังขาย</option> 
        <option style="font-size:12px;" value="2">ประกันหลังซ่อม</option> 
     </select>
    <div class="help-block with-errors"></div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
        <div class="input-group" style="z-index:10  !important;">
          <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
      <div class="input-group" style="z-index:10  !important;">
        <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div> 
    </td>
 		<td><input type="text" class="input form-control" name="namesn_new[]"></td>	
</tr>
<tr> 
    <td><input type="checkbox" class="cbtr"></td>
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
    <td> 
    <div class="form-group col-md-15">
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" >บอร์ด 001</option> 
        <option style="font-size:12px;" value="2" selected>บอร์ด 002</option>  
     </select>
     <div class="help-block with-errors"></div>
    </div>
    </td> 
    <td>
    <div class="form-group col-md-15">
     <select name="wrt_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>ประกันหลังขาย</option> 
        <option style="font-size:12px;" value="2">ประกันหลังซ่อม</option> 
     </select>
    <div class="help-block with-errors"></div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
        <div class="input-group" style="z-index:10  !important;">
          <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
      <div class="input-group" style="z-index:10  !important;">
        <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div> 
    </td>
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
</tr>
<tr> 
    <td><input type="checkbox" class="cbtr"></td>
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
    <td> 
    <div class="form-group col-md-15">
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" >บอร์ด 001</option> 
        <option style="font-size:12px;" value="2" selected>บอร์ด 003</option>  
     </select>
     <div class="help-block with-errors"></div>
    </div>
    </td> 
    <td>
    <div class="form-group col-md-15">
     <select name="wrt_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>ประกันหลังขาย</option> 
        <option style="font-size:12px;" value="2">ประกันหลังซ่อม</option> 
     </select>
    <div class="help-block with-errors"></div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
        <div class="input-group" style="z-index:10  !important;">
          <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div> 
    </td>
    <td>
    <div class="form-group col-md-15">
      <div class="input-group" style="z-index:10  !important;">
        <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div> 
    </td>
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
</tr>
 	</tbody>
 </table>	
</div>	
</div>

</fieldset>
</div>
</div>

<div class="row form_input header_table"  >
<div class="col-md-12" style="text-align:left;">
  <p>หมายเหตุ</p>
  <textarea class="form-control"></textarea>
</div>
</div>
</div>

<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#dtwarranty_from,#dtwarranty_to" ).datetimepicker();  
  click_control();  
  saveData(); 
  select_minv();
 });


function click_control()
{
  $('.addtr').on('click', function(){   
    add_tr();
  });

  $('.deltr').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
      if($('input[type="checkbox"].cbtr').is(':checked'))
      {
        $('input[type="checkbox"].cbtr:checkbox:checked').parents('#tbdetail tbody tr').remove(); 
      }
    }  
  });
}

function add_tr()
{
  var trhtml ='<tr>';
      trhtml +='<td><input type="checkbox" class="cbtr"></td>'; 
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
      trhtml +='<td> ';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1" >INV3010- บอร์ด 001</option> ';
      trhtml +='<option style="font-size:12px;" value="2">INV3011- บอร์ด 002</option> ';
      trhtml +='<option style="font-size:12px;" value="3">INV3012- แบตเตอรี่ 001</option> ';
      trhtml +='<option style="font-size:12px;" value="4">INV3013- แบตเตอรี่ 002</option> ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div>';
      trhtml +='</td> ';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<select name="wrt_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" >----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1" selected>ประกันหลังขาย</option> ';
      trhtml +='<option style="font-size:12px;" value="2">ประกันหลังซ่อม</option> ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<div class="input-group" style="z-index:10  !important;">';
      trhtml +='<input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</div> ';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group col-md-15">';
      trhtml +='<div class="input-group" style="z-index:10  !important;">';
      trhtml +='<input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td><input type="text" class="input form-control" name="namesn_new[]"></td>';
      trhtml +='</tr>';
   $('#tbdetail tbody').append(trhtml);  
   $('.selectpicker').selectpicker('refresh');
}

function select_minv()
{
  $('#id_minv').on('change',function(){ 
    $('#list_detail').attr('style','display: true;'); 
    $('#mbom_hdr_code').val('BOM1500001-MODEL-001');
    cball();
  });
}

function cball()
{
  $('#cball').on('click',function(){
    var chkall=$('input[type="checkbox"]#cball').is(':checked'); 
    if(chkall==true)
    {
      $('input[type="checkbox"].cbtr').prop('checked',true);
    }else{
      $('input[type="checkbox"].cbtr').prop('checked',false);
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