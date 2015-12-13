<script type='text/javascript'>
	$(function(){

		$( "#birthdate" ).datepicker({
			yearRange: "-100:+0",
		});
		$("#startdate").datepicker();
		$("#resigndate").datepicker();
		$(".today").datepicker();

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

</script>
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลขที่ใบจอง</p>
			<input type="text" class="form-control" name="number_booking" />
		</div>
		<div class="col-sm-3">
			<p>วันที่จอง</p>
			<input type="text" class="form-control today" name="date_booking" value="<?php echo $dtnow;?>">
		</div>
		<div class="col-sm-3">
			<p>รหัสพนักงาน</p>
			<input type="text" class="form-control" name="id_employee" />
		</div>
		<div class="col-sm-3">
			<p>ชื่อพนักงาน</p>
			<input type="text" class="form-control" name="name_employee" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<p><u>เหตุผลที่จอง</u></p>
		<div class="col-sm-6">
			<p>ตัวรถ</p>
			<input type="text" class="form-control" name="car" />
		</div>
		<div class="col-sm-6">
			<p>แคมเปญและของแถม</p>
			<input tye="text" class="form-control" name="campen" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<p><u>ลูกค้า</u></p>
		<div class="col-sm-3" >
			<p>หมายเลขลูกค้าคาดหวัง</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="memp_code" required >
		</div>
		<div class="col-sm-3">
			<p>&nbsp;</p>
			<button class="btn btn-info">อ้างอิงลูกค้าคาดหวัง</button>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="customer" value="newCustomer" checked>ลูกค้าใหม่</label>
			<label class="radio-inline"><input type="radio" name="optradio" value="oldCustomer">ลูกค้าเก่า</label>
			<hr>
		</div>
		<div class="col-sm-3" >
			<p >ประเภท</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="typeCustomer" value="poper" checked>บุคคล</label>
			<label class="radio-inline"><input type="radio" name="typeCustomer" value="company">บริษัท</label>
			<hr>
		</div>
		<div class="col-sm-3">
			<p>หมายเลขลูกค้า</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="groupCustomer" required />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
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
	<div class="form-group col-sm-12">
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
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<input type="text" class="form-control" />
		</div>
		<div class="col-sm-9">
			<p>ที่อยู่</p>
			<input tye="text" class="form-control" name="address" />
		</div>
	</div>
	<div class="form-group col-sm-12">
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
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>อาชีพ/ธุรกิจ</p>
			<input type="text" class="form-control" name="jon" />
		</div>
		<div class="col-sm-3">
			<p>แหล่งที่มาของลูกค้า</p>
			<input type="text" class="form-control" name="origin" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<p><u>การจดทะเบียนรถ</u></p>
		<div class="col-sm-3">
			<p>ความสัมพันธ์</p>
			<select name="relation" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> ผู้จอง </option>
				<option value="2"> ญาติ </option>
				<option value="3"> เจ้าของบริษัท </option>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-12 "  >
		<div class="col-sm-3 "  >
			<p>คำนำหน้าชื่อ</p>
			<select name="id_memp_tit" class ="form-control" disabled>
				<option value="">--เลือก--</option>
				<option value="1"> นาย </option>
				<option value="2"> นาง </option>
				<option value="3"> นางสาว </option>
			</select>
		</div>
		<div class="col-sm-3"  >
			<p>ชื่อ </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" disabled>
		</div>
		<div class="col-sm-3" >
			<p>นามสกุล </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" disabled>
		</div>
		<div class="col-sm-3" >
			<p>วันเกิด</p>
			<p class="required"></p>
			<input type="text" class="form-control" name="birthdate" id="birthdate" disabled >
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>เลขใบอนุญาตขับขี่</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="drv_lcn_num" disabled />
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" disabled/>
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์</p>
			<input type="text" class="form-control" name="telephone"  disabled/>
		</div>
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" disabled/>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<input type="text" class="form-control" disabled />
		</div>
		<div class="col-sm-9">
			<p>ที่อยู่</p>
			<input tye="text" class="form-control" name="address" disabled />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>จังหวัด</p>
			<input type="text" class="form-control" name="provice" disabled/>
		</div>
		<div class="col-sm-3">
			<p>เขต/อำเภอ</p>
			<input type="text" class="form-control" name="umpher" disabled/>
		</div>
		<div class="col-sm-3">
			<p>แขวง/ตำบล</p>
			<input type="text" class="form-control" name="tumbon" disabled />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลขที่ใบจองที่โอนมา</p>
			<input type="text" class="form-control" name="slipt" />
		</div>
		<div class="col-sm-3">
			<p>&nbsp;</p>
			<button type="button" class="btn btn-info"> อ้างอิงใบจองรถที่โอนมา </button>
		</div>
		<div class="col-sm-3">
			<p>วันที่ยกเลิก</p>
			<input type="text" class="form-control today" name="date_cancel" value="<?php echo $dtnow;?>" >
		</div>
		<div class="col-sm-3">
			<p>เหตุผลที่ยกเลิก</p>
			<input type="text" class="form-control" name="whatCancel" />
		</div>
	</div>
	<div class="col-sm-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>