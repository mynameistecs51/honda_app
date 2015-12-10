<?php
   echo $header;
?>
<script type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo $base_url; ?>images/loader.gif";
$(document).ready(function(){

check_box_all();
cb_mmenu_lv1();
cb_mmenu_lv2();
//cb_mmenu_lv3();

$("#username").change(function() { 
var usr = $("#username").val();
if(usr.length >= 4)
{
$("#status").html('<img src="<?php echo base_url(); ?>images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
    $.ajax({  
    type: "POST",  
    url: "check.php",  
    data: "username="+ usr,  
    success: function(msg){  
   $("#status").ajaxComplete(function(event, request, settings){ 
	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   });
 } 
  }); 
}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}
});

/***********CLICK SELECT CHECKBOX ALL *************/
function check_box_all(){
        $('input[id="cb_all"]').bind('click', function(){
            var cb_status = $(this).is(':checked');
            $('input[type="checkbox"]').prop('checked',cb_status);
        });
      }

function cb_mmenu_lv1()
{
  $('input[class="cb1lv"]').bind('click', function(){
    var cb_id = $(this).attr("id");
    var cb_status = $(this).is(':checked');
    $('input[type="checkbox"].pr'+cb_id).prop('checked',cb_status); 
  });
}

function cb_mmenu_lv2()
{ 
    $('input[type="checkbox"].cb2lv').bind('click', function(){       
      var cb_id = $(this).attr("id");
      var cb_idarr = cb_id.split('_',2);
      var cb_idmmenu = cb_idarr[1]; 
      var cb_status = $(this).is(':checked');  
      $('input[type="checkbox"].'+cb_id).prop('checked',cb_status); 
      if($('input[type="checkbox"].cb2lv.pr'+cb_idmmenu+':checked').length>0){
        $('input[type="checkbox"]#'+cb_idmmenu).prop('checked',true);
      }else{
        $('input[type="checkbox"]#'+cb_idmmenu).prop('checked',false);
      }  
    });

    $('input[type="checkbox"].sub').bind('click', function(){       
      var cb_id = $(this).attr("id"); 
      var cb_idarr = cb_id.split('_',4);
      var id = cb_idarr[1]+'_'+cb_idarr[2]+'_'+cb_idarr[3];   
      if($('input[type="checkbox"].sub.'+id+':checked').length>0){
        $('input[type="checkbox"]#'+id).prop('checked',true);
      }else{
        $('input[type="checkbox"]#'+id).prop('checked',false);
      }   
    });
}

});

function validationConfirm()
{
     if(confirm("ยืนยันการบันทึกข้อมูล !"))
      {
         return true;
      }
      else{
            return false;
          }
}
</script>
<div class='col-sm-12'>
<br/>
<div class="nev_url"><?php echo $NAV; ?> </div>
</div>
<br>
<div class="form_input"> 
<div style="font-size:12px; margin-top:30px; margin-left:-4%;  text-align:left; width:670px;">
  <form action="<?php echo base_url().$controller; ?>/select" method="post" name="form1">
       เลือกกลุ่มผู้ใช้งาน :  
       <select id="id_mposition" name="id_mposition" class="select" onchange="this.form.submit()" style="height:40px;">
         <option value="" >----เลือก----</option>
         <?php foreach ($listmposition as $rows)
         { 
            if($rows->id_mposition==$select){
                  echo "<option value='".$rows->id_mposition."' selected>".$rows->mposition_name."</option>";
            }else {
                   echo "<option value='".$rows->id_mposition."' >".$rows->mposition_name."</option>";
            }
         }
         ?>
                                           
        </select>  
  </form>
  </div>
<?php 
   if($select==0)
   {
         echo "<div style='display: none;'>";
   }else
   {
         echo "<div >";
   }
?>

