<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<div class="row form_input" style="text-align:left;">
  <div class="col-md-12">
    <fieldset >
      <legend>คัดกรองข้อมูล</legend> 
      <div class="row form_input" style="text-align:left;margin-top:-20px;">
      <div class="col-md-3">
        <p>เลขที่ Contract Warranty</p>
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option  value="" selected>----เลือก----</option>
          <option  value="" >CTA001580001</option> 
          <option  value="" >CTA001580002</option> 
        </select> 
      </div> 
      <div class="col-md-3">
        <p>ประเภทสัญญา</p>
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option  value="" selected>----เลือก----</option>
          <option  value="" >Normal</option> 
          <option  value="" >Major</option> 
        </select> 
      </div> 
      <div class="col-md-6">
        <p>ช่วงวันที่นัดหมาย</p>
        <div class="input-group" style="z-index:99999  !important;">
        <span class="input-group-addon">From</span>
        <input type="text" name="datefrom[]" id="datefrom" value="<?=$datefrom?>" readonly="readonly" class="form-control" style="background-color:#ffffff;"> <span class="input-group-addon">To</span>
        <input type="text" name="dateto[]" id="dateto" value="<?=$dateto?>" readonly="readonly" class="form-control" style="background-color:#ffffff;"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </div> 
      </div>
      <div class="row form_input">
      <div class="col-md-3">
        <p>บริษัทหลัก</p>
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option  value="" selected>----เลือก----</option>
          <option  value="" >Thainology and Solutions CO.,LTD </option>  
        </select> 
      </div> 
      <div class="col-md-3">
        <p>สถานที่ไซต์งาน</p>
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option  value="" selected>----เลือก----</option>
          <option  value="" >Thainology and Solutions CO.,LTD </option>  
        </select> 
      </div> 
      </div>
    </fieldset> 
  </div>
</div>

<div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset >
        <legend>เลือกรายการ ที่ต้องการเปิดงาน</legend>  
        <div class="row form_input" style="text-align:left;">
          <div class="col-md-12"> 
          <div style="overflow-x:scroll;overflow-y: hidden;"> 
          <table id="tb_egn" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;"  >
          <thead> 
            <tr>
              <th width="40"><input type="checkbox" id="cball_egn"></th>
              <th width="180">เลขที่ Contract Warranty</th>
              <th width="150">ประเภทสัญญา</th>
              <th width="170">เลขที่ผลิตภัณฑ์</th>
              <th width="60">ครั้งที่</th>
              <th width="120">วันที่นัดหมาย</th> 
              <th width="220">บริษัทหลัก</th> 
              <th width="220">สถานที่ไซต์งาน</th>
              <th width="180">ผู้ขาย</th>
              <th width="180">ช่างผู้ดำเนินการ</th>
              <th width="200">วันที่ดำเนินงาน</th>
              <th width="200">วันที่ดำเงินงานเสร็จ</th>
              <th width="200">หมายเหตุ</th>
            </tr>
            </thead>
            <tbody>
            <tr  class="num_dtl">
              <td><input type="checkbox" class="cbtr_egn" ></td>
              <td>CTA001580001</td>
              <td>Normal</td>
              <td>PPPPP-SSYYLX01-VVV</td>
              <td>4</td>
              <td><?=$datefrom?></td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>พุฒิพงศ์ ห้วงน้ำ</td>
              <td>
                <div class="sel_egn1">
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option  value="" selected>----เลือก----</option>
                    <option  value="1" >ดิษฐพงษ์ นิลนามะ</option> 
                    <option  value="2">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>  
                </div>
                  <p class="add-in-tr" ID="add-in-tr1"><i id="calIconTourDateDetails" class="glyphicon glyphicon-plus-sign"></i></p>      
              </td>
              <td>
                <div class="input-group" style="z-index:9  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td>
                <div class="input-group" style="z-index:9 !important;">
                  <input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td><textarea class="form-control" rows="1" ></textarea></td>
            </tr>
            <tr  class="num_dtl">
              <td><input type="checkbox" class="cbtr_egn" ></td>
              <td>CTA001580001</td>
              <td>Normal</td>
              <td>PPPPP-SSYYLX02-VVV</td>
              <td>4</td>
              <td><?=$datefrom?></td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>พุฒิพงศ์ ห้วงน้ำ</td>
              <td>
                <div class="sel_egn2">
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option  value="" selected>----เลือก----</option>
                    <option  value="1" >ดิษฐพงษ์ นิลนามะ</option> 
                    <option  value="2">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>  
                </div>
                  <p class="add-in-tr" ID="add-in-tr2"><i id="calIconTourDateDetails" class="glyphicon glyphicon-plus-sign"></i></p>      
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td><textarea class="form-control" rows="1" ></textarea></td>
            </tr>
            <tr  class="num_dtl">
              <td><input type="checkbox" class="cbtr_egn" ></td>
              <td>CTA001580001</td>
              <td>Normal</td>
              <td>PPPPP-SSYYLX03-VVV</td>
              <td>4</td>
              <td><?=$datefrom?></td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>พุฒิพงศ์ ห้วงน้ำ</td>
              <td>
                <div class="sel_egn3">
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option  value="" selected>----เลือก----</option>
                    <option  value="1" >ดิษฐพงษ์ นิลนามะ</option> 
                    <option  value="2">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>  
                </div>
                  <p class="add-in-tr" ID="add-in-tr3"><i id="calIconTourDateDetails" class="glyphicon glyphicon-plus-sign"></i></p>      
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </td>
              <td><textarea class="form-control" rows="1" ></textarea></td>
            </tr>
            <tr  class="num_dtl">
              <td><input type="checkbox" class="cbtr_egn" ></td>
              <td>CTA001580001</td>
              <td>Normal</td>
              <td>PPPPP-SSYYLX04-VVV</td>
              <td>4</td>
              <td><?=$datefrom?></td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>Thainology and Solutions CO.,LTD 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
              <td>พุฒิพงศ์ ห้วงน้ำ</td>
              <td>
                <div class="sel_egn4">  
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option value="" selected>----เลือก----</option>
                    <option  value="1" >ดิษฐพงษ์ นิลนามะ</option> 
                    <option  value="2">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>    
                  <div style="margin-top:10px;"> 
                  <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                   <option  value="" selected>----เลือก----</option>
                    <option  value="1" >ดิษฐพงษ์ นิลนามะ</option> 
                    <option  value="2">พุฒิพงศ์ ห้วงน้ำ</option> 
                  </select>  
                  </div>
                </div>
                  <p class="add-in-tr" ID="add-in-tr4"><i id="calIconTourDateDetails" class="glyphicon glyphicon-plus-sign"></i></p>      
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
                <div style="margin-top:5px;"> 
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div>
                </div>
              </td>
              <td>
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                </div>
                <div style="margin-top:5px;"> 
                <div class="input-group" style="z-index:99999  !important;">
                  <input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div>
                </div>
              </td>
              <td>
                  <textarea class="form-control" rows="1" ></textarea>
                <div style="margin-top:5px;"> 
                  <textarea class="form-control" rows="1" ></textarea>
                </div>
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
   
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#dateTpm").datetimepicker();
    $( "#dtstart").datetimepicker();
    $( "#dtend").datetimepicker();
 /*   var dtstart = $('#dtstart');
    var dtend = $('#dtend');
    $.timepicker.datetimeRange(dtstart,dtend,{ 
        start: {},// start picker options
        end: {} // end picker options         
    });
  */
  checkbox_check_all(); 
  click_control();  
  saveData();  
 });


