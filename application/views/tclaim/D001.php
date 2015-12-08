<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
 <div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบแจ้งซ่อม</p>    
 	    <select name="noteno" ID="noteno" data-show-subtext="true" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" data-subtext="บริษัท ปตท. จำกัด (มหาชน)" selected>RR58070001</option> 
        <option style="font-size:12px;" value="2" data-subtext="บริษัท โตโยต้า มอเตอร์ ประเทศไทย จำกัด">RR58070002</option> 
     </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>อ้างอิงเลขที่<?=$pagename?>จาก CSMILE</p>
 	  <input type="text" placeholder="--กรุณาระบุ--" class="form-control" value="CS150001">
  </div>
  <div class="col-md-3" style="text-align:left;">
        <p>อ้างอิงเลขที่ใบคืน  จาก CSMILE</p>
        <div class="form-group">
        <input type="text" name="" placeholder="--กรุณาระบุ--" class="form-control" value="CC150002"> 
        </div> 
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>แผนกทีแจ้งซ่อม-ชื่อผู้แจ้งซ่อม</p>
        <div class="form-group">
        <input type="text" name="" value="Call Center-ดิษฐพงษ์ นิลนามะ" readonly="true" class="form-control"> 
        </div> 
    </div>
</div>

<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
        <p>อ้างอิงเลขใบรับส่งผลิตภัณฑ์</p>
        <div class="form-group">
        <input type="text" name=""  placeholder="--กรุณาระบุ--"  value="CM-20150001" class="form-control"> 
        </div> 
    </div>
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่<?php echo $pagename ?></p>
    <input type="text" class="form-control" style=" background-color:#81BEF7;color:#FFFFFF;"value="--สร้างโดยระบบ--">
  </div>
  <div class="col-md-3" style="text-align:left;">
     <p>วัน-เวลาที่ออก<?=$pagename?></p>
    <div class="input-group" style="z-index:9  !important;">
    <input type="text" name="docdate" id="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
    <div class="col-md-3" style="text-align:left;">
       <p>แผนก-ชื่อผู้ออกใบเคลม</p>
        <div class="form-group">
        <input type="text" name="" value="Sale-พุฒิพงศ์ ห้วงน้ำ" readonly="true" class="form-control"> 
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
      <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1">THAINOLOGY</option> 
        <option style="font-size:12px;" value="2">TNLG</option> 
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
      <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1">กรุงเทพมหานคร</option> 
        <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
     </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="col-md-5">
    <div class="row form_input" style="text-align:left; margin:0;">    
    <p>ชื่ออำเภอ/เขต</p>
    <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
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

    <div class="col-md-6">
    <fieldset>
      <legend>ข้อมูลไซต์งาน</legend>     
      <div class="row form_input" style="text-align:left; margin-top:-20px; ">
        <div class="col-md-12">
          <input type="checkbox" id="chk_com_sit"> เลือกที่เดียวกับบริษัท 
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
    <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1">เมืองสมุทรปราการ</option> 
        <option style="font-size:12px;" value="2">เขตดอนเมือง</option>
     </select>
    <div class="help-block with-errors"></div>
  </div>
  </div>
</div>    

    </fieldset>
    </div>
</div>

<!-- <div class="row form_input">
 
<div class="col-md-6 offset6" style="text-align:left;">
<p>ยานพาหนะ</p>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio1" value="1" checked="true">รถบริษัท</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio2" value="2">รถรับจ้าง</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio3" value="3">รถส่วนตัว</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio4" value="4">อื่นๆ</label>
<label class="radio-inline">
<input class="form-control " type="text" id="other_transport" readonly="true" style="margin-left:-30px; width:235px;" placeholder="--กรุณาระบุยานพาพนะที่ใช้--">
</label> 
</div>
<div class="col-md-6 offset6"></div>
</div> -->


<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
<p>หมายเหตุ</p>
<textarea class="form-control"></textarea>
</div>
</div>

<div class="col-md-12" style="text-align:left;">
<fieldset><legend>ผลิตภัณฑ์</legend>   
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>เลขที่ผลิตภัณฑ์</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="PPPPP-SSYYLXXX-VVV" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ชื่อผลิตภัณฑ์</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS-Model 001" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Issue No</p>
    <div class="form-group"> 
      <input type="text" name="issue[]" id="issue" value="CM580800001" class="form-control" readonly="true">
    </div>
