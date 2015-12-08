<style type="text/css">
.ui-datepicker {z-index: 1999 !important; display: none;}
/*.input-group .form-control {
  position: fixed;
  z-index: inherit !important;
}*/
</style>

<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
 <div class="row form_input" >
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบแจ้งซ่อม</p>    
 	    <select name="noteno" ID="noteno" data-show-subtext="true" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1" data-subtext="บริษัท ปตท. จำกัด (มหาชน)">RR58070001</option> 
        <option style="font-size:12px;" value="2" data-subtext="บริษัท โตโยต้า มอเตอร์ ประเทศไทย จำกัด">RR58070002</option> 
     </select>
    <div class="help-block with-errors"></div>
  </div>
      <div class="col-md-3" style="text-align:left;">
        <p>แผนกทีแจ้งซ่อม-ชื่อผู้แจ้งซ่อม</p>
        <div class="form-group">
        <input type="text" name="" value="Call Center-ดิษฐพงษ์ นิลนามะ" readonly="true" class="form-control"> 
        </div> 
    </div>
      <div class="col-md-3" style="text-align:left;">
    <p>เลขที่<?php echo $pagename ?></p>
    <input type="text" class="form-control" style=" background-color:#81BEF7;color:#FFFFFF;"value="--สร้างโดยระบบ--">
  </div>
  <div class="col-md-3" style="text-align:left;">
        <p>ผู้ออก<?=$pagename?></p>
        <div class="form-group">
        <input type="text" name="" value="Workshop Admin-ดิษฐพงษ์ นิลนามะ" readonly="true" class="form-control"> 
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
      <select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1">กรุงเทพมหานคร</option> 
        <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
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

    <div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset>
        <legend>อาการแจ้งเสีย</legend>
        <div class="row form_input">
          <div class="col-md-12">
          <textarea id="other_attach" class="form-control" cols="1" style="height:35px;" placeholder="" disabled="true"></textarea>
          </div>
          </div>
       </fieldset>
       </div>
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

    <div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset>
        <legend>สิ่งที่ส่งมาด้วย</legend>
        <div class="row form_input">
          <div class="col-md-12">
          <div class="form-group">
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="1"> กล่อง</label>
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="2"> คู่มือ</label> 
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="3"> บัตรรับประกัน</label> 
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="4"> Software</label> 
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="5"> สาย Input</label> 
          <label class="checkbox-inline"><input type="checkbox" name="attach_receive" value="6"> โฟม</label> 
          <label class="checkbox-inline"><input type="checkbox" id="ck_other_attach" name="attach_receive" value="7"> อื่นๆ</label> 
          <textarea id="other_attach" class="form-control" cols="1" style="height:35px;" placeholder="--ระบุรายการอื่นๆ--" disabled="true"></textarea>
          </div>  
          </div>
          </div>
       </fieldset>
       </div>
       </div>

    <div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset>
        <legend>สภาพภายนอกสินค้า</legend>
          <div class="row form_input">
          <div class="col-md-12">
          <div class="form-group">
          <label class="radio-inline">1.ด้านหน้าเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue1" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue1" value="2">ชำรุด</label>

          <label class="radio-inline">2.ด้านหลังเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue2" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue2" value="2">ชำรุด</label>

          <label class="radio-inline">3.ด้านบนเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue3" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue3" value="2">ชำรุด</label>
          </div></div>
          <div class="col-md-12">
          <div class="form-group">
          <label class="radio-inline">4.ด้านล่างเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue4" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue4" value="2">ชำรุด</label>

          <label class="radio-inline">5.ด้านซ้ายเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue5" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue5" value="2">ชำรุด</label>

          <label class="radio-inline">6.ด้านขวาเครื่อง</label>
          <label class="radio-inline"><input type="radio" name="product_issue6" value="1" checked="true">สมบูรณ์</label>
          <label class="radio-inline"><input type="radio" name="product_issue6" value="2">ชำรุด</label>
          </div></div>
          <div class="col-md-12">
           <label class="checkbox-inline"><input type="checkbox" id="ck_product_issue" name="product_issue" value="2">อื่นๆ</label> 
           <textarea id="other_product_issue" class="form-control" cols="1" style="height:35px;" placeholder="--ระบุรายการอื่นๆ--" disabled="true"></textarea>
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
    $( "#sn1date" ).datetimepicker();

  click_transport_radio();
  checkbox_check_all();
  click_control();
  select_control();
  sumtotal();
  //saveData();
  showhideBtn();
  //datetime_picker();
  select_province('PROVINCE_ID1','AMPHUR_ID1');
  select_province('PROVINCE_ID2','AMPHUR_ID2');
  click_ck_other();
  run_auto();
 });

function click_ck_other()
{

  $('#ck_other_attach').on('click',function(){
    if($(this).is(':checked')==true)
    {
     $('#other_attach').prop('disabled',false);
     $('#other_attach').focus();
    }else
    {
    $('#other_attach').val('');
    $('#other_attach').prop('disabled',true);
    }
  });

  $('#ck_product_issue').on('click',function(){
    if($(this).is(':checked')==true)
    {
     $('#other_product_issue').prop('disabled',false);
     $('#other_product_issue').focus();
    }else
    {
    $('#other_product_issue').val('');
    $('#other_product_issue').prop('disabled',true);
    }
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

function datetime_picker()
{
  var startDateTextBox = $('#sn1date');
  var endDateTextBox = $('#sn2date');

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
      $('#noteno option[value="1"]').prop('selected',true);
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

  $('#noteno').on('change', function(){
      run_auto();
  });

}

function select_province(_province,_amphur)
{
    get_sel_province(_province);
    $('#'+_province+'').on('change', function(){
    get_sel_amphur(_amphur,_province);
      $('#'+_amphur+'').prop('disabled',false);
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