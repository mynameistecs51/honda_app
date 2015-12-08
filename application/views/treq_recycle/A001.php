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
                   //add_tr();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_claim tbody tr').remove();
                  sumtotal();
                  showhideBtn();
               }
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
  <p>เลขที่ใบ<?php echo $pagename; ?></p>
  <div class="form-group">
  <p class="required">*</p>
  <input type="text" name="msn_hdr_code" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >   
  </div>   
</div>
<div class="col-md-3" style="text-align:left;">
  <p>วันที่<?php echo $pagename; ?></p>
  <p class="required">*</p>
  <div class="input-group" style="z-index:99999  !important;">
  <input type="text" name="treq_repair_date" ID="treq_repair_date"  value="<?=$dtnow?>"  class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
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
<div class="row form_input">
  <div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p>
    <div class="form-group">
      <textarea class="form-control"></textarea>
    </div>
  </div>
</div>

<div class="row form_input header_table" style="margin-top:20px;">
	<div class="col-md-3">
		<div class="add addclaim" style="margin-bottom:10px; margin-right:10px;">
		+ เพิ่มรายการ
		</div>
		<div class="add delclaim" style="margin-bottom:10px;">
		- ลบรายการ
		</div>
	</div>

  <div class="col-md-12" style="overflow-x:scroll;overflow-y: hidden; ">
  <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
		<thead>
			<tr>
      <th width="30"><input type="checkbox" id="cballmodal"></th>
      <th width="200">เลขที่ใบรับผลิตภัณฑ์</th>
      <th width="300">เลขที่ผลิตภัณฑ์</th>
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
			<td><input type="checkbox" class="cbsmodal"></td>
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
	<tfoot>
	<tr>
	<th colspan="10" style="text-align:right;"> </th> 
	</tr>
	</tfoot>
	</table>	
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
</div> 