<form action="<?php echo base_url().$controller; ?>/update" method="post" name="form2" >
<input type="hidden"  class="txt_disabled" name="id_mposition" id="id_mposition" readonly="true" value="<?php echo $select ;  ?>" > 
<input type="hidden"  class="txt_disabled" name="id_mmember" id="id_mmember" readonly="true" value="<?php echo $id_mmember;  ?>" >
<div style="font-size:12px; margin-top:20px; text-align:left; ">
<div style="font-size:12px; margin-left:24%; margin-top:-10px; margin-bottom:15px; text-align:left; font-weight:bold;">
<input type="checkbox" name="cb_all" id="cb_all" class="cb_all"  > เลือก/ไม่เลือก ทั้งหมด
</div>
      <?php 
         foreach ($lavle1 as $row1)
          {
            if ($row1->status=='1')
            { 
              $check= "checked='checked'";
            }
            else
            {
              $check= "";
            }
              echo  "<br><div style='margin-left:24%; margin-top:-10px;'><input type='checkbox' id='".$row1->id_mmenu."' class='cb1lv'  ".$check."   name='status[".$row1->id_cusersetting."]'  value='1'> ".$row1->mmenu_name." </div>"; 
              echo "<input type='hidden' name='id_cusersetting[]' value='".$row1->id_cusersetting."' >";
              echo  "<table  style='margin-left:27%; color:#0000FF;'><tr>";
               foreach ($lavle2 as $rs)
              {   
                
                if ($rs->id_parent==$row1->id_mmenu)
                {  
                  $set_id=$rs->id_mmenu."_".$rs->id_parent."_".$rs->id_order;

                  if ($rs->status=='1'){$ck_status= "checked='checked'";}else{$ck_status= "";} 
                  if ($rs->can_view=='1'){$ck_can_view= "checked='checked'";}else{$ck_can_view= "";} 
                  if ($rs->can_create=='1'){$ck_can_create= "checked='checked'";}else{$ck_can_create= "";} 
                  if ($rs->can_edit=='1'){$ck_can_edit= "checked='checked'";}else{$ck_can_edit= "";} 
                  if ($rs->can_print=='1'){$ck_can_print= "checked='checked'";}else{$ck_can_print= "";} 
                    $lv2  ="<tr>"; 
                  if ($rs->id_parent!=5){
                    $lv2 .="<td width='200px;'><input type='hidden' name='id_cusersetting[]' value='".$rs->id_cusersetting."' >";
                    $lv2 .="<input type='checkbox' id='".$set_id."' class='cb2lv pr".$row1->id_mmenu."' ".$ck_status."  name='status[".$rs->id_cusersetting."]'  value='1'> ".$rs->mmenu_name."</td>";
                    $lv2 .="<td width='120px;'><input type='checkbox' ID='1_".$set_id."' class='pr".$row1->id_mmenu." sub ".$set_id."' name='can_view[".$rs->id_cusersetting."]' ".$ck_can_view." > ดูรายละเอียด</td>";
                    $lv2 .="<td width='120px;'><input type='checkbox' ID='2_".$set_id."' class='pr".$row1->id_mmenu." sub ".$set_id."' name='can_create[".$rs->id_cusersetting."]' ".$ck_can_create." > เพิ่มรายการ </td>";
                    $lv2 .="<td width='120px;'><input type='hidden' ID='3_".$set_id."' class='pr".$row1->id_mmenu." sub ".$set_id."' name='can_edit[".$rs->id_cusersetting."]'   ".$ck_can_edit." ></td>";
                    $lv2 .="<td width='120px;'><input type='checkbox' ID='4_".$set_id."' class='pr".$row1->id_mmenu." sub ".$set_id."' name='can_print[".$rs->id_cusersetting."]' ".$ck_can_print." > พิมพ์</td>"; 
                  }else{
                    $lv2 .="<td width='200px;'><input type='hidden' name='id_cusersetting[]' value='".$rs->id_cusersetting."' >";
                    $lv2 .="<input type='checkbox' id='".$set_id."' class='cb2lv pr".$row1->id_mmenu."' ".$ck_status."  name='status[".$rs->id_cusersetting."]'  value='1'> ".$rs->mmenu_name."</td>";
                    $lv2 .="<td width='120px;' calspan='4' ><input type='checkbox' ID='4_".$set_id."' class='pr".$row1->id_mmenu." sub ".$set_id."' name='can_print[".$rs->id_cusersetting."]' ".$ck_can_print." > ออกรายงาน</td>"; 
                  }
                    
                    $lv2 .="</tr> "; 
                    echo  $lv2; 
                }  
             } 
             echo "</table>"; 
          }
          ?>
<div style="font-size:12px; margin-top:30px; margin-left:40%;  text-align:left; "> 
<button type="submit" id="save" class="btn btn-modal" onclick="return validationConfirm()"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>
<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ค่าเริ่มต้น</span></button>
</form>
</div>
</div>
</div>
<?php
 echo $footer;
?>