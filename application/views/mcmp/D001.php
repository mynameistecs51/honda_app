<?php
foreach ($listMcmp as $detail)
{
?>
<div class="form_input">
 		
 		<p>เป็นบริษัทหลัก หรือ ไซต์งานลูกค้า</p>
		<div class="status">
			<input type="radio" name="is_main_company" value="1" disabled <?php if($detail->is_main_company=='1'){ echo "checked=checked"; } ?> > บริษัทหลัก 
			<input type="radio"  name="is_main_company" value="0" disabled <?php if($detail->is_main_company=='0'){ echo "checked=checked"; } ?> > ไซต์งานลูกค้า
		</div>

		<p>ความสำคัญของลูกค้า</p>
		<div class="status">
			<input type="radio" name="is_mipt" value="1" disabled <?php if($detail->is_mipt=='1'){ echo "checked=checked"; } ?> > ลูกค้า ธรรมดา
			<input type="radio"  name="is_mipt" value="0" disabled <?php if($detail->is_mipt=='0'){ echo "checked=checked"; } ?> > ลูกค้า VIP 
		</div>
 		<p>รหัสบริษัท</p>
		<input type="text" class="input" name="mcmp_code" value="<?php echo $detail->mcmp_code; ?>"readonly>
		<p>ชื่อบริษัท(TH)</p>
		<input type="text" class="input" name="name_th" value="<?php echo $detail->name_th; ?>"readonly>
		<p>ชื่อบริษัท(ENG)</p>
		<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>"readonly>
		<p>ที่อยู่บริษัท</p>
		<textarea  class="input" rows='5' name="adr_line" readonly><?php echo $detail->adr_line; ?></textarea>
		<div class="row form_input" style="text-align:left; margin:0;">
			<div class="col-md-12">
				<p>ชื่อจังหวัด</p><p class="required">*</p>
				<select name="id_mprv" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
	
			</div>
			<div class="col-md-6">
				<div class="row form_input" style="text-align:left; margin:0;">    
				<p>ชื่ออำเภอ/เขต</p><p class="required">*</p>
				<select name="id_mdist" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
				<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row form_input" style="text-align:left; margin:0;">    
				<p>พื้นที่บริการ</p>
				<select name="" ID="" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
				<option style="font-size:12px;" value="" selected>----เลือก----</option>
				</select>
				<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<p>เลขประจำตัวผู้เสียภาษี</p>
		<input type="text" class="input" name="tax_id" value="<?php echo $detail->tax_id; ?>"readonly>
		<p>เว็บไซต์</p>
		<input type="text" class="input" name="website" value="<?php echo $detail->website; ?>"readonly>
		<p>อีเมลล์</p>
		<input type="text" class="input" name="email" value="<?php echo $detail->email; ?>"readonly>
		<p>ชื่อผู้ติดต่อ</p>
		<input type="text" class="input" name="contact" value="<?php echo $detail->contact; ?>"readonly>
		<p>เบอร์โทรศัพท์</p>
		<input type="text" class="input" name="telephone" value="<?php echo $detail->telephone; ?>"readonly>
		<p>เบอร์มือถือ</p>
		<input type="text" class="input" name="mobile" value="<?php echo $detail->mobile; ?>"readonly>
		<p>เบอร์แฟกซ์</p>
		<input type="text" class="input" name="fax" value="<?php echo $detail->fax; ?>"readonly>
		<p>เป็นองค์กรณ์เจ้าของระบบหรือไม่</p>
		<div class="status">
			<input type="radio" name="is_owner" value="1" disabled <?php if($detail->is_owner=='1'){ echo "checked=checked"; } ?> > ใช่ 
			<input type="radio"  name="is_owner" value="0" disabled <?php if($detail->is_owner=='0'){ echo "checked=checked"; } ?> > ไม่ใช่ 
		</div>
		<p>เป็น Supplier หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_supplier" value="1" disabled <?php if($detail->is_supplier=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_supplier" value="0" disabled <?php if($detail->is_supplier=='0'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>เป็น Dealer หรือไม่</p>
		<div class="status">
			<input type="radio" name="is_dealer" value="1" disabled <?php if($detail->is_dealer=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_dealer" value="0" disabled <?php if($detail->is_dealer=='0'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>เป็นลูกค้าหรือไม่</p> 
		<div class="status">
			<input type="radio" name="is_customer" value="1" disabled <?php if($detail->is_customer=='1'){ echo "checked=checked"; } ?>> ใช่  
			<input type="radio" name="is_customer" value="0" disabled <?php if($detail->is_customer=='0'){ echo "checked=checked"; } ?>> ไม่ใช่ 
		</div>
		<p>หมายเหตุ </p>
		<textarea  class="input" rows='5' name="comment" readonly ><?php echo $detail->comment; ?></textarea>
		<p>สถานะ</p>
		<div class="status">
			<input type="radio" name="status" value="1" disabled <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน  
			<input type="radio" name="status" value="0" disabled <?php if($detail->status=='0'){ echo "checked=checked"; } ?>> ยกเลิก 
		</div>
		<p>ผู้สร้าง</p>
		<input type="text" class="input" name="name_create" value="<?php  echo $detail->name_create; ?>" readonly>
		<p>วันที่สร้าง</p>
		<input type="text" class="input" name="dt_create" value="<?php echo $detail->dt_create; ?>" readonly>
		<p>ผู้แก้ไข</p>
		<input type="text" class="input" name="name_update" value="<?php echo $detail->name_update; ?>" readonly>
		<p>วันที่แก้ไข</p>
		<input type="text" class="input" name="dt_update" value="<?php echo $detail->dt_update; ?>" readonly>		
 </div>
<?php 
}
?>