<script type='text/javascript'>
	$(function(){

		$( "#birthdate" ).datepicker({
			yearRange: "-100:+0",
		});
		$("#startdate").datepicker();
		$("#resigndate").datepicker();
		$(".today").datepicker({
			changeMonth: true,
			changeYear: true,
		});
		//$('.today').val('<?php echo $datenow;?>');
		// $(".testtoday").datepicker();

		$("#confirmpw").change(function(){
			var npw = $("#userpassword").val();
			var cpw = $("#confirmpw").val();
			if(npw != cpw){
				alert("รหัสผ่าน  ไม่ถูกต้อง !");
				$("#userpassword").val("");
				$("#confirmpw").val("");
			}
		});

		$("#user").keyup(function(){
			$("#valid").html("");
		});

		$("#email").change(function(){
			var email = $("#email").val();
			if(email.indexOf('@')==-1  || email.indexOf('.')==-1) {
				$("#valid_email").html("รูปแบบ Email ไม่ถูกต้อง !");
				$("#email").focus();
			}else{
				$("#valid_email").html("");
			}
		});

		$("#mobile").change(function(){
			var mobile = $("#mobile").val();
			if(isNaN(mobile)) {
				$("#valid_mobile").html("กรุณากรอกตัวเลขเท่านั้น และไม่มีช่องว่าง !");
				$("#mobile").value('');
				$("#mobile").focus();
			}else{
				$("#valid_mobile").html("");
			}
		});

		$("#user").change(function(){
			var user = $("#user").val();
			if(user != ""){
				$.ajax(
				{
					type: 'POST',
					url: '<?php echo base_url().$controller; ?>/checkUser/',
	                data: {"user":user}, //your form datas to post
	                success: function(rs)
	                {
	                	console.log(rs);
	                	if(rs==1){
	                		$("#valid").html("ชื่อเข้าใช้ :"+user+" มีการใช้งานอยู่แล้ว");
	                		$("#user").val('');
	                	}
	                }
	             });


			}else{
				$("#valid").html("");
			}
		});

		$('.selectpicker').selectpicker({
			
		});

		$('.selectpicker').keyup(function(){
			$.ajax({
				url: '<?php echo base_url().$controller; ?>/getCustomer/',
				//data:"zipcode="+$("input[name=zipcode]").val(),
				type: 'POST',
				dataType: 'json',
				success:function(res){
					console.log(res);
					// var amphur="<option >----เลือกอำเภอ----</option>";
					// var district="<option >---เลือกตำบล---</option>";
					// $.each(res, function( index, value ) {
						// $('input[name=province]').val(value['PROVINCE_NAME']);
						// $('input[name=amphur]').val(value["AMPHUR_NAME"]);
						// province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
						// amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
						// district += "<option value="+value['DISTRICT_ID']+"> "+value['DISTRICT_NAME']+"</option>";
					// });
					// $('#province').html(province);
				}
			});			
		});

		saveData();
	});

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
              	url: '<?php echo base_url().$controller; ?>/saveadd/',
	                data: {form}, //your form datas to post
	                success: function(rs)
	                {
	                	$('.modal').modal('hide');
	                	location.reload();
	                	alert("#บันทึกข้อมูล เรียบร้อย !");
	                },
	                error: function()
	                {
	                	alert("#เกิดข้อผิดพลาด");
	                }
	             });
           }
        });
}

$(function(){
	$('.memp_code').click(function () {
		var screenname="ค้นหาข้อมูลข้อมูล :: ลูกค้าคาดหวัง";
		var url = "<?php echo $show_cusCode; ?>";
		var n=3;
		$('.div_modal').html('');
		modal_form(n,screenname);
		$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
		var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
		modal.on('show.bs.modal', function () {
			modalBody.load(url);
		}).modal({backdrop: 'static',keyboard: true});
		setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
	});
});

function modal_form(n,screenname)
{
	var div='';
	div+='<form name="main" role="form" data-toggle="validator" id="form" method="post">';
		div+='<!-- Modal -->';
		div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
			div+='<div class="modal-dialog">';
				div+='<div class="modal-content">';
					div+='<div class="modal-header" style="background:#d9534f;color:#FFFFFF;">';
						div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
						div+='<h4 class="modal-title">'+screenname+'</h4>';
					div+='</div>';
					div+='<div class="modal-body">';
					div+='</div>';
					div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
						div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
					div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
					div+='</div>';
				div+='</div><!-- /.modal-content -->';
			div+='</div><!-- /.modal-dialog -->';
		div+='</div><!-- /.modal -->';
	div+='</form>';
	$('.div_modal').html(div);
}

</script>
<div class="row form_input" style="text-align:left; margin-bottom:10px">
	<div class="col-sm-3">
		<p>เลขที่ใบจอง</p>
		<input type="text" class="form-control" name="number_booking" placeholder="--สร้างโดยระบบ--"  readonly>
	</div>
	<div class="col-sm-3">
		<p>วันที่จอง</p>
		<!-- <input type="text" class="form-control testtoday" name="testdate" value="<?php echo $datenow;?>"/> -->
		<input  type="text" class="form-control today" name="date_booking" value="<?php echo $datenow;?>"/>
	</div>
	<div class="col-sm-3">
		<p>รหัสพนักงาน</p>
		<input type="text" class="form-control" name="id_employee" value="<?php echo $mmember_code;?>"/>
	</div>
	<div class="col-sm-3">
		<p>ชื่อพนักงาน</p>
		<?php
			foreach ($Sale as $rowSale) {
				echo '<input type="text" class="form-control" name="name_employee" value="'.$rowSale->salename.'"/>';
			}
		?>
	</div>
