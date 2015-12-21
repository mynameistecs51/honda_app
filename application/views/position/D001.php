<?php
foreach ($listMposition as $detail)
{
?>
<div class="row form_input">
	<div class="col-md-4" >
		<p>รหัส<?php echo $pagename; ?></p>
		<input type="text" class="form-control" name="mposition_code" value="<?php echo $detail->mposition_code;   ?>" disabled>
	</div>
	<div class="col-md-4" >
		<p>ชื่อ<?php echo $pagename; ?></p>
		<input type="text" class="form-control" name="mposition_name" value="<?php echo $detail->mposition_name; ?>"  disabled>
	</div>
	<div class="col-md-4" >
		<p>สำนักงาน/สาขา</p> <p class="required">*</p> 
		 <select name="id_mbranch" class ="form-control" disabled>
            <option value="">--เลือก--</option> 
            <?php 
            foreach($listMbranch as $Mbranch)
            {  
                if($Mbranch->id_mbranch==$detail->id_mbranch){
                    echo "<option value='".$Mbranch->id_mbranch."' selected>".$Mbranch->mbranch_name."</option>";
                }else{
                    echo "<option value='".$Mbranch->id_mbranch."' >".$Mbranch->mbranch_name."</option>";
                }
            }
            ?>
        </select>
	</div>
	<div class="col-md-12" style="text-align:left;">
		<p>สถานะ</p> 
		<input type="radio"  name="status" value="1" disabled <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
		<input type="radio"  name="status" value="2" disabled <?php if($detail->status=='0'){ echo "checked=checked"; } ?>>  ยกเลิก   
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ </p>
		<textarea  class="form-control" rows='3' name="comment" disabled><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
	</div>
	<div class="col-md-3" >
		<p>ผู้สร้าง</p>
		<input type="text" class="form-control" name="name_create" value="<?php echo $detail->name_create; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>วันที่สร้าง</p>
		<input type="text" class="form-control" name="dt_create" value="<?php echo $detail->dt_create; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>ผู้แก้ไข</p>
		<input type="text" class="form-control" name="name_update" value="<?php echo $detail->name_update; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>วันที่แก้ไข</p>
		<input type="text" class="form-control" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
	</div> 
		
 </div>
 <?php 
}
?>