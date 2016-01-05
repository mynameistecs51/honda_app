<?php foreach($listcustomer as $row_customer){
	//echo "<pre>";
	//print_r($row_customer);
	?>
	<script type='text/javascript'>
		$(function(){
			$("input[name=zipcode]").val(function(){
				$.ajax({
					url: '<?php echo base_url().$controller; ?>/getProvince/',
					data:"zipcode="+$("input[name=zipcode]").val(),
					type: 'POST',
					dataType: 'json',
					success:function(res){
						var district="<option >---เลือกตำบล---</option>";
						$.each(res, function( index, value ) {
							province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
							amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
							district += "<option value='"+value['DISTRICT_ID']+"' >"+value['DISTRICT_NAME']+"</option>";
						});
						$('#province').html(province);
						$('#amphur').html(amphur);
						$('#district').html(district);
						$('#district option[value=<?php echo $row_customer->id_mdistric;?>]').attr('selected','selected');

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
$('input[name=zipcode]').val('<?php echo $row_customer->post_code;?>');
});


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
			<input type="text" class="form-control" name="memp_code" value="<?php echo $row_customer->customer_code;?>" />
		</div>
		<div class="col-sm-3" >
			<p>วันที่ลูกค้าเยี่ยมชม</p>
			<p class="required">*</p>
			<input  type="text" class="form-control" name="customer_date" value="<?php echo $row_customer->customer_date;?>" required >
		</div>
		<div class="col-sm-3" >
			<p><u>ระยะเวลาในการตัดสินใจซื้อ</u> *</p>
			<p class="required">*</p>
			<input type="text" class="form-control today"    name="bye_date" />
		</div>
		<div class="col-sm-3" >
			<p>บัญชีลูกหนี้</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="accounts_receivable"  value="<?php echo $row_customer->accounts_receivable;?>"/>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<label class="radio-inline">
				<input type="radio" name="customer" value="1" <?php echo $check_isCus_new=($row_customer->is_cus_new ==1 ?'checked':'');?> />ลูกค้าใหม่
			</label>
			<label class="radio-inline">
				<input type="radio" name="customer" value="2" <?php echo$check_isCus_new=($row_customer->is_cus_new ==2 ?'checked':'');?> />ลูกค้าเก่า
			</label>
		</div>
		<div class="col-sm-4">
			<p>ชนิดลูกค้า</p>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="3" <?php echo $check_type=($row_customer->is_type ==3 ?'checked':'');?> />ลูกค้าทั่วไป
			</label>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="1" <?php echo $check_type=($row_customer->is_type ==1 ?'checked':'');?> />ลูกค้า VIP
			</label>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="2" <?php echo $check_type=($row_customer->is_type ==2 ?'checked':'');?> />ลูกค้าจงรักภักดี
			</label>
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
				<option value="2" <?php echo $selected_tit=($row_customer->id_tit==2?'selected':'');?> > นาย </option>
				<option value="3" <?php echo $selected_tit=($row_customer->id_tit==3?'selected':'');?>> นาง </option>
				<option value="4"  <?php echo $selected_tit=($row_customer->id_tit==4?'selected':'');?>> นางสาว </option>
			</select>
		</div>
		<div class="col-sm-3" >
			<p>ชื่อ </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="firstname_th" value='<?php echo $row_customer->firstname;?>' />
		</div>
		<div class="col-sm-3" >
			<p>นามสกุล </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" value="<?php echo $row_customer->lastname;?>" />
		</div>
		<div class="col-sm-3" >
			<p>วันเกิด</p>
			<p class="required"></p>
			<input type="text" class="form-control " name="birthdate" id='startdate' value="<?php echo $row_customer->birth_date;?>" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลยประจำตัวผู้เสียภาษีอากร</p>
			<input type="text" class="form-control" name="idcard_number" value="<?php echo $row_customer->idcard_number;?>" />
		</div>
		<div class="col-sm-3" >
			<p>เลขใบอนุญาตขับขี่</p>
			<input type="text" class="form-control" name="drv_card_num" value="<?php echo $row_customer->driver_card_number;?>" />
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" value="<?php echo $row_customer->email;?>" />
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์บ้าน/สำนักงาน</p>
			<input type="text" class="form-control" name="telephone" value="<?php echo $row_customer->telephone;?>" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" value="<?php echo $row_customer->mobile;?>" />
		</div>
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="zipcode" value="<?php echo $row_customer->post_code;?>" />
		</div>
		<div class="col-sm-6">
			<p>ที่อยู่</p>
			<p class="required">*</p>
			<input tye="text" class="form-control" name="address" value="<?php echo $row_customer->adr_line;?>" />
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
			<input type="text" class="form-control" name="consultance" value="<?php echo $row_customer->member_name;?>" />
		</div>
		<div class="col-sm-3">
			<p>ประเภทรถ</p>
			<p class="required">*</p>
			<select name="typeCar" class ="form-control" required >
				<option >--เลือก--</option>
				<option value="1" <?php echo $selected_typeCar=($row_customer->is_car_type==1?'selected':'');?>> รถใหม่ </option>
				<option value="2" <?php echo $checkType_car=($row_customer->is_car_type==2?'selected':'');?>> รถเก่า</option>
				<option value="3" <?php echo $checkType_car=($row_customer->is_car_type==3?'selected':'');?>> รถมือสอง</option>
			</select>
		</div>
	</div>
	<?php
		$data_array = array();
		foreach($listcustomer as $row_customer){
			if( !isset($data_array[$row_customer->att_id_customer])){
				$data_array[$row_customer->att_id_customer] = array();
			}
			array_push( $data_array[$row_customer->att_id_customer], array('id_customer_att' =>$row_customer->id_customer_car_att,'id_customer'=>$row_customer->id_customer,'id_postCode'=> $row_customer->post_code,'firstname'=> $row_customer->firstname,'model_car'=>$row_customer->mmodel_name,'gen_name'=>$row_customer->gen_name));
			print_r($data_array[$row_customer->att_id_customer][0]);
		}
		?>
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
<?php } ?>