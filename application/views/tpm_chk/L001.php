<?php echo $header;?>
<style type="text/css">
  .modal-wide .modal-dialog {
  width: 99%; /* or whatever you wish */
}


</style> 
<script type="text/javascript" language="javascript" charset="utf-8">
$(function(){

  var startDateTextBox = $('#datefrom');
  var endDateTextBox = $('#dateto');
  $.timepicker.datetimeRange(startDateTextBox,endDateTextBox,{ 
      start: {},// start picker options
      end: {} // end picker options         
  });
  check_authen();

 $('#employee-grid tbody').on( 'click', 'img.formadd', function () {
          var idx=$(this).closest('tr').index(); // หาลำดับแถวของ TR ที่คลิกแก้ไข
          formadd($(this).data('idadd'),idx);
        //  var idx = $(this).index();
        //  $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(0)').html("8888"); 
          } );   
         $('#employee-grid tbody').on( 'click', 'DIV.view', function () {
           view($(this).data('idview'));
          } );   

//rundatatable();
});
/*function rundatatable(){ 
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
        "iDisplayLength": 16,
        "order": [[ '0', "DESC" ]], 
        "processing": true,
        "serverSide": true,
        "ajax":{
            url :"<?php echo base_url(); ?>memp/getList", // json datasource
            type: "post",  // method  , by default get            
            error: function(){  // error handling        
                $(".employee-grid-error").html("");
                $("#employee-grid tbody tr").remove();                            
                $("#employee-grid_processing").css("display","none");                            
            }
        },
        "aoColumns": [{ 
                      "sWidth": "15%", 
                      "mData": 'memp_code'
                    }, { 
                      "sWidth": "15%",
                      "mData": 'name_th'
                    }, { 
                      "sWidth": "10%",
                      "mData":'user'
                    }, { 
                      "sWidth": "10%",
                      "mData": 'mobile'
                    }, { 
                      "sWidth": "10%",
                      "mData": 'email'
                    },{
                      "sWidth": "5%",
                      "mData": null,
                      "mRender": function(data, type, full) { 
                        if(full['status']=='1'){ return "ใช้งาน"; }else{ return "ยกเลิก"; } 
                      }
                    },{ 
                      "sWidth": "10%",
                      "mData": 'comment'
                    }, {
                      "sWidth": "7%",
                      "mData": null,
                      "bSortable": false,
                      "mRender": function(data, type, full) { 
                        var html ='';
                        if($('#btn_view').val()==1){ 
                            html +='<img src="<?php echo base_url(); ?>images/list_view.png"   title="รายละเอียด" class="btnopt view" data-idview="' + full['id_memp'] + '"></img>';
                        }else{ 
                            html +='<img src="<?php echo base_url(); ?>images/un_list_view.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idview="' + full['id_memp'] + '"></img>';
                        } 
                        if($('#btn_edit').val()==1){ 
                            html +='<img src="<?php echo base_url(); ?>images/list_edit.png"   title="แก้ไข" class="btnopt edit" data-idedit="' + full['id_memp'] + '"></img>';
                        }else{ 
                            html +='<img src="<?php echo base_url(); ?>images/un_list_edit.png"   title="ไม่ได้รับสิทธิ์แก้ไขข้อมูล" class="btnoptUnclick" data-idedit="' + full['id_memp'] + '"></img>';
                        } 
                            html +='<input type="hidden" ID="id_memp' + full['id_memp'] + '" value="' + full['id_memp'] + '">';
                        return html;
                      }
                    }]
        } );
        $("#employee-grid_filter").css("display","none");  // hiding global search box
        $('.search-input-text').on('change', function () {   // for text boxes
            var i =$(this).attr('data-column');  // getting column index
            var v =$(this).val();  // getting search input value 
            dataTable.columns(i).search(v).draw();
        } );
        $('#employee-grid tbody').on( 'click', 'img.edit', function () {
          var idx=$(this).closest('tr').index(); // หาลำดับแถวของ TR ที่คลิกแก้ไข
          edit($(this).data('idedit'),idx);
        //  var idx = $(this).index();
        //  $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(0)').html("8888"); 
          } );   
         $('#employee-grid tbody').on( 'click', 'img.view', function () {
           view($(this).data('idview'));
          } );   
    }    */    

