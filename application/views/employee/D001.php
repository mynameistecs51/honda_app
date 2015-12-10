<?php
foreach ($listemployee as $empHdr)
{
?>
<div class="form_input">
		<p>รหัสพนักงาน</p>
		<input type="text" class="input" name="memp_code" value="<?php echo $empHdr->memp_code;   ?>" readonly="true">
		<p>ตำแหน่ง</p>
		<select name="id_mpst" class ="select" disabled>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMpst as $Mpst)
			{
				$c= "<option value='".$Mpst->id_mpst."' ";
				if($empHdr->id_mpst==$Mpst->id_mpst){
					$c .= "selected";
				}
				$c .=">".$Mpst->name_th."</option>";
				echo $c;
			}
			?>
		</select>
		<p>แผนก</p>
		<select name="id_mdept" class ="select" disabled>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMdept as $Mdept)
			{
				$c= "<option value='".$Mdept->id_mdept."' ";
				if($empHdr->id_mdept==$Mdept->id_mdept){
					$c .= "selected";
				}
				$c .=">".$Mdept->name_th."</option>";
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
		<select name="id_memp_tit" class ="select" disabled>
			<option value="1" <?php if($empHdr->id_memp_tit=='1'){ echo "selected"; } ?>> นาย </option>
			<option value="2" <?php if($empHdr->id_memp_tit=='2'){ echo "selected"; } ?>> นาง </option>
			<option value="3" <?php if($empHdr->id_memp_tit=='3'){ echo "selected"; } ?>> นางสาว </option>
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
 </div>
 <?php 
}
?>