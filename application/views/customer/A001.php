<script type='text/javascript'>
	$(function(){

		$( "#birthdate" ).datepicker({
			yearRange: "+100:+0",
			language: 'th',
			isBuddhist: true,
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy',
		});
		$("#startdate").datepicker();
		$(".today").datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('.today').val('<?php echo $datenow;?>');

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

		$("input[name=zipcode]").change(function(){
			$.ajax({
				url: '<?php echo base_url().$controller; ?>/getProvince/',
				data:"zipcode="+$("input[name=zipcode]").val(),
				type: 'POST',
				dataType: 'json',
				success:function(res){
					// var amphur="<option >----เลือกอำเภอ----</option>";
					var district="<option >---เลือกตำบล---</option>";
					$.each(res, function( index, value ) {
						// $('input[name=province]').val(value['PROVINCE_NAME']);
						// $('input[name=amphur]').val(value["AMPHUR_NAME"]);
						province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
						amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
						district += "<option value="+value['DISTRICT_ID']+"> "+value['DISTRICT_NAME']+"</option>";
					});
					$('#province').html(province);
					$('#amphur').html(amphur);
					$('#district').html(district);

				},
				error:function(err){
					alert("รหัสไปรษณีย์ไม่ถูกต้อง");
					$('input[name=zipcode]').val('');
					$('#province').html('');
					$('#amphur').html('');
					$('#district').html('');
				}
			});
});
saveData();		//saveadd
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
	                // dataType:'json',
	                success: function(rs)
	                {
	                	$('.modal').modal('hide');
	                	location.reload();
	                	alert("#บันทึกข้อมูล เรียบร้อย !");
	                },
	                error: function(err)
	                {
	                	alert("#เกิดข้อผิดพลาด");
	                	console.log(err);
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
		html += '<div class="col-sm-4" >';
		html += '<p>แบบ</p><p class="required">*</p>';
		html += '<select name="id_mmodel[]"  id="id_mmodel'+row+'" class ="form-control id_mmodel" required>';
		html +='<option value="" selected>--เลือก--</option>';
		<?php foreach ($listMmodel as $Mmodel):?>
		html += "<option value='<?php echo $Mmodel->id_model;?>'><?php echo $Mmodel->mmodel_name;?></option>";
	<?php endforeach;?>
	html += '</select>';
	html += '</div>';
	html += '<div class="col-sm-4">';
	html += '<p>รุ่น</p><p class="required">*</p>';
	html +='<select name="id_mgen[]" id="id_mgen'+row+'" class ="form-control id_mgen" required>';
	html +='</select>';
	html += '</div>';
	html += '<div class="col-sm-2">';
	html += '<p>สี</p><p class="required">*</p>';
	html +='<select name="id_mcolor[]" id="id_mcolor'+row+'" class ="form-control id_mcolor" required>';
	html +='</select>';
	html += '</div>';
	html += '<div class="col-sm-2" >  ';
	html += '<p>&nbsp;</p>';
	html += '<h4><i class="glyphicon glyphicon-trash btn btn-danger" id="delCar'+row+'"></i> </h4>';
	html += '</div> ';
	html += '</div>';
	if(row<=20){
		$('.addRows').append(html);
		delCar(row);
	}else{
		alert("เพิ่มไม่เกิน 20 ");
	}
});
runnumCar();
});

