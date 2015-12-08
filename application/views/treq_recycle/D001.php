<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
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
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="row form_input">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบ<?php echo $pagename; ?></p>
  <div class="form-group">
  <input type="text" name="msn_hdr_code" value="RR58070001"  class="form-control"  readonly="true" >   
  </div>   
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <div class="input-group" style="z-index:99999  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date_"  value="<?=$dtnow?>" readonly="true" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่แจ้งซ้อม</p>
  <div class="form-group">
  <input type="text" name="" id="" value="Store" class="form-control" readonly="readonly">
  </div>   
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้แจ้ง</p>
  <div class="form-group">
  <input type="text" name="" id="" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="readonly">  
  </div>   
</div>    
</div>

  <div class="row form_input header_table" style="margin-top:20px;">
  <div class="col-md-12" style="overflow-x:scroll;overflow-y: hidden; ">
  <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
    <thead>
      <tr>
      <th width="200">เลขที่ใบรับผลิตภัณฑ์</th>
      <th width="300">รหัสผลิตภัณฑ์</th>
      <th width="150">ชื่อผลิตภัณฑ์</th>
      <th width="150">Brand</th>
      <th width="150">Type</th>    
      <th width="150">รุ่น</th>
      <th width="250">อาการที่เสีย</th>
      <th width="130">สถานะการซ่อม</th>
      <th width="100">หมายเหตุ</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><input type="text" name="" id="" value="T00001" class="form-control" readonly ></td>
      <td>
        <div style="width:30%;float:left">
        <input type="text" name="part[]" value="PPPPP" class="form-control" readonly >
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
        <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" readonly="">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
        <input type="text" name="version[]" value="VVV" class="form-control" readonly="">
        </div> 
      </td>
      <td><input  class="form-control" rows="1" readonly value="BATTERY"></td> 
      <td><input  class="form-control" rows="1" readonly value="CHUPHOTIC"></td>  
      <td><input  class="form-control" rows="1" readonly value="BATTERY"></td>
      <td><input  class="form-control" rows="1" readonly value="BATTERY-rs5k"></td> 
      <td><textarea  class="form-control" rows="1" readonly >แบตเตอรี่ ไม่เก็บไฟ</textarea></td>
      <td><input  class="form-control" rows="1" readonly ></td>  
      <td><textarea  class="form-control" rows="1" readonly ></textarea></td>  
      </tr>
      <tr>
      <td><input type="text" name="" id="" value="T00001" class="form-control" readonly ></td>
      <td>
        <div style="width:30%;float:left">
        <input type="text" name="part[]" value="PPPPP" class="form-control" readonly >
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
        <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" readonly="">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
        <input type="text" name="version[]" value="VVV" class="form-control" readonly="">
        </div> 
      </td>
      <td><input  class="form-control" rows="1" readonly value="BATTERY"></td> 
      <td><input  class="form-control" rows="1" readonly value="CHUPHOTIC"></td>  
      <td><input  class="form-control" rows="1" readonly value="BATTERY"></td>
      <td><input  class="form-control" rows="1" readonly value="BATTERY-rs5k"></td> 
      <td><textarea  class="form-control" rows="1" readonly >แบตเตอรี่ ไม่เก็บไฟ</textarea></td>
      <td><input  class="form-control" rows="1" readonly ></td>  
      <td><textarea  class="form-control" rows="1" readonly ></textarea></td>  
      </tr>
    </tbody>
  <tfoot>
  <tr>
  <th colspan="10" style="text-align:right;"> </th> 
  </tr>
  </tfoot>
  </table>  
  </div>  
</div>

  <div class="row form_input">
    <div class="col-md-12" style="text-align:left;">
      <p>หมายเหตุ</p>
      <div class="form-group">
        <textarea class="form-control" readonly="readonly"></textarea>
      </div>
    </div>
  </div>
  <div class="row form_input" style="margin-top:10px;">
  <div class="col-md-12" style="text-align:left;">
  <p>สถานะ</p>  
    <input type="radio"  name="" value="1"  disabled checked=checked;> รอซ่อม
    <input type="radio"  name="" value="2" disabled >  กำลังดำเนินการ
    <input type="radio"  name="" value="3" disabled >  ซ่อมเสร็จแล้ว   
    <input type="radio"  name="" value="0" disabled >  ยกเลิก 
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