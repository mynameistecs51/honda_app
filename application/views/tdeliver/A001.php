<style type="text/css">
.ui-datepicker {z-index: 1000000 !important; display: none;}
</style> 
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>เลขที่ใบ<?php echo $pagename; ?></p><p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >     
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>  
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่จัดส่งเครื่องซ่อม</p>
  <p class="required">*</p>
  <input type="text" name="name_req[]" id="name_req" value="Admin Onsite" class="form-control" readonly="true">
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้เบิกจัดส่งเครื่องซ่อม</p> 
  <p class="required">*</p> 
  <input type="text" name="call_req[]" id="call_req" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="true">  
</div>    
</div>

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>จากหน่วยงาน</p><p class="required">*</p>
  <input type="text" name="from_mdept" id="from_mdept" value="Service"  class="form-control" >     
</div>
<div class="col-md-3" style="text-align:left;">
  <p>ไปยังหน่วยงาน</p><p class="required">*</p>
  <input type="text" name="to_mdept" id="to_mdept" value="Transport"  class="form-control" >     
</div> 
<div class="col-md-3" style="text-align:left;">
  <p>แผนกที่รับเครื่องซ่อม</p>
  <p class="required">*</p>
  <input type="text" name="name_req[]" id="name_req" value="Admin Onsite" class="form-control" readonly="true">
</div>   
<div class="col-md-3" style="text-align:left;">
  <p>ผู้รับเครื่องซ่อม</p> 
  <p class="required">*</p> 
  <input type="text" name="call_req[]" id="call_req" value="ดิษฐพงษ์ นิลนามะ" class="form-control" readonly="true">  
</div>    
</div>

<div class="row form_input" style="margin-top:20px;">
<div class="col-md-3" style="text-align:left;">
  <p>ประเภทการส่ง</p>
  <p class="required">*</p>
  <select name="delivery_type" id="delivery_type" class="form-control">
        <option>--เลือก--</option>
        <option selected="true">รถบริษัท</option>
        <option>รถรับจ้าง</option>
        <option>ขนส่งตา่งจังหวัด</option>
        <option>ฝ่ายบริการดำเนินการ</option>
        <option>Sub ดำเนินการ</option>
      </select>
</div>
<div class="col-md-3" style="text-align:left;">
  <p>ประเภทการแพ็ค</p>
  <p class="required">*</p>
  <select name="pack_type" id="pack_type" class="form-control">
        <option>--เลือก--</option>
        <option selected="true">มาตราฐาน</option>
        <option>ขนส่งจ่างจังหวัด</option>
        <option>ตีลีงไม้</option>
        <option>ไม่แพ็ค</option>
      </select>
</div>
<div class="col-md-3" style="text-align:left;">
  <p>กำหนดส่ง</p> 
  <p class="required">*</p> 
    <div class="input-group" style="z-index:9  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>    
</div>


 
<div class="row form_input header_table" style="margin-top:-20px;">
  <div class="col-md-6">
<!--    <div class="add addrow" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
    </div>
    <div class="add deldtl" style="margin-bottom:10px;">
    - ลบรายการ
    </div>-->
  </div> 
  <div class="col-md-6" style="text-align:right; margin-top:10px; margin-bottom:10px;">
   จำนวนเครื่อง <input type="text" class="input form-control" id="total" name="total" style="width:20%;float:right;" value="0">     
  </div>
</div> 

<div class="row form_input header_table"> 
<div class="col-md-12" >
<div style="overflow-x:scroll;overflow-y: hidden;"> 
  <table class="table table-striped" id="tbdetail" style="table-layout: fixed;word-wrap: break-word;">
    <thead>
      <tr>
      <!--<th width="30"><input type="checkbox" name="cballmodal" id="cballmodal"></th>-->
      <th width="50">ลำดับ</th>
      <th width="200">เลขที่ใบเบิดงานซ่อมผลิตภัณฑ์</th>
      <th width="150">เลขที่ใบรับส่งผลิตภัณฑ์</th>
      <th width="200">บริษัทลูกค้า</th>
      <th width="280">เลขที่ผลิตภัณฑ์ [S/N]</th>  
      <th width="200">Model</th>
      <th width="200">หมายเหตุ</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>    
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
    
    $('input.form-control').attr('readonly',true);
    $('input:checkbox,select.form-control').attr('disabled',true);
    //$('#cballmodal').prop('disabled',false);
    //$('#delivery_type').prop('disabled',false);
    //$('#pack_type').prop('disabled',false);
    //$('#from_mdept,#to_mdept').prop('readonly',false);
    $('.selectpicker').selectpicker('refresh');
    $( "#treq_repair_date,#dateTrecv").datetimepicker(); 
    click_control();   
    saveData();
    click_transport_radio();
    add_row_modal();
    for(var i=0; i<5; i++){add_row();};   

 });
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

