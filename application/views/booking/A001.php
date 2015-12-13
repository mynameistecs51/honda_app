<style type="text/css">
	p{ font-weight: bold; }
</style>
<script type='text/javascript'>
	$(function(){

		$( "#birthdate" ).datepicker({
			yearRange: "-100:+0",
		});
		$("#startdate").datepicker();
		$("#resigndate").datepicker();
		$("#today").datepicker();

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
// ADD field รุ่นรถที่สนใจ
$(function(){
	$('#addCar_').click(function(){
		var  row=$('.car').length+1;
		var  html  = '<div class="car" ID="car'+row+'">';
		html += '<div class="col-sm-3">';
		html += '<p>รุ่นรถ</p>';
		html += '<select name="typeCar[]" class ="form-control" required>';
		html += '	<option value="">--เลือก--</option>';
		html += '	<option value="1"> HONDA </option>';
		html += '	<option value="2"> Denler1</option>';
		html += '	<option value="3"> Denler2</option>';
		html += '</select>';
		html += '</div>';
		html += '<div class="col-sm-3">';
		html += '<p>ประเภท</p>';
		html += '<select name="typeCar[]" class ="form-control" required>';
		html += '	<option value="">--เลือก--</option>';
		html += '	<option value="1"> HONDA </option>';
		html += '	<option value="2"> Denler1</option>';
		html += '	<option value="3"> Denler2</option>';
		html += '</select>';
		html += '</div>';
		html += '<div class="col-sm-3">';
		html += '	<p>สี</p>';
		html += '	<select name="typeColor[]" class ="form-control" required>';
		html += '	<option value="">--เลือก--</option>';
		html += '	<option value="1" style="background-color: red">สีแดง</option>';
		html += '	<option value="2" style="background-color: write"> สีขาว</option>';
		html += '	<option value="3" style="background-color: black"> สีดำ</option>';
		html += '	<option value="3" style="background-color: gray"> สีเทา</option>';
		html += '</select>';
		html += '</div>';
		html += '<div class="col-sm-3" >  ';
		html += '<p><br/></p>';
		html += '<h4><i class="glyphicon glyphicon-trash btn btn-danger" ID="delCar'+row+'"></i> </h4>';
		html += '</div> ';
		html += '</div>';
		if(row<=20){
			$('.addRows').append(html);
			delCar(row);
		}else{
			alert("เพิ่มไม่เกิน 20 ");
		}

	});
runnumrow();
});

function runnumrow(){
	var  row=$('.car').length;
	for(i=0;i<row;i++){
		delCar(i);
		keyIdcard(i);
	}
}

function delCar(num)
{
	$('#delCar'+num ).click(function(){
		var chk =  confirm('คุณต้องการย้อนกลับ ใช่หรือไม่ ?');
		if(chk==true){
			$('#car'+num).remove();
		}else{
			return false;
		}
	});
}

function keyIdcard(num)
{
	$('#idcard'+num).change(function(){
		alert('Key');
	});
}

// ----------
// --- add origin
$(function(){
	$('#addOrigin').click(function(){
		var  row=$('.origin').length+1;
		var  html  = '<div class="origin" ID="origin'+row+'">';
		html += '<div class="col-sm-8">';
		html += '<p>แหล่งที่มา</p>';
		html += '<input type="text" class="form-control" name="origin[]"/>';
		html += '</div>';
		html += '<div class="col-sm-3" >  ';
		html += '<p><br/></p>';
		html += '<h4><i class="glyphicon glyphicon-trash btn btn-danger" ID="delOrigin'+row+'"></i> </h4>';
		html += '</div> ';
		html += '</div>';
		if(row<=20){
			$('.add_origin').append(html);
			delOrigin(row);
		}else{
			alert("เพิ่มไม่เกิน 20 ");
		}
	});
	runnumOrgin();
});

function runnumOrgin(){
	var  row=$('.car').length;
	for(i=0;i<row;i++){
		delOrigin(i);
		keyIdcard(i);
	}
}

function delOrigin(num)
{
	$('#delOrigin'+num ).click(function(){
		var chk =  confirm('คุณต้องการย้อนกลับ ใช่หรือไม่ ?');
		if(chk==true){
			$('#origin'+num).remove();
		}else{
			return false;
		}
	});
}
// ---end origin
//
// --- add objective
$(function(){
	$('#addObjective').click(function(){
		var  row=$('.objective').length+1;
		var  html  = '<div class="objective" ID="objective'+row+'">';
		html += '<div class="col-sm-8">';
		html += '<p>แหล่งที่มา</p>';
		html += '<input type="text" class="form-control" name="objective[]"/>';
		html += '</div>';
		html += '<div class="col-sm-3" >  ';
		html += '<p><br/></p>';
		html += '<h4><i class="glyphicon glyphicon-trash btn btn-danger" ID="delObjective'+row+'"></i> </h4>';
		html += '</div> ';
		html += '</div>';
		if(row<=20){
			$('.add_objective').append(html);
			delObjective(row);
		}else{
			alert("เพิ่มไม่เกิน 20 ");
		}
	});
	runnumOrgin();
});

function runnumOrgin(){
	var  row=$('.objective').length;
	for(i=0;i<row;i++){
		delObjective(i);
		keyIdcard(i);
	}
}

function delObjective(num)
{
	$('#delObjective'+num ).click(function(){
		var chk =  confirm('คุณต้องการย้อนกลับ ใช่หรือไม่ ?');
		if(chk==true){
			$('#objective'+num).remove();
		}else{
			return false;
		}
	});
}
// ---end origin

</script>
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลขที่ใบจอง</p>
			<input type="text" class="form-control" name="number_booking" />
		</div>
		<div class="col-sm-3">
			<p>วันที่จอง</p>
			<input type="text" class="form-control" name="date_booking" id="today">
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
		<div class="col-sm-4">
			<p>แขวง/ตำบล</p>
			<input type="text" class="form-control" name="tumbon" />
		</div>
		<div class="col-sm-4">
			<p>เขต/อำเภอ</p>
			<input type="text" class="form-control" name="umpher" />
		</div>
		<div class="col-sm-4">
			<p>จังหวัด</p>
			<input type="text" class="form-control" name="provice"/>
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
		<div class="col-sm-4">
			<p>แขวง/ตำบล</p>
			<input type="text" class="form-control" name="tumbon" disabled/>
		</div>
		<div class="col-sm-4">
			<p>เขต/อำเภอ</p>
			<input type="text" class="form-control" name="umpher" disabled/>
		</div>
		<div class="col-sm-4">
			<p>จังหวัด</p>
			<input type="text" class="form-control" name="provice" disabled/>
		</div>
	</div>
	<div class="col-sm-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>