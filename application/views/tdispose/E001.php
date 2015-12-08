<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
.table tr:hover, tr:hover + tr  { 
   background-color: #F6CECE; 
 }
</style>
<script type='text/javascript'>
$(function(){  
  $('.selectpicker').selectpicker('refresh');
	click_transport_radio();
	checkbox_check_all();
	click_control();
	select_control();
  key_change(1);
	sumtotal();
  click_tbdispose_checkbox();
	//saveData();
	showhideBtn();
  //datetime_picker();
  snhtml(0,5);
  $('#tb_dispose tbody td.inputsn:eq('+0+')').find('input:eq('+0+')').val('SN150001');
  $('#tb_dispose tbody td.inputsn:eq('+0+')').find('input:eq('+1+')').val('SN150002');
  $('#tb_dispose tbody td.inputsn:eq('+0+')').find('input:eq('+2+')').val('SN150003');
  $('#tb_dispose tbody td.inputsn:eq('+0+')').find('input:eq('+3+')').val('SN150004');
  $('#tb_dispose tbody td.inputsn:eq('+0+')').find('input:eq('+4+')').val('SN150006');
 });

function click_control()
{
  $('.adddispose').on('click', function(){   
    add_tr();
  });

  $('.deldispose').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input.cbsmodal:checkbox:checked').each(function(){
                   var id = $(this).attr('id');
                   //id = id.replace(/[^0-9\.]/g,'');
                   $('#tb_dispose tbody tr#'+id).remove();
                   });

                   //$('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_dispose tbody tr').remove();
                   //$('input[type="checkbox"].cbsmodal:checkbox:checked').next('tr').html();
                   //var idx = $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_dispose tbody tr.firsttr').index();
                  //alert(idx);
                   //$('#tb_dispose tbody tr.inputsn:eq('+idx+')').remove();
                   //$('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_dispose tbody tr').remove();
                   
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_dispose tbody tr').remove();
               }
         }
  sumtotal();
  showhideBtn();  
  });

}

function select_control()
{
	$('#tdispose_mcmp.selectpicker').on('change', function(){
		if($(this).val()==1){
		$('#tdispose_address').val('ที่อยู่ A');
	    }else{
	    $('#tdispose_address').val('ที่อยู่ B');
	    }
	});


}

function add_tr()
{
	
  var max_n =0;
  $('#tb_dispose tbody tr.firsttr').each(function(){
  max_n = Math.max(max_n,$(this).attr('id'));
  });  
  var n=max_n;
    if(!n){n=0;}
    n = parseInt(n); n=n+1;

  var trhtml ='<tr id="'+n+'" class="firsttr">';
      trhtml +='<td><input type="checkbox" id="'+n+'" class="cbsmodal"></td>';
      trhtml +='<td><p class="required">*</p><div class="form-group">';
      trhtml +='<select name="tdispose_mitm[]" class="selectpicker show-tick form-control input-sm tdispose_mitm"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>--ค้นหา--</option>';
      trhtml +='<option style="font-size:12px;" value="1">AAA-0001</option>'; 
      trhtml +='<option style="font-size:12px;" value="2">BBB-0002</option>'; 
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div></td>';
      trhtml +='<td><p class="required">*</p><input type="text" class="form-control" value="" readonly="true"></td>';
      trhtml +='<td>';
      trhtml +='<p class="required">*</p><div class="form-group">';
      trhtml +='<select name="tdispose_sku[]" class="selectpicker show-tick form-control input-sm tdispose_sku"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml +='<option style="font-size:12px;" value="" selected>--</option>';
      trhtml +='<option style="font-size:12px;" value="1">ชิ้น</option> ';
      trhtml +='<option style="font-size:12px;" value="2">อัน</option> ';
      trhtml +='</select>';
      trhtml +='<div class="help-block with-errors"></div>';
      trhtml +='</div>';
      trhtml +='</td>';
      trhtml +='<td>';
      trhtml +='<p class="required">*</p><input type="text" class="form-control amount" id="amount'+n+'" name="amount[]"style="text-align:right;" required="true">';
      trhtml +='</td>';
      trhtml +='<td><textarea class="form-control" id="noteother" style="height:35px;" rows="1"></textarea></td>';
      trhtml +='</tr>';
      trhtml +='<tr id="'+n+'"class="inputsn">';
      trhtml +='<td></td>';
      trhtml +='<td colspan="5" class="inputsn">';
      /*trhtml +='<div class="row form_input">';
      trhtml +='<div class="col-md-3" style="text-align:left;">';
      trhtml +='<p>SN # 1</p>';
      trhtml +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      trhtml +='</div>';
      trhtml +='<div class="col-md-3" style="text-align:left;">';
      trhtml +='<p>SN # 2</p>    ';
      trhtml +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      trhtml +='</div>';
      trhtml +='<div class="col-md-3" style="text-align:left;">';
      trhtml +='<p>SN # 3</p>    ';
      trhtml +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      trhtml +='</div>';
      trhtml +='<div class="col-md-3" style="text-align:left;">';
      trhtml +='<p>SN # 4</p>';    
      trhtml +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      trhtml +='</div>';
      trhtml +='</div>';*/
      trhtml +='</td>';
 	    trhtml +='</tr>';
 	 $('#tb_dispose tbody').append(trhtml);
 	 click_tbdispose_checkbox();
 	 checkbox_check_all();
   key_change(n);
 	 sumtotal();
 	 showhideBtn();
 	 $('.selectpicker').selectpicker('refresh');
}


