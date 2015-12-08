<script type='text/javascript'>
$(function(){  
  $('.selectpicker').selectpicker('refresh');
  $('#podate').datetimepicker();
	click_transport_radio();
	checkbox_check_all();
	click_control();
	select_control();
  key_change();
	sumtotal();
	//saveData();
	showhideBtn();
 });


function click_control()
{
  $('.addstock').on('click', function(){   
    add_tr();
  });

  $('.delstock').on('click', function(){
    if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_stock tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_stock tbody tr').remove();
               }
         }
  sumtotal();
  showhideBtn();  
  });

}

function select_control()
{
	$('#tstock_mcmp.selectpicker').on('change', function(){
		if($(this).val()==1){
		$('#tstock_address').val('ที่อยู่ A');
	    }else{
	    $('#tstock_address').val('ที่อยู่ B');
	    }
	});


}

function add_tr()
{
	var trhtml ='<tr>';
      trhtml+='<td><input type="checkbox" class="cbsmodal"></td>';
      trhtml+='<td><input type="text" name="sn[]" class="form-control"></td>';
      trhtml+='<td><p class="required">*</p><div class="form-group">';
      trhtml+='<select name="tstock_mitm[]" class="selectpicker show-tick form-control input-sm tstock_mitm"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml+='<option style="font-size:12px;" value="" selected>--ค้นหา--</option>';
      trhtml+='<option style="font-size:12px;" value="1">AAA-0001</option> ';
      trhtml+='<option style="font-size:12px;" value="2">BBB-0002</option> ';
      trhtml+='</select>';
      trhtml+='<div class="help-block with-errors"></div>';
      trhtml+='</div></td>';
      trhtml+='<td><p class="required">*</p><input type="text" class="form-control" value="" readonly="true"></td>';
      trhtml+='<td><p class="required">*</p><div class="form-group">';
      trhtml+='<select name="tstock_sto[]" class="selectpicker show-tick form-control input-sm tstock_sto"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml+='<option style="font-size:12px;" value="" selected>--</option>';
      trhtml+='<option style="font-size:12px;" value="1">001</option> ';
      trhtml+='<option style="font-size:12px;" value="2">002</option> ';
      trhtml+='</select>';
      trhtml+='<div class="help-block with-errors"></div>';
      trhtml+='</div></td>';
      trhtml+='<td><p class="required">*</p><div class="form-group">';
      trhtml+='<select name="tstock_zone[]" class="selectpicker show-tick form-control input-sm tstock_zone"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml+='<option style="font-size:12px;" value="" selected>--</option>';
      trhtml+='<option style="font-size:12px;" value="1">A1</option> ';
      trhtml+='<option style="font-size:12px;" value="2">A2</option> ';
      trhtml+='</select>';
      trhtml+='<div class="help-block with-errors"></div>';
      trhtml+='</div></td>';
      trhtml+='<td>';
      trhtml+='<p class="required">*</p><div class="form-group">';
      trhtml+='<select name="tstock_sku[]" class="selectpicker show-tick form-control input-sm tstock_sku"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
      trhtml+='<option style="font-size:12px;" value="" selected>--</option>';
      trhtml+='<option style="font-size:12px;" value="1">ชิ้น</option> ';
      trhtml+='<option style="font-size:12px;" value="2">อัน</option> ';
      trhtml+='</select>';
      trhtml+='<div class="help-block with-errors"></div>';
      trhtml+='</div>';
      trhtml+='</td>';
      trhtml+='<td><p class="required">*</p><input type="text" class="form-control amount" name="amount[]"style="text-align:right;" required="true"></td></td>';
      trhtml+='<td><p class="required">*</p><input type="text" class="input form-control unitcost" name="unitcost[]" style="text-align:right;"required="true"></td>';
      trhtml+='<td><input type="text" class="input form-control sumcost" name="sumcost[]" style="text-align:right;"readonly="true"></td> ';
 	    trhtml +='</tr>';
 	 $('#tb_stock tbody').append(trhtml);
 	 click_tbstock_checkbox();
 	 checkbox_check_all();
   key_change();
 	 sumtotal();
 	 showhideBtn();
 	 $('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
	var trtotal=$('#tb_stock tbody tr').length;
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

function click_tbstock_checkbox()
{
	$('#cballmodal').on('click',function(){
		var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].cbsmodal').prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#tb_stock tbody tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_stock tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
	});

	$('#tb_stock tbody tr .cbsmodal').on('click',function(){
		var cb_status = $(this).is(':checked');
		var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#tb_stock tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#tb_stock tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
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


function key_change()
{
  $('.amount').on('change',function(){
    var idx=$(this).closest('.amount').index('.amount');
    var unitcost = parseFloat($('input.unitcost').eq(idx).val());
        if(!unitcost){unitcost=0;}
    $('input.sumcost').eq(idx).val(parseFloat($(this).val()*unitcost));
    sumtotal();
  });

  $('input.unitcost').on('change',function(){
    var idx=$(this).closest('.unitcost').index('.unitcost');
    var amount = parseFloat($('input.amount').eq(idx).val());
    if(!amount){amount=0;}
    $('input.sumcost').eq(idx).val(parseFloat($(this).val()*amount));
    sumtotal();
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
	$('#tstock_amount_total').val(grand_total_qty);

    var grand_total_qty=0;
      $('input.sumcost').each(function(){
         var val = $(this).val();
         if(!val){val=0;}
         grand_total_qty += parseFloat(val);
      });
  $('#tstock_cost_total').val(grand_total_qty);
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
    <p>เลขที่เอกสาร ใบสั่งซื้อ[PO]</p>    
    <p class="required">*</p><input type="text" class="form-control" value="" required="true">
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>วันที่-เวลาเอกสาร ใบสั่งซื้อ[PO]</p>
    <p class="required">*</p>
    <div class="input-group" style="z-index:9  !important;">
      <input type="text" name="podate" id="podate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่<?=$pagename?></p>
    <input type="text" class="form-control" readonly="true" style=" background-color:#81BEF7;color:#FFFFFF;"value="--สร้างโดยระบบ--">
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>วัน/เวลาที่<?=$pagename?></p>
    <p class="required">*</p>
    <div class="input-group" style="z-index:9  !important;">
      <input type="text" name="receivedate" id="receivedate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
</div>

<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>แผนกทีรับ</p>
    <div class="form-group">
      <input type="text" name="" value="สโตส์ย่อย" readonly="true" class="form-control"> 
    </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อผู้รับ</p>
    <div class="form-group">
      <input type="text" name="" value="พุฒิพงศ์ ห้วงน้ำ" readonly="true" class="form-control"> 
    </div> 
  </div>
</div>

<div class="row form_input">
  <div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p>
    <textarea class="form-control" id="tstock_address"></textarea>
  </div>
</div>

<div class="row form_input header_table" style="margin-top:20px;">
  <div class="col-md-3">
    <div class="add addstock" style="margin-bottom:10px; margin-right:10px;">
      + เพิ่มรายการ
    </div>
    <div class="add delstock" style="margin-bottom:10px;">
      - ลบรายการ
    </div>
  </div>
</div>

<div class="row form_input header_table">
  <div class="col-md-12">
    <div style="overflow-x:scroll;overflow-y: hidden;">
      <table class="table table-striped" id="tb_stock"  style="table-layout: fixed;word-wrap: break-word;"> 
        <thead>
          <tr>
            <th width="30"><input type="checkbox" id="cballmodal"></th>
            <th width="200">เลขที่ผลิตภัณฑ์</th>
            <th width="200">Part No.</th>
            <th width="200">Part Name</th>
            <th width="200">ชื่อคลัง</th>
            <th width="200">ที่เก็บ</th>
            <th width="200">หน่วยนับ</th>
            <th width="100">จำนวน</th>
            <th width="200">ตุ้นทุน /หน่วย</th>
            <th width="200">มูลค่ารวม</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox" class="cbsmodal"></td>
            <td><input type="text" name="sn[]" class="form-control"></td>
            <td>
              <p class="required">*</p>
              <div class="form-group">
                <select name="tstock_mitm[]" class="selectpicker show-tick form-control input-sm tstock_mitm"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="" selected>--ค้นหา--</option>
                  <option style="font-size:12px;" value="1">AAA-0001</option> 
                  <option style="font-size:12px;" value="2">BBB-0002</option> 
                </select>
                <div class="help-block with-errors"></div>
              </div>
            </td>
            <td><p class="required">*</p><input type="text" class="form-control" value="" readonly="true"></td>
            <td>
              <p class="required">*</p>
              <div class="form-group">
                <select name="tstock_sto[]" class="selectpicker show-tick form-control input-sm tstock_sto"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="" selected>--</option>
                  <option style="font-size:12px;" value="1">001</option> 
                  <option style="font-size:12px;" value="2">002</option> 
                </select>
                <div class="help-block with-errors"></div>
              </div>
            </td>
            <td>
              <p class="required">*</p>
              <div class="form-group">
                <select name="tstock_zone[]" class="selectpicker show-tick form-control input-sm tstock_zone"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="" selected>--</option>
                  <option style="font-size:12px;" value="1">A1</option> 
                  <option style="font-size:12px;" value="2">A2</option> 
                </select>
                <div class="help-block with-errors"></div>
              </div>
            </td>
            <td>
              <p class="required">*</p>
              <div class="form-group">
                <select name="tstock_sku[]" class="selectpicker show-tick form-control input-sm tstock_sku"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="" selected>--</option>
                  <option style="font-size:12px;" value="1">ชิ้น</option> 
                  <option style="font-size:12px;" value="2">อัน</option> 
                </select>
                <div class="help-block with-errors"></div>
              </div>
            </td>
            <td><p class="required">*</p><input type="text" class="form-control amount" name="amount[]"style="text-align:right;" required="true"></td></td>
            <td><p class="required">*</p><input type="text" class="input form-control unitcost" name="unitcost[]" style="text-align:right;"required="true"></td>
            <td><input type="text" class="input form-control sumcost" name="sumcost[]" style="text-align:right;"readonly="true"></td>	
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="7" style="text-align:right;">รวมทั้งสิ้น :</th>
            <th><input type="text" class="input form-control" id="tstock_amount_total" name="tstock_amount_total" style="text-align:right;" readonly="true"></th>
            <th></th>
            <th><input type="text" class="input form-control" id="tstock_cost_total" name="tstock_cost_total" style="text-align:right;" readonly="true"></th>
          </tr>
        </tfoot>
      </table>	
    </div>  
  </div>  
</div>  

<div class="row form_input footer_table" style="display:none;">
  <div class="col-md-3">
    <div class="add addstock" style="margin-bottom:10px; margin-right:10px;">
      + เพิ่มรายการ
    </div>
    <div class="add delstock" style="margin-bottom:10px;">
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
