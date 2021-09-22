
<!--Pie chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['category', 'count'],
         <?php
          while ($result = mysqli_fetch_assoc($columns)) {
            echo"['".$result['category']."',".$result['no']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Main categories and their sales counts'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart" style="width: 900px; height: 400px; margin-left:150px; margin-top:50px;border-radius: 30px;"></div>
