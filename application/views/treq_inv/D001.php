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
    <p>ประเภทงาน</p>
    <div class="form-group">
      <p class="required">*</p>
      <select id="" name="" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="">ติดตั้ง</option> 
        <option style="font-size:12px;" value="">ซ่อม</option>
        <option style="font-size:12px;" value="">เคลม</option>  
      </select> 
    </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบงาน</p>
    <div class="form-group"> 
      <p class="required">*</p> 
      <select name="sn" ID="selsn" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
        <option style="font-size:12px;" value="" selected>----เลือก----</option>
        <option style="font-size:12px;" value="1" >TR1500001</option> 
        <option style="font-size:12px;" value="2">TR1500002</option> 
      </select>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบ<?php echo "$pagename"?></p>
    <div class="form-group">
      <input type="text" name="" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true">   
    </div>   
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>วันที่<?php echo "$pagename"?></p>     
    <div class="input-group" style="z-index:8  !important;">
      <input type="text" name="treq_repair_date" id="treq_repair_date_" value="<?=$dtnow?>" readonly="true"  class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
</div>

<div class="row form_input" style="text-align:left;"> 
  <div class="col-md-6">
    <fieldset>
      <legend>ข้อมูลบริษัทหลัก</legend>     
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ชื่อบริษัท</p>
          <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="">----เลือก----</option>
            <option style="font-size:12px;" value="1">THAINOLOGY</option> 
            <option style="font-size:12px;" value="2" selected>TNLG</option> 
          </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
            <p>ชื่อผู้ติดต่อ</p>
            <input type="text" class="input form-control" name="telephone" ID="memp_com" value="นาย A">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p>
          <textarea class="form-control" ID="adr_com" style="height: 100px; padding:5px;">1346 (ห้อง 3) หมู่ 2 ซ.เบญจพล1(เทพารักษ์ 88) ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ 10270</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>เบอร์โทรศัพท์</p>
            <input type="text" class="input form-control" ID="call_com" name="telephone" value="0812345678">
          </div>
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>Fax.</p>
            <input type="text" class="input form-control" ID="fax_com" name="telephone" value="02345678">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ชื่อจังหวัด</p> 
          <select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="">----เลือก----</option>
            <option style="font-size:12px;" value="1" selected>กรุงเทพมหานคร</option> 
            <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
          </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
            <p>ชื่ออำเภอ/เขต</p>
            <select name="AMPHUR_ID1" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก">
              <option style="font-size:12px;" value="" selected>บางกะปิ</option>
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
          <input type="checkbox" id="chk_com_sit"> สถานที่เดียวกับบริษัทหลัก
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
            <p>Fax.</p><p class="required">*</p>
            <input type="text" class="input form-control" name="telephone" ID="fax_sit">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-4">
          <p>ชื่อจังหวัด</p>
          <select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">กรุงเทพมหานคร</option> 
            <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
          </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-3">
          <p>พื้นที่บริการ</p>
          <select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" selected>----เลือก----</option>
            <option style="font-size:12px;" value="1">1</option> 
            <option style="font-size:12px;" value="2">2</option> 
            <option style="font-size:12px;" value="3">3</option> 
          </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
          <p>ชื่ออำเภอ/เขต</p><p class="required">*</p>
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

<div class="row form_input">   
  <div class="col-md-6" style="text-align:left;">
    <p>แผนกที่<?php echo "$pagename"?></p>  
    <div class="form-group" >
      <input type="text" name="" value="Work Shop" readonly="true" class="form-control"> 
    </div>
  </div>
  <div class="col-md-6" style="text-align:left;">
    <p>ผู้<?php echo "$pagename"?></p>
    <div class="form-group">
      <input type="text" name="" value="สิรวิชญ์ นาทันดอน"  readonly="true" class="form-control">   
    </div> 
  </div>
</div>

