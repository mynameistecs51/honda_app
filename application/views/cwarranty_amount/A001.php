<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
 <div class="row form_input">
 <div class="col-md-3" style="text-align:left;">
  <p>บริษัท</p><p class="required">*</p>
    <select id="id_mcmp" name="id_mcmp" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>Thainology and Solutions CO.,LTD</option>  
    </select>  
</div>
<div class="col-md-3"  >
  <p>ประเภทการรับประกัน</p>
  <select id="id_warranty" name="id_warranty" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">ประกันหลังขาย</option> 
      <option style="font-size:12px;" value="2">ประกันหลังซ่อม</option> 
    </select> 
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รหัสสินค้า</p><p class="required">*</p>
    <select id="id_minv" name="id_minv" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" selected>----เลือก----</option>
      <option style="font-size:12px;" value="1">PPPPP</option> 
      <option style="font-size:12px;" value="2">PPPPP</option> 
    </select>  
</div>
<div class="col-md-3" style="text-align:left;">
    <p>ชื่อสินค้า</p> 
   <input type="text" name="msn_hdr_name" ID="minv_name" value="" readonly="true" class="form-control">   
</div>  

</div>

<div class="row form_input" style="text-align:right;">
<div class="col-md-3" style="text-align:left;">
  <p>Model</p> 
    <input type="text" name="msn_hdr_name" ID="model" value="" readonly="true" class="form-control"> 
</div> 
<div class="col-md-3"  >
  <p>Brand</p> 
    <input type="text" name="mbom_hdr_code" ID="brand" value="" readonly="true" class="form-control">
</div>
<div class="col-md-3"  >
  <p>รุ่น</p> 
    <input type="text" name="mbom_hdr_code" ID="gen" value="" readonly="true" class="form-control">
</div>
<div class="col-md-3"  >
  <p>ประเภทติดตั้ง</p>  
    <input type="text" name="is_phase" ID="is_phase" value="" readonly="true" class="form-control">
</div>
</div>


<div class="row form_input" style="text-align:right;">  

<div class="col-md-3"  >
  <p>จำนวนวันการรับประกัน (วัน)</p><p class="required">*</p>
    <input type="text" name="mbom_hdr_code" ID="mbom_hdr_code" value="730"  class="form-control">
</div>
<div class="col-md-3"  >
  <p>มีผลตั้งแต่วันที่</p><p class="required">*</p>
    <div class="input-group" style="z-index:10  !important;">
      <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
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
    $( "#docdate" ).datepicker({ 
      changeMonth: true,
      changeYear: true, 
      dateFormat: 'dd/mm/yy',
      yearRange: "-100:+0",
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], // For formatting
    });  
  click_control();  
  saveData();  
 });


function click_control()
{
   
  $('#id_minv').on('change',function(){ 
    $('#list_detail').attr('style','display: true;'); 
    $('#minv_name').val('เครื่อง UPS-001');
    $('#model').val('MODEL-001');
    $('#brand').val('CHUPHOTIC'); 
    $('#gen').val('V001'); 
    $('#is_phase').val('1 PHASE'); 
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