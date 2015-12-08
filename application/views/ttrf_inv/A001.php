<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<script type='text/javascript'>
$(function(){  
    $('.selectpicker').selectpicker('refresh');
    $( "#docdate,#td_ttrf_dtl1_1,#td_ttrf_dtl1_2,#td_ttrf_dtl2_1,#td_ttrf_dtl3_1" ).datetimepicker(); 
	click_control(); 
	saveData(); 
 });


function click_control()
{
  $('.addtr').on('click', function(){   
    var id=$(this).data('addlist');
    var idx=$(this).closest('tr').index();
    var sub = $('#tbTtrfInv tbody tr.'+id).length+1;
    var num= $('#tbTreqInv tbody tr:eq('+idx+')').find('td:eq(0)').html();
    var code= $('#tbTreqInv tbody tr:eq('+idx+')').find('td:eq(1)').html();
    var name= $('#tbTreqInv tbody tr:eq('+idx+')').find('td:eq(2)').html();
    var unit= $('#tbTreqInv tbody tr:eq('+idx+')').find('td:eq(4)').html();
    var number = num+'.'+sub;
    var set = num+'_'+sub;
    var data = [code,name,unit];
    add_tr(id,number,data,set);
  });

  $('.deltr').on('click', function(){
    
    if($('input[type="checkbox"].cbtr:checkbox:checked').length>0){
      if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) { 
        if($('input[type="checkbox"].cbtr').is(':checked'))
        {
          $('input[type="checkbox"].cbtr:checkbox:checked').parents('#tbTtrfInv tbody tr').remove();
        }  
      }
    }else{
        alert("คุณไม่ได้เลือกรายการ");
    }
  });

  $('#chkall').on('click', function(){
    if($('input[type="checkbox"]#chkall').is(':checked')){
        $('input[type="checkbox"].cbtr').prop(':checked',true);
    }else{
        $('input[type="checkbox"].cbtr').prop(':checked',false);
    }
  });

}
 

function add_tr(id,number,data,set)
{
  var trhtml ='<tr class="'+id+'">';
      trhtml +='<td><input type="checkbox" class="cbtr"></td>';
      trhtml +='<td>'+number+'</td>';
      trhtml +='<td>';
      trhtml +='<div style="width:30%;float:left"><input type="text" name="part[]" value="PPPPP" class="form-control"></div>';
      trhtml +='<b style="padding-top:0px;font-size:20px;float:left"> - </b>';
      trhtml +='<div style="width:39%;float:left"><input type="text" name="serial[]" value="SSYYLXXX" class="form-control"></div>';
      trhtml +='<b style="padding-top:0px;font-size:20px;float:left"> - </b>';
      trhtml +='<div style="width:25%;float:right"><input type="text" name="version[]" value="VVVV" class="form-control"></div> ';
      trhtml +='</td>';
      trhtml +='<td>'+data[0]+'</td>';
      trhtml +='<td>'+data[1]+'</td>';
      trhtml +='<td>'+data[2]+'</td>';
      trhtml +='<td>';
      trhtml +='<div class="input-group" style="z-index:8  !important;">';
      trhtml +='<input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl'+set+'" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>';
      trhtml +='</div></td>';
      trhtml +='<td><textarea class="form-control" rows="1"></textarea></td>';
      trhtml +='</tr>';
   $('#tbTtrfInv tbody tr.'+id+':last').after(trhtml); 
   $('#td_ttrf_dtl'+set+'').datetimepicker();
   $('.selectpicker').selectpicker('refresh');
}
 
          
         

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
	                url: '<?php echo base_url(); ?>ctl_memp/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                   $('.modal').modal('hide');
	                   location.reload();
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
<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบเบิกอะไหล่</p>
    <div class="form-group">
     <input type="text" name="" value="TQ58070003" readonly="true" class="form-control">   
    </div>   
  </div> 
  <div class="col-md-3" style="text-align:left;">
      <p>วันที่เบิก</p>
      <div class="input-group" style="z-index:8  !important;">
        <input type="text" name="docdate" id="docdate-" value="01/07/2558 10:20" class="form-control " readonly="true"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
      </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
      <p>แผนกที่เบิก</p>
      <div class="form-group">
      <input type="text" name="" value="Work Shop" readonly="true" class="form-control"> 
      </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
      <p>ผู้เบิก</p>
      <div class="form-group">
      <input type="text" name="" value="สิรวิชญ์ นาทันดอน" readonly="true" class="form-control"> 
      </div> 
  </div>
</div>
<div class="row form_input">
  <div class="col-md-6" style="text-align:left;"> 
    <p>ประเภทงาน</p>
      <div class="form-group">
       <select id="" name="" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true" >
          <option style="font-size:12px;" value="" >----เลือก----</option>
          <option style="font-size:12px;" value="">ติดตั้ง</option> 
          <option style="font-size:12px;" value="" selected>ซ่อม</option> 
          <option style="font-size:12px;" value="">เคลม</option> 
        </select> 
      </div>   
  </div> 
  <div class="col-md-6" style="text-align:left;">
      <p>เลขที่ใบงาน</p> 
      <div class="form-group">
      <select name="sn" ID="selsn" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก" disabled="true" >
        <option style="font-size:12px;" value="" >----เลือก----</option>
        <option style="font-size:12px;" value="1" selected>TR1500001</option> 
        <option style="font-size:12px;" value="2">TR1500002</option> 
        <option style="font-size:12px;" value="insert" >-- + เพิ่ม --</option>
      </select>
      <div class="help-block with-errors"></div>
      </div>
  </div>