</div>
</div>
<div class="row form_input"> 
<div class="col-md-4" style="text-align:left;">
    <p>Model</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="V01" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Brand</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="CHUPHOTIC" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Product Type</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS 1 PHASE" class="form-control" readonly="true">
    </div>
</div> 
</div>
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>Rated Power</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS 1 PHASE" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ประเภทการติดตั้ง</p>
    <div class="form-group"> 
      <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>1 PHASE</option>   
      </select>  
    </div>
</div> 
</div>
</fieldset>
</div>

  <div class="row form_input header_table" style="text-align:left; margin-top:10px;">
    <div class="col-md-12">
      <fieldset>
        <legend>รายการประกัน</legend>
        <div class="row form_input header_table" style="margin-top:-10px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_check">
              <thead>
                <tr>
                  <th width="30%">เลขที่ผลิตภัณฑ์ [ Part-Serial-Version ]</th>
                  <th width="20%">ชื่อผลิตภัณฑ์</th>
                  <th width="15%">ประเภทการรับประกัน</th>
                  <th width="10%">วันที่เริ่มประกัน</th>
                  <th width="10%">วันที่สิ้นสุดประกัน</th>
                  <th width="15%">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                      <div style="width:30%;float:left">
                      <input type="text" name="part[]" value="PPPPP" class="form-control" readonly="true">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:39%;float:left">
                      <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" readonly="true">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:25%;float:right">
                      <input type="text" name="version[]" value="VVVV" class="form-control" readonly="true">
                      </div>                     
                  </td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="แบตเตอรี่"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="ประกันหลังขาย"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2558"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2560"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="-"></td>
                </tr>
                </tr>
              </tbody>
            </table>  
          </div>  
        </div>
      </fieldset>
    </div>
  </div>

<div class="row form_input">
<div class="col-md-3" style="text-align:left;">
<p>ผู้สร้างรายการ</p>   
  <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
</div>
<div class="col-md-3" style="text-align:left;">
<p>วันที่-เวลาสร้างรายการ</p>   
  <div class="input-group" style="z-index:9  !important;">
    <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>
<div class="col-md-3" style="text-align:left;">
<p>ผู้แก้ไขรายการล่าสุด</p>   
  <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
</div>
<div class="col-md-3" style="text-align:left;">
<p>วันที่-เวลาแก้ไขรายการล่าสุด</p>   
  <div class="input-group" style="z-index:9  !important;">
    <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>
</div>

<div class="row form_input header_table" style="margin-top:20px;">
<div class="col-md-3">
<div class="noneadd addclaim" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
</div>
<div class="noneadd delclaim" style="margin-bottom:10px;">
    - ลบรายการ
</div>
</div>
<div class="col-md-12" style="overflow-x:scroll;overflow-y: hidden; ">
 <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
 	<thead>
  <tr>
    <th width="30"><input type="checkbox" id="cballmodal"></th>
    <th width="200">รหัสผลิตภัณฑ์ [S/N] [เดิม]</th>
    <th width="200">รุ่น [เดิม]</th>
    <th width="200">ชื่อสินค้า [เดิม]</th>
    <th width="200">วันที่เริ่มรับประกัน [เดิม]</th>
    <th width="200">วันที่สิ้นสุดรับประกัน [เดิม]</th>
    <th width="200">รหัสผลิตภัณฑ์ [S/N] [ใหม่]</th>
    <th width="200">รุ่น [ใหม่]</th>
    <th width="200">ชื่อสินค้า [ใหม่]</th>
    <th width="200">วันที่เริ่มรับประกัน [ใหม่]</th>
    <th width="200">วันที่สิ้นสุดรับประกัน [ใหม่]</th>
  </tr>
 	</thead>
 	<tbody>
 	<tr>
 		<td><input type="checkbox" class="cbsmodal"></td>
    <td><p class="required">*</p><input type="text" class="input form-control sn" name="namesn_old[]" required="true" value="SN1500001"></td>
    <td>
    <div class="form-group">
         <select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="1" selected>Model A</option> 
            <option style="font-size:12px;" value="2">Model A</option> 
         </select>
      <div class="help-block with-errors"></div>
    </div>
    </td>
    <td style=" vertical-align:middle">สินค้า B</td>
    <td><div class="input-group" style="z-index:9  !important;">
    <input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div></td>
        <td><div class="input-group" style="z-index:9  !important;">
    <input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div></td>
    <td><p class="required">*</p><input type="text" class="input form-control sn" name="namesn_new[]" required="true" value="SN1500002"></td>  
    <td>
		<div class="form-group">
         <select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="1">Model A</option> 
            <option style="font-size:12px;" value="2" selected>Model B</option> 
         </select>
     	<div class="help-block with-errors"></div>
		</div>
		</td>
    <td style=" vertical-align:middle">สินค้า B</td>
    <td><div class="input-group" style="z-index:9  !important;">
    <input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div></td>
        <td><div class="input-group" style="z-index:9  !important;">
    <input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div></td>
 	</tr>
 	</tbody>
 	<!-- <tfoot>
 	<tr>
 		<th colspan="2" style="text-align:right;">รวมจำนวนสินค้า Claim</th>
 		<th><input type="text" class="input form-control" id="tclaim_total" name="tclaim_total" style="text-align:right;" readonly="true"></th>
 		<th colspan="2">เครื่อง/ลูก</th>
 	</tr>
 	</tfoot> -->
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


