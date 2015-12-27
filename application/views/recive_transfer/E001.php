<script type='text/javascript'>
$(function(){
    $("#stock_date").datepicker();
    $("#recive_doc_date").datepicker();   
	update();
    getdata();
});

function update()
  {
    $('#form').on('submit', function (e) {

        if (e.isDefaultPrevented()) { 
          alert("ผิดพลาด : กรอกข้อมูลไม่ครบ!");
        } else {
          // everything looks good!
        e.preventDefault();
        var form= $('#form').serialize();
        // var idx = $('#idx').val();
        // var name_en= $('#name_en').val();
        // var name_th= $('#name_th').val();
        // var comment= $('#comment').val(); 
        // var sta= $('.chk_stk:checked').val();
        // if(sta=='1'){ 
        // 	var status="ใช้งาน"; 
        // }else{ 
        // 	var status="ยกเลิก"; 
        // }
        
            $.ajax(
            {
                type: 'POST',
                url: '<?php echo base_url().$controller; ?>/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {   
                    $('.modal').modal('hide'); 
                    location.reload();
                    alert("แก้ไขข้อมูล เรียบร้อยแล้ว !");
                    // $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(1)').html(name_en);
                    // $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(2)').html(name_th);
                    // $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(3)').html(status);
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
    $('#transfer_code').keyup(function(){ 
        var transfer_code= $(this).val();
        var transfer_old=$("#transfer_old").val();
        if(transfer_code!=''){
                $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/gettransfer_code/',
                    data: {"transfer_code":transfer_code,"transfer_old":transfer_old}, //your form datas to post  
                    dataType: 'json',        
                    success: function(rs)
                    {   
                        if(rs != false){ 
                            $.each(rs, function( index, value){  
                                $("#er_tf_code").html("");
                                $("#er_cha_code").html("");
                                $("#id_transfer").val(value.id_transfer);
                                $("#transfer_date").val(value.transfer_date);
                                $("#branch_transfer").val(value.branch_transfer);
                                $("#chassis_number").val(value.chassis_number);
                                $("#engine_number").val(value.engine_number);
                                $("#mmodel_name").val(value.mmodel_name);
                                $("#gen_name").val(value.gen_name);
                                $("#color_name").val(value.color_name);   
                                $("#id_mmodel").val(value.id_mmodel);
                                $("#id_mgen").val(value.id_mgen);
                                $("#id_mcolor").val(value.id_mcolor);
                            });
                       }else{ 
                            $("#er_tf_code").html("ไม่พบข้อมูล");
                            $("#id_transfer").val("");
                            $("#transfer_date").val("");
                            $("#branch_transfer").val("");
                            $("#chassis_number").val("");
                            $("#engine_number").val("");
                            $("#mmodel_name").val("");
                            $("#gen_name").val("");
                            $("#color_name").val(""); 
                            $("#id_mmodel").val("");
                            $("#id_mgen").val("");
                            $("#id_mcolor").val(""); 
                       }
                    },
                    error: function()
                    {
                        alert('ข้อมูลผิดพลาด ​​​!');
                        $("#er_tf_code").html("");
                        $("#transfer_code").val("");
                        $("#id_transfer").val("");
                        $("#transfer_date").val("");
                        $("#branch_transfer").val("");
                        $("#chassis_number").val("");
                        $("#engine_number").val("");
                        $("#mmodel_name").val("");
                        $("#gen_name").val("");
                        $("#color_name").val(""); 
                        $("#id_mmodel").val("");
                        $("#id_mgen").val("");
                        $("#id_mcolor").val(""); 
                    }
                });                   
        }else{
            $("#transfer_code").val("");
            $("#id_transfer").val("");
            $("#transfer_date").val("");
            $("#branch_transfer").val("");
            $("#chassis_number").val("");
            $("#engine_number").val("");
            $("#mmodel_name").val("");
            $("#gen_name").val("");
            $("#color_name").val("");
            $("#id_mmodel").val("");
            $("#id_mgen").val("");
            $("#id_mcolor").val(""); 
        }
    });
    $('#chassis_number').keyup(function(){ 
        var chassis_number= $(this).val();
        var chassis_old= $("#chassis_old").val();
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
                                $("#transfer_code").val(value.transfer_code);
                                $("#id_transfer").val(value.id_transfer);
                                $("#transfer_date").val(value.transfer_date);
                                $("#branch_transfer").val(value.branch_transfer);
                                $("#engine_number").val(value.engine_number);
                                $("#mmodel_name").val(value.mmodel_name);
                                $("#gen_name").val(value.gen_name);
                                $("#color_name").val(value.color_name);
                                $("#id_mmodel").val(value.id_mmodel);
                                $("#id_mgen").val(value.id_mgen);
                                $("#id_mcolor").val(value.id_mcolor); 
                            });
                       }else{ 
                            $("#er_cha_code").html("ไม่พบข้อมูล");
                            $("#transfer_code").val("");
                            $("#id_transfer").val("");
                            $("#transfer_date").val(""); 
                            $("#branch_transfer").val("");
                            $("#engine_number").val("");
                            $("#mmodel_name").val("");
                            $("#gen_name").val("");
                            $("#color_name").val("");
                            $("#id_mmodel").val("");
                            $("#id_mgen").val("");
                            $("#id_mcolor").val(""); 
                       }
                    },
                    error: function()
                    {
                        alert('ข้อมูลผิดพลาด ​​​!');
                        $("#er_st_code").html("");
                        $("#transfer_code").val("");
                        $("#id_transfer").val("");
                        $("#transfer_date").val("");
                        $("#branch_transfer").val("");
                        $("#chassis_number").val("");
                        $("#engine_number").val("");
                        $("#mmodel_name").val("");
                        $("#gen_name").val("");
                        $("#color_name").val(""); 
                        $("#id_mmodel").val("");
                        $("#id_mgen").val("");
                        $("#id_mcolor").val(""); 
                    }
                });                   
        }else{
            $("#transfer_code").val("");
            $("#id_transfer").val("");
            $("#transfer_date").val("");
            $("#branch_transfer").val("");
            $("#chassis_number").val("");
            $("#engine_number").val("");
            $("#mmodel_name").val("");
            $("#gen_name").val("");
            $("#color_name").val(""); 
            $("#id_mmodel").val("");
            $("#id_mgen").val("");
            $("#id_mcolor").val(""); 
        }
    });
}
</script>
<?php  
foreach ($listStock as $detail) {
 ?> 
<div class="row form_input"> 
    <div class="col-md-3" >
        <p>เลขที่รับเข้าสต๊อก</p>
        <input type="text" class="form-control" name="stock_code" value="<?php echo $detail->stock_code; ?>"  readonly>
        <input type="hidden" id="id_stock" name="id_stock" value="<?php echo $detail->id_stock; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
        <input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $detail->stock_date; ?>" style="background:#fff;" readonly required>
    </div>
    <div class="col-md-3" >
        <p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
        <input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $detail->mbranch_name; ?>"  readonly>
    </div> 
    <div class="col-md-3" >
        <p>สาขาที่โยกมา</p>
        <input type="text" class="form-control" id="branch_transfer" name="branch_transfer" value="<?php echo $detail->branch_transfer; ?>" readonly>
    </div>
</div>
<div class="row form_input transfer"> 
    <div class="col-md-3" >
        <p>เลขที่ใบโยกรถ <b ID="er_tf_code"></b></p>
        <p class="required">*</p>
        <input type="text" class="form-control" id="transfer_code" name="transfer_code" value="<?php echo $detail->transfer_code; ?>" required>
        <input type="hidden" id="id_transfer" name="id_transfer" value="<?php echo $detail->id_transfer; ?>"  required>
        <input type="hidden" id="id_transfer_old" name="id_transfer_old" value="<?php echo $detail->id_transfer; ?>"  required>
        <input type="hidden" id="transfer_old" name="transfer_old" value="<?php echo $detail->transfer_code; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>วันที่โยกรถ</p>
        <input type="text" class="form-control" id="transfer_date" name="transfer_date" value="<?php echo $detail->transfer_date; ?>"   readonly>
    </div> 
    <div class="col-md-3" >
        <p>หมายเลขตัวถัง <b ID="er_cha_code"></b></p>
        <p class="required">*</p>
        <input type="text" class="form-control" id="chassis_number" name="chassis_number" value="<?php echo $detail->chassis_number; ?>"  required>
        <input type="hidden" id="chassis_old" name="chassis_old" value="<?php echo $detail->chassis_number; ?>"  required>
    </div>
    <div class="col-md-3" >
        <p>หมายเลขเครื่อง</p><p class="required">*</p>
        <input type="text" class="form-control" id="engine_number" name="engine_number"  value="<?php echo $detail->engine_number; ?>" readonly>
    </div> 
</div>
<div class="row form_input">  
    <div class="col-md-3" >
        <p>แบบ</p><p class="required">*</p>
        <input type="text" class="form-control" id="mmodel_name" name="mmodel_name"  value="<?php echo $detail->mmodel_name; ?>"  readonly>
        <input type="hidden" id="id_mmodel" name="id_mmodel" value="<?php echo $detail->id_mmodel; ?>"  >
    </div>
    <div class="col-md-3" >
        <p>รุ่น</p><p class="required">*</p>
        <input type="text" class="form-control" id="gen_name" name="gen_name"  value="<?php echo $detail->gen_name; ?>" readonly>
        <input type="hidden" id="id_mgen" name="id_mgen" value="<?php echo $detail->id_mgen; ?>"  >
    </div>
    <div class="col-md-3" >
        <p>สี</p><p class="required">*</p>
        <input type="text" class="form-control" id="color_name" name="color_name"  value="<?php echo $detail->color_name; ?>" readonly>
        <input type="hidden" id="id_mcolor" name="id_mcolor"  value="<?php echo $detail->id_mcolor; ?>" >
    </div> 
</div>
<div class="row form_input">  
    <div class="col-md-3" >
        <p>วันที่รับจริง</p><p class="required">*</p> 
        <input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $detail->recive_doc_date; ?>" style="background:#fff;" readonly required>
    </div> 
    <div class="col-md-3" >
        <p>โซนจัดเก็บ</p><p class="required">*</p>
        <select name="id_zone" class ="form-control" required>  
            <?php 
            foreach ($listMzone as $Mzone)
            { 
                if($Mzone->id_zone==$detail->id_zone){
                    echo "<option value='".$Mzone->id_zone."' selected>".$Mzone->zone_name."</option>";
                }else{
                    echo "<option value='".$Mzone->id_zone."'>".$Mzone->zone_name."</option>";
                }
            }
            ?>
        </select> 
    </div>
    <div class="col-md-3" >
        <p>เลขที่เอกสารอ้างอิง</p>
        <input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" value="<?php echo $detail->doc_reference_code; ?>" >
    </div> 
</div>
<div class="row form_input"> 
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1" <?php if($detail->status=='1'){ echo "checked"; } ?> > รับเข้าสต๊อก
        <input type="radio"  name="status" value="2" disabled <?php if($detail->status=='2'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3" disabled <?php if($detail->status=='3'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4" disabled <?php if($detail->status=='4'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="0" <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก  
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
<?php } ?> 