function click_control() 
{
  $('#selmcmp').on('change', function(){   
    var id_mcmp= $(this).val(); 
    if(id_mcmp==1){
      $('#memp_main').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_main').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_main').val("0821428742");
      $('#fax_main').val("027549336");  
      $('#mprv_main option[value="1"]').prop('selected',true);
      $('#mamp_main option[value="1"]').prop('selected',true);
    }else{
      $('#memp_main').val("");
      $('#adr_main').val("");
      $('#call_main').val("");
      $('#fax_main').val("");
      $('#mprv_main option[value=""]').prop('selected',true);
      $('#mamp_main option[value=""]').prop('selected',true);
    }
    $('.selectpicker').selectpicker('refresh');
  });

  $('#selmcmp_site').on('change', function(){   
    var id_mcmp= $(this).val();
    if(id_mcmp==1){
      $('#memp_site').val("ดิษฐพงษ์ นิลนามะ");
      $('#adr_site').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
      $('#call_site').val("0821428742");
      $('#fax_site').val("027549336");
      $('#mprv_site option[value="1"]').prop('selected',true);
      $('#mamp_site option[value="1"]').prop('selected',true);
    }else{
      $('#memp_site').val("");
      $('#adr_site').val("");
      $('#call_site').val("");
      $('#fax_site').val("");
      $('#mprv_site option[value=""]').prop('selected',true);
      $('#mamp_site option[value=""]').prop('selected',true);
    }
    $('.selectpicker').selectpicker('refresh');
  });

  $('#chk_main_site').on('click', function(){   
    if($('input[type="checkbox"]#chk_main_site').is(':checked'))
    { 
      var id = $('#selmcmp').val();
      if(id != ""){ 
        $('#selmcmp_site option[value="'+id+'"]').prop('selected',true);
        $('#memp_site').val($('#memp_main').val());
        $('#adr_site').val($('#adr_main').val());
        $('#call_site').val($('#call_main').val());
        $('#fax_site').val($('#fax_main').val());
        $('#mprv_site option[value="'+$('#mprv_main').val()+'"]').prop('selected',true);
        $('#mamp_site option[value="'+$('#mamp_main').val()+'"]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
      }else{
        alert('กรุณาเลือก : ชื่อบริษัทหลัก');
        $('input[type="checkbox"]#chk_main_site').prop('checked',false);
        $('#selmcmp_site option[value=""]').prop('selected',true);
        $('#memp_site').val("");
        $('#adr_site').val("");
        $('#call_site').val("");
        $('#fax_site').val("");
        $('#mprv_site option[value=""]').prop('selected',true);
        $('#mamp_site option[value=""]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
      }
    }else{
      $('#selmcmp_site option[value=""]').prop('selected',true);
        $('#memp_site').val("");
        $('#adr_site').val("");
        $('#call_site').val("");
        $('#fax_site').val("");
        $('#mprv_site option[value=""]').prop('selected',true);
        $('#mamp_site option[value=""]').prop('selected',true);
        $('.selectpicker').selectpicker('refresh');
    }
  });

  $('#selsn').on('change', function(){
  if($('#selsn').val()==1)
  {
    $('#memp_main,#memp_site').val("ดิษฐพงษ์ นิลนามะ");
    $('#adr_main,#adr_site').val("148/267 ม.1 ต.เทพารักษ์ ถ.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ");
    $('#call_main,#call_site').val("0821428742");
    $('#fax_main,#fax_site').val("027549336");
    $('#gen').val("Barth RS5kp");
    $('#sn').val("SN1500001");
    $('#brand').val("CHUPHOTIC");
    $('#dateCpm').val("01/09/2558");
    $('#selmcmp option[value="1"]').prop('selected',true); 
    $('#selmcmp_site option[value="1"]').prop('selected',true); 
    $('#selwrt option[value="3"]').prop('selected',true); 
    $('#chk_main_site').prop('checked',true);
    $('.selectpicker').selectpicker('refresh');
  }else{
    $('#memp_main,#memp_site').val("");
    $('#adr_main,#adr_site').val("");
    $('#call_main,#call_site').val("");
    $('#fax_main,#fax_site').val("");
    $('#gen').val("");
    $('#sn').val("");
    $('#brand').val("");
    $('#dateCpm').val("");
    $('#selmcmp option[value=""]').prop('selected',true);  
    $('#selmcmp_site option[value=""]').prop('selected',true);
    $('#selwrt option[value=""]').prop('selected',true);
    $('#chk_main_site').prop('checked',false);
    $('.selectpicker').selectpicker('refresh');
  }
  }); 


  $('.adddtl').on('click', function(){
    add_row();
    update_total();
    $('.selectpicker').selectpicker('refresh');
  }); 

  $('.deldtl').on('click', function(){
    if($('input[type="checkbox"].cbdtl:checkbox:checked').length>0){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
        if($('input[type="checkbox"].cbdtl').is(':checked'))
        {
          $('input[type="checkbox"].cbdtl:checkbox:checked').parents('#tbdetail tbody tr').remove(); 
          update_total();
          update_order();
        }
      } 
    }else{
     alert("คุณไม่ได้เลือกรายการ !"); 
    } 
  });

  $('#total').on('change', function(){
    var rows  = $('#tbdetail tbody tr').length;
    var total  = $('#total').val();
   // $('#modal_process').html('');
    if(total<=100){

      if(total>rows){
        var num = total-rows; 
        for (var i = num - 1; i >= 0; i--) {
          add_row();
        }   
      }else{  
        var num=parseInt(total)+1; 
        for(i=num; i<=rows; i++){ 
          $('#tbdetail tbody tr#'+i).remove();  
        } 
      } 
    }else{
      alert('ระบุไม่เกิน 100 รายการ !');
      $('#total').val("");
    }
  $('.selectpicker').selectpicker('refresh'); 
  });

  $('#cballmodal').on('click', function(){  
    if($('input[type="checkbox"]#cballmodal').is(':checked')){
      $('input[type="checkbox"].cbdtl').prop('checked',true);
    }else{
      $('input[type="checkbox"].cbdtl').prop('checked',false);
    }
  });

}