function snhtml(idx,val)
{
  
  var row_total = parseFloat(val/4).toFixed(2);
  var row_full = Math.ceil(val/4);
      row_total = row_total.toString();
  var mod=row_total.split('.');
  var rows=mod[0];
  var cols = mod[1];
  
  for (var i = 1; i <= rows; i++) {
       switch_sn('00',idx);
  }; 
  if(cols=='25' || cols=='50' || cols=='75')
  {
      switch_sn(cols,idx);
  }
}

function switch_sn(sn,idx)
{
  switch (sn) { 
    case '25': 
        sn1(idx);
        break;
    case '50': 
        sn2(idx);
        break;  
    case '75': 
        sn3(idx);
        break;
    case '00': 
        sn4(idx);
        break;
    default:
        
    }
}

function sn4(idx)
{
      var num = $('#tb_dispose tbody td.inputsn:eq('+idx+') input').length;
      var sn4='';
      sn4 +='<div class="row form_input">';
      sn4 +='<div class="col-md-3" style="text-align:left;">';
      sn4 +='<p>SN # '+parseInt(num+1)+'</p>';
      sn4 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn4 +='</div>';
      sn4 +='<div class="col-md-3" style="text-align:left;">';
      sn4 +='<p>SN # '+parseInt(num+2)+'</p>    ';
      sn4 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn4 +='</div>';
      sn4 +='<div class="col-md-3" style="text-align:left;">';
      sn4 +='<p>SN # '+parseInt(num+3)+'</p>    ';
      sn4 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn4 +='</div>';
      sn4 +='<div class="col-md-3" style="text-align:left;">';
      sn4 +='<p>SN # '+parseInt(num+4)+'</p>';    
      sn4+='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn4 +='</div>';
      sn4 +='</div>';
      $('#tb_dispose tbody td.inputsn:eq('+idx+')').append(sn4);
}

function sn3(idx)
{
      var num = $('#tb_dispose tbody td.inputsn:eq('+idx+') input').length;
      var sn3='';
      sn3 +='<div class="row form_input">';
      sn3 +='<div class="col-md-3" style="text-align:left;">';
      sn3 +='<p>SN # '+parseInt(num+1)+'</p>';
      sn3 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn3 +='</div>';
      sn3 +='<div class="col-md-3" style="text-align:left;">';
      sn3 +='<p>SN # '+parseInt(num+2)+'</p>    ';
      sn3 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn3 +='</div>';
      sn3 +='<div class="col-md-3" style="text-align:left;">';
      sn3 +='<p>SN # '+parseInt(num+3)+'</p>    ';
      sn3 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn3 +='</div>';
      sn3 +='<div class="col-md-3 " style="text-align:left;">';     
      sn3 +='</div>';
      sn3 +='</div>';
      $('#tb_dispose tbody td.inputsn:eq('+idx+')').append(sn3);
}

function sn2(idx)
{
      var num = $('#tb_dispose tbody td.inputsn:eq('+idx+') input').length;
      var sn2='';
      sn2 +='<div class="row form_input">';
      sn2 +='<div class="col-md-3" style="text-align:left;">';
      sn2 +='<p>SN # '+parseInt(num+1)+'</p>';
      sn2 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn2 +='</div>';
      sn2 +='<div class="col-md-3" style="text-align:left;">';
      sn2 +='<p>SN # '+parseInt(num+2)+'</p>    ';
      sn2 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn2 +='</div>';
      sn2 +='<div class="col-md-3" style="text-align:left;">';
      sn2 +='</div>';
      sn2 +='<div class="col-md-3" style="text-align:left;">';     
      sn2 +='</div>';
      sn2 +='</div>';
      $('#tb_dispose tbody td.inputsn:eq('+idx+')').append(sn2);
}

