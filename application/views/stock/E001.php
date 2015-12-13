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
<?php  
// foreach ($listMbranch as $detail) {
 ?> 
<div class="row form_input"> 
    <div class="col-md-3" >
        <p>เลขที่รับเข้าสต๊อก</p>
        <input type="text" class="form-control" name="mposition_code" placeholder="--สร้างโดยระบบ--" readonly>
    </div>
    <div class="col-md-3" >
        <p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
        <input type="text" class="form-control" id="tstock_date" name="tstock_date" value="<?php echo $datenow; ?>" required>
    </div>
    <div class="col-md-3" >
        <p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
        <select name="id_mbranch" class ="form-control" required>
            <option value="">--เลือก--</option> 
            <option value="1" selected> อุดรธานี </option>
            <option value="2"> หนองบัวลำภู </option>
            <option value="3"> หนองคาย </option>
            <option value="3"> สว่างแดนดิน </option>
        </select> 
    </div>  
    <div class="col-md-3" >
        <p>แบบ</p><p class="required">*</p>
        <input type="text" class="form-control" id="plan" name="plan" required>
    </div>
    <div class="col-md-3" >
        <p>รุ่น</p><p class="required">*</p>
        <input type="text" class="form-control" id="plan" name="plan" required>
    </div>
    <div class="col-md-3" >
        <p>สี</p><p class="required">*</p>
        <input type="text" class="form-control" id="plan" name="plan" required>
    </div>
    <div class="col-md-3" >
        <p>หมายเลขตัวถัง</p><p class="required">*</p>
        <input type="text" class="form-control" id="plan" name="plan" required>
    </div>
    <div class="col-md-3" >
        <p>หมายเลขเครื่อง</p><p class="required">*</p>
        <input type="text" class="form-control" id="plan" name="plan" required>
    </div>
    <div class="col-md-3" >
        <p>วันที่รับจริง</p><p class="required">*</p> 
        <input type="text" class="form-control" id="treceived_date" name="treceived_date" value="<?php echo $datenow; ?>" required>
    </div> 
    <div class="col-md-3" >
        <p>เลขที่เอกสารอ้างอิง</p>
        <input type="text" class="form-control" id="plan" name="plan" >
    </div> 
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1"  <?php //if($detail->status=='1'){ echo "checked"; } ?>checked> รับเข้าสต๊อก
        <input type="radio"  name="status" value="2"  <?php //if($detail->status=='1'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3"  <?php //if($detail->status=='1'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4"  <?php //if($detail->status=='1'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="5"  <?php //if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ</p>
        <textarea  class="form-control" rows='3' name="comment"></textarea>
    </div> 
    <div class="col-md-3" >
        <p>ผู้สร้าง</p>
        <input type="text" class="form-control" name="name_create" value="<?php echo 'USER001'; //echo $detail->name_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่สร้าง</p>
        <input type="text" class="form-control" name="dt_create" value="<?php echo $datenow; //echo $detail->dt_create; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>ผู้แก้ไข</p>
        <input type="text" class="form-control" name="name_update" value="<?php echo "USER001"; //echo $detail->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php echo $datenow; //echo $detail->dt_update; ?>" disabled>
    </div> 
</div>
<?php //} ?> 