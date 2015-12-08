<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh'); 
 });
</script>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
  <div class="row form_input">
    <div class="col-md-3" style="text-align:left;">
      <p>เลขที่ใบเบิกยืม</p>
      <div class="form-group">
       <input type="text" name="" value="TQ58070003" readonly="true" class="form-control">   
      </div>   
    </div> 
    <div class="col-md-3" style="text-align:left;">
        <p>วันที่เบิกยืม</p>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="treq_repair_date" id="treq_repair_date" value="<?=$dtnow?>" class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>แผนกที่เบิกยืม</p>
        <div class="form-group">
        <input type="text" name="" value="Work Shop" readonly="true" class="form-control"> 
        </div> 
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>ผู้เบิกยืม</p>
        <div class="form-group">
        <input type="text" name="" value="สิรวิชญ์ นาทันดอน" readonly="true" class="form-control"> 
        </div> 
    </div>
  </div>
  <div class="row form_input">
    <div class="col-md-3" style="text-align:left;"> 
      <p>ประเภทงาน</p>
        <div class="form-group">
         <select id="" name="" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true" >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="">ติดตั้ง</option> 
            <option style="font-size:12px;" value="" selected>ซ่อม</option> 
            <option style="font-size:12px;" value="">เคลม</option> 
          </select> 
        </div>   
    </div> 
    <div class="col-md-3" style="text-align:left;">
        <p>เลขที่ใบงาน</p> 
        <div class="form-group">
        <select name="sn" ID="selsn" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
          <option style="font-size:12px;" value="" >----เลือก----</option>
          <option style="font-size:12px;" value="1" selected>TR1500001</option> 
          <option style="font-size:12px;" value="2">TR1500002</option> 
          <option style="font-size:12px;" value="insert" >-- + เพิ่ม --</option>
        </select>
        <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>วันที่กำหนดยืม</p>
      <div class="input-group" style="z-index:8  !important;">
      <input type="text" name="treq_repair_date" id="treq_repair_date" value="<?=$dtnow?>"   class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
    <p>วันที่กำหนดคืน</p>         
      <div class="input-group" style="z-index:8  !important;">
      <input type="text" name="treq_repair_date" id="treq_repair_date" value="<?=$dtnow?>"   class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
  </div>
  <div class="row form_input">
    <div class="col-md-3" style="text-align:left;">
      <p>เลขที่ใบ<?php echo "$pagename"?></p>
      <div class="form-group">
       <input type="text" name="" value="TF58070001"  class="form-control" readonly="true" >   
      </div> 
    </div>
    <div class="col-md-3" style="text-align:left;">
        <p>วันที่<?php echo "$pagename"?></p>
        <div class="form-group">
          <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" class="form-control" readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
          </div>
        </div> 
    </div>  
    <div class="col-md-3" style="text-align:left;">
      <p>แผนกที่<?php echo "$pagename"?></p>  
      <div class="form-group" >
        <input type="text" name="" value="คลังสินค้า" readonly="true" class="form-control"> 
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>ชื่อผู้<?php echo "$pagename"?></p>
      <div class="form-group">
       <input type="text" name="" value="ดิษฐพงษ์ นิลนามะ"  readonly="true" class="form-control">   
      </div> 
    </div>
  </div>

<div class="row form_input header_table" style="margin-top:20px;text-align:left;">
  <div class="col-md-12">
  <fieldset>
  <legend>รายการที่ขอเบิกยืม</legend>
  <div class="row form_input header_table" style="text-align:left;">
  <div class="col-md-12"> 
  <table class="table table-striped" id="tbTreqInv">
    <thead>
    <tr>
      <th width="30">ลำดับ</th> 
      <th width="200">รหัสผลิตภัณฑ์</th>
      <th width="250">ชื่อผลิตภัณฑ์</th> 
      <th width="150">Brand</th>
      <th width="150">Type</th>    
      <th width="150">รุ่น</th>   
      <th width="120">จำนวน</th>
      <th width="150">หน่วยนับ</th>
      <th width="150">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody> 
    <tr>
      <td>1</td>
      <td>PPPPP</td> 
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td>
      <td>2</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    <tr>
      <td>2</td>
      <td>PPPPP</td> 
      <td>MODEL-002</td>
      <td></td>
      <td></td>
      <td></td>
      <td>1</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    <tr>
      <td>3</td>
      <td>PPPPP</td> 
      <td>MODEL-003</td>
      <td></td>
      <td></td>
      <td></td>
      <td>1</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    </tbody>
   </table>
   </div>
   </div> 
  </fieldset>
  </div>
</div>

<div class="row form_input header_table" style="margin-top:10px;text-align:left;">
  <div class="col-md-12">
  <fieldset>
  <legend>รายการที่จ่ายยืม</legend>
  <div class="row form_input header_table" style="text-align:left;">
  <div class="col-md-12">
  <div  style="overflow-x:scroll;overflow-y: hidden; ">  
  <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
    <thead>
    <tr>
      <th width="60">ลำดับ</th>
      <th width="300">เลขที่ผลิตภัณฑ์</th>
      <th width="200">ชื่อผลิตภัณฑ์</th> 
      <th width="150">Brand</th>
      <th width="150">Type</th>    
      <th width="150">รุ่น</th>   
      <th width="100">จำนวน</th>
      <th width="120">หน่วยนับ</th>
      <th width="200">วันที่จ่าย</th>
      <th width="150">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody> 
    <tr class="1">
      <td>1.1</td>
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
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>       
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl1_1" value="<?=$dateto?>" class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1" readonly="true"></textarea></td> 
    </tr>
    <tr class="1">
      <td>1.2</td>
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
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td> 
      <td></td>      
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl1_2" value="<?=$dateto?>" class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1" readonly="true"></textarea></td> 
    </tr>
    <tr class="2">
      <td>2.1</td>
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
      <td>MODEL-002</td> 
      <td></td>
      <td></td>
      <td></td> 
      <td></td>     
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl2_1" value="<?=$dateto?>"  class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1" readonly="true"></textarea></td> 
    </tr>
    <tr class="3">
      <td>3.1</td>
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
      <td>MODEL-003</td>
      <td></td>
      <td></td>
      <td></td> 
      <td></td>    
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl3_1" value="<?=$dateto?>" class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar" ></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1" readonly="true"></textarea></td> 
    </tr>
    </tbody>
    <tfoot>
      <th colspan="10"></th>
    </tfoot>
   </table>
   </div>
   </div>
   </div> 
  </fieldset>
  </div>
</div>

    <div class="row form_input">
      <div class="col-md-12" style="text-align:left;">
      <p>หมายเหตุ</p>
      <textarea class="form-control" readonly="true">-</textarea>
      </div>
    </div>
 
    <div class="row form_input" style="margin-top:10px;">
    <div class="col-md-12" style="text-align:left;">
      <input type="radio"  name="status" value="1"  disabled checked=checked> จ่ายแล้ว
      <input type="radio"  name="status" value="2"  disabled > รับแล้ว
      <input type="radio"  name="status" value="0"  disabled > ยกเลิกจ่าย  
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