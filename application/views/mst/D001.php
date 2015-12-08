<?php
foreach ($listMst as $detail)
{
?>
<div class="form_input">
		<p>รหัสรายการคลังสินค้า/อะไหล่</p>
		<input type="text" class="input" name="mst_code" value="<?php echo $detail->mst_code;   ?>" readonly>	
		<p>บริษัทเจ้าของคลังสินค้า</p>
		<select name="id_mdept" class ="select" disabled>
		<option value="">--เลือก--</option> 
		<?php 
			foreach ($listMdept as $mdept) 
			{
					$m= "<option value='".$mdept->id_mdept."' ";
					if($detail->id_mdept==$mdept->id_mdept){
						$m .= "selected";
					}
					$m .=">".$mdept->name_th."</option>";
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
		<p>ชื่อรายการคลังสินค้า/อะไหล่(ENG)</p>
		<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>"  readonly>
		<p>ชื่อรายการคลังสินค้า/อะไหล่(TH)</p>
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