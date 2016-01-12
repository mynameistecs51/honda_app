<?php foreach($listcustomer as $key => $row_customer){?>
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
					$('#district option[value=<?php echo $row_customer["id_mdistric"];?>]').attr('selected','selected');

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
$('input[name=zipcode]').val('<?php echo $row_customer["post_code"];?>');
});

</script>

<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>หมายเลขลูกค้าคาดหวัง</p>
			<p class="required">*</p>
			<!--  -->
			<input type="text" class="form-control" name="memp_code" value="<?php echo $row_customer['customer_code'];?>" />
		</div>
		<div class="col-sm-3" >
			<p>วันที่ลูกค้าเยี่ยมชม</p>
			<p class="required">*</p>
			<input  type="text" class="form-control" name="customer_date" value="<?php echo $row_customer['customer_date'];?>" required >
		</div>
		<div class="col-sm-3" >
			<p><u>ระยะเวลาในการตัดสินใจซื้อ</u> *</p>
			<p class="required">*</p>
			<input type="text" class="form-control today"    name="bye_date" />
		</div>
		<div class="col-sm-3" >
			<p>บัญชีลูกหนี้</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="accounts_receivable"  value="<?php echo $row_customer['accounts_receivable'];?>"/>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p >ลูกค้า</p>
			<label class="radio-inline">
				<input type="radio" name="customer" value="1" <?php echo $check_isCus_new=($row_customer['is_cus_new'] ==1 ?'checked':'');?> />ลูกค้าใหม่
			</label>
			<label class="radio-inline">
				<input type="radio" name="customer" value="2" <?php echo$check_isCus_new=($row_customer['is_cus_new']  ==2 ?'checked':'');?> />ลูกค้าเก่า
			</label>
		</div>
		<div class="col-sm-4">
			<p>ชนิดลูกค้า</p>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="3" <?php echo $check_type=($row_customer['is_type'] ==3 ?'checked':'');?> />ลูกค้าทั่วไป
			</label>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="1" <?php echo $check_type=($row_customer['is_type'] ==1 ?'checked':'');?> />ลูกค้า VIP
			</label>
			<label class="radio-inline">
				<input type="radio" name="is_type" value="2" <?php echo $check_type=($row_customer['is_type'] ==2 ?'checked':'');?> />ลูกค้าจงรักภักดี
			</label>
		</div>
		<div class="col-sm-3" >
			<p >ประเภท</p>
			<!-- <p class="required">*</p> -->
			<label class="radio-inline"><input type="radio" name="is_company" value="1" <?php echo $ckeck_company=($row_customer['is_company']==1?'checked':'');?> />บุคคล</label>
			<label class="radio-inline"><input type="radio" name="is_company" value="2" <?php echo $ckeck_company=($row_customer['is_company']==2?'checked':'');?> />บริษัท</label>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>คำนำหน้าชื่อ</p>
			<p class="required">*</p>
			<select name="is_tit" class ="form-control"  required>
				<option>--เลือก--</option>
				<option value="2" <?php echo $selected_tit=($row_customer['is_tit']==2?'selected':'');?> > นาย </option>
				<option value="3" <?php echo $selected_tit=($row_customer['is_tit']==3?'selected':'');?>> นาง </option>
				<option value="4"  <?php echo $selected_tit=($row_customer['is_tit']==4?'selected':'');?>> นางสาว </option>
			</select>
		</div>
		<div class="col-sm-3" >
			<p>ชื่อ </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="firstname_th" value='<?php echo $row_customer['firstname'];?>' />
		</div>
		<div class="col-sm-3" >
			<p>นามสกุล </p>
			<p class="required">*</p>
			<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" value="<?php echo $row_customer['lastname'];?>" />
		</div>
		<div class="col-sm-3" >
			<p>วันเกิด</p>
			<p class="required"></p>
			<input type="text" class="form-control " name="birthdate" id='startdate' value="<?php echo $row_customer['birth_date'];?>" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>เลยประจำตัวผู้เสียภาษีอากร</p>
			<input type="text" class="form-control" name="idcard_number" value="<?php echo $row_customer['idcard_number'];?>" />
		</div>
		<div class="col-sm-3" >
			<p>เลขใบอนุญาตขับขี่</p>
			<input type="text" class="form-control" name="drv_card_num" value="<?php echo $row_customer['driver_card_number'];?>" />
		</div>
		<div class="col-sm-3" >
			<p>อีเมลล์ <b ID="valid_email"></b></p>
			<p class="required">*</p>
			<input type="email" class="form-control" name="email" ID="email" value="<?php echo $row_customer['email'];?>" />
		</div>
		<div class="col-sm-3" >
			<p>โทรศัพท์บ้าน/สำนักงาน</p>
			<input type="text" class="form-control" name="telephone" value="<?php echo $row_customer['telephone'];?>" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3" >
			<p>มือถือ <b ID="valid_mobile"></b></p>
			<p class="required">*</p>
			<input type="text" class="form-control" ID="mobile" name="mobile" value="<?php echo $row_customer['mobile'];?>" />
		</div>
		<div class="col-sm-3">
			<p>รหัสไปรษณีย์</p>
			<p class="required">*</p>
			<input type="text" class="form-control" name="zipcode" value="<?php echo $row_customer['post_code'];?>" />
		</div>
		<div class="col-sm-6">
			<p>ที่อยู่</p>
			<p class="required">*</p>
			<input tye="text" class="form-control" name="address" value="<?php echo $row_customer['adr_line'];?>" />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<div class="col-sm-3">
			<p>จังหวัด</p>
			<p class="required">*</p>
			<select name="province" id="province" class="form-control"  >
			</select>
		</div>
		<div class="col-sm-3">
			<p>เขต/อำเภอ</p>
			<p class="required">*</p>
			<select name="amphur" id="amphur" class="form-control"  >
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
			<input type="text" class="form-control" name="consultance" value="<?php echo $row_customer['member_name'];?>" />
		</div>
		<div class="col-sm-3">
			<p>ประเภทรถ</p>
			<p class="required">*</p>
			<select name="typeCar" class ="form-control" required >
				<option >--เลือก--</option>
				<option value="1" <?php echo $selected_typeCar=($row_customer['is_car_type']==1?'selected':'');?>> รถใหม่ </option>
				<option value="2" <?php echo $checkType_car=($row_customer['is_car_type']==2?'selected':'');?>> รถเก่า</option>
				<option value="3" <?php echo $checkType_car=($row_customer['is_car_type']==3?'selected':'');?>> รถมือสอง</option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<p><u>รุ่นรถที่สนใจ</u></p>
		<div class="col-sm-2">
			<p>สาขา</p>
			<p class="required">*</p>
			<select name="branch" class ="form-control" required>
				<option value="">--เลือก--</option>
				<?php  foreach ($listBranch as $row_branch) {
					$select_branch=($row_customer['id_mbranch'] == $row_branch->id_mbranch?'selected':'');
					echo '<option value="'.$row_branch->id_mbranch.'"'.$select_branch.'>'.$row_branch->mbranch_name.'</option>';
				}
				?>
			</select>
		</div>
		<?php
		$count_car = count($row_customer['cars']);
		for($i=0;$i< $count_car ; $i++){
			?>
			<div class="form-group col-sm-12">
				<div class="col-md-3" >
					<p>แบบ</p><p class="required">*</p>
					<input type="text" name="id_mmodel[]"  id="id_mmodel0" class ="form-control id_mmodel" value="<?php echo $row_customer['cars'][$i]['model_name'];?>"/>
				</div>
				<div class="col-md-3" >
					<p>รุ่น</p><p class="required">*</p>
					<input type="text" name="id_mgen[]" id="id_mgen0" class ="form-control id_mgen" value="<?php echo $row_customer['cars'][$i]['gen_name'];?>" />
				</div>
				<div class="col-md-2" >
					<p>สี</p><p class="required">*</p>
					<input type="text" name="id_mcolor[]"  id="id_mcolor0" class ="form-control id_mcolor" value="<?php echo $row_customer['cars'][$i]['color'];?>" />
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="form-group col-sm-6">
		<?php
		$data_source = explode(',',$row_customer['customer_source']);
		$a =count($data_source);
		for($j=0;$j < $a ;$j++){
			?>
			<div class="col-sm-9">
				<p>แหล่งที่มาของลูกค้า</p>
				<input type="text" class="form-control"  name="origin[]" value="<?php echo $data_source[$j];?>" />
			</div>
		<?php  }	?>
		</div>
		<div class="form-group col-sm-6">
			<?php
				$data_reason = explode(',', $row_customer['reason']);
				$b = count($data_reason);
				for($k=0;$k < $b ;$k++){
			?>
			<div class="col-sm-8">
				<p>วัตถุประสงค์ของการซื้อ</p>
				<input type="text" class="form-control"  name="objective[]" value="<?php echo $data_reason[$k];?>" />
			</div>
		<?php  } 	?>
		</div>
		<div class="col-sm-12" >
			<p>หมายเหตุ</p>
			<textarea  class="form-control" rows='3' name="comment"><?php echo $row_customer['comment'];?></textarea>
		</div>
	</div>
	<?php } ?>