</div>
<div class="row form_input">
  <div class="col-md-3" style="text-align:left;">
    <p>เลขที่ใบ<?php echo "$pagename"?></p>
    <div class="form-group">
     <input type="text" name="" value="--สร้างโดยระบบ--"  class="form-control" style="background-color:#81BEF7;color:#FFFFFF;" readonly="true" >   
    </div> 
  </div>
  <div class="col-md-3" style="text-align:left;">
      <p>วันที่<?php echo "$pagename"?></p> 
        <div class="input-group" style="z-index:8  !important;">
        <input type="text" name="docdate" id="docdate" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
  </div>  
  <div class="col-md-3" style="text-align:left;">
    <p>แผนกที่<?php echo "$pagename"?></p>  
    <div class="form-group" >
      <input type="text" name="" value="คลังสินค้า" readonly="true" class="form-control"> 
    </div>
  </div>
  <div class="col-md-3" style="text-align:left;">
    <p>ชื่อผู้<?php echo "$pagename"?></p>
    <div class="form-group">
     <input type="text" name="" value="ดิษฐพงษ์ นิลนามะ"  readonly="true" class="form-control">   
    </div> 
  </div>
</div>

<div class="row form_input header_table" style="margin-top:20px;text-align:left;">
  <div class="col-md-12">
  <fieldset><legend>รายการที่ขอเบิก</legend>
  <div class="row form_input header_table" style="text-align:left;">
  <div class="col-md-12"> 
   <table class="table table-striped" id="tbTreqInv">
    <thead>
    <tr>
      <th width="30">ลำดับ</th> 
      <th width="200">Part No.</th>
      <th width="250">Part Name</th> 
      <th width="150">Model</th>
      <th width="150">Brand</th>    
      <th width="150">Product Type</th>   
      <th width="120">จำนวน</th>
      <th width="150">หน่วยนับ</th>
      <th width="150">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody> 
    <tr>
      <td>1</td>
      <td>PPPPP</td> 
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td>
      <td>2</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    <tr>
      <td>2</td>
      <td>PPPPP</td> 
      <td>MODEL-002</td>
      <td></td>
      <td></td>
      <td></td>
      <td>1</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    <tr>
      <td>3</td>
      <td>PPPPP</td> 
      <td>MODEL-003</td>
      <td></td>
      <td></td>
      <td></td>
      <td>1</td>   
      <td>กล่อง</td>
      <td>-</td>
    </tr>
    </tbody>
   </table> 
   </div>
   </div>
  </fieldset>
  </div>
</div>

<div class="row form_input" style="margin-top:10px;text-align:left;">
<div class="col-md-12">
<fieldset><legend>รายการที่จ่าย</legend> 
<div class="row form_input header_table" style="text-align:left;">
  <div class="col-md-12">
  <div  style="overflow-x:scroll;overflow-y: hidden; ">
  <table class="table table-striped" id="tb_claim"  style="table-layout: fixed;word-wrap: break-word;"> 
    <thead>
    <tr>
      <th width="60">ลำดับ</th>
      <th width="280">เลขที่ผลิตภัณฑ์</th>
      <th width="250">Part Name</th> 
      <th width="150">Model</th>
      <th width="150">Brand</th>    
      <th width="150">Product Type</th>   
      <th width="100">จำนวน</th>
      <th width="120">หน่วยนับ</th>
      <th width="200">วันที่จ่าย</th>
      <th width="150">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody> 
    <tr class="1">
      <td>1.1</td>
      <td> 
        <div style="width:30%;float:left">
          <input type="text" name="part[]" value="PPPPP" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
          <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
          <input type="text" name="version[]" value="VVVV" class="form-control">
        </div> 
      </td>
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>       
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl1_1" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1"></textarea></td> 
    </tr>
    <tr class="1">
      <td>1.2</td>
      <td>
      <div style="width:30%;float:left">
          <input type="text" name="part[]" value="PPPPP" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
          <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
          <input type="text" name="version[]" value="VVVV" class="form-control">
        </div> 
      </td> 
      <td>MODEL-001</td>
      <td></td>
      <td></td>
      <td></td> 
      <td></td>      
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl1_2" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1"></textarea></td> 
    </tr>
    <tr class="2">
      <td>2.1</td>
      <td>
      <div style="width:30%;float:left">
          <input type="text" name="part[]" value="PPPPP" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
          <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
          <input type="text" name="version[]" value="VVVV" class="form-control">
        </div> 
      </td>
      <td>MODEL-002</td> 
      <td></td>
      <td></td>
      <td></td> 
      <td></td>     
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl2_1" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1"></textarea></td> 
    </tr>
    <tr class="3">
      <td>3.1</td>
      <td>
      <div style="width:30%;float:left">
          <input type="text" name="part[]" value="PPPPP" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:39%;float:left">
          <input type="text" name="serial[]" value="SSYYLXXX" class="form-control">
        </div>
        <b style="padding-top:0px;font-size:20px;float:left"> - </b>
        <div style="width:25%;float:right">
          <input type="text" name="version[]" value="VVVV" class="form-control">
        </div> 
      </td> 
      <td>MODEL-003</td>
      <td></td>
      <td></td>
      <td></td> 
      <td></td>    
      <td>กล่อง</td>
      <td>
        <div class="input-group" style="z-index:8  !important;">
          <input type="text" name="td_ttrf_dtl" id="td_ttrf_dtl3_1" value="<?=$dateto?>" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div> 
      </td>
      <td><textarea class="form-control" rows="1"></textarea></td> 
    </tr>
    </tbody>
   </table> 
   </div>
   </div>
   </div>
</fieldset>
</div>
</div>

<div class="row form_input">
  <div class="col-md-12" style="text-align:left;">
    <p>หมายเหตุ</p>
    <div class="form-group">
      <textarea class="form-control"></textarea>
    </div>
  </div>
</div>