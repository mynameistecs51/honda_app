<?php
foreach ($listMinv_unt as $detail)
{
?>
<div class="form_input">
		<p>รหัสหน่วยนับสินค้า</p>
		<input type="text" class="input" name="minv_unt_code" value="<?php echo $detail->minv_unt_code;   ?>" readonly>
		<p>ชื่อหน่วยนับสินค้า(ENG)</p>
		<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>"  readonly>
		<p>ชื่อหน่วยนับสินค้า(TH)</p>
 		<p class="required"></p>
		<input type="text" class="input" name="name_th" value="<?php echo $detail->name_th;   ?>"readonly>
		<p>หมายเหตุ </p>
		<textarea  class="input" rows='5' name="comment" readonly><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
		<p>สถานะ</p> 
		<div class="status">
			<input type="radio"  name="status" value="1"  disabled <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
			<input type="radio"  name="status" value="2" disabled <?php if($detail->status=='0'){ echo "checked=checked"; } ?>>  ยกเลิก  
		</div>
		<p>ผู้สร้าง</p>
		<input type="text" class="input" name="name_create" value="<?php echo $detail->name_create; ?>" disabled>
		<p>วันที่สร้าง</p>
		<input type="text" class="input" name="dt_create" value="<?php echo $detail->dt_create; ?>" disabled>
		<p>ผู้แก้ไข</p>
		<input type="text" class="input" name="name_update" value="<?php echo $detail->name_update; ?>" disabled>
		<p>วันที่แก้ไข</p>
		<input type="text" class="input" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
 </div>
 <?php 
}
?>