function add_row_modal()
    {
    $(".addrow").click(function(){    
      var screenname="รายการ :: ยืนยันการเตรียมเครื่องจัดส่ง";
      var url = "<?=$base_url?>treq_inv_deliver/addrow"; 
      var n=2;
      $('.div_row_modal').html('');
      modal_row_form(n,screenname);
      $('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
      var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
            modal.on('show.bs.modal', function () {
            $.fn.modal.Constructor.prototype.enforceFocus = function () { };
            modalBody.load(url);
            }).modal({backdrop: 'static',keyboard: true});
      setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
      });
    }
 
function add_row() 
{
  var rows  = $('#tbdetail tbody tr').length+1;
  var html  ='<tr id="'+rows+'">';
      //html +='<td><input type="checkbox" name="ck[]" class="cbdtl"></td>';
      html +='<td width="2%">'+rows+'</td>';
      html +='<td><input type="text" class="form-control" name="issue[]" value="RW-2015000'+rows+'" readonly="true"></td>  ';
      html +='<td><input type="text" class="form-control" name="issue[]" value="CC-2015000'+rows+'" readonly="true"></td>  ';
      html +='<td><input type="text" class="form-control" name="dr[]" value="THAINOLOGY" readonly="true"></td> ';
      html +='<td class="sn1"> ';
      html +='<select name="sn" class="selectpicker show-tick form-control  input-sn" data-live-search="true" style="z-index:99;" disabled="true">';
      html +='<option style="font-size:12px;" value="" >-- เลือก --</option> ';
      html +='<option style="font-size:12px;" value="1" selected>PPPPP-SSYYLXXX-VVV</option>   ';
      html +='</select> '; 
      html +='</td>';
      html +='<td class="medel1"><input type="text" class="form-control" value="Pluto-YY" readonly="true"></td>';
      html +='<td><textarea cols="1" style="height:35px;" class="form-control" disabled="true"></textarea></td>';
      html +='</tr>'; 
      $('#tbdetail tbody').append(html);  
}

   function modal_row_form(n,screenname)
   {
    var div='';
    div+='<form name="main'+n+'" role="form" data-toggle="validator" id="form'+n+'" method="post">';
    div+='<!-- Modal -->';
    div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">';
    div+='<div class="modal-dialog">';
    div+='<div class="modal-content">';
    div+='<div class="modal-header" style="background:#B40404;color:#FFFFFF;">';
    div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    div+='<h4 class="modal-title">'+screenname+'</h4>';
    div+='</div>';
    div+='<div class="modal-body">';
    div+='</div>';
    div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
    div+='<button type="button" id="save'+n+'" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> เลิอก</span></button>';
    div+='</div>';
    div+='</div><!-- /.modal-content -->';
    div+='</div><!-- /.modal-dialog -->';
    div+='</div><!-- /.modal -->';
    div+='</form>';
  $('.div_row_modal').html(div);
   }

function update_total()
{ 
  var rows  = $('#tbdetail tbody tr').length;
  $('#total').val(rows); 
}
function update_order()
{ 
  var rows  = $('#tbdetail tbody tr').length;  
  for(i=0; i<rows; i++){ 
    $('#tbdetail tbody tr:eq('+i+')').attr("id",i+1);
    $('#tbdetail tbody tr:eq('+i+')').find('td:eq(1)').html(i+1);
  }
}

function saveData()
{
 $('#form').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
      // handle the invalid form...
    } else {
      // everything looks good!
      /*e.preventDefault();
      var form = $('#form').serialize(); 
      $.ajax(
      {
        type: 'POST',
        url: '<?php echo base_url(); ?>ctl_memp/saveadd/',
        data: {form}, //your form datas to post          
        success: function(rs)
        {   
           $('#myModal2').modal('hide');
           //location.reload();
        },
        error: function()
        {
            alert("#เกิดข้อผิดพลาด");
        }
      });     */              
    }
  });
}
</script>