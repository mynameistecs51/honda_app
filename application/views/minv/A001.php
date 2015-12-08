<script type='text/javascript'>
$(function(){  
	saveData();
 });

function saveData()
      {
         $('#form').on('submit', function (e) {
            if (e.isDefaultPrevented()) {
              alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
            e.preventDefault();
            var form = $('#form').serialize();
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url(); ?>minv/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                   $('.modal').modal('hide');
	                   location.reload();
	                   alert("#บันทึกข้อมูล เรียบร้อย !");
	                },
	                error: function()
	                {
	                    alert("#เกิดข้อผิดพลาด");
	                }
	            });                   
            }
          });
      }
</script>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<div class="form_input">  
	<p>รหัสรายการสินค้า/อะไหล่</p><p class="required">*</p>
	<input type="text" class="inputDate" name="minv_code" placeholder="รหัสรายการสินค้า/อะไหล่" required>
	<p>ประเภทสินค้า/อะไหล่</p><p class="required">*</p>
		<select name="id_minv_cat" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMinv_cat as $minv_cat)
			{ 
				echo "<option value='".$minv_cat->id_minv_cat."'>".$minv_cat->name_th."</option>";
			}
			?>
		</select>
	<p>หน่วยนับสินค้า</p><p class="required">*</p>
		<select name="id_minv_unt" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMinv_unt as $minv_unt)
			{ 
				echo "<option value='".$minv_unt->id_minv_unt."'>".$minv_unt->name_th."</option>";
			}
			?>
		</select>
	<p>บริษัทเจ้าของสินค้า</p><p class="required">*</p>
		<select name="id_mcmp" class ="select" required>
			<option value="">--เลือก--</option> 
			<?php 
			foreach ($listMcmp as $mcmp)
			{ 
				echo "<option value='".$mcmp->id_mcmp."'>".$mcmp->name_th."</option>";
			}
			?>
		</select>
	<p>ชื่อรายการสินค้า/อะไหล่(ENG)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_en" placeholder="ชื่อรายการสินค้า/อะไหล่(ENG)">
	<p>ชื่อรายการสินค้า/อะไหล่(TH)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_th" placeholder="ชื่อรายการสินค้า/อะไหล่(TH)">
	<p>Brand</p><p class="required">*</p>
	<input type="text" class="inputDate" name="brand" placeholder="Brand">
	<p>Rated Power</p><p class="required">*</p>
	<input type="text" class="inputDate" name="rated_power" placeholder="Rated Power">
	<p>รูปรายการสินค้า/อะไหล่</p>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<p><input name="image_part" type="file" id="image_part" size="40"  multiple="multiple" /></p>
		<?php
			if (isset($_FILES['upfile']['name'])) {
				$count=count($_FILES['upfile']['name']);
				for ($i=0; $i<$count;  $i++){ 
					$name=$_FILES['upfile']['name'][$i];
					$tem=$_FILES['upfile']['tem_name'][$i];
					move_uploaded_file($tem, 'images/'.$name);
			}
			}
		?>
	</form>
	<p>หมายเหตุ</p>
	<textarea  class="input" rows='5' name="comment"></textarea>
</div>