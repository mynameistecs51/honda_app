<script type='text/javascript'>
$(function(){
	updateMdept();
});

function cancle() {
	if(confirm("ยกเลิกการดำเนินการ หรือไม่ ?"))
	{
		var base=$("#base_url").val();
		location = base+"/mdept";
	}
}
function updateMdept()
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
                url: '<?php echo base_url(); ?>mdept/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {    
                    $('.modal').modal('hide'); 
                    alert("#แก้ไขข้อมูล เรียบร้อยแล้ว !");
                    location.reload();
                    $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name_en); 
                    $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(name_th);
                    $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(status);
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
<?php  foreach ($listMdept as $detail) { ?>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="form_input">
	<p>รหัสหน่วยงาน</p>
	<input type="text" class="input" name="mdept_code" value="<?php echo $detail->mdept_code;   ?>" readonly>
	<input type="hidden" class="input" name="id_mdept" value="<?php echo $detail->id_mdept;   ?>" >
	<p>ชื่อหน่วยงาน(ENG)</p>
	<input type="text" class="input" name="name_en" ID="name_en" value="<?php echo $detail->name_en; ?>" >
	<p>ชื่อหน่วยงาน(TH)</p>
	<input type="text" class="input" name="name_th" ID="name_th" value="<?php echo $detail->name_th;   ?>" >
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