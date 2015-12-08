<?php
foreach ($listMinv as $detail)
{
?>
<div class="form_input">
		<p>รหัสรายการสินค้า/อะไหล่</p>
		<input type="text" class="input" name="minv_cat_code" value="<?php echo $detail->minv_code;   ?>" readonly>
		<p>ประเภทสินค้า/อะไหล่</p>
		<select name="id_minv_cat" class ="select" disabled>
		<option value="">--เลือก--</option> 
		<?php 
			foreach ($listMinv_cat as $minv_cat) 
			{
					$m= "<option value='".$minv_cat->id_minv_cat."' ";
					if($detail->id_minv_cat==$minv_cat->id_minv_cat){
						$m .= "selected";
					}
					$m .=">".$minv_cat->name_th."</option>";
					echo $m;
			}
		?>		
		</select>
		<p>หน่วยนับสินค้า</p>
		<select name="id_minv_unt" class ="select" disabled>
		<option value="">--เลือก--</option> 
		<?php 
			foreach ($listMinv_unt as $minv_unt) 
			{
					$m= "<option value='".$minv_unt->id_minv_unt."' ";
					if($detail->id_minv_unt==$minv_unt->id_minv_unt){
						$m .= "selected";
					}
					$m .=">".$minv_unt->name_th."</option>";
					echo $m;
			}
		?>		
		</select>
		<p>บริษัทเจ้าของสินค้า</p>
		<select name="id_mcmp" class ="select" disabled>
		<option value="">--เลือก--</option> 
		<?php 
			foreach ($listMcmp as $mcmp) 
			{
					$m= "<option value='".$mcmp->id_mcmp."' ";
					if($detail->id_mcmp==$mcmp->id_mcmp){
						$m .= "selected";
					}
					$m .=">".$mcmp->name_th."</option>";
					echo $m;
			}
		?>		
		</select>
		<p>ชื่อรายการสินค้า/อะไหล่(ENG)</p>
		<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>"  readonly>
		<p>ชื่อรายการสินค้า/อะไหล่(TH)</p>
 		<p class="required"></p>
		<input type="text" class="input" name="name_th" value="<?php echo $detail->name_th;   ?>"readonly>
		<p>Brand</p>
		<input type="text" class="input" name="brand" value="<?php echo $detail->brand; ?>"  readonly>
		<p>Rated Power</p>
 		<p class="required"></p>
		<input type="text" class="input" name="rated_power" value="<?php echo $detail->rated_power;   ?>"readonly>
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