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
  }
);
  check_authen();
  add(); 


 $('#employee-grid tbody').on( 'click', 'img.edit',function () {
  var idx=$(this).closest('tr').index(); // หาลำดับแถวของ TR ที่คลิกแก้ไข
  edit($(this).data('idedit'),idx); 
//  var idx = $(this).index();
//  $('#employee-grid tbody tr:eq('+idx+')').find('td:eq(0)').html("8888"); 
  } );   
 $('#employee-grid tbody').on( 'click', 'img.view', function () {
   view($(this).data('idview'));
  } );  
 $('#employee-grid tbody').on( 'click', 'img.print', function () {
    var idx=$(this).closest('tr').index(); // หาลำดับแถวของ TR ที่คลิกแก้ไข 
    fromprint($(this).data('idprint'),idx);
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
      if($('#btn_view').val()==1){ 
          html +='<img src="<?php echo base_url(); ?>images/list_view.png"   title="รายละเอียด" class="btnopt view" data-idview="0"></img>';
      }else{ 
          html +='<img src="<?php echo base_url(); ?>images/un_list_view.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idview="0"></img>';
      } 
      if($('#btn_edit').val()==1){ 
          html +='<img src="<?php echo base_url(); ?>images/list_edit.png"   title="แก้ไข" class="btnopt edit" data-idedit="0"></img>';
      }else{ 
          html +='<img src="<?php echo base_url(); ?>images/un_list_edit.png"   title="ไม่ได้รับสิทธิ์แก้ไขข้อมูล" class="btnoptUnclick" data-idedit="0"></img>';
      }
      if($('#btn_print').val()==1){ 
          html +='<img src="<?php echo base_url(); ?>images/list_print.png"   title="พิมพ์" class="btnopt print" data-idprint="1"></img>';
      }else{ 
          html +='<img src="<?php echo base_url(); ?>images/un_list_print.png"   title="ไม่ได้รับสิทธิ์พิมพ์เอกสาร" class="btnoptUnclick" data-idedit="0"></img>';
      }
          html +='<input type="hidden" ID="id_memp" value="0">';
 $('#employee-grid tbody td.action').html(html);
}

function add()
    {
    $(".add").click(function(){ 
      var screenname="เพิ่มข้อมูล :: <?php echo $pagename; ?>";
      var url = $('#baseurl_add').val(); 
      var n=0;
      $('.div_modal').html('');
      modal_form(n,screenname);
      $('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
      var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
            modal.on('show.bs.modal', function () {
            $.fn.modal.Constructor.prototype.enforceFocus = function () { };
            modalBody.load(url);
            }).modal({backdrop: 'static',keyboard: true});
      setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
      });
    }
function fromprint(num,idx){ 
  //  window.location = $('#baseurl_print').val()+num; 
}

function edit(num,idx)
    {   
      var screenname="แก้ไขข้อมูล :: <?php echo $pagename; ?>"; 
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
<div class="nev_url"><?php echo $NAV; ?></div>
<?php if($btn['add']==1){ echo "<div class='add' ID='add'>+ เพิ่มรายการ</div>"; }else{ echo "<div class='noneadd' title='ไม่ได้รับสิทธิ์เพิ่มรายการ'>+ เพิ่มรายการ</div>";} ?>
<div class="search form-inline">ค้นหา : 
    <input type="text" data-column="0"  class="search-input-text" placeholder="--เลขที่ใบแจ้งซ่อม--"> 
    <input type="text" data-column="0"  class="search-input-text" placeholder="--บริษัทหลัก--"> 
    <input type="text" data-column="0"  class="search-input-text" placeholder="--ไซต์งาน--"> 
    <input type="text" data-column="1"  class="search-input-text" placeholder="--รหัสผลิตภัณฑ์ [S/N]--">   
    <select data-column="4" class="search-input-select search">
      <option style="font-size:12px;" value="0,1,2" selected>----สถานะ ทั้งหมด----</option>
      <option style="font-size:12px;" value="1">รับแจ้ง</option> 
      <option style="font-size:12px;" value="2">ระหว่างดำเนินการ</option> 
      <option style="font-size:12px;" value="3">ปิดงาน</option> 
      <option style="font-size:12px;" value="0">ยกเลิก</option> 
    </select>
    <br/>
    <lable class="lable">From :</lable><input type="text" data-column="3" ID="datefrom"  class="search-input-text" value="<?php echo $datefrom; ?>" > 
    <lable class="lable">To :</lable><input type="text" data-column="4"  ID="dateto" class="search-input-text" value="<?php echo $dateto; ?>" style="margin-right:5px;">
</div>

<div style="overflow-x:scroll;overflow-y: hidden;"> 
<table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;">
<thead>                       
  <tr>
    <th width="170">เลขที่ใบ<?php echo $pagename; ?></th> 
    <th width="150">วันที่<?php echo $pagename; ?></th>   
    <th width="150">รายการแจ้ง</th> 
    <th width="100">ISSUE NO.</th> 
    <th width="100">เลขที่ใบ DR</th>  
    <th width="120">วันที่รับเครื่อง</th> 
    <th width="120">วันที่ซ่อมเสร็จ</th>
    <th width="120">ระยะเวลาซ่อม</th> 
    <th width="120">วันที่เสนอราคา</th> 
    <th width="120">วันที่นัดส่ง</th>
    <th width="120">วันที่ส่งแล้ว</th>
    <th width="200">บริษัทหลัก</th>
    <th width="200">ไซต์งาน</th> 
    <th width="140">ผู้ติดต่อ-เบอร์ติดต่อ</th> 
    <th width="150">รหัสผลิตภัณฑ์ [S/N]</th> 
    <th width="150">Model</th> 
    <th width="130">สถานะ</th>
    <th width="150">หมายเหตุ</th>
    <th width="120">ดำเนินการ</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>RR58070001</td> 
    <td>18/07/2558</td>  
    <td>เปิดบิล+ส่งเครื่องซ่อม</td>  
    <td>1501-0311</td>
    <td>5801-0024</td>
    <td>10/07/2558</td>
    <td>17/07/2558</td>
    <td>7 วัน 0 ชั่วโมง</td>
    <td>12/07/2558</td>
    <td>18/07/2558</td>
    <td>18/07/2558</td>
    <td>THAINOLOGY</td>
    <td>THAINOLOGY <br/>148/267 ม.1 ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ</td>
    <td>ดิษฐพงษ์ 0821428742</td>
    <td>PPPPP-SSYYL001-VVV</td>    
    <td>MODEL-001</td> 
    <td>แจ้งส่งเครื่องซ่อมแล้ว</td>
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
