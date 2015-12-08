<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>

<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="row form_input">
<div class="col-md-3" style="text-align:left;">
  <p>Model</p> <p class="required">*</p>
    <select id="id_minv" name="minv_name" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>INV3001</option> 
      <option style="font-size:12px;" value="2">INV3002</option> 
    </select>  
</div>
<div class="col-md-3" style="text-align:left;">
  <p>ประเภทการติดตั้ง</p><p class="required">*</p>
    <select id="PHASE" name="PHASE" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>1 PHASE</option> 
      <option style="font-size:12px;" value="2">3 PHASE</option> 
    </select>  
</div>
<div class="col-md-3" style="text-align:left;">
  <p>Product Name</p>
  <div class="form-group">
    <input type="text" name="model" ID="model" value="MODEL-001" readonly="true" class="form-control">
  </div> 
</div>
<div class="col-md-3" style="text-align:left;">
  <p>รุ่น</p>
  <div class="form-group">
    <input type="text" name="series" ID="series" value="UPS-3 เฟส/1" readonly="true" class="form-control">
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

 
<div class="row form_input header_table" style="margin-top:10px;">
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
    <td><p class="required">*</p>
    <select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>PPPPP</option>  
    </select>   
    </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td><p class="required">*</p><input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td>  
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
  </tr> 
  <tr>  
    <td><p class="required">*</p>
    <select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value="" >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>PPPPP</option>  
    </select>   
    </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td><p class="required">*</p><input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td>  
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
  </tr> 
  <tr>  
    <td><p class="required">*</p>
    <select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value=""  >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>PPPPP</option>  
    </select>   
    </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td><p class="required">*</p><input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td>  
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
  </tr> 
  <tr>  
    <td><p class="required">*</p>
    <select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
      <option style="font-size:12px;" value=""  >----เลือก----</option>
      <option style="font-size:12px;" value="1" selected>PPPPP</option>  
    </select>   
    </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td><p class="required">*</p><input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> 
    <td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td>  
    <td><input type="text" class="input form-control" name="namesn_new[]"></td> 
  </tr> 
  </tbody>
 </table> 
</div>  
</div>

<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
  click_control();  
  saveData();  
 });


function click_control()
{
  $('.addtr').on('click', function(){   
    add_tr();
  });

  $('.deltr').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
      if($('input[type="checkbox"].cbtr').is(':checked'))
      {
        $('input[type="checkbox"].cbtr:checkbox:checked').parents('#tbdetail tbody tr').remove(); 
      }
    }  
  });

  $('#id_minv').on('change',function(){  
    $('#model').val('MODEL-001');
    $('#series').val('UPS-3 เฟส/1'); 
    $('#PHASE option[value="1"]').prop('selected',true); 
    $('.selectpicker').selectpicker('refresh');
  });

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

function add_tr()
{
  var trhtml ='<tr>';
      trhtml +='<td><input type="checkbox" class="cbtr"></td>';
      trhtml +='<td><p class="required">*</p>';
      trhtml +='<select id="part" name="part" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
      trhtml +='<option style="font-size:12px;" value="1">PPPPP</option>  ';
      trhtml +='</select>   ';
      trhtml +='</td> ';
      trhtml +='<td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> ';
      trhtml +='<td> <input type="text" name="msn_hdr_code" value=""  class="form-control">  </td> ';
      trhtml +='<td><p class="required">*</p><input type="text" name="msn_hdr_code" value=""  class="form-control">  </td>'; 
      trhtml +='<td> <input type="text" name="msn_hdr_code" value=""  class="form-control"></td>';
      trhtml +='<td><input type="text" class="input form-control" name="namesn_new[]"></td>';
      trhtml +='</tr>';
   $('#tbdetail tbody').append(trhtml);  
   $('.selectpicker').selectpicker('refresh');
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