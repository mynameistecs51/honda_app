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
		<input type="text" class="form-control" id="stock_date" name="tstock_date" value="<?php echo $detail->tstock_date; ?>" readonly>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
		<select name="id_mbranch" class ="form-control" disabled>
			<option value="">--เลือก--</option> 
			<option value="1" selected> อุดรธานี </option>
			<option value="2"> หนองบัวลำภู </option>
			<option value="3"> หนองคาย </option>
			<option value="3"> สว่างแดนดิน </option>
		</select> 
	</div>  
</div>
<div class="row form_input"> 
	<div class="col-md-3" >
		<p>หมายเลขตัวถัง</p><p class="required">*</p>
		<input type="text" class="form-control" id="plan" name="plan" placeholder="--ยิงบาร์โค้ท--"  required>
	</div>
	<div class="col-md-3" >
		<p>หมายเลขเครื่อง</p><p class="required">*</p>
		<input type="text" class="form-control" id="plan" name="plan" required>
	</div> 
	<div class="col-md-3" >
		<p>แบบ</p><p class="required">*</p>
		<input type="text" class="form-control" id="plan" name="plan" required>
	</div>
	<div class="col-md-3" >
		<p>รุ่น</p><p class="required">*</p>
		<input type="text" class="form-control" id="plan" name="plan" required>
	</div>
	<div class="col-md-3" >
		<p>สี</p><p class="required">*</p>
		<input type="text" class="form-control" id="plan" name="plan" required>
	</div> 
	<div class="col-md-3" >
		<p>วันที่รับจริง</p><p class="required">*</p> 
		<input type="text" class="form-control" id="treceived_date" name="treceived_date" value="<?php echo $datenow; ?>" required>
	</div>
	<div class="col-md-3" >
		<p>โซนจัดเก็บ</p><p class="required">*</p>
		<select name="id_mbranch" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1" selected> Z1L001</option>
			<option value="2"> Z1L002 </option>
			<option value="3"> Z1L003 </option>
			<option value="3"> Z1L004 </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>เลขที่เอกสารอ้างอิง</p>
		<input type="text" class="form-control" id="plan" name="plan" >
	</div> 
	<div class="col-md-12" style="text-align:left;">
		<p>สถานะ</p> 
		<input type="radio"  name="status" value="1"  <?php if($detail->status=='1'){ echo "checked"; } ?> > รับเข้าสต๊อก
        <input type="radio"  name="status" value="2"  <?php if($detail->status=='1'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3"  <?php if($detail->status=='1'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4"  <?php if($detail->status=='1'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="5"  <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก  
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
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