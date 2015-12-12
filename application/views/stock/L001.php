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
                    },{
                      "sWidth": "5%",
                      "mData": null,
                      "bSortable": false,
                      "mRender": function(data, type, full) { 
                        var html ='';
                        if($('#btn_view').val()==1){ 
                            html +='<img src="<?php echo base_url(); ?>images/list_view.png"   title="รายละเอียด" class="btnopt view" data-idview="' + full['id_mbranch'] + '"></img>';
                        }else{ 
                            html +='<img src="<?php echo base_url(); ?>images/un_list_view.png"   title="ไม่ได้รับสิทธิ์ดูรายละเอียด" class="btnoptUnclick" data-idview="' + full['id_mbranch'] + '"></img>';
                        } 
                        if($('#btn_edit').val()==1){ 
                            html +='<img src="<?php echo base_url(); ?>images/list_edit.png"   title="แก้ไข" class="btnopt edit" data-idedit="' + full['id_mbranch'] + '"></img>';
                        }else{ 
                            html +='<img src="<?php echo base_url(); ?>images/un_list_edit.png"   title="ไม่ได้รับสิทธิ์แก้ไขข้อมูล" class="btnoptUnclick" data-idedit="' + full['id_mbranch'] + '"></img>';
                        } 
                            html +='<input type="hidden" ID="id_mcmp' + full['id_mcmp'] + '" value="' + full['id_mcmp'] + '">';
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
   }        

function add()
    {
    $(".add").click(function(){    
      var screenname="เพิ่มข้อมูล :: <?php echo $pagename ?>";
      var url = $('#baseurl_add').val(); 
      var n=0;
      $('.div_modal').html('');
      modal_form(n,screenname);
      $('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
      var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
            modal.on('show.bs.modal', function () {
            modalBody.load(url);
            }).modal({backdrop: 'static',keyboard: true});
      setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
      });
    }

function edit(num,idx)
    {   
      var screenname="แก้ไขข้อมูล :: <?php echo $pagename ?>"; 
      var baseurl_edit = $('#baseurl_edit').val();
      var url=baseurl_edit+num+"/"+idx; 
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
      var screenname="รายละเอียดข้อมูล :: <?php echo $pagename ?>"; 
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
    div+='<div class="modal-header" style="background:#d9534f;color:#FFFFFF;">';
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
<div class='col-sm-12'>
  <br/>
  <div class="nev_url"><?php echo $NAV; ?> </div>
  <?php if($btn['add']==1){ echo "<div class='add' ID='add'>+ เพิ่มรายการ</div>"; }else{ echo "<div class='noneadd' title='ไม่ได้รับสิทธิ์เพิ่มรายการ'>+ เพิ่มรายการ</div>";} ?>
  <div class="search">ค้นหา : 
      <input type="text" data-column="0"  class="search-input-text" placeholder="--รหัส<?php echo $namepage ?>--"> 
      <input type="text" data-column="1"  class="search-input-text" placeholder="--ชื่อ<?php echo $namepage ?>--">  
      <select data-column="2" class="search-input-text">
        <option style="font-size:12px;" value="" selected>----ทั้งหมด----</option>
        <option style="font-size:12px;" value="1">ใช้งาน</option> 
        <option style="font-size:12px;" value="0">ยกเลิก</option> 
      </select>
  </div>
</div>

<div class='col-sm-12'> 
<div style="overflow-x:scroll;overflow-y: hidden;"> 
  <table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;" >
    <thead>        
      <tr>
        <th width="150px">เลขที่รับเข้าสต๊อก</th>
        <th width="120px">วันที่รับเข้าสต๊อก</th>
        <th width="150px">แบบ</th>
        <th width="80px">รุ่น</th>
        <th width="80px">สี</th>
        <th width="150px">วันที่ส่งมอบ (Receipt)</th>
        <th width="200px">หมายเลขตัวถัง</th>
        <th width="180px">หมายเลขเครื่อง</th>
        <th width="90px">วันรับจริง</th>
        <th width="90px">adv</th>
        <th width="60px">Loc.</th>
        <th width="60px">ST.</th>
        <th width="150px">ลูกค้า/พนักงานขาย</th>
        <th width="50px">zon </th>
        <th width="50px">ST.</th>
        <th width="150px">Advance</th>
        <th width="150px">booking </th>
        <th width="150px">สถานะ</th>
        <th width="200px">หมายเหตุ</th>  
        <th width="120px">ดำเนินการ</th> 
      </tr>
    </thead>
    <tbody>
      <tr >
        <td>STUDT581200001</td>
        <td>12/12/2558</td>
        <td>CITY CNG'14</td>
        <td>S CNG MT</td>
        <td>TTW</td>
        <td>20/9/2014</td>
        <td>MRHGM6520E-P200081</td>
        <td>L15Z1-1501250</td>
        <td>22/9/2014</td>
        <td>ต.ค.</td>
        <td>SG</td>
        <td>UD</td>
        <td>ว่าง</td>
        <td></td>
        <td>ST.</td>
        <td>Advance</td>
        <td>booking </td> 
        <td>รับเข้า</td> 
        <td>แต่ง+โซล่า</td>  
        <td>
          <img src="http://localhost/utsgs/images/list_view.png" title="รายละเอียด" class="btnopt view" data-idview="1">
          <img src="http://localhost/utsgs/images/list_edit.png" title="แก้ไข" class="btnopt edit" data-idedit="1"> 
        </td>
      </tr>
      <tr >
        <td>STUDT581200002</td>
        <td>12/12/2558</td>
        <td>CITY CNG'14</td>
        <td>S CNG MT</td>
        <td>TTW</td>
        <td>20/9/2014</td>
        <td>MRHGM6520E-P200017</td>
        <td>L15Z1-1500583</td>
        <td>22/9/2014</td>
        <td>ต.ค.</td>
        <td>SG</td>
        <td>UD</td>
        <td>ว่าง</td>
        <td></td>
        <td>ST.</td>
        <td>Advance</td>
        <td>booking </td> 
        <td>รับเข้า</td> 
        <td>แต่ง+โซล่า</td>  
        <td>
          <img src="http://localhost/utsgs/images/list_view.png" title="รายละเอียด" class="btnopt view" data-idview="2">
          <img src="http://localhost/utsgs/images/list_edit.png" title="แก้ไข" class="btnopt edit" data-idedit="2"> 
        </td>
      </tr>
      </tbody> 
    </table>
    <div class='col-sm-6' style="text-align:left;margin-top:-12px;font-size:14px;">จำนวนข้อมูล 1 ถึง 2 จาก 2 รายการทั้งหมด</div><div class='col-sm-6' style="text-align:right;">  </div>
    </div>
 </div> 

<div class="div_modal"></div>  <!-- Code ของ Modal จะมาแสดงใน DIV นี้ --> 
<input type="hidden" ID="btn_view" value="<?php echo $btn['view']; ?>">
<input type="hidden" ID="btn_edit" value="<?php echo $btn['edit']; ?>">
<input type="hidden" ID="baseurl_add" value="<?php echo $url_add; ?>">
<input type='hidden' ID="baseurl_edit" value="<?php echo $url_edit; ?>">
<input type='hidden' ID="baseurl_detail" value="<?php echo $url_detail; ?>">
<?php echo $footer; ?>