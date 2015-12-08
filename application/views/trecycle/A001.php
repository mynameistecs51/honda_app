<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#startdate,#enddate,#issuedate,#startBattery,#endBattery" ).datetimepicker({ 
      changeMonth: true,
      changeYear: true, 
      dateFormat: 'dd/mm/yy',
      yearRange: "-100:+0",
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting

    });
  click_transport_radio();
  click_control();
  select_control();
  sumtotal();
  saveData();
  showhideBtn();

  click_checkbox_all('cballmodal_check','cbsmodal_check','tb_check');
  click_checkbox_all('cballmodal_price','cbsmodal_price','tb_price');
  click_checkbox_all('cballmodal_repair','cbsmodal_repair','tb_repair');
  checkbox_check_all('cballmodal_check','cbsmodal_check');
  checkbox_check_all('cballmodal_price','cbsmodal_price');
  checkbox_check_all('cballmodal_repair','cbsmodal_repair');

 });


function click_control()
{
  $('.add_check').on('click', function(){
    add_tr_check();
  });
  $('.add_price').on('click', function(){
    add_tr_price();
  });
  $('.add_repair').on('click', function(){
    add_tr_repair();
  });

  $('.del_check').on('click', function(){
    if($('input[type="checkbox"].cbsmodal_check').is(':checked') || $('input[type="checkbox"]#cballmodal_check').is(':checked')){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_check').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_check:checkbox:checked').parents('#tb_check tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_check').is(':checked')){
                  $('#tb_check tbody tr').remove();
               }
          }
      }
      showhideBtn();
  });

  $('.del_price').on('click', function(){
    if($('input[type="checkbox"].cbsmodal_price').is(':checked') || $('input[type="checkbox"]#cballmodal_price').is(':checked')){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_price').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_price:checkbox:checked').parents('#tb_price tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_price').is(':checked')){
                  $('#tb_price tbody tr').remove();
               }
         } }
  showhideBtn();
  });

  $('.del_repair').on('click', function(){
    if($('input[type="checkbox"].cbsmodal_repair').is(':checked') || $('input[type="checkbox"]#cballmodal_repair').is(':checked')){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_repair').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_repair:checkbox:checked').parents('#tb_repair tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_repair').is(':checked')){
                  $('#tb_repair tbody tr').remove();
               }
         } }
  showhideBtn();
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

function add_tr_price()
{
  var trhtml ='<tr>';
    trhtml +='<td><input type="checkbox" class="cbsmodal_price"></td>';
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
    trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='</tr>';
  $('#tb_price tbody').append(trhtml);
  click_checkbox_all('cballmodal_price','cbsmodal_price','tb_price');
  checkbox_check_all('cballmodal_price','cbsmodal_price');
  showhideBtn();
  $('.selectpicker').selectpicker('refresh');
}

function add_tr_check()
{
  var trhtml ='<tr>';
    trhtml +='<td><input type="checkbox" class="cbsmodal_check"></td>';
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
    trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
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
    trhtml +='</tr>';
  $('#tb_check tbody').append(trhtml);
  click_checkbox_all('cballmodal_check','cbsmodal_check','tb_check');
  checkbox_check_all('cballmodal_check','cbsmodal_check');
  showhideBtn();
  $('.selectpicker').selectpicker('refresh');
}

