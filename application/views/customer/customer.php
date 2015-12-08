<?php echo  $header;?>
<div class='col-sm-12'>
	<br/>
	<div class="nev_url"><?php echo $NAV; ?> </div>
	<div class="search">ค้นหา :
		<input type="text" data-column="0"  class="search-input-text" placeholder="--รหัสพนักงาน--">
		<input type="text" data-column="1"  class="search-input-text" placeholder="--ชื่อ-สกุล--">
		<input type="text" data-column="2"  class="search-input-text" placeholder="--ชื่อเข้าใช้ระบบ--">
		<input type="text" data-column="3"  class="search-input-text" placeholder="--เบอร์มือถือ--">
		<select data-column="4" class="search-input-text">
			<option style="font-size:12px;" value="" selected>----ทั้งหมด----</option>
			<option style="font-size:12px;" value="1">ใช้งาน</option>
			<option style="font-size:12px;" value="0">ยกเลิก</option>
		</select>
	</div>
</div>
<!-- form customer	 -->
<div class="col-sm-12 well">
	<form  name="userForm" class="form-hori">
		
	</form>
</div>
<!-- end for  customer -->