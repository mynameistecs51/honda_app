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
	<form novalidate name="userForm" class="form-inline">
		<div class="form-inline ">
			<div class="form-group">
				<label for="id_customer">หมายเลขลูกค้าคาดหวัง</label>
				<input type="text" name="id_customer" id="id_customer" class='form-control' />
			</div>
			<div class="form-group">
				<label for="add_date">วันที่บันทึก</label>
				<input type="text" name="add_date" id="add_date" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="submit_date"><u>ระยะเวลาในการตัดสินใจ</u></label>
				<input type="date" name="submit_date" id="submit_date" class="form-control"/>
			</div>
			<div class="form-group">
				<label for='acc_receivable'>บัญชีลูกหนี้</label>
				<input type="text" name="acc_receivable" id="acc_receivable" class="form-control">
			</div>
		</div>
		<br/>
		<div class="col-sm-1"></div>
		<div class="form-inline">
			<div class="form-group pull-left">
				<div class="form-group">
					<label> ประเทภลูกค้า</label>
					<div class="radio">
						<label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="nes_customer" checked>
							ลูกค้าใหม่
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="old_customer">
							ลูกค้าเก่า
						</label>
					</div>
				</div>
			</div>
			<div class="form-group pull-right">
				<div class="form-group">
					<label for="group_customer"> ประเทภลูกค้า</label>
					<input type="text" name="group_customer" id="group_customer" class="form-control" />
				</div>
			</div>
		</div>
		<br/>
		<div class="row form-horizontal ">
			<fieldset class="col-sm-12 ">
				<legend>ข้อมูลลูกค้าคาดหวัง</legend>
				<div class="form-group col-sm-12  pull-left">
					<label for="number_customer" class="col-sm-2 control-label">หมายเลขลูกค้า</label>
					<div class="col-sm-10">
						<input type="text" class="form-control col-sm-7" id="number_customer" name="number_customer" style="width:20%;">
						<button type="button" class="btn btn-default col-sm-3"> คัดลอกข้อมูลบางส่วนจากลูกค้า</button>
					</div>
				</div>
				<div class="form-group col-sm-12 pull-left">
					<label for="name" class="col-sm-2 control-label">คำนำหน้า / <u>ชื่อ</u> *</label>
					<div class="col-sm-10">
						<select name="pre_name" class="col-sm-2 form-control">
							<option value="1"> นาย </option>
							<option value="2"> นางสาว </option>
							<option value="3"> นาง </option>
						</select>
						<input type="text" name="name" id="name" class="col-sm-8 form-control" style="width:40%;">
					</div>
				</div>
				<div class="form-group col-sm-12 pull-left">
					<label for="name" class="col-sm-2 control-label">นามสกุล / ชื่อกลาง </label>
					<div class="col-sm-10">
						<input type="text" name="lastname" id="lastname" class="col-sm-8 form-control" style="width:25%;">
						<input type="text" name="name" id="name" class="col-sm-8 form-control" style="width:25%;">
					</div>
				</div>
			</fieldset>
		</div>
	</form>

</div>
<!-- end for  customer -->