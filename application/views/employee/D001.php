<?php
foreach ($listemployee as $empHdr)
{
?>

<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="mmember_code" value="<?php echo $empHdr->mmember_code; ?>" disabled> 
	</div>
	<div class="col-md-3">
		<p>ตำแหน่ง</p>
		<p class="required">*</p>
		<select name="id_mposition" class ="form-control" disabled>
			<option value="">--เลือก--</option>
			<?php 
			foreach($listMposition as $Mposition)
			{ 
				if($Mposition->id_mposition==$empHdr->id_mposition){
					echo "<option value='".$Mposition->id_mposition."' selected>".$Mposition->mposition_name."</option>";
				}else{
					echo "<option value='".$Mposition->id_mposition."' >".$Mposition->mposition_name."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขา</p>
		<p class="required">*</p>
		<select name="id_mbranch" class ="form-control" disabled>
			<option value="">--เลือก--</option> 
			<?php 
			foreach($listMbranch as $Mbranch)
			{  
				if($Mbranch->id_mbranch==$empHdr->id_mbranch){
					echo "<option value='".$Mbranch->id_mbranch."' selected>".$Mbranch->mbranch_name."</option>";
				}else{
					echo "<option value='".$Mbranch->id_mbranch."' >".$Mbranch->mbranch_name."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num" value="<?php echo $empHdr->idcard_num; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_mmember_tit" class ="form-control" disabled>
			<option value=""  <?php echo $empHdr->id_mmember_tit == '' ? 'selected':'' ; ?>  >--เลือก--</option> 
			<option value="1" <?php echo $empHdr->id_mmember_tit == '1' ? 'selected':'' ; ?> > นาย </option>
			<option value="2" <?php echo $empHdr->id_mmember_tit == '2' ? 'selected':'' ; ?> > นาง </option>
			<option value="3" <?php echo $empHdr->id_mmember_tit == '3' ? 'selected':'' ; ?> > นางสาว </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname" placeholder="ชื่อ" value="<?php echo $empHdr->firstname; ?>"  disabled> 
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p> 
		<input type="text" class="form-control"  name="lastname" placeholder="สกุล" value="<?php echo $empHdr->lastname; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  value="<?php echo $empHdr->birthdate; ?>"  disabled>
	</div> 
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p>
		<input type="text" class="form-control" name="drv_lcn_num" value="<?php echo $empHdr->drv_lcn_num; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email" value="<?php echo $empHdr->email; ?>"  disabled>
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  value="<?php echo $empHdr->telephone; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" ID="mobile" name="mobile" value="<?php echo $empHdr->mobile; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>แฟกซ์</p>
		<input type="text" class="form-control" name="fax" value="<?php echo $empHdr->fax; ?>" disabled>
	</div>
	<div class="col-md-3" >
		<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="username" ID="user" value="<?php echo $empHdr->username; ?>"  disabled>
	</div>
</div>
<div class="row form_input">
	<div class="col-md-6" >
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line1" disabled><?php  echo str_replace('<br>',"",$empHdr->adr_line1); ?></textarea>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line2" disabled><?php  echo str_replace('<br>',"",$empHdr->adr_line2); ?></textarea> 
	</div> 
</div>
<div class="row form_input">
	<div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1"  disabled  checked> ใช้งาน
        <input type="radio"  name="status" value="2" disabled  >  ยกเลิก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ </p>
        <textarea  class="form-control" rows='3' name="comment"  disabled><?php  echo str_replace('<br>',"",$empHdr->comment); ?></textarea>
    </div>
    <div class="col-md-3" >
        <p>ผู้สร้าง</p>
        <input type="text" class="form-control" name="name_create" value="<?php  echo $empHdr->name_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่สร้าง</p>
        <input type="text" class="form-control" name="dt_create" value="<?php echo $empHdr->dt_create; ?> " disabled>
    </div>
    <div class="col-md-3" >
        <p>ผู้แก้ไข</p>
        <input type="text" class="form-control" name="name_update" value="<?php echo $empHdr->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php  echo $empHdr->dt_update; ?>" disabled>
    </div> 
</div>

 
 <?php 
}
?>