function check_authen()
{
  var html =''; 
      html +='<div class="clickView view" data-idview="1">PM001</div>';
      html +='<div class="clickView view" data-idview="2">PM002</div>';
      html +='<div class="clickView view" data-idview="3">PM003</div>';
        if($('#btn_add').val()==1){ 
          html +='<img src="<?php echo base_url(); ?>images/list_add.png"   title="เปิดงานบริการ PM" class="btnopt formadd" data-idadd="1"></img>';
        }else{ 
          html +='<img src="<?php echo base_url(); ?>images/un_list_add.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idadd="0"></img>';
        }  
  var html2 =''; 
      html2 +='<div class="clickView view" data-idview="1">PM004</div>';
      html2 +='<div class="clickView view" data-idview="2">PM005</div>';
      html2 +='<div class="clickView view" data-idview="3">PM006</div>';
        if($('#btn_add').val()==1){ 
          html2 +='<img src="<?php echo base_url(); ?>images/list_add.png"   title="เปิดงานบริการ PM" class="btnopt formadd" data-idadd="1"></img>';
        }else{ 
          html2 +='<img src="<?php echo base_url(); ?>images/un_list_add.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idadd="0"></img>';
        }        
 $('#employee-grid tbody td.action').html(html);
 $('#employee-grid tbody td.action2').html(html2);
}

