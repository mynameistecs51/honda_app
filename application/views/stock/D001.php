<?php
foreach ($listStock as $detail)
{
?>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>เลขที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" name="stock_code"  value="<?php echo $detail->stock_code; ?>"   readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $detail->stock_date; ?>" readonly>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $detail->mbranch_name; ?>"  readonly>
	</div>  
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<select name="id_zone" class ="form-control" readonly>
			<?php echo "<option value='".$detail->id_zone."' selected>".$detail->zone_name."</option>"; ?> 
		</select> 
	</div>
</div>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง</p><p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number"  value="<?php echo $detail->chassis_number; ?>"  readonly>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number" value="<?php echo $detail->engine_number; ?>" readonly>
	</div> 
	<div class="col-md-3" > 
		<p>แบบ</p><p class="required">*</p>
		<select name="id_mmodel" id="id_mmodel" class ="form-control" readonly> 
			<?php echo "<option value='".$detail->id_mmodel."' selected>".$detail->mmodel_name."</option>"; ?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<select name="id_mgen" id="id_mgen" class ="form-control" readonly> 
			<?php echo "<option value='".$detail->id_mgen."' selected>".$detail->gen_name."</option>"; ?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<select name="id_mcolor" id="id_mcolor" class ="form-control" readonly> 
			<?php echo "<option value='".$detail->id_mcolor."' selected>".$detail->color_name."</option>"; ?>
		</select>
	</div> 
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="treceived_date" name="treceived_date" value="<?php echo $datenow; ?>" readonly>
	</div> 
	<div class="col-md-6" >
		<p>เลขที่เอกสารอ้างอิง</p>
		<input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" value="<?php echo $detail->doc_reference_code; ?>" readonly>
	</div> 
	<div class="col-md-12" style="text-align:left;">
		<p>สถานะ</p> 
		<input type="radio"  name="status" value="1" disabled <?php if($detail->status=='1'){ echo "checked"; } ?> > รับเข้าสต๊อก
        <input type="radio"  name="status" value="2" disabled <?php if($detail->status=='2'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3" disabled <?php if($detail->status=='3'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4" disabled <?php if($detail->status=='4'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="5" disabled <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก  
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"  readonly><?php  echo str_replace('<br>',"",$detail->comment); ?></textarea>
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
        <input type="text" class="form-control" name="name_update" value="<?php  echo $detail->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
    </div> 
</div>
 <?php 
}
?>