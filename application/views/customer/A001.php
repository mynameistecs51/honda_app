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
		var  row=$('.friend').length+1;
		var  html  = '<div class="friend" ID="friend'+row+'">';
		html += ''
		html += '</div>';
		if(row<=20){
			$('.addRows').append(html);
			delFriend(row);
		}else{
			alert("เพิ่มเพื่อนได้ไม่เกิน 20 คน");
		}

	});
	runnumrow();
});

function runnumrow(){
	var  row=$('.friend').length;
	for(i=0;i<row;i++){
		delFriend(i);
		keyIdcard(i);
	}
}

function delFriend(num)
{
	$('#delFriend'+num).click(function(){
		var chk =  confirm('คุณต้องการย้อนกลับ ใช่หรือไม่ ?');
		if(chk==true){
			$('#friend'+num).remove();
		}else{
			return false;
		}
	});
}
</script>
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-group col-sm-12">
		<div class="col-md-3" >
			<p>หมายเลขลูกค้าคาดหวัง</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="memp_code" required >
		</div>
		<div class="col-md-3" >
			<p>วันที่บันทึก</p>
			<p class="required">*</p>
		<!-- <select name="id_mpst" class ="form-control" required>
			<option value="">--เลือก--</option>
			<?php
			foreach ($listMpst as $Mpst)
			{
				echo "<option value='".$Mpst->id_mpst."'>".$Mpst->name_th."</option>";
			}
			?>
		</select> -->
		<input  type="date" class="form-control" name="date_add" id="today" value="<?php echo $dtnow;?>">
	</div>
	<div class="col-md-3" >
		<p><u>ระยะเวลาในการตัดสินใจซื้อ</u> *</p>
		<p class="required">*</p>
		<select name="id_mdept" class ="form-control" required>
			<option value="">--เลือก--</option>
			<?php
			foreach ($listMdept as $Mdept)
			{
				echo "<option value='".$Mdept->id_mdept."'>".$Mdept->name_th."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>บัญชีลูกหนี้</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num"  required>
	</div>
</div>
<div class="form-group col-sm-12">
	<div class="col-md-3" >
		<p >ลูกค้า</p>
		<!-- <p class="required">*</p> -->
		<label class="radio-inline"><input type="radio" name="customer" value="newCustomer" checked>ลูกค้าใหม่</label>
		<label class="radio-inline"><input type="radio" name="optradio" value="oldCustomer">ลูกค้าเก่า</label>
	</div>
	<div class="col-md-3" >
		<p >ประเภท</p>
		<!-- <p class="required">*</p> -->
		<label class="radio-inline"><input type="radio" name="typeCustomer" value="poper" checked>บุคคล</label>
		<label class="radio-inline"><input type="radio" name="typeCustomer" value="company">บริษัท</label>
	</div>
	<div class="col-sm-3">
		<p>กลุ่มลูกค้า</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="groupCustomer" required />
	</div>
</div>
<div class="from-group col-sm-12">
	<div class="col-md-3">
		<p>หมายเลขลูกค้า</p>
		<p class="required">*</p>
		<input type="text" class="form-control" />
	</div>
	<div class="col-md-3">
		<p>&nbsp;</p>
		<p class="required"></p>
		<button class="btn btn-info">คัดลอกข้อมูลบางส่วนจากลูกค้า</button>
	</div>
</div>
<hr>
<div class="form-group col-sm-12">
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_memp_tit" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> นาย </option>
			<option value="2"> นาง </option>
			<option value="3"> นางสาว </option>
		</select>
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" required>
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" required>
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  >
	</div>
</div>
<div class="form-group col-sm-12">
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="drv_lcn_num" >
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email" >
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  >
	</div>
	<div class="col-md-3" >
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
	<div class="col-sm-3">
		<p>&nbsp;</p>
		<button class="btn btn-info">การอ้างอิงจากรหัสไปรษณีย์</button>
	</div>
</div>
<div class="form-group col-sm-12">
	<div class="col-sm-3">
		<p>ที่อยู่</p>
		<input tye="text" class="form-control" name="address" />
	</div>
	<div class="col-sm-3">
		<p>แขวง/ตำบล</p>
		<input type="text" class="form-control" name="tumbon" />
	</div>
	<div class="col-sm-3">
		<p>เขต/อำเภอ</p>
		<input type="text" class="form-control" name="umpher" />
	</div>
	<div class="col-sm-3">
		<p>จังหวัด</p>
		<input type="text" class="form-control" name="provice"/>
	</div>
</div>
<div class="form-group col-sm-12">
	<div class="col-sm-3">
		<p>ที่ปรึกษาการขาย</p>
		<p class="required">*</p>
		<select name="adviser" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> นาย A </option>
			<option value="2"> นาย B </option>
			<option value="3"> นาย C </option>
		</select>
	</div>
	<div class="col-sm-3">
		<p>ประเภทรถ</p>
		<p class="required">*</p>
		<select name="typeCar" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> รถใหม่ </option>
			<option value="2"> รถเก่า</option>
			<option value="3"> รถมือสอง</option>
		</select>
	</div>
	<div class="col-sm-3">
		<p>ผู้ผลิต</p>
		<p class="required">*</p>
		<select name="typeCar" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> HONDA </option>
			<option value="2"> Denler1</option>
			<option value="3"> Denler2</option>
		</select>
	</div>
</div>
<div class="form-group col-sm-12">
	<p>รุ่นรถที่สนใจ</p>
	<div class="col-sm-3">
		<p>รุ่นรถ</p>
		<select name="typeCar" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> HONDA </option>
			<option value="2"> Denler1</option>
			<option value="3"> Denler2</option>
		</select>
	</div>
	<div class="col-sm-3">
		<p>ประเภท</p>
		<select name="typeCar" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1"> HONDA </option>
			<option value="2"> Denler1</option>
			<option value="3"> Denler2</option>
		</select>
	</div>
	<div class="col-sm-3">
		<p>สี</p>
		<select name="typeCar" class ="form-control" required>
			<option value="">--เลือก--</option>
			<option value="1" style="background-color: red">สีแดง</option>
			<option value="2" style="background-color: write"> สีขาว</option>
			<option value="3" style="background-color: black"> สีดำ</option>
			<option value="3" style="background-color: gray"> สีเทา</option>
		</select>
	</div>
	<div class="col-sm-2">
		<p>&nbsp;</p>
		<div class="col-sm-12" style="text-align:right;">
			<div class="btn btn-primary" id="addFriend" style="width:120px;"> เพิ่มรุ่นที่สนใจ</div>
		</div>
	</div>
	<!-- /// -->
	<div class="add_row">
		<div class="col-sm-3">
			<p>รุ่นรถ</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA </option>
				<option value="2"> Denler1</option>
				<option value="3"> Denler2</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>ประเภท</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA </option>
				<option value="2"> Denler1</option>
				<option value="3"> Denler2</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>สี</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" style="background-color: red">สีแดง</option>
				<option value="2" style="background-color: write"> สีขาว</option>
				<option value="3" style="background-color: black"> สีดำ</option>
				<option value="3" style="background-color: gray"> สีเทา</option>
			</select>
		</div>
	</div><br/>
	<!-- /// -->
	<div class="add_row">
		<div class="col-sm-3">
			<p>รุ่นรถ</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA </option>
				<option value="2"> Denler1</option>
				<option value="3"> Denler2</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>ประเภท</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA </option>
				<option value="2"> Denler1</option>
				<option value="3"> Denler2</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>สี</p>
			<select name="typeCar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" style="background-color: red">สีแดง</option>
				<option value="2" style="background-color: write"> สีขาว</option>
				<option value="3" style="background-color: black"> สีดำ</option>
				<option value="3" style="background-color: gray"> สีเทา</option>
			</select>
		</div>
	</div>
	<div class="col-sm-2">
		<p>&nbsp;</p>
		<div class="col-sm-12" style="text-align:right;">
			<p>&nbsp;</p>
		</div>
	</div>
</div>
<div class="col-md-12" >
	<p>หมายเหตุ</p>
	<textarea  class="form-control" rows='3' name="comment"></textarea>
</div>
</div>