<div class="row form_input" style="text-align:left;"> 
  <div class="col-md-12">
    <fieldset>
      <legend>Installation Standard</legend>     
      <div class="col-md-12">
        <table class="table table-striped" id="tbdetail">
          <thead>
            <tr>
              <th width="20%">Part No.</th> 
              <th width="20%">Part Name</th>
              <th width="15%">Unit</th> 
              <th width="15%">Usage</th>
              <th width="15%">Position</th> 
              <th>หมายเหตุ</th>
            </tr>
          </thead>
          <tbody ID="list_detail"  >
            <tr> 
              <td>
                <p class="required">*</p>
                <select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="" selected>----เลือก----</option>
                  <option style="font-size:12px;" value="1">PPPPP</option>  
                </select>   
              </td> 
              <td><input type="text" name="msn_hdr_code" value=""  class="form-control"></td> 
              <td><input type="text" name="msn_hdr_code" value=""  class="form-control"></td> 
              <td><input type="text" name="msn_hdr_code" value=""  class="form-control"></td> 
              <td><input type="text" name="msn_hdr_code" value=""  class="form-control"></td>  
              <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
            </tr>
          </tbody>
        </table>
      </div> 
    </fieldset>
  </div>    
</div>

<div class="row form_input" style="text-align:left;"> 
  <div class="col-md-12">
    <fieldset>
      <legend>รายการเบิกผลิตภัณฑ์</legend>
      <div class="row form_input header_table" style="margin-top:-20px;">
        <div class="col-md-3">
          <div class="add addclaim" style="margin-bottom:10px; margin-right:10px;">
            + เพิ่มรายการ
          </div>
          <div class="add delclaim" style="margin-bottom:10px;">
            - ลบรายการ
          </div>
        </div>
      </div>

      <div class="row form_input">
        <div class="col-md-12">
          <div style="overflow-x:scroll;overflow-y: hidden; ">
            <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
              <thead>
                <tr>
                  <th width="30"><input type="checkbox" id="cballmodal"></th>
                  <th width="200">Part No.</th>
                  <th width="250">Part Name</th> 
                  <th width="150">Model</th>
                  <th width="150">Brand</th>    
                  <th width="150">Product Type</th>   
                  <th width="120">จำนวน</th>
                  <th width="150">หน่วยนับ</th>
                  <th width="150">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" class="cbsmodal"></td>
                  <td>
                    <div class="form-group col-md-15" >
                      <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                        <option style="font-size:12px;" value="" selected>----เลือก----</option>
                        <option style="font-size:12px;" value="1">PPPPP</option> 
                        <option style="font-size:12px;" value="2">PPPPP</option>
                        <option style="font-size:12px;" value="2">PPPPP</option>  
                      </select>
                      <div class="help-block with-errors"></div>
                    </div> 
                  </td>
                  <td><input type="text" name="" value=""   class="form-control"></td>
                  <td><input type="text" name="" value=""   class="form-control" readonly=""></td>
                  <td><input type="text" name="" value=""   class="form-control" readonly=""></td>
                  <td><input type="text" name="" value=""   class="form-control" readonly=""></td>
                  <td><input type="text" class="input form-control tclaim_amount" name="amount[]" value=""style="text-align:right;"></td>
                  <td>
                    <div class="form-group col-md-15" >
                      <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                        <option style="font-size:12px;" value="" selected>----เลือก----</option>
                        <option style="font-size:12px;" value="1">กล่อง</option> 
                        <option style="font-size:12px;" value="2">ชิ้น</option>
                        <option style="font-size:12px;" value="2">ก้อน</option>  
                      </select>
                      <div class="help-block with-errors"></div>
                    </div> 
                  </td>
                  <td><textarea class="form-control" rows="1"></textarea></td>  
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="9" style="text-align:right;"> </th> 
                </tr>
              </tfoot>
            </table>  
          </div>
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
    <input type="radio"  name="" value="1"  disabled checked=checked;>  รอเบิก
    <input type="radio"  name="" value="2" disabled >   รับจ่าย
    <input type="radio"  name="" value="3" disabled >   รอรับ
    <input type="radio"  name="" value="4" disabled >   รับอะไหล่แล้ว
    <input type="radio"  name="" value="0" disabled >   ยกเลิก 
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