function formadd(num)
{ 
  var screenname="เพิ่มข้อมูล :: ใบเปิดงานสัญญาบริการ"; 
  var baseurl_add = $('#baseurl_add').val();
  var url=baseurl_add+num; 
  var n=0;
  $('.div_modal').html('');
  modal_form(n,screenname);
  $('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
  var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
        modal.on('show.bs.modal', function () {
        modalBody.load(url);
        }).modal({backdrop: 'static',keyboard: true});
  setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
}

function view(num) 
{ 
  var screenname="รายละเอียดข้อมูล :: ใบเปิดงานสัญญาบริการ"; 
  var baseurl_detail = "<?php echo base_url(); ?>tpm_chk/detail/";
  var url=baseurl_detail+num;  
  var n=0; 
  $('.div_modal').html(''); 
  modal_form_view(n,screenname); 
  $('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
  var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
        modal.on('show.bs.modal', function () {
        modalBody.load(url);
        }).modal({backdrop: 'static',keyboard: true});
  setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
}

function modal_form(n,screenname)
{
  var div='';
  div+='<form name="main" role="form" data-toggle="validator" id="form" method="post">';
  div+='<!-- Modal -->';
  div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
  div+='<div class="modal-dialog">';
  div+='<div class="modal-content">';
  div+='<div class="modal-header" style="background:#B40404;color:#FFFFFF;">';
  div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
  div+='<h4 class="modal-title">'+screenname+'</h4>';
  div+='</div>';
  div+='<div class="modal-body">';
  div+='</div>';
  div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
  div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
  div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
  div+='</div>';
  div+='</div><!-- /.modal-content -->';
  div+='</div><!-- /.modal-dialog -->';
  div+='</div><!-- /.modal -->';
  div+='</form>';
  $('.div_modal').html(div);
}

function modal_form_view(n,screenname)
   {
   	var div='';
   	div+='<form name="main" role="form" data-toggle="validator" id="form" method="post">';
    div+='<!-- Modal -->';
  	div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
  	div+='<div class="modal-dialog">';
  	div+='<div class="modal-content">';
  	div+='<div class="modal-header" style="background:#B40404;color:#FFFFFF;">';
  	div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
  	div+='<h4 class="modal-title">'+screenname+'</h4>';
  	div+='</div>';
  	div+='<div class="modal-body">';
  	div+='</div>';
  	div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
  	div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ปิด </span></button>';
  	div+='</div>';
  	div+='</div><!-- /.modal-content -->';
  	div+='</div><!-- /.modal-dialog -->';
  	div+='</div><!-- /.modal -->';
    div+='</form>';
	$('.div_modal').html(div);
   }
	
</script>
<div class="nev_url"><?php echo $NAV; ?> </div>
<div class="search form-inline">ค้นหา : 
    <input type="text" data-column="0"  class="search-input-text" placeholder="--เลขที่สัญญา--">  
    <input type="text" data-column="0"  class="search-input-text" placeholder="--รหัสผลิตภัณฑ์ [S/N]--"> 
    <input type="text" data-column="2"  class="search-input-text" placeholder="--บริษัทที่ติดตั้ง--"> 
    <select data-column="4" class="search-input-select">
      <option style="font-size:12px;" value="0,1,2" selected>----สถานะ ทั้งหมด----</option>
      <option style="font-size:12px;" value="1">ปิดงาน</option> 
      <option style="font-size:12px;" value="2">รอถึงกำหนด</option> 
      <option style="font-size:12px;" value="2">ระหว่างดำเนินการ</option> 
      <option style="font-size:12px;" value="2">ยกเลิก</option> 
    </select> 
    <lable class="lable"> From :</lable><input type="text" data-column="3" ID="datefrom"  class="search-input-text" value="<?php echo $datefrom; ?>" > 
    <lable class="lable"> To :</lable><input type="text" data-column="4"  ID="dateto" class="search-input-text" value="<?php echo $dateto; ?>" > 
</div>
<table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" width="100%"  >
<thead>                       
  <tr>
    <th>เลขที่สัญญา</th> 
    <th>ประเภทสัญญา</th>  
    <th width="200">ชื่อบริษัทหลัก</th> 
    <th width="200">ชื่อไซต์งาน</th> 
    <th>เลขที่ผลิตภัณฑ์</th>
    <th width="110">ครั้งที่</th> 
    <th width="110">วันที่นัดหมาย</th>
    <th width="110">วันที่งานเสร็จ</th>  
    <th width="90">สถานะ</th>
    <th>หมายเหตุ</th>
    <th width="90">ดำเนินการ</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>CT58WT00001</td>
    <td>Normal</td>
    <td>THAINOLOGY</td>
    <td>THAINOLOGY <br> 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td> 
    <td>PPPPP-SSYYLXXX-VVV</td>
    <td>1<br>2<br>3<br>4</td> 
    <td>01/01/2558<br>01/03/2558<br>01/06/2558<br>01/09/2558<br></td> 
    <td>01/01/2558<br>01/03/2558<br>01/06/2558<br>-<br></td> 
    <td>ปิดงาน<br>ปิดงาน<br>ปิดงาน<br>รอถึงกำหนด</td>
    <td>-</td>
    <td class="action"> </td>
  </tr>
  <tr>
    <td>CT58WT00001</td>
    <td>Normal</td>
    <td>THAINOLOGY</td>
    <td>THAINOLOGY <br> 148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td> 
    <td>PPPPP-SSYYLXXX-VVV</td>
    <td>1<br>2<br>3<br>4</td> 
    <td>01/01/2558<br>01/03/2558<br>01/06/2558<br>01/09/2558<br></td>
    <td>01/01/2558<br>01/03/2558<br>01/06/2558<br>-<br></td>  
    <td>ปิดงาน<br>ปิดงาน<br>ปิดงาน<br>รอถึงกำหนด</td>
    <td>-</td>
    <td class="action2"> </td>
  </tr>
</tbody>
</table>
<div class="div_modal">
</div>
<input type="hidden" ID="btn_add" value="<?php echo $btn['add']; ?>"> 
<input type="hidden" ID="baseurl_add" value="<?php echo $url_add; ?>"> 
<?php echo $footer; ?>
