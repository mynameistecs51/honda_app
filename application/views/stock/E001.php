<script type='text/javascript'>
$(function(){
    $("#stock_date").datepicker();
    $("#recive_doc_date").datepicker();  
    $("#chassis_number").change(function(){
        $("#valid").html("");
        var code = $("#chassis_number").val(); 
        if(code != ""){
            $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/checkchassis_number/',
                    data: {"chassis_number":code}, //your form datas to post          
                    success: function(rs)
                    {   
                        console.log(rs); 
                        if(rs==1){ 
                            $("#valid").html("รายการนี้ทำรับแล้ว");
                            $("#chassis_number").val('');
                        }
                    }
                });      
            
        }else{
            $("#valid").html("");
        }
    });     
	updateStock();
    getdata();
});

function updateStock()
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
                url: '<?php echo base_url().$controller; ?>/saveUpdate/',
                data: {form}, //your form datas to post          
                success: function(rs)
                {   
                    $('.modal').modal('hide'); 
                    location.reload(); 
                    alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
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
    $('#id_mmodel').change(function(){ 
        var id_mmodel= $(this).val();
        if(id_mmodel!=''){  
                $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/getMgen/',
                    data: {"id_mmodel":id_mmodel}, //your form datas to post  
                    dataType: 'json',        
                    success: function(rs)
                    {  
                        var res="<option >---เลือก---</option>";
                        $.each(rs, function( index, value){ 

                            res += "<option value="+value.id_gen+"> "+value.gen_name+"</option>";
                        });
                       $("#id_mgen").html(res);
                    },
                    error: function()
                    {
                        alert("#เกิดข้อผิดพลาด");
                    }
                });                   
        }else{
            var none="<option value=''>---เลือก---</option>";
            $("#id_mgen").html(none);
        }
    });
    $('#id_mgen').change(function(){ 
        var id_mgen= $(this).val();
        if(id_mgen!=''){  
                $.ajax(
                {
                    type: 'POST',
                    url: '<?php echo base_url().$controller; ?>/getMcolor/',
                    data: {"id_mgen":id_mgen}, //your form datas to post  
                    dataType: 'json',        
                    success: function(rs)
                    {  
                        var res="<option >---เลือก---</option>";
                        $.each(rs, function( index, value){ 

                            res += "<option value="+value.id_color+"> "+value.color_name+"</option>";
                        });
                       $("#id_mcolor").html(res);
                    },
                    error: function()
                    {
                        alert("#เกิดข้อผิดพลาด");
                    }
                });                   
        }else{
            var none="<option value=''>---เลือก---</option>";
            $("#id_mcolor").html(none);
        }
    });
}

