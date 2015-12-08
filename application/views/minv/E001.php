<script type='text/javascript'>
$(function(){
	updateMinv();
});

function cancle() {
	if(confirm("ยกเลิกการดำเนินการ หรือไม่ ?"))
	{
		var base=$("#base_url").val();
		location = base+"/minv";
	}
}
function updateMinv()
  {
    $('#form').on('submit', function (e) {

        if (e.isDefaultPrevented()) { 
          alert("ผิดพลาด : กรอกข้อมูลไม่ครบ!");
        } else {
          // everything looks good!
        e.preventDefault();
        var form= $('#form').serialize();
        var idx = $('#idx').val();
        var name_en= $('#name_en').val();   
        var name_th= $('#name_th').val(); 
        var sta= $('.chk_stk:checked').val();
        if(sta=='1'){ 
        	var status="ใช้งาน"; 
        }else{ 
        	var status="ยกเลิก"; 
        }
        var comment= $('#comment').val(); 
            $.ajax(
            {
                type: 'POST',
                url: '<?php echo base_url(); ?>minv/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
	            	 $('.modal').modal('hide'); 
	                alert("#แก้ไขข้อมูล เรียบร้อยแล้ว !");
	                location.reload();
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name_en); 
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(name_th);
                   $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(status);
                   $('.modal').modal('hide');
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
<?php  foreach ($listMinv as $detail) { ?>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="form_input">
	<p>รหัสรายการสินค้า/อะไหล่</p>
	<input type="text" class="input" name="minv_code" value="<?php echo $detail->minv_code;   ?>" readonly>
	<input type="hidden" class="input" name="id_minv" value="<?php echo $detail->id_minv;   ?>" >
	<p>ประเภทสินค้า/อะไหล่</p>
	<select name="id_minv_cat" class ="select" required>
	<option value="">--เลือก--</option> 
	<?php 
		foreach ($listMinv_cat as $minv_cat) 
		{
				$m= "<option value='".$minv_cat->id_minv_cat."' ";
				if($detail->id_minv_cat==$minv_cat->id_minv_cat){
					$m .= "selected";
				}
				$m .=">".$minv_cat->name_th."</option>";
				echo $m;
		}
	?>		
	</select>
	<p>หน่วยนับสินค้า</p>
	<select name="id_minv_unt" class ="select" required>
	<option value="">--เลือก--</option> 
	<?php 
		foreach ($listMinv_unt as $minv_unt) 
		{
				$m= "<option value='".$minv_unt->id_minv_unt."' ";
				if($detail->id_minv_unt==$minv_unt->id_minv_unt){
					$m .= "selected";
				}
				$m .=">".$minv_unt->name_th."</option>";
				echo $m;
		}
	?>		
	</select>
	<p>บริษัทเจ้าของสินค้า</p>
	<select name="id_mcmp" class ="select" required>
	<option value="">--เลือก--</option> 
	<?php 
		foreach ($listMcmp as $mcmp) 
		{
				$m= "<option value='".$mcmp->id_mcmp."' ";
				if($detail->id_mcmp==$mcmp->id_mcmp){
					$m .= "selected";
				}
				$m .=">".$mcmp->name_th."</option>";
				echo $m;
		}
	?>		
	</select>
	<p>ชื่อรายการสินค้า/อะไหล่(ENG)</p>
	<input type="text" class="input" name="name_en" value="<?php echo $detail->name_en; ?>" >
	<p>ชื่อรายการสินค้า/อะไหล่(TH)</p>
	<input type="text" class="input" name="name_th" value="<?php echo $detail->name_th;   ?>" >
	<p>Brand</p>
	<input type="text" class="input" name="brand" value="<?php echo $detail->brand; ?>" >
	<p>Rated Power</p>
	<input type="text" class="input" name="rated_power" value="<?php echo $detail->rated_power;   ?>" >
	<p>หมายเหตุ </p>
	<textarea  class="input" rows='5' name="comment" ID="comment" ><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
	<p>สถานะ</p>
	<div class="status" >
		<input type="radio" name="status"  class="chk_stk" value="1" <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
		<input type="radio"  name="status" class="chk_stk" value="0" <?php if($detail->status=='0'){ echo "checked=checked"; } ?>> ยกเลิก
	</div>
	<p>ผู้สร้าง</p>
	<input type="text" class="input" name="name_create" value="<?php echo $detail->name_create; ?>" readonly>
	<p>วันที่สร้าง</p>
	<input type="text" class="input" name="dt_create" value="<?php echo $detail->dt_create; ?>" readonly>
	<p>ผู้แก้ไข</p>
	<input type="text" class="input" name="name_update" value="<?php echo $detail->name_update; ?>" readonly>
	<p>วันที่แก้ไข</p>
	<input type="text" class="input" name="dt_update" value="<?php echo $detail->dt_update; ?>" readonly>
</div>
<?php } ?> 