function click_control() 
{
  $('.add_egn').on('click', function(){   
    var numrow= $('#tb_egn tbody tr.num_dtl').length;
    add_tr(numrow);
  });

  $('.del_egn').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
      if($('input[type="checkbox"].cbtr_egn').is(':checked'))
      {
         $('input[type="checkbox"].cbtr_egn:checkbox:checked').parents('#tb_egn tbody tr').remove(); 
         var numrow= $('#tb_egn tbody tr.num_dtl').length;
         $('#total_batch').val(numrow);
         for(i=0;i<numrow;i++){  
            $('#tb_egn tbody tr.num_dtl:eq('+i+')').find('td:eq(1)').html(i+1); 
         }
      }
     
     if($('input[type="checkbox"].cbsubdtl').is(':checked')){
     $('#tb_egn tbody tr.num_dtl').remove(); 
     }
   }  
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

  $('#seltpmdtlsubbatch').on('change', function(){
  if($('#seltpmdtlsubbatch').val()==4)
  {
    $('#memp_com,#memp_sit').val("ดิษฐพงษ์ นิลนามะ");
    $('#adr_com,#adr_sit').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
    $('#call_com,#call_sit').val("0821428742");
    $('#fax_com,#fax_sit').val("027549336");
    $('#mwrt_cat').val("Minor");
    $('#sn').val("SN1500001");
    $('#brand').val("CHUPHOTIC");
    $('#dateCpm').val("01/09/2558 10:00");
    $('#selmcmp option[value="1"]').prop('selected',true); 
    $('#selmcmp_sit option[value="1"]').prop('selected',true); 
    $('.selectpicker').selectpicker('refresh');
  }else{
    $('#memp_com,#memp_sit').val("");
    $('#adr_com,#adr_sit').val("");
    $('#call_com,#call_sit').val("");
    $('#fax_com,#fax_sit').val("");
    $('#mwrt_cat').val("");
    $('#sn').val("");
    $('#brand').val("");
    $('#dateCpm').val("");
    $('#selmcmp option[value=""]').prop('selected',true);  
    $('#selmcmp_sit option[value=""]').prop('selected',true);
    $('.selectpicker').selectpicker('refresh');
  }
  });

  
}


function add_tr(numrow)
{
  var num=(numrow+1);
  var trhtml  ='<tr  class="num_dtl">';
      trhtml +='<td><input type="checkbox" class="cbtr_egn" ></td>';
      trhtml +='<td>';
      trhtml +='<select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option  value="">----เลือก----</option>';
      trhtml +='<option  value="" selected>ดิษฐพงษ์ นิลนามะ</option>';
      trhtml +='<option  value="">พุฒิพงศ์ ห้วงน้ำ</option>';
      trhtml +='</select>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="input-group" style="z-index:99999  !important;">';
      trhtml +='<input type="text" name="startdate[]" id="startdate0" value="<?=$datefrom?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<div class="input-group" style="z-index:99999  !important;">';
      trhtml +='<input type="text" name="enddate[]" id="enddate0" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td><textarea class="form-control" rows="1" ></textarea></td>';
      trhtml +='</tr>';
   $('#tb_egn tbody').append(trhtml);  
   checkbox_check_all();  
   $('.selectpicker').selectpicker('refresh');
}

function checkbox_check_all(grp)
{
  $('#cballsub').on('click',function(){ 
    var cb_status = $(this).is(':checked'); 
    $('input[type="checkbox"].cbsubdtl').prop('checked',cb_status);
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