<script type='text/javascript'>
$(function(){  
    
    $('textarea.form-control,input.form-control').attr('readonly',true);
    $('input.form-control:radio,input.form-control:checkbox,select.form-control').attr('disabled',true);

    $('.selectpicker').selectpicker('refresh');
  click_transport_radio();
  checkbox_check_all();
  click_control();
  select_control();
  sumtotal();
  //saveData();
  showhideBtn();
  //datetime_picker();
  run_auto();
 });

function run_auto()
  {
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

  }

function datetime_picker()
{
  var startDateTextBox = $('#range_example_2_start');
  var endDateTextBox = $('#range_example_2_end');

$.timepicker.datetimeRange(
  startDateTextBox,
  endDateTextBox,
  {
    minInterval: (1000*60*60), // 1hr
    changeMonth: true,
    changeYear: true, 
    dateFormat: 'dd/mm/yy',
    yearRange: "-100:+0",
    monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting
    timeFormat: 'HH:mm',
    start: {}, // start picker options
    end: {} // end picker options         
  });
}


function click_control()
{
  $('.addclaim').on('click', function(){   
    add_tr();
  });

  $('.delclaim').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_claim tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_claim tbody tr').remove();
               }
         }
      sumtotal();
      showhideBtn();  
  });

  $('#noteno').on('change', function(){
      run_auto();
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
      trhtml +='<td><p class="required">*</p><input type="text" class="input form-control sn" name="namesn_old[]" required="true"></td>';
      trhtml +='<td>';
      trhtml +='<div class="form-group">';
      trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true" >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">Model A</option> ';
      trhtml +='<option style="font-size:12px;" value="2">Model B</option> ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td></td>';
      trhtml +='<td><div class="input-group" style="z-index:9  !important;">';
      trhtml +='<input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div></td>';
      trhtml +='<td><div class="input-group" style="z-index:9  !important;">';
      trhtml +='<input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div></td>';
      trhtml +='<td><p class="required">*</p><input type="text" class="input form-control sn" name="namesn_new[]" required="true"></td>  ';
      trhtml +='<td>';
      trhtml +='<div class="form-group">';
      trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true" >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">Model A</option> ';
      trhtml +='<option style="font-size:12px;" value="2">Model B</option> ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td></td>';
      trhtml +='<td><div class="input-group" style="z-index:9  !important;">';
      trhtml +='<input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div></td>';
      trhtml +='<td><div class="input-group" style="z-index:9  !important;">';
      trhtml +='<input type="text" name="sn1date" id="sn1date" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div></td>';
      trhtml +='</tr>';
   $('#tb_claim tbody').append(trhtml);
   click_tbclaim_checkbox();
   checkbox_check_all();
   sumtotal();
   showhideBtn();
   $('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
  var trtotal=$('#tb_claim tbody tr').length;
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
        $('#tb_claim tbody tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_claim tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
  });

  $('#tb_claim tbody tr .cbsmodal').on('click',function(){
    var cb_status = $(this).is(':checked');
    var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#tb_claim tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_claim tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
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
         $('#form').on('submit', function(e){
            if(e.isDefaultPrevented()) {
              alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
           /* e.preventDefault();
            var form = $('#form').serialize();
              $.ajax({
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
              });                */
            }
          });
      }
</script>