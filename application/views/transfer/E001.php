<script type='text/javascript'>
$(function(){   
    $("#transfer_date").datepicker();  
    getdata(); 
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
            url: '<?php echo base_url().$controller; ?>/saveUpdate/',
            data: {form}, //your form datas to post          
            success: function(rs)
            {    
                $('.modal').modal('hide'); 
                alert("แก้ไขข้อมูล เรียบร้อยแล้ว !");
                location.reload(); 
            },
            error: function()
            {
                alert("เกิดข้อผิดพลาด");
            }
        });                   
    }
  });
}

function getdata(){ 
    $('#stock_code').keyup(function(){ 
        var stock_code= $(this).val();
        var stock_old= $('#stock_old').val();
        if(stock_code!=''){  
                $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/getstock_code/',
                    data: {"stock_code":stock_code,"stock_old":stock_old}, //your form datas to post  
                    dataType: 'json',        
                    success: function(rs)
                    {   
                        if(rs != false){ 
                            $.each(rs, function( index, value){  
                                $("#er_st_code").html("");
                                $("#er_cha_code").html("");
                                $("#id_stock").val(value.id_stock);
                                $("#stock_date").val(value.stock_date);
                                $("#chassis_number").val(value.chassis_number);
                                $("#engine_number").val(value.engine_number);
                                $("#mmodel_name").val(value.mmodel_name);
                                $("#gen_name").val(value.gen_name);
                                $("#color_name").val(value.color_name);
                                $("#zone_name").val(value.zone_name);
                                $("#recive_doc_date").val(value.recive_doc_date);
                                $("#doc_reference_code").val(value.doc_reference_code);
                            });
                       }else{ 
                            $("#er_st_code").html("ไม่พบข้อมูล"); 
                            $("#id_stock").val("");
                            $("#stock_date").val("");
                            $("#chassis_number").val("");
                            $("#engine_number").val("");
                            $("#mmodel_name").val("");
                            $("#gen_name").val("");
                            $("#color_name").val("");
                            $("#zone_name").val("");
                            $("#recive_doc_date").val("");
                            $("#doc_reference_code").val("");
                       }
                    },
                    error: function()
                    {
                        alert('ข้อมูลผิดพลาด ​​​!');
                        $("#er_st_code").html("");
                        $("#stock_code").val("");
                        $("#id_stock").val("");
                        $("#stock_date").val("");
                        $("#chassis_number").val("");
                        $("#engine_number").val("");
                        $("#mmodel_name").val("");
                        $("#gen_name").val("");
                        $("#color_name").val("");
                        $("#zone_name").val("");
                        $("#recive_doc_date").val("");
                        $("#doc_reference_code").val("");
                    }
                });                   
        }else{
            $("#stock_code").val("");
            $("#id_stock").val("");
            $("#stock_date").val("");
            $("#chassis_number").val("");
            $("#engine_number").val("");
            $("#mmodel_name").val("");
            $("#gen_name").val("");
            $("#color_name").val("");
            $("#zone_name").val("");
            $("#recive_doc_date").val("");
            $("#doc_reference_code").val("");
        }
    });
    $('#chassis_number').keyup(function(){ 
        var chassis_number= $(this).val();
        var chassis_old= $('#chassis_old').val();
        if(chassis_number!=''){  
                $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/getchassis_number/',
                    data: {"chassis_number":chassis_number,"chassis_old":chassis_old}, //your form datas to post  
                    dataType: 'json',        
                    success: function(rs)
                    {   
                        if(rs != false){ 
                            $.each(rs, function( index, value){  
                                $("#er_st_code").html("");
                                $("#er_cha_code").html("");
                                $("#stock_code").val(value.stock_code);
                                $("#id_stock").val(value.id_stock);
                                $("#stock_date").val(value.stock_date);
                                $("#chassis_number").val(value.chassis_number);
                                $("#engine_number").val(value.engine_number);
                                $("#mmodel_name").val(value.mmodel_name);
                                $("#gen_name").val(value.gen_name);
                                $("#color_name").val(value.color_name);
                                $("#zone_name").val(value.zone_name);
                                $("#recive_doc_date").val(value.recive_doc_date);
                                $("#doc_reference_code").val(value.doc_reference_code);
                            });
                       }else{ 
                            $("#er_cha_code").html("ไม่พบข้อมูล");
                            $("#stock_code").val("");
                            $("#id_stock").val("");
                            $("#stock_date").val(""); 
                            $("#engine_number").val("");
                            $("#mmodel_name").val("");
                            $("#gen_name").val("");
                            $("#color_name").val("");
                            $("#zone_name").val("");
                            $("#recive_doc_date").val("");
                            $("#doc_reference_code").val("");
                       }
                    },
                    error: function()
                    {
                        alert('ข้อมูลผิดพลาด ​​​!');
                        $("#er_st_code").html("");
                        $("#stock_code").val("");
                        $("#id_stock").val("");
                        $("#stock_date").val("");
                        $("#chassis_number").val("");
                        $("#engine_number").val("");
                        $("#mmodel_name").val("");
                        $("#gen_name").val("");
                        $("#color_name").val("");
                        $("#zone_name").val("");
                        $("#recive_doc_date").val("");
                        $("#doc_reference_code").val("");
                    }
                });                   
        }else{
            $("#stock_code").val("");
            $("#id_stock").val("");
            $("#stock_date").val("");
            $("#chassis_number").val("");
            $("#engine_number").val("");
            $("#mmodel_name").val("");
            $("#gen_name").val("");
            $("#color_name").val("");
            $("#zone_name").val("");
            $("#recive_doc_date").val("");
            $("#doc_reference_code").val("");
        }
    });
}
</script> 