</div>
<div class="row form_input">
		<p><u>ลูกค้า</u></p>
		<div class="col-sm-3" >
			<p>หมายเลขลูกค้าคาดหวัง</p>
			<p class="required">*</p>
		        <div class="form-group">
		          <select class="selectpicker form-control" name="selectCustomer" data-live-search="true" data-live-search-placeholder="Search" d>
			          <option>---------ค้นหาลูกค้า---------</option>
		          </select>
		        </div>
			<input type="text" class="form-control memp_code" id="memp_code" name="memp_code" placeholder="----เลือก-----" required >
		</div>
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="customer" value="newCustomer" checked>ลูกค้าใหม่</label>
			<label class="radio-inline"><input type="radio" name="customer" value="oldCustomer">ลูกค้าเก่า</label>
		</div>
		<div class="col-sm-3" >
			<p >ประเภท</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="typeCustomer" value="poper" checked>บุคคล</label>
			<label class="radio-inline"><input type="radio" name="typeCustomer" value="company">บริษัท</label>
		</div>
		<div class="col-sm-3">
			<p>เหตุผลที่จอง</p>
			<label class="radio-inline"><input type="radio" name="car_detail" value="" checked> ตัวรถ</label>
			<label class="radio-inline"><input type="radio" name="car_detail" value="" > แคมเปญและของแถม</label>
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>คำนำหน้าชื่อ</p>
			<select name="id_memp_tit" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> นาย </option>
				<option value="2"> นาง </option>
				<option value="3"> นางสาว </option>
			</select>
		</div>
		<div class="col-sm-3" >
			<p>ชื่อ </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" required>
		</div>
		<div class="col-sm-3" >
			<p>นามสกุล </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" required>
		</div>
		<div class="col-sm-3" >
			<p>วันเกิด</p>
			<p class="required"></p>
			<input type="text" class="form-control" name="birthdate" id="birthdate"  >
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3" >
			<p>เลขใบอนุญาตขับขี่</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="drv_lcn_num" >
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" >
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์</p>
			<input type="text" class="form-control" name="telephone"  >
		</div>
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" >
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<input type="text" class="form-control" />
		</div>
		<div class="col-sm-9">
			<p>ที่อยู่</p>
			<input tye="text" class="form-control" name="address" />
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>จังหวัด</p>
			<input type="text" class="form-control" name="provice"/>
		</div>
		<div class="col-sm-3">
			<p>เขต/อำเภอ</p>
			<input type="text" class="form-control" name="umpher" />
		</div>
		<div class="col-sm-3">
			<p>แขวง/ตำบล</p>
			<input type="text" class="form-control" name="tumbon" />
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>อาชีพ/ธุรกิจ</p>
			<input type="text" class="form-control" name="jon" />
		</div>
		<div class="col-sm-3">
			<p>แหล่งที่มาของลูกค้า</p>
			<input type="text" class="form-control" name="origin" />
		</div>
</div>
<div class="row form_input">
		<p><u>เลือกรถ</u>  <input type="checkbox" name="select_in_stock" value="newCustomer" checked>เลือกจากสต๊อก </p>
		<div class="col-md-3" >
			<p>เลขที่รับเข้าสต๊อก</p>
			<input type="text" class="form-control" name="mposition_code" placeholder="--ระบุ--"  >
		</div>
		<div class="col-md-3" >
			<p>หมายเลขตัวถัง</p><p class="required">*</p>
			<input type="text" class="form-control" id="plan" name="plan" required>
		</div>
		<div class="col-md-3" >
			<p>หมายเลขเครื่อง</p><p class="required">*</p>
			<input type="text" class="form-control" id="plan" name="plan" required>
		</div>
		<div class="col-md-3" >
			<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p>
			<input type="text" class="form-control today" name="tstock_date" value="<?php echo $datenow; ?>" required>
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>แบบ</p>
			<select name="modelcar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA HR-V </option>
				<option value="2"> HONDA City </option>
				<option value="3"> HONDA BR-V </option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>รุ่น</p>
			<select name="modelcar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> E </option>
				<option value="2"> S AT </option>
				<option value="3"> EL </option>
			</select>
		</div>
		<div class="col-md-3" >
			<p>สี</p><p class="required">*</p>
			<select name="typeColor" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" style="background-color: red">สีแดง</option>
				<option value="2" style="background-color: write"> สีขาว</option>
				<option value="3" style="background-color: black"> สีดำ</option>
				<option value="3" style="background-color: gray"> สีเทา</option>
			</select>
		</div>
</div>
<div class="row form_input">
		<div class="col-sm-3">
			<p>ราคา</p>
			<input type="text" name="price" class="form-control" />
		</div>
		<div class="col-sm-3">
			<p>เงินมันดจำ</p>
			<div class="input-group">
				<input type="text" name="deposit" class="form-control" />
				<span class="input-group-addon">บาท</span>
			</div>
		</div>
</div>
<div class="row form_input">
	<p style="color:red;"><u>ใบจองที่โอนมา</u></p>
		<div class="col-sm-3">
			<p style="color:red;">เลขที่ใบจองที่โอนมา</p>
			<input type="text" class="form-control" name="slipt" placeholder="----เลือก----" />
		</div>
		<div class="col-sm-3">
			<p style="color:red;">วันที่ยกเลิก</p>
			<input type="text" class="form-control today" name="date_cancel" value="<?php echo $datenow;?>" >
		</div>
		<div class="col-sm-6">
			<p style="color:red;">เหตุผลที่ยกเลิก</p>
			<input type="text" class="form-control" name="whatCancel" />
		</div>
</div>
<div class="row form_input">
	<div class="col-sm-12">
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>
<div class="div_modal">
</div>