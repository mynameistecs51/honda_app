<?php echo $header; ?>
 
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
    <div id="chart_div" style="width: 100%; height: 600px;"></div>
  
<?php echo $footer; ?>