<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">

<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ส่วนประกอบสินค้า</p>
    <div class="form-group">
    <p class="required">*</p>
     <input type="text" name="mbom_hdr_code" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >   
    </div>    
  </div>  
  <div class="col-md-3" style="text-align:left;">
    <p>วันที่สร้าง</p>     
    <div class="input-group" style="z-index:10  !important;">
    <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>แผนกที่สร้าง</p>
    <div class="form-group" >
      <p class="required">*</p>
      <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled>
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="" selected>INTERFACE</option>  
      </select>
      <div class="help-block with-errors"></div>
    </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>ผู้สร้าง</p>
    <div class="form-group" >
      <p class="required">*</p>
      <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled>
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="" selected>System</option>  
      </select>
      <div class="help-block with-errors"></div>
    </div> 
  </div>
</div>

<div class="setbom">
<div class="row form_input setboml1_1" style="margin-top:20px;">
<div class="col-md-0">
<div class="btnadd addbom" style="margin-left:20px;">^</div>  
</div>
<div class="col-md-3">  
  <p>1. รหัสสินค้า</p><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>----เลือก----</option>
    <option style="font-size:12px;" value="1">Model A</option> 
    <option style="font-size:12px;" value="2">Model B</option> 
  </select>  
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ชื่อสินค้า</p> 
   <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p> 
   <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">  
</div>  
<div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div>  
</div>
<div class="bomL2_1" style="margin-left:45px;margin-top:20px;">
  <div class="row form_input setboml2_1" >
  <div class="col-md-0">
  <div class="btnadd addbom" style="margin-left:20px;">+</div> 
  <div class="btnadd delbom" >-</div> 
  </div>
  <div class="col-md-3">  
    <p>1.1 รหัสส่วนประกอบ</p><p class="required">*</p>
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">Model A</option> 
      <option style="font-size:12px;" value="2">Model B</option> 
    </select>  
  </div> 
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อส่วนประกอบ</p> 
     <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>รุ่น</p> 
     <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
  </div>  
  <div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
  </div>   
  </div>

  <div class="bomL3_1" style="margin-left:68px;margin-top:20px;">
  <div class="row form_input setboml2_1" >
  <div class="col-md-0">
  <div class="btnadd addbom" style="margin-left:20px;">+</div> 
  <div class="btnadd delbom" >-</div> 
  </div>
  <div class="col-md-3">  
    <p>1.1.1. รหัสส่วนประกอบ</p><p class="required">*</p>
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">Model A</option> 
      <option style="font-size:12px;" value="2">Model B</option> 
    </select>  
  </div> 
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อส่วนประกอบ</p> 
     <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>รุ่น</p> 
     <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">  
  </div>  
  <div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
  </div> 
  </div>

<div class="bomL4" style="margin-left:68px;">
<div class="row form_input setboml2_1" >
<div class="col-md-0">
<div class="btnadd addbom" style="margin-left:20px;">+</div> 
<div class="btnadd delbom" >-</div> 
</div>
<div class="col-md-3">  
  <p>1.1.1.1. รหัสส่วนประกอบ</p><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>----เลือก----</option>
    <option style="font-size:12px;" value="1">Model A</option> 
    <option style="font-size:12px;" value="2">Model B</option> 
  </select>  
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ชื่อส่วนประกอบ</p> 
   <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p> 
   <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div>  
<div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div> 
</div>

<div class="row form_input setboml2_1"  >
<div class="col-md-0">
<div class="btnadd addbom" style="margin-left:20px;">+</div> 
<div class="btnadd delbom" >-</div> 
</div>
<div class="col-md-3">  
  <p>1.1.1.2. รหัสส่วนประกอบ</p><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>----เลือก----</option>
    <option style="font-size:12px;" value="1">Model A</option> 
    <option style="font-size:12px;" value="2">Model B</option> 
  </select>  
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ชื่อส่วนประกอบ</p> 
   <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p> 
   <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">  
</div>  
<div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div>  
</div>
</div>
</div>
<div class="bomL3_2" style="margin-left:68px;margin-top:20px;">
  <div class="row form_input setboml2_1" >
  <div class="col-md-0">
  <div class="btnadd addbom" style="margin-left:20px;">+</div> 
  <div class="btnadd delbom" >-</div> 
  </div>
  <div class="col-md-3">  
    <p>1.1.2. รหัสส่วนประกอบ</p><p class="required">*</p>
    <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">Model A</option> 
      <option style="font-size:12px;" value="2">Model B</option> 
    </select>  
  </div> 
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อส่วนประกอบ</p> 
     <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>รุ่น</p> 
     <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">  
  </div>  
  <div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
  </div> 
  </div>