function sn1(idx)
{
      var num = $('#tb_dispose tbody td.inputsn:eq('+idx+') input').length;
      var sn1='';
      sn1 +='<div class="row form_input">';
      sn1 +='<div class="col-md-3" style="text-align:left;">';
      sn1 +='<p>SN # '+parseInt(num+1)+'</p>';
      sn1 +='<p class="required">*</p><input type="text" class="form-control" value="" required="true">';
      sn1 +='</div>';
      sn1 +='<div class="col-md-3" style="text-align:left;">';
      sn1 +='</div>';
      sn1 +='<div class="col-md-3" style="text-align:left;">';
      sn1 +='</div>';
      sn1 +='<div class="col-md-3" style="text-align:left;">';     
      sn1 +='</div>';
      sn1 +='</div>';
      $('#tb_dispose tbody td.inputsn:eq('+idx+')').append(sn1);
}

function showhideBtn()
{
	var trtotal=$('#tb_dispose tbody tr').length;
 	 if(trtotal>4 || $('#tb_dispose tbody tr input').length>20)
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

function click_tbdispose_checkbox()
{
	$('#cballmodal').on('click',function(){
    var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].cbsmodal').prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#tb_dispose tbody tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_dispose tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
	});

	$('#tb_dispose tbody tr .cbsmodal').on('click',function(){
		var cb_status = $(this).is(':checked');
		var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#tb_dispose tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
        $('#tb_dispose tbody tr:eq('+parseInt(idx+1)+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_dispose tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
        $('#tb_dispose tbody tr:eq('+parseInt(idx+1)+')').removeAttr('style','background-color: #ECFFB3;');
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


function key_change(n)
{
  $('#amount'+n).on('change',function(){
    showhideBtn();
    var idx=$(this).closest('.amount').index('.amount');  
    sumtotal();
    var num = $('#tb_dispose tbody td.inputsn:eq('+idx+') input').length;
    if(num>0)
    {
      var input = [];
      $('#tb_dispose tbody td.inputsn:eq('+idx+') input').each(function(){
         if($(this).val()) {
         input.push($(this).val());
         }
      });
      //console.log(input);
      if(input.length>0)
      {
          if($(this).val()<input.length)
          {
              if (confirm('ต้องการลดจำนวน SN#ที่มีข้อมูลแล้ว ใช่หรือไม่?')) { 
                $('#tb_dispose tbody td.inputsn:eq('+idx+')').html('');
                snhtml(idx,$(this).val());
                $.each(input, function(i,val){
                $('#tb_dispose tbody td.inputsn:eq('+idx+')').find('input:eq('+i+')').val(val);
                });
              }
          }else
          {
              $('#tb_dispose tbody td.inputsn:eq('+idx+')').html('');
              snhtml(idx,$(this).val());
              $.each(input, function(i,val){
              $('#tb_dispose tbody td.inputsn:eq('+idx+')').find('input:eq('+i+')').val(val);
              });
          }
      }else
      {
        $('#tb_dispose tbody td.inputsn:eq('+idx+')').html('');
        snhtml(idx,$(this).val());
      }

    }else
    {
      snhtml(idx,$(this).val());
    }
  });

}

function sumtotal()
{
	var grand_total_qty=0;
	    $('input.amount').each(function(){
	       var val = $(this).val();
	       if(!val){val=0;}
	       grand_total_qty += parseFloat(val);
	    });
	$('#tdispose_amount_total').val(grand_total_qty);

    var grand_total_qty=0;
      $('input.sumcost').each(function(){
         var val = $(this).val();
         if(!val){val=0;}
         grand_total_qty += parseFloat(val);
      });
  $('#tdispose_cost_total').val(grand_total_qty);
}

function saveData()
      {
         $('#form').on('submit', function(e){
            if(e.isDefaultPrevented()) {
              alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
           /* e.preventDefault();
            var form = $('#form').serialize();
	            $.ajax({
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
	            });                */
            }
          });
      }
</script>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
 <div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบขอ Scrap</p>    
 	  <p class="required">*</p><input type="text" class="form-control" value="SC-150001" readonly="true">
  </div>
  <div class="col-md-3" style="text-align:left;">
   <p>ประเภทสินค้าขอ Scrap</p>
   <p class="required">*</p><div class="form-group">
         <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" >----เลือก----</option>
            <option style="font-size:12px;" value="" selected>แบ็ตเตอรี่ - Battery</option> 
            <option style="font-size:12px;" value="">บอร์ดวงจร - Board</option> 
         </select>
     <div class="help-block with-errors"></div>
  </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
     <p>วันที่-เวลาออกเอกสาร</p>
    <p class="required">*</p><div class="input-group" style="z-index:9  !important;">
    <input type="text" name="receivedate" id="receivedate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
</div>

<div class="row form_input">
<div class="col-md-12" style="text-align:left;">
<p>หมายเหตุ</p>
<textarea class="form-control" id="tdispose_address"></textarea>
</div>
</div>

<div class="row form_input header_table" style="margin-top:20px;">
<div class="col-md-3">
<div class="add adddispose" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
</div>
<div class="add deldispose" style="margin-bottom:10px;">
    - ลบรายการ
</div>
</div>
<div class="col-md-12">
 <table class="table table-striped" id="tb_dispose">
 	<thead>
 	<tr>
 		<th width="1%"><input type="checkbox" id="cballmodal"></th>
    <th width="19%">Part No.</th>
    <th width="25%">Part Name</th>
 		<th width="5%">หน่วยนับ</th>
    <th width="5%">จำนวน</th>
    <th width="15%">หมายเหตุ</th>
 	</tr>
 	</thead>
 	<tbody>
 	<tr id="1" class="firsttr">
 		<td><input type="checkbox" id="1" class="cbsmodal"></td>
 		<td><p class="required">*</p><div class="form-group">
         <select name="tdispose_mitm[]" class="selectpicker show-tick form-control input-sm tdispose_mitm"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" >--ค้นหา--</option>
            <option style="font-size:12px;" value="1" selected>AAA-0001</option> 
            <option style="font-size:12px;" value="2">BBB-0002</option> 
         </select>
      <div class="help-block with-errors"></div>
    </div></td>
    <td><p class="required">*</p><input type="text" class="form-control" value="Battery AA" readonly="true"></td>
    <td>
		<p class="required">*</p><div class="form-group">
         <select name="tdispose_sku[]" class="selectpicker show-tick form-control input-sm tdispose_sku"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="" >--</option>
            <option style="font-size:12px;" value="1">ชิ้น</option> 
            <option style="font-size:12px;" value="2"selected>ก้อน</option> 
         </select>
     	<div class="help-block with-errors"></div>
		</div>
		</td>
 		<td>
    <p class="required">*</p><input type="text" class="form-control amount" id="amount1" name="amount[]"style="text-align:right;" required="true" value="5" >
    </td>
    <td><textarea class="form-control" id="noteother" style="height:35px;" rows="1"></textarea></td>
 		</tr>
    <tr id="1" class="inputsn">
      <td></td>
      <td colspan="5" class="inputsn">
      </td>
    </tr>
 	</tbody>
 	<tfoot>
 	<tr>
 		<th colspan="4" style="text-align:right;">รวมทั้งสิ้น :</th>
 		<th><input type="text" class="input form-control" id="tdispose_amount_total" name="tdispose_amount_total" style="text-align:right;" readonly="true"></th>
 	  <th></th>
  </tr>
 	</tfoot>
 </table>	
</div>	
</div>



<div class="row form_input footer_table" style="display:none;">
<div class="col-md-3">
<div class="add adddispose" style="margin-bottom:10px; margin-right:10px;">
    + เพิ่มรายการ
</div>
<div class="add deldispose" style="margin-bottom:10px;">
    - ลบรายการ
</div>
</div>
</div>

<!--<div class="col-md-2" style="margin-top:50px; margin-bottom:20px;">
  <div class="form-group">
    <input id="range_example_2_start" class="form-control " type="text" value="" name="range_example_2_start"></input>
    <input id="range_example_2_end" class="form-control " type="text" value="" name="range_example_2_end"></input>
  </div>
</div>-->
<div class="row form_input" style="margin-top:10px;">
  <div class="col-md-12" style="text-align:left;">
    <p>สถานะ</p>  
      <input type="radio"  name="status" value="1"  disabled checked=checked> ในประกัน
      <input type="radio"  name="status" value="2" disabled >  นอกประกัน  
      <input type="radio"  name="status" value="0" disabled >  ยกเลิกการรับประกัน 
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