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


 $('#employee-grid tbody').on( 'click', 'img.edit', function () {
          var idx=$(this).closest('tr').index(); // หาลำดับแถวของ TR ที่คลิกแก้ไข
          edit($(this).data('idedit'),idx);
        //  var idx = $(this).index();
        //  $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(0)').html("8888"); 
          } );   
         $('#employee-grid tbody').on( 'click', 'img.view', function () {
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
  if($('#btn_edit').val()==1){ 
      html +='<img src="<?php echo base_url(); ?>images/list_edit.png"   title="แก้ไข" class="btnopt edit" data-idedit="0"></img>';
  }else{ 
      html +='<img src="<?php echo base_url(); ?>images/un_list_edit.png"   title="ไม่ได้รับสิทธิ์แก้ไขข้อมูล" class="btnoptUnclick" data-idedit="0"></img>';
  }
      html +='<input type="hidden" ID="id_memp" value="0">';
 $('#employee-grid tbody td.action').html(html);
 var htmlv ='';
  if($('#btn_view').val()==1){ 
      htmlv +='<img src="<?php echo base_url(); ?>images/list_view.png"   title="รายละเอียด" class="btnopt view" data-idview="0"></img>';
  }else{ 
      htmlv +='<img src="<?php echo base_url(); ?>images/un_list_view.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idedit="0"></img>';
  } 
 $('#employee-grid tbody td.action_view').html(htmlv+=html);
}

function edit(num,idx)
    {   
      var screenname="<?php echo $pagename; ?>"; 
      var baseurl_edit = $('#baseurl_edit').val();
      var url=baseurl_edit+num+"/"+idx; 
      var n=0;
      $('.div_modal').html('');
      modal_form(n,screenname);
      $('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
      var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
            modal.on('show.bs.modal', function () {
            $.fn.modal.Constructor.prototype.enforceFocus = function () { };
            modalBody.load(url);
            }).modal({backdrop: 'static',keyboard: true});
      setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
    }

function view(num)
    { 
      var screenname="รายละเอียดข้อมูล :: <?php echo $pagename; ?>"; 
      var baseurl_detail = $('#baseurl_detail').val();
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
    <input type="text" data-column="0"  class="search-input-text" placeholder="--เลขที่ใบเปิดงาน PM--"> 
    <input type="text" data-column="1"  class="search-input-text" placeholder="--เลขที่สัญญา--"> 
    <input type="text" data-column="2"  class="search-input-text" placeholder="--ชื่อบริษัทหลัก--">  
    <input type="text" data-column="2"  class="search-input-text" placeholder="--ชื่อไซต์งาน--">  
    <input type="text" data-column="3"  class="search-input-text" placeholder="--รหัสผลิตภัณฑ์ [S/N]--"> <br/>
    <lable class="lable"> From :</lable><input type="text" data-column="3" ID="datefrom"  class="search-input-text" value="<?php echo $datefrom; ?>" > 
    <lable class="lable"> To :</lable><input type="text" data-column="4"  ID="dateto" class="search-input-text" value="<?php echo $dateto; ?>" > 
    <select data-column="4" class="search-input-select" style="margin-right:4px;">
      <option style="font-size:12px;" value="0,1,2" selected>----สถานะ ทั้งหมด----</option>
      <option style="font-size:12px;" value="1">เปิดงาน</option> 
      <option style="font-size:12px;" value="2">ปิดงาน</option> 
      <option style="font-size:12px;" value="2">ยกเลิก</option> 
    </select>
    
</div>
<div style="overflow-x:scroll;overflow-y: hidden;"> 
<table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;"  >
<thead>                       
  <tr>
    <th width="230">เลขที่ใบ<?php echo $pagename; ?></th>  
    <th width="200">เลขที่ Contract Warranty</th> 
    <th width="120">ประเภทสัญญา</th>
    <th width="200">ข้อมูลบริษัทหลัก</th> 
    <th width="200">ข้อมูลสถานที่ไซต์งาน</th> 
    <th width="170">เลขที่ผลิตภัณฑ์</th>
    <th width="50">ครั้งที่</th> 
    <th width="150">วันที่นัดหมาย</th> 
    <th width="150">วันที่เริ่มดำเนินการ</th>
    <th width="150">วันที่ดำเนินการเสร็จ</th> 
    <th width="150">เอกสารอ้างอิง</th> 
    <th width="90">สถานะ</th>
    <th width="150">หมายเหตุ</th>
    <th width="90">ดำเนินการ</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>PM58WT00001</td>
    <td>CT58WT00001</td>
    <td>Normal</td>
    <td>THAINOLOGY</td>
    <td>148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td> 
    <td>PPPPP-SSYYLXXX-VVV</td>
    <td>4</td> 
    <td>01/09/2558</td> 
    <td>01/09/2558</td> 
    <td>01/09/2558</td> 
    <td><a href="<?php echo base_url(); ?>file_upload/tpm_overall/closed-PM58WT00001-04.pdf" target="_blank">closed-PM58WT00001-04.pdf</a></td>
    <td>ปิดงาน</td>
    <td>-</td>
    <td class="action_view"> </td>
  </tr>
  <tr>
    <td>PM58WT00001</td>
    <td>CT58WT00001</td>
    <td>Normal</td>
    <td>THAINOLOGY</td>
    <td>148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td> 
    <td>PPPPP-SSYYLXXX-VVV</td>
    <td>3</td> 
    <td>01/06/2558</td> 
    <td>01/06/2558</td>
    <td>01/06/2558</td>
    <td>-</td>
    <td>บันทึกผลการปฏิบัติงานแล้ว</td>
    <td>-</td>
    <td class="action"> </td>
  </tr>
  <tr>
    <td>PM58WT00001</td>
    <td>CT58WT00001</td>
    <td>Normal</td>
    <td>THAINOLOGY</td>
    <td>148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td> 
    <td>PPPPP-SSYYLXXX-VVV</td>
    <td>2</td> 
    <td>01/06/2558</td> 
    <td>01/06/2558</td>
    <td>01/06/2558</td>
    <td>-</td>
    <td>บันทึกผลการปฏิบัติงานแล้ว</td>
    <td>-</td>
    <td class="action"> </td>
  </tr>
</tbody>
</table>
</div>
<div class="div_modal">
</div>
<input type="hidden" ID="btn_view" value="<?php echo $btn['view']; ?>">
<input type="hidden" ID="btn_edit" value="<?php echo $btn['edit']; ?>">
<input type="hidden" ID="btn_print" value="<?php echo $btn['print']; ?>">
<input type="hidden" ID="baseurl_add" value="<?php echo $url_add; ?>">
<input type='hidden' ID="baseurl_edit" value="<?php echo $url_edit; ?>">
<input type='hidden' ID="baseurl_detail" value="<?php echo $url_detail; ?>">
<input type='hidden' ID="baseurl_print" value="<?php echo $url_print; ?>">
<?php echo $footer; ?>
