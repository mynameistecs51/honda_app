<?php
foreach ($listemployee as $empHdr)
{
?>

<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="memp_code" required > 
	</div>
	<div class="col-md-3" >
		<p>ตำแหน่ง</p>
		<p class="required">*</p>
		<select name="id_mpst" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMpst as $Mpst)
			{ 
				echo "<option value='".$Mpst->id_mpst."'>".$Mpst->name_th."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>สำนักงาน/สาขา</p>
		<p class="required">*</p>
		<select name="id_mdept" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMdept as $Mdept)
			{ 
				echo "<option value='".$Mdept->id_mdept."'>".$Mdept->name_th."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-md-3" >
		<p>เลขประจำตัวประชาชน</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="idcard_num"  required>
	</div>
	<div class="col-md-3" >
		<p>คำนำหน้าชื่อ</p>
		<select name="id_memp_tit" class ="form-control" required>
			<option value="">--เลือก--</option> 
			<option value="1"> นาย </option>
			<option value="2"> นาง </option>
			<option value="3"> นางสาว </option>
		</select> 
	</div>
	<div class="col-md-3" >
		<p>ชื่อ </p>
		<p class="required">*</p>
		<input type="text" class="form-control"  name="firstname_th" placeholder="ชื่อ" required> 
	</div>
	<div class="col-md-3" >
		<p>นามสกุล </p>
		<p class="required">*</p> 
		<input type="text" class="form-control"  name="lastname_th" placeholder="สกุล" required>
	</div>
	<div class="col-md-3" >
		<p>วันเกิด</p>
		<p class="required"></p>
		<input type="text" class="form-control" name="birthdate" id="birthdate"  >
	</div> 
	<div class="col-md-3" >
		<p>เลขใบอนุญาตขับขี่</p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="drv_lcn_num" >
	</div>
	<div class="col-md-3" >
		<p>อีเมลล์ <b ID="valid_email"></b></p>
		<p class="required">*</p>
		<input type="email" class="form-control" name="email" ID="email" >
	</div>
	<div class="col-md-3" >
		<p>โทรศัพท์</p>
		<input type="text" class="form-control" name="telephone"  >
	</div>
	<div class="col-md-3" >
		<p>มือถือ <b ID="valid_mobile"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" ID="mobile" name="mobile" >
	</div>
	<div class="col-md-3" >
		<p>แฟกซ์</p>
		<input type="text" class="form-control" name="fax" >
	</div>
	<div class="col-md-3" >
		<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
		<p class="required">*</p>
		<input type="text" class="form-control" name="username" ID="user" required>
	</div>
	<div class="col-md-3" >
		<p>รหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="form-control" name="userpassword" id="userpassword" required>
	</div>
	<div class="col-md-3" >
		<p>ยืนยันรหัสผ่าน</p>
		<p class="required">*</p>
		<input type="password" class="form-control" name="con_pass" id="confirmpw" required>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line1" required></textarea>
	</div>
	<div class="col-md-6" >
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<p class="required">*</p>
		<textarea  class="form-control" rows='3' name="adr_line2" ></textarea> 
	</div>
	<div class="col-md-12" >
		<p>หมายเหตุ</p>
		<textarea  class="form-control" rows='3' name="comment"></textarea>
	</div>
</div>


<!-- 
<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="col-md-3" >
		<p>รหัสพนักงาน</p>
		<input type="text" class="input" name="mmember_code" value="<?php echo $empHdr->mmember_code;   ?>" readonly="true">
	</div>
	<div class="col-md-3" >
		<p>ตำแหน่ง</p>
		<select name="id_mpst" class ="select" disabled>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMposition as $Mpst)
			{
				$c= "<option value='".$Mpst->id_mposition."' ";
				if($empHdr->id_mposition==$Mpst->id_mposition){
					$c .= "selected";
				}
				$c .=">".$Mpst->mposition_name."</option>";
				echo $c;
			}
			?>
		</select>
		<p>แผนก</p>
		<select name="id_mbranch" class ="select" disabled>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMbranch as $Mbranch)
			{
				$c= "<option value='".$Mbranch->id_mbranch."' ";
				if($empHdr->id_mbranch==$Mbranch->id_mbranch){
					$c .= "selected";
				}
				$c .=">".$Mbranch->mbranch_name."</option>";
				echo $c;
			}
			?>
		</select>
		<p>เพศ</p>
		<select name="sex" class ="select" disabled>
			<option value="" <?php if($empHdr->sex==''){ echo "selected"; } ?>> --เลือก-- </option>
			<option value="1" <?php if($empHdr->sex=='1'){ echo "selected"; } ?>> ชาย </option>
			<option value="2" <?php if($empHdr->sex=='2'){ echo "selected"; } ?>> หญิง </option> 
		</select> 
		<p>คำนำหน้าชื่อ</p>
		<select name="id_mmember_tit" class ="select" disabled>
			<option value="1" <?php if($empHdr->id_mmember_tit=='1'){ echo "selected"; } ?>> นาย </option>
			<option value="2" <?php if($empHdr->id_mmember_tit=='2'){ echo "selected"; } ?>> นาง </option>
			<option value="3" <?php if($empHdr->id_mmember_tit=='3'){ echo "selected"; } ?>> นางสาว </option>
		</select> 
 		<p>ชื่อพนักงาน(TH)</p>
		<input type="text" class="inputname" name="firstname_th" value="<?php echo $empHdr->firstname_th;   ?>" placeholder="ชื่อ" readonly required>
		<input type="text" class="inputname" name="lastname_th" value="<?php echo $empHdr->lastname_th; ?>" placeholder="สกุล"  readonly required>
		<p>ชื่อพนักงาน(ENG)</p>
		<input type="text" class="inputname" name="firstname_en" value="<?php echo $empHdr->firstname_en; ?>" placeholder="First Name" readonly>
		<input type="text" class="inputname" name="lastname_en" value="<?php echo $empHdr->lastname_en; ?>" placeholder="Last Name" readonly>
		<p>สถานะภาพ</p>
		<select name="status_marriaged" class ="select" disabled> 
			<option value="1" <?php if($empHdr->status_marriaged=='1'){ echo "selected"; } ?>> โสด </option>
			<option value="2" <?php if($empHdr->status_marriaged=='2'){ echo "selected"; } ?>> สมรส </option>
			<option value="3" <?php if($empHdr->status_marriaged=='3'){ echo "selected"; } ?>> หย่าร้าง </option>
			<option value="4" <?php if($empHdr->status_marriaged=='4'){ echo "selected"; } ?>> แยกกันอยู่ </option>
		</select> 
		<p>วันเกิด</p>
		<input type="text" class="input" name="birthdate" value="<?php echo $empHdr->birthdate; ?>" readonly>
		<p>วันเริ่มงาน</p>
		<input type="text" class="input" name="startdate" value="<?php echo $empHdr->startdate;  ?>" readonly>
		<p>วันสิ้นสุดการเป็นพนักงาน </p>
		<input type="text" class="input" name="resigndate" value="<?php echo $empHdr->resigndate; ?>" readonly>
		<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
		<textarea  class="input" rows='5' name="adr_line1" readonly><?php echo str_replace('<br>',"",$empHdr->adr_line1); ?></textarea>
		<p>ที่อยู่ (ปัจจุบัน)</p>
		<textarea  class="input" rows='5' name="adr_line2" readonly><?php echo str_replace('<br>',"",$empHdr->adr_line2); ?></textarea>
		<p>รหัสประจำตัวประชาชน</p>
		<input type="text" class="input" name="idcard_num" value="<?php echo $empHdr->idcard_num;  ?>" readonly>
		<p>เลขใบอนุญาตขับขี่</p>
		<input type="text" class="input" name="drv_lcn_num" value="<?php echo $empHdr->drv_lcn_num;  ?>" readonly>
		<p>อีเมลล์</p>
		<input type="text" class="input" name="email" value="<?php echo $empHdr->email;  ?>" readonly>
		<p>โทรศัพท์</p>
		<input type="text" class="input" name="telephone" value="<?php echo $empHdr->telephone; ?>" readonly>
		<p>มือถือ</p>
		<input type="text" class="input" name="mobile" value="<?php echo $empHdr->mobile; ?>" readonly>
		<p>แฟกซ์</p>
		<input type="text" class="input" name="fax" value="<?php echo $empHdr->fax; ?>" readonly>
		<p>ชื่อเข้าใช้ระบบ</p>
		<input type="text" class="input" name="user" value="<?php echo $empHdr->user; ?>" readonly> 
		<p>หมายเหตุ </p>
		<textarea  class="input" rows='5' name="comment" readonly><?php echo str_replace('<br>',"",$empHdr->comment); ?></textarea>
		<p>สถานะ</p> 
		<div class="status">
			<input type="radio"  name="status" value="1"  disabled <?php if($empHdr->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
			<input type="radio"  name="status" value="2" disabled <?php if($empHdr->status=='0'){ echo "checked=checked"; } ?>>  ยกเลิก  
		</div>
		<p>ผู้สร้าง</p>
		<input type="text" class="input" name="name_create" value="<?php echo $empHdr->name_create; ?>" disabled>
		<p>วันที่สร้าง</p>
		<input type="text" class="input" name="dt_create" value="<?php echo $empHdr->dt_create; ?>" disabled>
		<p>ผู้แก้ไข</p>
		<input type="text" class="input" name="name_update" value="<?php echo $empHdr->name_update; ?>" disabled>
		<p>วันที่แก้ไข</p>
		<input type="text" class="input" name="dt_update" value="<?php echo $empHdr->dt_update; ?>" disabled>
 </div> -->
 <?php 
}
?>