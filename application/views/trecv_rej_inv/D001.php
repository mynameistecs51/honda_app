<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#treq_repair_date,#dateTrecv").datetimepicker(); 
  click_transport_radio();
  checkbox_check_all();
  click_control();
  select_control();
  sumtotal();
  saveData();
  showhideBtn();

 });


function click_control()
{
  $('.addclaim').on('click', function(){   
    var tr = $('table#tb_claim tbody tr:last').clone();
    $(tr).find('input:text.sn').val('');
    $('#tb_claim tbody').append(tr);
    click_tbclaim_checkbox();
    checkbox_check_all();
    sumtotal();
    showhideBtn();
  });

  $('.delclaim').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_claim tbody tr').remove();
                   add_tr();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_claim tbody tr').remove();
                  sumtotal();
                  showhideBtn();
               }
         }  
  });

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
    trhtml +='<td></td>';
    trhtml +='<td>';
    trhtml +='<div class="form-group">';
    trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
    trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
    trhtml +='<option style="font-size:12px;" value="1">Model A</option>'; 
    trhtml +='<option style="font-size:12px;" value="2">Model B</option>'; 
    trhtml +='</select>';
    trhtml +='<div class="help-block with-errors"></div>';
    trhtml +='</div>';
    trhtml +='</td>';
    trhtml +='<td><input type="text" class="input form-control tclaim_amount" name="amount[]" value="1" style="text-align:right;"></td>';
    trhtml +='<td><p class="required">*</p><input type="text" class="input form-control" name="namesn_old[]" required="true"></td>';
    trhtml +='<td><input type="text" class="input form-control" name="namesn_new[]"></td>';
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
    <p>เลขที่ใบคืนผลิตภัณฑ์</p>
    <div class="form-group">
     <input type="text" name="" value="TF58070001" readonly="true" class="form-control">   
    </div>   
  </div> 
  <div class="col-md-3" style="text-align:left;">
      <p>วันที่คืนผลิตภัณฑ์</p>
      <div class="form-group">
        <div class="input-group" style="z-index:8  !important;">
        <input type="text" name="docdate" id="treq_repair_date_" value="<?=$dtnow?>" class="form-control "  readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>แผนกที่คืนผลิตภัณฑ์</p>  
    <div class="form-group" >
      <input type="text" name="" value="Work Shop" readonly="true" class="form-control"> 
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อผู้คืนผลิตภัณฑ์</p>
    <div class="form-group">
     <input type="text" name="" value="สิรวิชญ์ นาทันดอน"  readonly="true" class="form-control">   
    </div> 
  </div>
</div>
<div class="row form_input">
  <div class="col-md-4" style="text-align:left;">
      <p>ประเภทงาน</p>
      <div class="form-group">
       <select id="" name="" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value=""selected>ติดตั้ง</option> 
          <option style="font-size:12px;" value="">ซ่อม</option>
          <option style="font-size:12px;" value="">เคลม</option>  
        </select> 
      </div> 
  </div>
  <div class="col-md-4" style="text-align:left;">
    <p>เลขที่ใบงาน</p>
    <div class="form-group"> 
        <select name=""  class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>TR1500001</option> 
        <option style="font-size:12px;" value="2">TR1500002</option> 
        </select>
    <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4" style="text-align:left;">
    <p>ประเภทการคืน</p>
    <div class="form-group">
    <select id="" name="" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="" >
    <option style="font-size:12px;" value="" >----เลือก----</option>
    <option style="font-size:12px;" value=""selected>อะไหล่</option> 
    <option style="font-size:12px;" value="">Spare Part</option>
    </select> 
    </div> 
  </div>
</div>
<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบ<?php echo "$pagename"?></p>
    <div class="form-group">
     <input type="text" name="" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >   
    </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
      <p>วันที่<?php echo "$pagename"?></p>
      <div class="form-group">
        <div class="input-group" style="z-index:8  !important;">
        <input type="text" name="docdate" id="treq_repair_date_" value="<?=$dtnow?>" class="form-control "  readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>แผนกที่<?php echo "$pagename"?></p>  
    <div class="form-group" >
      <input type="text" name="" value="Store" readonly="true" class="form-control"> 
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อผู้<?php echo "$pagename"?></p>
    <div class="form-group">
     <input type="text" name="" value="สิรวิชญ์ นาทันดอน"  readonly="true" class="form-control">   
    </div> 
  </div>
</div>

<div class="row form_input" style="text-align:left;"> 
<div class="col-md-12">
<fieldset>
<legend>รายการที่รับคืนผลิตภัณฑ์</legend>
<div class="row form_input">
<div class="col-md-12">
<div style="overflow-x:scroll;overflow-y: hidden; ">
 <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
    <thead>
    <tr>
      <th width="50">ลำดับ</th>
      <th width="200">เลขที่ใบรับผลิตภัณฑ์</th>
      <th width="300">เลขที่ผลิตภัณฑ์</th>
      <th width="200">Model</th>
      <th width="200">Brand</th>
      <th width="200">Product Type</th>    
      <th width="80">จำนวน</th>
      <th width="150">หน่วยนับ</th>
      <th width="150">สถานะอะไหล่</th>
      <th width="150">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody>
     <tr>
      <td>1</td>
      <td>CS1506-0390</td>
      <td>PPPPP-SSYYLXXX-VVV</td>
      <td>CHUPHOTIC</td> 
      <td>BATTERY</td> 
      <td>BAT-002</td> 
      <td>5</td>  
      <td>ก้อน</td>
      <td>ของดี</td>
      <td>
        <textarea class="form-control" rows="1"></textarea>
      </td>
    </tr>
     <tr>
      <td>2</td>
      <td>CS1506-0390</td>
      <td>PPPPP-SSYYLXXX-VVV</td>
      <td>CHUPHOTIC</td> 
      <td>BATTERY</td> 
      <td>BAT-003</td> 
      <td>5</td>   
      <td>ก้อน</td>
      <td>ของเสีย</td>
      <td>
        <textarea class="form-control" rows="1"></textarea>
      </td>
    </tr>
    </tbody>
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
      <textarea class="form-control"></textarea>
    </div>
</div>


  <div class="row form_input" style="margin-top:10px;">
  <div class="col-md-12" style="text-align:left;">
  <p>สถานะ</p>  
    <input type="radio"  name="" value="1"  disabled > รอรับคืน
    <input type="radio"  name="" value="2" disabled checked=checked;>  รับคืนแล้ว  
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
