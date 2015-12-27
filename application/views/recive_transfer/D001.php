<?php
foreach ($listStock as $detail) 
{
?>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>เลขที่รับเข้าสต๊อก</p>
		<input type="text" class="form-control" name="stock_code" value="<?php echo $detail->stock_code; ?>"  readonly>
	</div>
	<div class="col-md-3" >
		<p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
		<input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $detail->stock_date; ?>"  readonly required>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $detail->mbranch_name; ?>"  readonly>
	</div> 
	<div class="col-md-3" >
		<p>สาขาที่โยกมา</p>
		<input type="text" class="form-control" id="branch_transfer" name="branch_transfer" value="<?php echo $detail->branch_transfer; ?>" readonly>
	</div>
</div>
<div class="row form_input transfer"> 
	<div class="col-md-3" >
		<p>เลขที่ใบโยกรถ <b ID="er_tf_code"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="transfer_code" name="transfer_code" value="<?php echo $detail->transfer_code; ?>" readonly>
		<input type="hidden" id="id_transfer" name="id_transfer" value="<?php echo $detail->id_transfer; ?>"  required>
	</div>
	<div class="col-md-3" >
		<p>วันที่โยกรถ</p>
		<input type="text" class="form-control" id="transfer_date" name="transfer_date" value="<?php echo $detail->transfer_date; ?>"   readonly>
	</div> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง <b ID="er_cha_code"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" id="chassis_number" name="chassis_number" value="<?php echo $detail->chassis_number; ?>" readonly required>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="engine_number" name="engine_number"  value="<?php echo $detail->engine_number; ?>" readonly>
	</div> 
</div>
<div class="row form_input">  
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<input type="text" class="form-control" id="mmodel_name" name="mmodel_name"  value="<?php echo $detail->mmodel_name; ?>"  readonly>
		<input type="hidden" id="id_mmodel" name="id_mmodel" value="<?php echo $detail->id_mmodel; ?>"  >
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<input type="text" class="form-control" id="gen_name" name="gen_name"  value="<?php echo $detail->gen_name; ?>" readonly>
		<input type="hidden" id="id_mgen" name="id_mgen" value="<?php echo $detail->id_mgen; ?>"  >
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<input type="text" class="form-control" id="color_name" name="color_name"  value="<?php echo $detail->color_name; ?>" readonly>
		<input type="hidden" id="id_mcolor" name="id_mcolor"  value="<?php echo $detail->id_mcolor; ?>" >
	</div> 
</div>
<div class="row form_input">  
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $detail->recive_doc_date; ?>" readonly>
	</div> 
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<select name="id_zone" class ="form-control" disabled> 
			<?php echo "<option value='".$detail->id_zone."'>".$detail->zone_name."</option>"; ?>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>เลขที่เอกสารอ้างอิง</p>
		<input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" value="<?php echo $detail->doc_reference_code; ?>" readonly>
	</div> 
</div>
<div class="row form_input"> 
	<div class="col-md-12" style="text-align:left;">
		<p>สถานะ</p> 
		<input type="radio"  name="status" value="1" disabled <?php if($detail->status=='1'){ echo "checked"; } ?> > รับเข้าสต๊อก
        <input type="radio"  name="status" value="2" disabled <?php if($detail->status=='2'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3" disabled <?php if($detail->status=='3'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4" disabled <?php if($detail->status=='4'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="0" disabled <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก  
	</div>
</div>
<div class="row form_input"> 
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"  readonly><?php  echo str_replace('<br>',"",$detail->comment); ?></textarea>
	</div> 
</div>
<div class="row form_input">
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