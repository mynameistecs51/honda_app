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
            //console.log()
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url(); ?>mdspse_cat/saveadd/',
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
	<p>รหัสสาเหตุการขายทิ้ง / จำหน่ายทิ้ง</p><p class="required">*</p>
	<input type="text" class="inputDate" name="mdspse_cat_code" placeholder="รหัสสาเหตุการขายทิ้ง / จำหน่ายทิ้ง" required>
	<p>ชื่อสาเหตุการขายทิ้ง / จำหน่ายทิ้ง(ENG)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_en" placeholder="ชื่อสาเหตุการขายทิ้ง / จำหน่ายทิ้ง(ENG)">
	<p>ชื่อสาเหตุการขายทิ้ง / จำหน่ายทิ้ง(TH)</p><p class="required">*</p>
	<input type="text" class="inputDate" name="name_th" placeholder="ชื่อสาเหตุการขายทิ้ง / จำหน่ายทิ้ง(TH)">
	<p>หมายเหตุ</p>
	<textarea  class="input" rows='5' name="comment"></textarea>
</div>