</script>
<?php  foreach ($listStock as $detail) { ?> 
<div class="row form_input"> 
    <div class="col-md-3" >
        <p>เลขที่รับเข้าสต๊อก</p>
        <input type="text" class="form-control" name="stock_code"  value="<?php echo $detail->stock_code; ?>"   readonly>
        <input type="hidden" name="id_stock"  value="<?php echo $detail->id_stock; ?>"  >
    </div>
    <div class="col-md-3" >
        <p>วันที่รับเข้าสต๊อก</p><p class="required">*</p> 
        <input type="text" class="form-control" id="stock_date" name="stock_date" value="<?php echo $detail->stock_date; ?>" required>
    </div>
    <div class="col-md-3" >
        <p>สำนักงาน/สาขาที่รับ</p><p class="required">*</p>
        <input type="text" class="form-control" id="mbranch_name" name="mbranch_name" value="<?php echo $detail->mbranch_name; ?>"  readonly>
    </div>  
    <div class="col-md-3" >
        <p>โซนจัดเก็บ</p><p class="required">*</p>
        <select name="id_zone" class ="form-control" required>
            <?php 
            foreach ($listMzone as $Mzone)
            { 
                if($detail->id_zone==$Mzone->id_zone){
                    echo "<option value='".$Mzone->id_zone."' selected>".$Mzone->zone_name."</option>";
                }else{
                    echo "<option value='".$Mzone->id_zone."'>".$Mzone->zone_name."</option>";
                }
            }
            ?>
        </select> 
    </div>
</div>
<div class="row form_input"> 
    <div class="col-md-3" >
        <p>หมายเลขตัวถัง</p><p class="required">*</p>
        <input type="text" class="form-control" id="chassis_number" name="chassis_number"  value="<?php echo $detail->chassis_number; ?>"  readonly>
    </div>
    <div class="col-md-3" >
        <p>หมายเลขเครื่อง</p><p class="required">*</p>
        <input type="text" class="form-control" id="engine_number" name="engine_number" value="<?php echo $detail->engine_number; ?>" required>
    </div> 
    <div class="col-md-3" > 
        <p>แบบ</p><p class="required">*</p>
        <select name="id_mmodel" id="id_mmodel" class ="form-control" required> 
            <?php 
            foreach ($listMmodel as $Mmodel)
            {   if($detail->id_mmodel==$Mmodel->id_model){
                    echo "<option value='".$Mmodel->id_model."' selected>".$Mmodel->mmodel_name."</option>";
                }else{
                    echo "<option value='".$Mmodel->id_model."'>".$Mmodel->mmodel_name."</option>";
                }
            }?> 
        </select>
    </div>
    <div class="col-md-3" >
        <p>รุ่น</p><p class="required">*</p>
        <select name="id_mgen" id="id_mgen" class ="form-control" required> 
            <?php echo "<option value='".$detail->id_mgen."' selected>".$detail->gen_name."</option>"; ?>
        </select>
    </div>
    <div class="col-md-3" >
        <p>สี</p><p class="required">*</p>
        <select name="id_mcolor" id="id_mcolor" class ="form-control" required> 
            <?php echo "<option value='".$detail->id_mcolor."' selected>".$detail->color_name."</option>"; ?>
        </select>
    </div> 
    <div class="col-md-3" >
        <p>วันที่รับจริง</p><p class="required">*</p> 
        <input type="text" class="form-control" id="recive_doc_date" name="recive_doc_date" value="<?php echo $detail->recive_doc_date; ?>" required>
    </div> 
    <div class="col-md-6" >
        <p>เลขที่เอกสารอ้างอิง</p>
        <input type="text" class="form-control" id="doc_reference_code" name="doc_reference_code" value="<?php echo $detail->doc_reference_code; ?>" >
    </div> 
    <div class="col-md-12" style="text-align:left;">
        <p>สถานะ</p> 
        <input type="radio"  name="status" value="1"          <?php if($detail->status=='1'){ echo "checked"; } ?> > รับเข้าสต๊อก
        <input type="radio"  name="status" value="2" disabled <?php if($detail->status=='2'){ echo "checked"; } ?> > จองแล้ว
        <input type="radio"  name="status" value="3" disabled <?php if($detail->status=='3'){ echo "checked"; } ?> > จำหน่ายแล้ว
        <input type="radio"  name="status" value="4" disabled <?php if($detail->status=='4'){ echo "checked"; } ?> > โอนไปสาขาอื่น
        <input type="radio"  name="status" value="0"          <?php if($detail->status=='0'){ echo "checked"; } ?> > ยกเลิกรับเข้าสต๊อก  
    </div>
    <div class="col-md-12" >
        <p>หมายเหตุ</p>
        <textarea  class="form-control" rows='3' name="comment"  ><?php  echo str_replace('<br>',"",$detail->comment); ?></textarea>
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
        <input type="text" class="form-control" name="name_update" value="<?php  echo $detail->name_update; ?>" disabled>
    </div>
    <div class="col-md-3" >
        <p>วันที่แก้ไข</p>
        <input type="text" class="form-control" name="dt_update" value="<?php echo $detail->dt_update; ?>" disabled>
    </div> 
</div>
<?php } ?> 