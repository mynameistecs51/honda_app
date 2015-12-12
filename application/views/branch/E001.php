<script type='text/javascript'>
$(function(){
	updateMpst();
});

function cancle() {
	if(confirm("ยกเลิกการดำเนินการ หรือไม่ ?"))
	{
		var base=$("#base_url").val();
		location = base+"/mpst";
	}
}

function updateMpst()
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
        var comment= $('#comment').val(); 
        var sta= $('.chk_stk:checked').val();
        if(sta=='1'){ 
        	var status="ใช้งาน"; 
        }else{ 
        	var status="ยกเลิก"; 
        }
        
            $.ajax(
            {
                type: 'POST',
                url: '<?php echo base_url(); ?>mpst/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {   
                    $('.modal').modal('hide'); 
                    location.reload();
                    alert("#แก้ไขข้อมูล เรียบร้อยแล้ว !");
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
<?php  foreach ($listMbranch as $detail) { ?> 
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="row form_input">
    <div class="col-md-4" >
        <p>รหัส<?php echo $pagename; ?></p>
        <input type="text" class="form-control" name="mbranch_code" value="<?php echo $detail->mbranch_code;   ?>" >
    </div>
    <div class="col-md-8" >
        <p>ชื่อ<?php echo $pagename; ?></p>
        <input type="text" class="form-control" name="mbranch_name" value="<?php echo $detail->mbranch_name; ?>"  >
    </div>
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1" <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
        <input type="radio"  name="status" value="2" <?php if($detail->status=='0'){ echo "checked=checked"; } ?>>  ยกเลิก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ </p>
        <textarea  class="form-control" rows='3' name="comment" readonly><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
    </div>
    <div class="col-md-3" >
        <p>ผู้สร้าง</p>
        <input type="text" class="form-control" name="name_create" value="<?php echo $detail->name_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่สร้าง</p>
        <input type="text" class="form-control" name="dt_create" value="<?php echo $detail->dt_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>ผู้แก้ไข</p>
        <input type="text" class="form-control" name="name_update" value="<?php echo $detail->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
    </div> 
        
 </div>
<?php } ?> 