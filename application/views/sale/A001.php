
<script type='text/javascript'>
	$(function(){

		$( "#birthdate" ).datepicker({
			yearRange: "-100:+0",
		});
		$("#startdate").datepicker();
		$("#resigndate").datepicker();
		$(".today").datepicker();
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
			<!-- <input type="text" class="form-control testtoday" name="testdate"/> -->
			<input  type="text" class="form-control today" name="date_booking" value="<?php echo $datenow;?>">
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
		<div class="col-sm-3">
			<p>หมายเลขลูกค้า</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="groupCustomer" placeholder="----เลือก-----" required />
		</div>
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="customer" value="newCustomer" checked>ลูกค้าใหม่</label>
			<label class="radio-inline"><input type="radio" name="customer" value="oldCustomer">ลูกค้าเก่า</label>
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
			<p>เหตุผลที่จอง</p>
			<label class="radio-inline"><input type="radio" name="car_detail" value="" checked > ตัวรถ</label>
			<label class="radio-inline"><input type="radio" name="car_detail" value="" > แคมเปญและของแถม</label>
			<hr/>
		</div>
	</div>
	<div class="form-group col-sm-12 "  >
		<div class="col-sm-3 "  >
			<p>คำนำหน้าชื่อ</p>
			<select name="id_memp_tit" class ="form-control" >
				<option value="">--เลือก--</option>
				<option value="1"> นาย </option>
				<option value="2"> นาง </option>
				<option value="3"> นางสาว </option>
			</select>
		</div>
		<div class="col-sm-3"  >
			<p>ชื่อ </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" >
		</div>
		<div class="col-sm-3" >
			<p>นามสกุล </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" >
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
			<input type="text" class="form-control" name="drv_lcn_num"  />
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" />
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์</p>
			<input type="text" class="form-control" name="telephone"  />
		</div>
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<input type="text" class="form-control"  />
		</div>
		<div class="col-sm-9">
			<p>ที่อยู่</p>
			<input tye="text" class="form-control" name="address"  />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>จังหวัด</p>
			<input type="text" class="form-control" name="provice" />
		</div>
		<div class="col-sm-3">
			<p>เขต/อำเภอ</p>
			<input type="text" class="form-control" name="umpher" />
		</div>
		<div class="col-sm-3">
			<p>แขวง/ตำบล</p>
			<input type="text" class="form-control" name="tumbon"  />
		</div>
	</div>
	<!-- //// -->
	<div class="form-group col-sm-12">
		<p><u>เลือกรถ</u></p>
		<div class="col-md-3" >
			<p>เลขที่รับเข้าสต๊อก</p>
			<input type="text" class="form-control" name="mposition_code" placeholder="--สร้างโดยระบบ--" readonly>
		</div>
		<div class="col-md-3" >
			<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p>
			<input type="text" class="form-control today" name="tstock_date" value="<?php echo $datenow; ?>" required>
		</div>
		<div class="col-md-3" >
			<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
			<select name="id_mbranch" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" selected >อุดรธานี</option>
				<option value="2"> หนองบัวลำภู</option>
				<option value="3"> หนองคาย</option>
				<option value="4" > บึงกาฬ</option>
				<option value="5"> สว่างแดนดิน</option>
				<option value="6"> สกลนคร</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>แบบ</p>
			<select name="modelcar" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1"> HONDA HR-V </option>
				<option value="2"> HONDA City </option>
				<option value="3"> HONDA BR-V </option>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-12">
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
		<div class="col-sm-3">
			<p>ราคา</p>
			<input type="text" name="price" class="form-control" />
		</div>
		<div class="col-sm-3">
			<p>ดาวน์ %</p>
			<div class="input-group">
				<input type="text" class="form-control" name="down">
				<span class="input-group-addon ">%</span>
			</div>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>ยอดจัด</p>
			<input tye="text" class="form-control" name="net_finance">
		</div>
		<div class="col-sm-3">
			<p>ผ่อนชำระ(งวด)</p>
			<input type="text" name="down_mount" class="form-control" />
		</div>
		<div class="col-sm-3">
			<p>ไฟแนนซ์</p>
			<select name="typeColor" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" >AY</option>
				<option value="2" > KL</option>
				<option value="3" > KK</option>
				<option value="4" > KTB</option>
				<option value="5" >Tbank</option>
				<option value="6">HL</option>
				<option value="7">Cash</option>
			</select>
		</div>
		<div class="col-sm-3">
			<p>ประกันภัย</p>
			<select name="typeColor" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" >คุ้มภัย</option>
				<option value="2" > ธนชาต</option>
				<option value="3" > แอกซ่า</option>
				<option value="4" > กรุงเทพ</option>
				<option value="5" >แอลเอ็มจี</option>
				<option value="6">มิตซุย</option>
				<option value="7">โตเกียวมารีน</option>
				<option value="8">สมโพธิ์</option>
				<option value="9">วิริยะ</option>
				<optoin value="10">สินมั่นคง</optoin>
				<optoin value="11" >ทำเอง</optoin>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-12">
	<div class="col-sm-3">
		<p>แคมเปญ</p>
		<input type="text" class="form-control" name="campain"/>
	</div>
		<div class="col-md-3" >
			<p>หมายเลขเครื่อง</p><p class="required">*</p>
			<input type="text" class="form-control" id="plan" name="plan" required>
		</div>
		<div class="col-md-3" >
			<p>หมายเลขตัวถัง</p><p class="required">*</p>
			<input type="text" class="form-control" id="plan" name="plan" required>
		</div>
		<div class="col-sm-3">
			<p>วันที่รับรถ</p>
			<input type="text" class="form-control today" name="date_submit" value="<?php echo $datenow;?>">
		</div>
	</div>
	<!-- ////// -->
	<div class="col-sm-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>