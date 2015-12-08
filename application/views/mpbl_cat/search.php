<?php
		$attibutes = array('id'=>'form_search','name'=>'main', 'method'=>'post');
		echo form_open('ctl_memp/search', $attibutes);
?>
<div class="form_search">
			สถานะ : 
			<select name="status" > 
			<option value="" <?php if($status==""){ echo "selected"; } ?> > ทั้งหมด </option>
			<option value="1" <?php if($status=="1"){ echo "selected"; } ?> > ใช้งาน </option>
			<option value="0" <?php if($status=="0"){ echo "selected"; } ?>> ยกเลิก </option>
		</select>  
		คำค้นหา  :
		<input type="text"  name="keyword" class="key" value="<?php if($keyword != ""){ echo $keyword; } ?>" >
		<button type="submit" class="searchButton"> ค้นหา </button>
</div>
<?php echo form_close(); ?>	