<?php
foreach ($listtransfer as $detail)
{
?>
<div class="row form_input"> 
    <div class="col-md-3" >
        <p>เลขที่ใบโยกรถ</p>
        <input type="text" class="form-control" id="transfer_code" name="transfer_code" value="<?php echo $detail->transfer_code; ?>" readonly>
        <input type="hidden" name="id_transfer" value="<?php echo $detail->id_transfer; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>วันที่โยกรถ</p><p class="required">*</p> 
        <input type="text" class="form-control" id="transfer_date" name="transfer_date" value="<?php echo $detail->transfer_date; ?>" required>
    </div>
    <div class="col-md-3" >
        <p>สำนักงาน/สาขาเดิม</p>
        <input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $detail->mbranch_name_from; ?>" readonly>
    </div>
    <div class="col-md-3" >
        <p>สำนักงาน/สาขาที่โยกไป</p><p class="required">*</p> 
        <select name="id_mbranch_recive" class ="form-control" required>
            <?php
            foreach ($listMbranch as $Mbranch)
            { 
                if($Mbranch->id_mbranch != $id_mbranch){
                    if($detail->id_mbranch_recive==$Mbranch->id_mbranch){
                        echo "<option value='".$Mbranch->id_mbranch."' selected>".$Mbranch->mbranch_name."</option>";
                    }else{
                        echo "<option value='".$Mbranch->id_mbranch."'>".$Mbranch->mbranch_name."</option>";  
                    } 
                }
            } 
            ?>
        </select> 
    </div> 
    <div class="col-md-3" >
        <p>เลขที่รับเข้าสต๊อก <b ID="er_st_code"></b></p>
        <p class="required">*</p> 
        <input type="text" class="form-control" id="stock_code" name="stock_code" value="<?php echo $detail->stock_code; ?>"  required>
        <input type="hidden" id="id_stock" name="id_stock" value="<?php echo $detail->id_stock; ?>"  required>
        <input type="hidden" name="id_stock_old"  value="<?php echo $detail->id_stock; ?>"  required>
        <input type="hidden" name="stock_old" id="stock_old" value="<?php echo $detail->stock_code; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>วันที่รับเข้าสต๊อก</p>
        <input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $detail->stock_date; ?>" readonly>
    </div> 
    <div class="col-md-3" >
        <p>หมายเลขตัวถัง <b ID="er_cha_code"></b></p>
        <p class="required">*</p>
        <input type="text" class="form-control" id="chassis_number" name="chassis_number" value="<?php echo $detail->chassis_number; ?>" required>
        <input type="hidden" name="chassis_old" id="chassis_old" value="<?php echo $detail->chassis_number; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>หมายเลขเครื่อง</p><p class="required">*</p>
        <input type="text" class="form-control" id="engine_number" name="engine_number" value="<?php echo $detail->engine_number; ?>" readonly>
    </div> 
    <div class="col-md-3" >
        <p>แบบ</p><p class="required">*</p>
        <input type="text" class="form-control" id="mmodel_name" name="mmodel_name" value="<?php echo $detail->mmodel_name; ?>" readonly>
    </div>
    <div class="col-md-3" >
        <p>รุ่น</p><p class="required">*</p>
        <input type="text" class="form-control" id="gen_name" name="gen_name" value="<?php echo $detail->gen_name; ?>" readonly>
    </div>
    <div class="col-md-3" >
        <p>สี</p><p class="required">*</p>
        <input type="text" class="form-control" id="color_name" name="color_name" value="<?php echo $detail->color_name; ?>" readonly>
    </div> 
    <div class="col-md-3" >
        <p>โซนจัดเก็บ</p><p class="required">*</p>
        <input type="text" class="form-control" id="zone_name" name="zone_name" value="<?php echo $detail->zone_name; ?>" readonly>
    </div>
    <div class="col-md-3" >
        <p>วันที่รับจริง</p>
        <input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $detail->recive_doc_date; ?>" readonly>
    </div>
    <div class="col-md-3" >
        <p>เลขที่เอกสารอ้างอิง</p>
        <input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" value="<?php echo $detail->doc_reference_code; ?>" readonly>
    </div> 
</div>
<div class="row form_input"> 
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1" <?php if($detail->status=='1'){ echo "checked"; } ?> > โยกรถแล้ว
        <input type="radio"  name="status" value="2" disabled <?php if($detail->status=='2'){ echo "checked"; } ?> > รับเข้าแล้ว
        <input type="radio"  name="status" value="0" <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกโยกรถ  
    </div>
</div>
<div class="row form_input"> 
    <div class="col-md-12" >
        <p>หมายเหตุ</p>
        <textarea  class="form-control" rows='3' name="comment" ><?php  echo str_replace('<br>',"",$detail->comment); ?></textarea>
    </div> 
</div>
<div class="row form_input"> 
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
        <input type="text" class="form-control" name="name_update" value="<?php  echo $detail->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
    </div> 
 </div>
</div>
<?php  } ?>