<div class="bomL4" style="margin-left:68px;">
<div class="row form_input setboml2_1" >
<div class="col-md-0">
<div class="btnadd addbom" style="margin-left:20px;">+</div> 
<div class="btnadd delbom" >-</div> 
</div>
<div class="col-md-3">  
  <p>1.1.2.1. รหัสส่วนประกอบ</p><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>----เลือก----</option>
    <option style="font-size:12px;" value="1">Model A</option> 
    <option style="font-size:12px;" value="2">Model B</option> 
  </select>  
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ชื่อส่วนประกอบ</p> 
   <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p> 
   <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div>  
<div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div> 
</div>

<div class="row form_input setboml2_1"  >
<div class="col-md-0">
<div class="btnadd addbom" style="margin-left:20px;">+</div> 
<div class="btnadd delbom" >-</div> 
</div>
<div class="col-md-3">  
  <p>1.1.2.2. รหัสส่วนประกอบ</p><p class="required">*</p>
  <select name="minv_dtl" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
    <option style="font-size:12px;" value="" selected>----เลือก----</option>
    <option style="font-size:12px;" value="1">Model A</option> 
    <option style="font-size:12px;" value="2">Model B</option> 
  </select>  
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>ชื่อส่วนประกอบ</p> 
   <input type="text" name="minv_name_th" value=""  readonly="true" class="form-control">    
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p> 
   <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">  
</div>  
<div class="col-md-2" style="text-align:left;">
    <p>จำนวน</p> 
    <input type="text" name="minv_name_en" value="" readonly="true"  class="form-control">    
</div>  
</div>
</div>  
</div> 
</div>




</div>
</div>

<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p> 
    <textarea class="form-control"></textarea> 
</div>
</div>

<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#docdate" ).datepicker({ 
      changeMonth: true,
      changeYear: true, 
      dateFormat: 'dd/mm/yy',
      yearRange: "-100:+0",
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting

    });
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
  $('.addbom').on('click', function(){   
    var tr = $('table#tb_bom tbody tr:last').clone();
    $(tr).find('input:text.sn').val('');
    $('#tb_bom tbody').append(tr);
    click_tbbom_checkbox();
    checkbox_check_all();
    sumtotal();
    showhideBtn();
  });

  $('.delbom').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_bom tbody tr').remove();
                   add_tr();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_bom tbody tr').remove();
                  sumtotal();
                  showhideBtn();
               }
         }  
  });

}

function select_control()
{
  $('#tbom_mcmp.selectpicker').on('change', function(){
    if($(this).val()==1){
    $('#tbom_address').val('ที่อยู่ A');
      }else{
      $('#tbom_address').val('ที่อยู่ B');
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
    trhtml +='<select name="tbom_mcmp" class="selectpicker show-tick form-control input-sm tbom_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
    trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
    trhtml +='<option style="font-size:12px;" value="1">Model A</option>'; 
    trhtml +='<option style="font-size:12px;" value="2">Model B</option>'; 
    trhtml +='</select>';
    trhtml +='<div class="help-block with-errors"></div>';
    trhtml +='</div>';
    trhtml +='</td>';
    trhtml +='<td><input type="text" class="input form-control tbom_amount" name="amount[]" value="1" style="text-align:right;"></td>';
    trhtml +='<td><p class="required">*</p><input type="text" class="input form-control" name="namesn_old[]" required="true"></td>';
    trhtml +='<td><input type="text" class="input form-control" name="namesn_new[]"></td>';
      trhtml +='</tr>';
   $('#tb_bom tbody').append(trhtml);
   click_tbbom_checkbox();
   checkbox_check_all();
   sumtotal();
   showhideBtn();
   $('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
  var trtotal=$('#tb_bom tbody tr').length;
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

function click_tbbom_checkbox()
{
  $('#cballmodal').on('click',function(){
    var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].cbsmodal').prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#tb_bom tbody tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_bom tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
  });

  $('#tb_bom tbody tr .cbsmodal').on('click',function(){
    var cb_status = $(this).is(':checked');
    var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#tb_bom tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_bom tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
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
      $('.tbom_amount').each(function(){
         var val = $(this).val();
         if(!val){val=0;}
         grand_total_qty += parseFloat(val);
      });
  $('#tbom_total').val(grand_total_qty);
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