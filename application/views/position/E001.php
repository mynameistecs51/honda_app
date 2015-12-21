<script type='text/javascript'>
$(function(){
    $("#mposition_code").change(function(){
        $("#valid").html("");
        var code = $("#mposition_code").val(); 
        if(code != ""){
            $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/checkCode/',
                    data: {"code":code}, //your form datas to post          
                    success: function(rs)
                    {   
                        console.log(rs); 
                        if(rs==1){ 
                            $("#valid").html("รหัส :"+code+" มีการใช้งานอยู่แล้ว");
                            $("#mposition_code").val('');
                        }
                    }
                });      
            
        }else{
            $("#valid").html("");
        }
    });
	updateMpst();
});
 

function updateMpst()
  {
    $('#form').on('submit', function (e) { 
        if (e.isDefaultPrevented()) { 
          alert("ผิดพลาด : กรอกข้อมูลไม่ครบ!");
        } else {
          // everything looks good!
        e.preventDefault();
        var form= $('#form').serialize();
            $.ajax(
            {
                type: 'POST',
                url:  '<?php echo base_url().$controller; ?>/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {   
                    $('.modal').modal('hide'); 
                    location.reload();
                    alert("แก้ไขข้อมูล เรียบร้อยแล้ว !");
                },
                error: function()
                {
                    alert("เกิดข้อผิดพลาด");
                }
            });                   
        }
    });

}
</script>
<?php  foreach ($listMposition as $detail) { ?> 
<input type="hidden"  ID="idx" value="<?php echo $idx; ?>" >
<div class="row form_input">
    <div class="col-md-4" >
        <p>รหัส<?php echo $pagename; ?></p>
        <input type="text" class="form-control" name="mposition_code" id="mposition_code" value="<?php echo $detail->mposition_code;   ?>"  >
        <input type="hidden" name="id_mposition" value="<?php echo $detail->id_mposition; ?>"  >
    </div>
    <div class="col-md-4" >
        <p>ชื่อ<?php echo $pagename; ?></p>
        <input type="text" class="form-control" name="mposition_name" value="<?php echo $detail->mposition_name; ?>"   >
    </div>
    <div class="col-md-4" >
        <p>สำนักงาน/สาขา</p><p class="required">*</p> 
        <select name="id_mbranch" class ="form-control" required>
            <option value="">--เลือก--</option> 
            <?php 
            foreach($listMbranch as $Mbranch)
            {  
                if($Mbranch->id_mbranch==$detail->id_mbranch){
                    echo "<option value='".$Mbranch->id_mbranch."' selected>".$Mbranch->mbranch_name."</option>";
                }else{
                    echo "<option value='".$Mbranch->id_mbranch."' >".$Mbranch->mbranch_name."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" class="chk_stk" value="1"  <?php if($detail->status=='1'){ echo "checked=checked"; } ?>> ใช้งาน
        <input type="radio"  name="status" class="chk_stk" value="2"  <?php if($detail->status=='0'){ echo "checked=checked"; } ?>>  ยกเลิก   
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ </p>
        <textarea  class="form-control" rows='3' name="comment" ><?php echo str_replace('<br>',"",$detail->comment); ?></textarea>
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