function add_tr_repair()
{
  var trhtml ='<tr>';
    trhtml +='<td><input type="checkbox" class="cbsmodal_repair"></td>';
    trhtml +='<td>';
    trhtml +='<div class="form-group">';
    trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
    trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
    trhtml +='<option style="font-size:12px;" value="1">S/N A</option> ';
    trhtml +='<option style="font-size:12px;" value="2">S/N B</option> ';
    trhtml +='</select>';
    trhtml +='<div class="help-block with-errors"></div>';
    trhtml +='</div>';
    trhtml +='</td>';
    trhtml +='<td><input readonly type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='<td>';
    trhtml +='<div class="form-group">';
    trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
    trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
    trhtml +='<option style="font-size:12px;" value="1">S/N A</option> ';
    trhtml +='<option style="font-size:12px;" value="2">S/N B</option> ';
    trhtml +='</select>';
    trhtml +='<div class="help-block with-errors"></div>';
    trhtml +='</div>';
    trhtml +='</td>';
    trhtml +='<td><input readonly type="text" class="form-control" name="namemodel[]"></td>';
    trhtml +='<td><textarea class="form-control" style=" padding:5px; height:34px;"></textarea></td>';
    trhtml +='<td><textarea class="form-control" style=" padding:5px; height:34px;"></textarea></td>';
    trhtml +='</tr>';
  $('#tb_repair tbody').append(trhtml);
  click_checkbox_all('cballmodal_repair','cbsmodal_repair','tb_repair');
  checkbox_check_all('cballmodal_repair','cbsmodal_repair');
  showhideBtn();
  $('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
  var trtotal=$('#tb_check tbody tr').length;
   if(trtotal>4)
    {
    $('div.footer_table_check').show();
      }else
    {
    $('div.footer_table_check').hide();
    }
  var trtotal=$('#tb_price tbody tr').length;
   if(trtotal>4)
    {
    $('div.footer_table_price').show();
      }else
    {
    $('div.footer_table_price').hide();
    }
  var trtotal=$('#tb_repair tbody tr').length;
   if(trtotal>4)
    {
    $('div.footer_table_repair').show();
      }else
    {
    $('div.footer_table_repair').hide();
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

function click_checkbox_all(_id,_class,_tb)
{
  $('#'+_id).on('click',function(){
    var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].'+_class).prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#'+_tb+' tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
  });

  $('#'+_tb+' tbody tr .'+_class).on('click',function(){
    var cb_status = $(this).is(':checked');
    var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#'+_tb+' tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
      }

  });

}

 function checkbox_check_all(_id,_class)
  {
    $('input[type="checkbox"].'+_class).each(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
        }
    });

     $('input[type="checkbox"].'+_class).click(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
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
    <p>เลขที่ใบแจ้งซ้อมภายใน</p>
    <div class="form-group">
      <input type="text" name="msn_hdr_code" value="RR58070001"  class="form-control"  readonly="true" >   
    </div>   
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>วันที่แจ้งซ้อมภายใน</p>
    <div class="input-group" style="z-index:99999  !important;">
      <input type="text" name="dateTpm_" ID="dateTpm_"  value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
  <div class="col-md-3" >
    <p>เลขที่ใบเปิดงานซ่อม</p>
    <input type="text" class="form-control" name="telephone" style="background-color:#81BEF7;color:#FFFFFF;" value="-สร้างโดยระบบ-" readonly>
  </div>
  <div class="col-md-3">
    <p>วันที่เปิดงานซ่อม</p>
      <div class="input-group" style="z-index:500  !important;">
      <input type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
  </div>
</div>

<div class="row form_input header_table" style="text-align:left;">
  <div class="col-md-4" style="text-align:left;">
    <p>แผนกที่แจ้งซ้อม</p>
    <div class="form-group">
      <input type="text" name="" id="" value="Store" class="form-control" readonly="readonly">
    </div>   
  </div>   
  <div class="col-md-4" style="text-align:left;">
    <p>ผู้แจ้ง</p>
    <div class="form-group">
      <input type="text" name="" id="" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="readonly">  
    </div>   
  </div>
  <div class="col-md-4" style="text-align:left;">
    <p>ลำดับงาน</p><p class="required">*</p>
    <div class="form-group">
      <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="">Routine</option> 
        <option style="font-size:12px;" value="">Priority</option> 
        <option style="font-size:12px;" value="">Urgent</option> 
      </select>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row form_input header_table" style="text-align:left;">
  <fieldset>
    <legend>รายการที่แจ้งซ่อม</legend>
    <div class="row form_input header_table" style="width:100%">
      <div class="col-md-12"> 
        <div style="overflow-x:scroll;overflow-y: hidden;">
          <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
            <thead>
              <tr>
                <th width="200">เลขที่ใบรับอะไหล่</th>
                <th width="300">รหัสผลิตภัณฑ์</th>
                <th width="200">Issue</th>
                <th width="200">Model</th>
                <th width="200">Brand</th>
                <th width="200">Product Type</th>    
                <th width="250">อาการที่เสีย</th>
                <th width="130">สถานะการซ่อม</th>
                <th width="100">หมายเหตุ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="" id=""  class="form-control" readonly="readonly"></td> 
                <td>
                  <div style="width:30%;float:left">
                    <input type="text" name="part[]" value="PPPPP" class="form-control" >
                  </div>
                  <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                  <div style="width:39%;float:left">
                    <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
                  </div>
                  <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                  <div style="width:25%;float:right">
                    <input type="text" name="version[]" value="VVV" class="form-control">
                  </div> 
                </td>
                <td><input type="text" name="" value=""   class="form-control" readonly></td> 
                <td><input type="text" name="" value=""   class="form-control" readonly></td> 
                <td><input type="text" name="" value=""   class="form-control" readonly></td>
                <td><input type="text" name="" value=""   class="form-control" readonly></td>  
                <td><textarea class="form-control" rows="1" readonly></textarea></td>
                <td><input class="form-control" rows="1" readonly></td>
                <td><textarea class="form-control" rows="1"></textarea></td>  
              </tr>
            </tbody>
          </table>  
        </div> 
      </div> 
    </div> 
  </fieldset>
</div>
  
<div class="row form_input" style="text-align:left;">
  <div class="col-md-12" >
    <p>หมายเหตุ</p>
    <textarea class="form-control" style="padding:5px; margin:0; "></textarea>
  </div>
</div>
