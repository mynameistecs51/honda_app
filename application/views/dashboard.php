<?php echo $header; ?>
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
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'BOOKING', 'SALES'],
         ['01/2558',  165,      120],
         ['02/2558',  135,      130],
         ['03/2558',  157,      157],
         ['04/2558',  139,      139],
         ['05/2558',  136,      135],
         ['06/2558',  120,      120],
         ['07/2558',  145,      145],
         ['08/2558',  190,      180],
         ['09/2558',  110,      120],
         ['10/2558',  123,      120],
         ['11/2558',  115,      114],
         ['12/2558',  145,      145]
      ]);

    var options = {
      title : 'ยอดประจำปี 2558',
      vAxis: {title: 'จำนวน'},
      hAxis: {title: 'เดือน'},
      seriesType: 'bars',
      series: {2: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
      <div id="chart_div" style="width: 60%; height: 500px;"></div>
        <div class="col-sm-12">
          <div class="col-sm-12">
            <div class="search">ค้นหาตามช่วงวันที่ : 
              <lable class="lable"> From :</lable><input type="text" data-column="5" ID="datefrom"  class="search-input-text" value="<?php echo $datefrom; ?>" > 
              <lable class="lable"> To :</lable><input type="text" data-column="6"  ID="dateto" class="search-input-text" value="<?php echo $dateto; ?>" > 
            </div>
            <div style="overflow-x:scroll;overflow-y: hidden;"> 
            <table id="employee-grid"  cellpadding="0" cellspacing="0" class="table table-striped table-hover" style="table-layout: fixed;word-wrap: break-word;" >
              <thead>        
                <tr>
                  <th width="120px">แบบ</th>
                  <th width="120px">รุ่นรถ</th>
                  <th width="200px">สี</th>
                  <th width="200px">จำนวนที่รับเข้า</th> 
                  <th width="150px">จำนวนที่จอง</th>
                  <th width="80px">จำนวนที่ขาย</th>
                  <th width="80px">คงเหลือ</th>  
                </tr>
              </thead>
              <tbody>
                <tr >
                  <td>CITY CNG'14</td>
                  <td>S CNG MT</td>
                  <td>TTW</td>
                  <td>147</td>
                  <td>120</td>
                  <td>120</td>
                  <td>27</td>
                </tr>
                <tr >
                  <td>CITY CNG'14</td>
                  <td>S CNG AT</td>
                  <td>TTW</td>
                  <td>147</td>
                  <td>120</td>
                  <td>120</td>
                  <td>27</td>
                </tr>
                </tbody> 
              </table>
              </div>
              </div> 
              <div class='col-sm-6' style="text-align:left;font-size:14px;">จำนวนข้อมูล 1 ถึง 2 จาก 2 รายการทั้งหมด</div>
              <div class='col-sm-6' style="text-align:right;"> <img src="http://localhost/utsgs/images/nextpage.jpg" height="40"> </div>
      </div>
      <br/><br/><br/>
    </div>

  
<?php echo $footer; ?>