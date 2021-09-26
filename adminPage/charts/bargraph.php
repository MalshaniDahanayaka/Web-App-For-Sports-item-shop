<?php

$dataPoints = $_SESSION['data_points'];

?>





<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Sales compare with Sports"
	},
	axisY: {
		title: "Sport item sold count"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


<div id="chartContainer" style="height: 370px; width: 80%; margin-left:150px; margin-top:50px; "></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            