function runnumCar(){
	var  row=$('.car').length;
	for(i=0;i<=row;i++){
		keyIdcard(i);
		// getdataCar(i);
		delCar(i);
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
	getdataCar(num);
}

function keyIdcard(num)
{
	$('#idcard'+num).change(function(){
		alert('Key');
	});
}
function getdataCar(number)
{
	$('#id_mmodel'+number).change(function(){
		var id_mmodel= $(this).val();
		if(id_mmodel!=''){
			$.ajax(
			{
				type: 'POST',
				url: '<?php echo base_url().$controller; ?>/getMgen/',
	               		 data: {"id_mmodel":id_mmodel}, //your form datas to post
	               		 dataType: 'json',
	               		 success: function(rs)
	               		 {
	               		 	// alert(number);
	               		 	var res="<option >---เลือก---</option>";
	               		 	$.each(rs, function( index, value){

	               		 		res += "<option value="+value.id_gen+"> "+value.gen_name+"</option>";
	               		 	});
	               		 	$("#id_mgen"+number).html(res);
	               		 },
	               		 error: function()
	               		 {
	               		 	alert("#เกิดข้อผิดพลาด");
	               		 }
	               		});
		}else{
			var none="<option value=''>---เลือก---</option>";
			$("#id_mgen"+number).html(none);
		}
	});
	$('#id_mgen'+number).change(function(){
		var id_mgen= $(this).val();
		if(id_mgen!=''){
			$.ajax(
			{
				type: 'POST',
				url: '<?php echo base_url().$controller; ?>/getMcolor/',
	                data: {"id_mgen":id_mgen}, //your form datas to post
	                dataType: 'json',
	                success: function(rs)
	                {
	                	var res="<option >---เลือก---</option>";
	                	$.each(rs, function( index, value){

	                		res += "<option value="+value.id_color+"> "+value.color_name+"</option>";
	                	});
	                	$("#id_mcolor"+number).html(res);
	                },
	                error: function()
	                {
	                	alert("#เกิดข้อผิดพลาด");
	                }
	             });
		}else{
			var none="<option value=''>---เลือก---</option>";
			$("#id_mcolor"+number).html(none);
		}
	});
}
// ----------
// --- add origin
$(function(){
	$('#addOrigin').click(function(){
		var  row=$('.origin').length+1;
		var  html  = '<div class="origin" ID="origin'+row+'">';
		html += '<div class="col-sm-9">';
		html += '<p>แหล่งที่มาของลูกค้า</p>';
		html += '<input type="text" class="form-control" name="origin[]"/>';
		html += '</div>';
		html += '<div class="col-sm-2" >  ';
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
		html += '<p>วัตถุประสงค์ของการซื้อ</p>';
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
	runnumrowObjectiv();
});

function runnumrowObjectiv(){
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
		<div class="col-sm-3" >
			<p>หมายเลขลูกค้าคาดหวัง</p>
			<p class="required">*</p>
			<!--  -->
			<input type="text" class="form-control" name="memp_code" placeholder="----ออกโดยระบบ----" disabled />
		</div>
		<div class="col-sm-3" >
			<p>วันที่ลูกค้าเยี่ยมชม</p>
			<p class="required">*</p>
			<input  type="text" class="form-control today" name="customer_date"  required >
		</div>
		<div class="col-sm-3" >
			<p><u>ระยะเวลาในการตัดสินใจซื้อ</u> *</p>
			<p class="required">*</p>
			<input type="text" class="form-control today"    name="bye_date" />
		</div>
		<div class="col-sm-3" >
			<p>บัญชีลูกหนี้</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="accounts_receivable"  >
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="customer" value="1" checked>ลูกค้าใหม่</label>
			<label class="radio-inline"><input type="radio" name="customer" value="2">ลูกค้าเก่า</label>
		</div>
		<div class="col-sm-4">
			<p>ชนิดลูกค้า</p>
			<label class="radio-inline"><input type="radio" name="is_type" value="3" checked>ลูกค้าทั่วไป</label>
			<label class="radio-inline"><input type="radio" name="is_type" value="1" >ลูกค้า VIP</label>
			<label class="radio-inline"><input type="radio" name="is_type" value="2">ลูกค้าจงรักภักดี</label>
		</div>
		<div class="col-sm-3" >
			<p >ประเภท</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="is_company" value="1" checked>บุคคล</label>
			<label class="radio-inline"><input type="radio" name="is_company" value="2">บริษัท</label>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>คำนำหน้าชื่อ</p>
			<p class="required">*</p>
			<select name="is_tit" class ="form-control"  required>
				<option>--เลือก--</option>
				<option value="2"> นาย </option>
				<option value="3"> นาง </option>
				<option value="4"> นางสาว </option>
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
			<input type="text" class="form-control " name="birthdate" id='startdate'   required>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลยประจำตัวผู้เสียภาษีอากร</p>
			<input type="text" class="form-control" name="idcard_number"  />
		</div>
		<div class="col-sm-3" >
			<p>เลขใบอนุญาตขับขี่</p>
			<input type="text" class="form-control" name="drv_card_num" >
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" >
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์บ้าน/สำนักงาน</p>
			<input type="text" class="form-control" name="telephone"  >
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" >
		</div>
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="zipcode" required/>
		</div>
		<div class="col-sm-6">
			<p>ที่อยู่</p>
			<p class="required">*</p>
			<input tye="text" class="form-control" name="address" required />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>จังหวัด</p>
			<p class="required">*</p>
			<!-- <input type="text" class="form-control" name="province"  /> -->
			<select name="province" id="province" class="form-control"  >
				<!-- <option value="">----เลือกอำเภอ----</option> -->
			</select>
		</div>
		<div class="col-sm-3">
			<p>เขต/อำเภอ</p>
			<p class="required">*</p>
			<!-- <input type="text" class="form-control" name="amphur"   /> -->
			<select name="amphur" id="amphur" class="form-control"  >
				<!-- <option value="">----เลือกอำเภอ----</option> -->
			</select>
		</div>
		<div class="col-sm-3">
			<p>แขวง/ตำบล</p>
			<p class="required">*</p>
			<select name="district" id="district" class ="form-control"  required>
				<option value="">--เลือก--</option>

			</select>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>ที่ปรึกษาการขาย</p>
			<p class="required">*</p>
			<select name="adviser" class ="form-control" required>
				<option value="">--เลือก--</option>
				<?php foreach($listSale as $rowSale): ?>
					<option value="<?php echo $rowSale['id_mmember'];?>"><?php echo $rowSale['firstname'].'  '.$rowSale['lastname'];?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-sm-3">
			<p>ประเภทรถ</p>
			<p class="required">*</p>
			<select name="typeCar" class ="form-control" required >
				<option value="">--เลือก--</option>
				<option value="1"> รถใหม่ </option>
				<option value="2"> รถเก่า</option>
				<option value="3"> รถมือสอง</option>
			</select>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<p><u>รุ่นรถที่สนใจ</u></p>
		<div class="col-sm-2">
			<p>สาขา</p>
			<p class="required">*</p>
			<select name="branch" class ="form-control" required>
				<option value="">--เลือก--</option>
				<option value="1" selected >อุดรธานี</option>
				<option value="2"> หนองบัวลำภู</option>
				<option value="3"> หนองคาย</option>
				<option value="4" > บึงกาฬ</option>
				<option value="5"> สว่างแดนดิน</option>
				<option value="6"> สกลนคร</option>
			</select>
		</div>
		<div class="col-md-3" >
			<p>แบบ</p><p class="required">*</p>
			<select name="id_mmodel[]"  id="id_mmodel0" class ="form-control id_mmodel" required>
				<option value="" selected>--เลือก--</option>
				<?php
				foreach ($listMmodel as $Mmodel)
				{
					echo "<option value='".$Mmodel->id_model."'>".$Mmodel->mmodel_name."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-3" >
			<p>รุ่น</p><p class="required">*</p>
			<select name="id_mgen[]" id="id_mgen0" class ="form-control id_mgen" required>
			</select>
		</div>
		<div class="col-md-2" >
			<p>สี</p><p class="required">*</p>
			<select name="id_mcolor[]"  id="id_mcolor0" class ="form-control id_mcolor" required>
			</select>
		</div>
		<div class="col-sm-2">
			<p>&nbsp;</p>
			<div class="btn btn-primary" id="addCar_" style="width:120px;" > เพิ่มรุ่นที่สนใจ</div>
		</div>
		<div class="addRows">
			<!-- show data colum  รุ่นรถที่สนใจ-->
		</div>
	</div>
	<div class="form-group col-sm-6">
		<div class="col-sm-9">
			<p>แหล่งที่มาของลูกค้า</p>
			<input type="text" class="form-control"  name="origin[]"/>
		</div>
		<div class="col-sm-2">
			<p>&nbsp;</p>
			<div class="btn btn-primary" id="addOrigin" style="width:120px;"> เพิ่มที่มา</div>
		</div>
		<div class="add_origin">
			<!-- show ddata add origin -->
		</div>
	</div>
	<div class="form-group col-sm-6">
		<div class="col-sm-8">
			<p>วัตถุประสงค์ของการซื้อ</p>
			<input type="text" class="form-control"  name="objective[]"/>
		</div>
		<div class="col-sm-2">
			<p>&nbsp;</p>
			<div class="btn btn-primary" id="addObjective" style="width:120px;"> เพิ่มวัตถุประสงค์</div>
		</div>
		<div class="add_objective">
			<!-- show ddata add objective -->
		</div>
	</div>
	<div class="col-sm-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>