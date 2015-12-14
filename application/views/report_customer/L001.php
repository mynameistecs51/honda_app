<?php echo $header;?> 
<script type="text/javascript" language="javascript" charset="utf-8">
$(function(){
  $("#datefrom").datepicker({
      dateFormat: 'dd/mm/yy',
      yearRange: "+530:+550",
      changeMonth: true,
      changeYear: true, 
      monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'], 
      defaultDate: "+1w",
      onClose: function( selectedDate ) {
        $( "#dateto" ).datepicker( "option", "minDate", selectedDate );
      }
    });
  $("#dateto").datepicker({
      dateFormat: 'dd/mm/yy',
      yearRange: "+530:+550",
      changeMonth: true,
      changeYear: true, 
      monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
      defaultDate: "+1w",
      onClose: function( selectedDate ) {
        $( "#datefrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });   
add();
// rundatatable(); 
runmodaledit();
});
function rundatatable(){ 
    var dataTable = $('#employee-grid').DataTable({ 
        responsive: true,
        tableTools: {
                        "sRowSelect": "os",
                        "aButtons": [ "select_all", "select_none" ]
                    },
         "oLanguage": {
                        "sProcessing": "<img height='32' width='32' src='<?php echo base_url(); ?>images/ajax-loader.gif'>",
                        "sSearch": "<?php echo $sSearch="ค้นหาจากผลลัพธ์ :" ;?>",
                        "sInfo": "<?php echo $Showing="จำนวนข้อมูล";?> _START_ <?php echo $to="ถึง";?> _END_ <?php echo $total="จาก";?> _TOTAL_  <?php echo $total="รายการทั้งหมด";?>",
                        "sInfoFiltered": "(จากข้อมูลที่ค้นหาทั้งหมด _MAX_ รายการ)",
        "oPaginate": {
                        "sFirst": "<?php echo $sFirst="ไปหน้าแรก" ;?>",
                        "sLast": "<?php echo $sLast="ไปหน้าสุดท้าย" ;?>",
                        "sNext": "<?php echo $sNext="ถัดไป" ;?>",
                        "sPrevious": "<?php echo $sPrevious="ย้อนกลับ" ;?>"                      
                        }},
        "bLengthChange": false, 
        "iDisplayLength": 15,
        "order": [[ '0', "ASC" ]], 
        "processing": true,
        "serverSide": true,
        "ajax":{
            url :"<?php echo base_url().$controller; ?>/getList", // json datasource
            type: "post",  // method  , by default get            
            error: function(){  // error handling        
                $(".employee-grid-error").html("");
                $("#employee-grid tbody tr").remove();                            
                $("#employee-grid_processing").css("display","none");                            
            }
        },
        "aoColumns": [{ 
                      "sWidth": "15%", 
                      "mData": 'mbranch_code'
                    },{ 
                      "sWidth": "20%",
                      "mData":'mbranch_name'
                    },{
                      "sWidth": "10%",
                      "mData": null,
                      "mRender": function(data, type, full) { 
                        if(full['status']=='1'){ return "ใช้งาน"; }else{ return "ยกเลิก"; } 
                      }
                    }
                    }]
        } );
   }        

	
</script>
<div class='col-sm-12'>
  <br/>
  <div class="nev_url"><?php echo $NAV; ?> </div>
  <?php if($btn['add']==1){ echo "<div class='add' ID='add'>EXPORT TO EXCEL</div>"; }else{ echo "<div class='noneadd' title='ไม่ได้รับสิทธิ์การ EXPORT'>EXPORT TO EXCEL</div>";} ?>
  <div class="search">ค้นหา : 
      <select data-column="0" class="search-input-text">
        <option value="" selected>--เลือกสำนักงาน/สาขา--</option> 
        <option value="1" > อุดรธานี </option>
        <option value="2"> หนองบัวลำภู </option>
        <option value="3"> หนองคาย </option>
        <option value="3"> สว่างแดนดิน </option>
      </select>  
      <lable class="lable"> From :</lable><input type="text" data-column="5" ID="datefrom"  class="search-input-text" value="<?php echo $datefrom; ?>" > 
      <lable class="lable"> To :</lable><input type="text" data-column="6"  ID="dateto" class="search-input-text" value="<?php echo $dateto; ?>" > 
      <select data-column="2" class="search-input-text">
        <option style="font-size:12px;" value="" >----ทั้งหมด----</option>
        <option style="font-size:12px;" value="1" selected>จองแล้ว</option>  
        <option style="font-size:12px;" value="0">จำหน่ายแล้ว</option>  
        <option style="font-size:12px;" value="0">ยกเลิกการจอง</option> 
      </select>
  </div>
</div>

<div class='col-sm-12'> 
<div style="overflow-x:scroll;overflow-y: hidden;"> 
        <table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;" >
          <thead>        
            <tr>
              <th width="80px">หมายเลขลูกค้า</th>
              <th width="120px">ชื่อ - สกุล(ภาษาไทย)</th>
              <th width="90px">ลูกค้า</th>
              <th width="80px">ประเภท</th>
              <th width="90px">เบอร์โทร</th>
              <th width="120px">ที่ปรึกษาด้านการขาย</th>
              <th width="90px">ประเภทรถที่สนใจ</th>
              <th width="90px">รุ่นรถ</th>
              <th width="90px">สี</th>
              <th width="150px">ที่อยู่</th>
              <th width="90px;">หมายเหตุ</th>
              <th width="90px;">ดำเนินการ</th>
            </tr>
          </thead>
          <tbody>
            <tr >
              <td>CTM001</td> <!--CTM = customer -->
              <td>นายไชวัฒน์ หอมแสง</td>
              <td>ลูกค้าใหม่</td>
              <td>บุคคล</td>
              <td>0812345678</td>
              <td>UDT001</td>
              <td>HONDA City</td>
              <td>SV+ CVT</td>
              <td>สีน้ำเงิน</td>
              <td>64 ถ.ทหาร ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000</td>
              <td></td>
              <td>
                <img src="http://localhost/utsgs/images/list_view.png" title="รายละเอียด" class="btnopt view" data-idview="2">
                <img src="http://localhost/utsgs/images/list_edit.png" title="แก้ไข" class="btnopt edit" data-idedit="2"> 
              </td>
            </tr>
            <tr >
              <td>CTM002</td> <!--CTM = customer -->
              <td>นายดิษฐพงษ์ นิลนามะ</td>
              <td>ลูกค้าใหม่</td>
              <td>บุคคล</td>
              <td>0812345678</td>
              <td>UDT001</td>
              <td>HONDA JAZZ</td>
              <td>SV+ CVT</td>
              <td>สีน้ำเงิน</td>
              <td> 64 ถ.ทหาร ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000</td>
              <td></td>             
              <td>
                <img src="http://localhost/utsgs/images/list_view.png" title="รายละเอียด" class="btnopt view" data-idview="2">
                <img src="http://localhost/utsgs/images/list_edit.png" title="แก้ไข" class="btnopt edit" data-idedit="2"> 
              </td>
            </tr>
          </tbody> 
        </table>
      </div>
    </div> 
    <div class='col-sm-6' style="text-align:left;font-size:14px;">จำนวนข้อมูล 1 ถึง 2 จาก 2 รายการทั้งหมด</div>
    <div class='col-sm-6' style="text-align:right;"> <img src="http://localhost/utsgs/images/nextpage.jpg" height="40"> </div>

<div class="div_modal"></div>  <!-- Code ของ Modal จะมาแสดงใน DIV นี้ --> 
<input type="hidden" ID="btn_view" value="<?php echo $btn['view']; ?>">
<input type="hidden" ID="btn_edit" value="<?php echo $btn['edit']; ?>">
<input type="hidden" ID="baseurl_add" value="<?php echo $url_add; ?>">
<input type='hidden' ID="baseurl_edit" value="<?php echo $url_edit; ?>">
<input type='hidden' ID="baseurl_detail" value="<?php echo $url_detail; ?>">
<?php echo $footer; ?>