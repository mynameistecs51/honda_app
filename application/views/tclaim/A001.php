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
    <p>อ้างอิงเลขที่<?=$pagename?>จาก CSMILE</p>
 	  <input type="text" placeholder="--กรุณาระบุ--" class="form-control">
  </div>
  <div class="col-md-3" style="text-align:left;">
        <p>อ้างอิงเลขที่ใบคืน  จาก CSMILE</p>
        <div class="form-group">
        <input type="text" name="" placeholder="--กรุณาระบุ--" class="form-control"> 
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
        <input type="text" name="" value="" placeholder="--กรุณาระบุ--" class="form-control"> 
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

<?php echo $mcmp_info ?>


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
        <legend>ข้อมูลผลิตภัณฑ์ [เดิม]</legend>
        <div class="row form_input header_table" style="margin-top:-10px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_check">
              <thead>
                <tr>
                  <th width="20%">เลขที่ผลิตภัณฑ์ [ Part-Serial-Version ]</th>
                  <th width="20%">ชื่อผลิตภัณฑ์</th>
                  <th width="15%">ประเภทการรับประกัน</th>
                  <th width="10%">วันที่เริ่มประกัน</th>
                  <th width="10%">วันที่สิ้นสุดประกัน</th>
                  <th width="20%">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                      <!--<div style="width:30%;float:left">
                      <input type="text" name="part[]" value="PPPPP" class="form-control">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:39%;float:left">
                      <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:25%;float:right">
                      <input type="text" name="version[]" value="VVVV" class="form-control" >
                      </div>-->
                  <p class="required">*</p>
                  <input type="text" id="snold" name="snold" class="form-control" value="" placeholder="Part-Serial-Version" style="text-transform: uppercase" required="true">                     
                  </td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="แบตเตอรี่"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="ประกันหลังขาย"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2558"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2560"></td>
                  <td><textarea disabled="true" class="form-control" rows="1" style="height:35px;"></textarea></td>
                </tr>
                </tr>
              </tbody>
            </table>  
          </div>  
        </div>
      </fieldset>
    </div>
  </div>

<div class="row form_input" style="text-align:left; margin-top:10px;">
  <div class="col-md-12">
  <fieldset>
  <legend>ข้อมูลผลิตภัณฑ์ [ใหม่]</legend>
    <div class="row form_input header_table" style="margin-top:-10px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_check">
              <thead>
                <tr>
                  <th width="20%">เลขที่ผลิตภัณฑ์ [ Part-Serial-Version ]</th>
                  <th width="20%">ชื่อผลิตภัณฑ์</th>
                  <th width="15%">ประเภทการรับประกัน</th>
                  <th width="10%">วันที่เริ่มประกัน</th>
                  <th width="10%">วันที่สิ้นสุดประกัน</th>
                  <th width="20%">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                      <!--<div style="width:30%;float:left">
                      <input type="text" name="part[]" value="PPPPP" class="form-control" >
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:39%;float:left">
                      <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" >
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:25%;float:right">
                      <input type="text" name="version[]" value="VVVV" class="form-control" >
                      </div>-->
                  <p class="required">*</p>
                  <input type="text" id="snnew" name="snnew" class="form-control" placeholder="Part-Serial-Version" style="text-transform: uppercase" required="true">
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="แบตเตอรี่"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="ประกันหลังขาย"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2558"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2560"></td>
                  <td><textarea class="form-control" rows="1" style="height:35px;"></textarea></td>
                </tr>
                </tr>
              </tbody>
            </table>  
          </div>  
        </div>
  </fieldset>
  </div>
</div>


<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#sn1date" ).datetimepicker();
    /*select_province_fn('MAIN_PROVINCE','MAIN_AMPHUR',62,833);
    select_province_fn('SITE_PROVINCE','SITE_AMPHUR',0,0);*/
    //mcmp_info_fn('main');
 $('#snold').inputmask('[00000-]*{7}[ -VVV]');
 $('#snnew').inputmask({  mask: '*{5}-*{7}-*{3}'});
   //saveData();
  //datetime_picker();
  do_company('main',1);
  do_company('site',2);
 });



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