<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#svrdate,#reqdate" ).datepicker({ 
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
	$('.addclaim').on('click', function(){
 	add_tr();
 	});

 	$('.delclaim').on('click', function(){
 	 	if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal:checkbox:checked').parents('#tb_claim tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal').is(':checked')){
               $('#tb_claim tbody tr').remove();
               }
         }
 	sumtotal();
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

function add_tr()
{
	var trhtml ='<tr>';
 	 	trhtml +='<td><input type="checkbox" class="cbsmodal"></td>';
 	 	trhtml +='<td><input type="text" class="input form-control" name="detail" style="width:100%;"></td>';
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
      <p>เลขที่ใบสำรวจสถานที่</p>
      <div class="form-group">
        <select disabled id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value="" selected>CM-20150001</option> 
          <option style="font-size:12px;" value="">CM-20150002</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>วันที่สำรวจ</p>    
      <?php $now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
        $datefrom = "01/".$now->format('m/Y'); 
        $datenow = $now->format('d/m/Y');
        $datetimenow = $now->format('d/m/Y H:i');
      ?>
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="svrdate" id="svrdate" value="<?=$datenow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>แผนกที่สำรวจ</p>
      <div class="form-group">
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value="" selected>แผนก A</option> 
          <option style="font-size:12px;" value="">แผนก B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>ผู้สำรวจ</p>
      <div class="form-group">
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value="" selected>ชื่อ A</option> 
          <option style="font-size:12px;" value="">ชื่อ B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  <div class="row form_input">
    <div class="col-md-3" style="text-align:left;">
      <p>เลขที่ใบแจ้งติดตั้ง</p>
      <input type="text" class="form-control" name="telephone"  value="CM-20150001" readonly>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>วันที่แจ้ง</p>    
      <?php $now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
        $datefrom = "01/".$now->format('m/Y'); 
        $datenow = $now->format('d/m/Y');
        $datetimenow = $now->format('d/m/Y H:i');
      ?>
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="reqdate" id="reqdate" value="<?=$datenow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>แผนกที่แจ้ง</p>
      <div class="form-group">
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value="" selected>แผนก A</option> 
          <option style="font-size:12px;" value="">แผนก B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-3" style="text-align:left;">
      <p>ผู้แจ้ง</p>
      <div class="form-group">
        <select id="mf_owner_mtck" name="mf_owner_mtck" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
          <option style="font-size:12px;" value="">----เลือก----</option>
          <option style="font-size:12px;" value="" selected>ชื่อ A</option> 
          <option style="font-size:12px;" value="">ชื่อ B</option> 
        </select>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  <div class="row form_input" style="text-align:left; margin-top:-10px;">
    <div class="col-md-6">
      <fieldset>
      <legend>ข้อมูลบริษัท</legend>     
      <div class="row form_input" style="text-align:left; margin-top:0px;">
        <div class="col-md-7">
          <p>ชื่อบริษัทที่ติดตั้ง</p>
          <div class="form-group">
                <select id="mf_owner_mtck" name="orgName" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="">----เลือก----</option>
                  <option style="font-size:12px;" value="" selected>บริษัท A</option> 
                 <option style="font-size:12px;" value="">บริษัท B</option> 
                </select>
              <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left;">
          <p>ชื่อผู้ติดต่อ</p>
          <input type="text" class="form-control" name="telephone" value="นาย A">
        </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left;  margin-top:2px;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p>
          <textarea class="form-control" style="height: 100px; padding:5px;">1346 (ห้อง 3) หมู่ 2 ซ.เบญจพล1(เทพารักษ์ 88) ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ 10270</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left;">
            <p>เบอร์โทรศัพท์</p>
            <input type="text" class="form-control" name="telephone"  value="08-XXX-XXXX">
          </div>
          <div class="row form_input" style="text-align:left;">
            <p>Fax.</p>
            <input type="text" class="form-control" name="telephone"  value="02345678">
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
          <input type="checkbox" id="cballmodal"> เลือกที่เดียวกับบริษัท
        </div>
      </div>
      <div class="row form_input" style="text-align:left;">
        <div class="col-md-7">
          <p>สถานที่ไซต์งาน</p>
          <div class="form-group">
                <select id="mf_owner_mtck" name="orgName" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
                  <option style="font-size:12px;" value="">----เลือก----</option>
                  <option style="font-size:12px;" value="" selected>บริษัท A</option> 
                 <option style="font-size:12px;" value="">บริษัท B</option> 
                </select>
              <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left;">
          <p>ชื่อผู้ติดต่อ</p>
          <input type="text" class="form-control" name="telephone" value="นาย A">
        </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left;  margin-top:2px;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p>
          <textarea class="form-control" style="height: 100px; padding:5px;">1346 (ห้อง 3) หมู่ 2 ซ.เบญจพล1(เทพารักษ์ 88) ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ 10270</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left;">
            <p>เบอร์โทรศัพท์</p>
            <input type="text" class="form-control" name="telephone"  value="08-XXX-XXXX">
          </div>
          <div class="row form_input" style="text-align:left;">
            <p>Fax.</p>
            <input type="text" class="form-control" name="telephone"  value="02345678">
          </div>
        </div>
      </div>
    </fieldset>
    </div>    
  </div>

<div class="row form_input" style="text-align:left;">
<div class="col-md-6 offset6" style="text-align:left;">
<p>ยานพาหนะ</p>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio1" value="1" checked>รถบริษัท</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio2" value="2">รถรับจ้าง</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio3" value="3">รถส่วนตัว</label>
<label class="radio-inline"><input type="radio" class="optradio" name="optradio" id="optradio4" value="4">อื่นๆ</label>
<label class="radio-inline">
<input class="form-control " type="text" id="other_transport" readonly="true" style="margin-left:-30px; width:250px;">
</label> 
</div>

    <div class="col-md-2">
      <p>วันที่ดำเนินการ</p>
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="startdate" id="startdate" value="08/07/2015 08:00" readonly="true" class="form-control" style="padding:5px;" > <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-2">
      <p>วันที่ดำเนินการเสร็จ</p>
      <div class="input-group" style="z-index:99999  !important;">
        <input type="text" name="enddate" id="enddate" value="09/07/2015 17:00" readonly="true" class="form-control " style="padding:5px;"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>

<div class="col-md-1">
  <p>รวมวัน</p>
  <input type="text" class="input form-control" name="telephone" value="1">
</div>
<div class="col-md-1">
  <p>ชม.</p>
  <input type="text" class="input form-control" name="telephone" value="9">
</div>
</div>

  <div class="row form_input">
    <div class="col-md-12" style="text-align:left;">
      <p>หมายเหตุ</p>
      <textarea class="form-control"></textarea>
    </div>
  </div>

  <div class="row form_input">
    <div class="col-md-2"  style="text-align:left;">
      <p>สถานะ</p> 
      <div class="status">
        <input type="radio"  name="status" value="1"  disabled checked=checked;> ใช้งาน
        <input type="radio"  name="status" value="2" disabled >  ยกเลิก  
      </div>
    </div>
  </div>
  <div class="row form_input" style="text-align:left;">
    <div class="col-md-3">
      <p>ผู้สร้าง</p>
      <input type="text" class="input form-control" name="name_create" value="" disabled>
    </div>
    <div class="col-md-3">
      <p>วันที่สร้าง</p>
      <input type="text" class="input form-control" name="dt_create" value="" disabled>
    </div>
    <div class="col-md-3">
      <p>ผู้แก้ไขล่าสุด</p>
      <input type="text" class="input form-control" name="name_update" value="" disabled>
    </div>
    <div class="col-md-3">
      <p>วันที่แก้ไขล่าสุด</p>
      <input type="text" class="input form-control" name="dt_update" value="" disabled>
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
    <div class="col-md-12">
      <table class="table table-striped" id="tb_claim">
        <thead>
          <tr>
            <th width="1%"><input type="checkbox" id="cballmodal"></th>
            <th width="99%">รายละเอียด (กรุณากรอกรายละเอียดให้ครบถ้วน)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox" class="cbsmodal"></td>
            <td><input type="text" class="form-control" name="detail" style="width:100%;" placeholder="กรุณากรอกรายละเอียดให้ครบถ้วน"></td>
          </tr>
        </tbody>
      </table>  
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
