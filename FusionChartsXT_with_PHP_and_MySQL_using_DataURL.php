<?php
// It would generate the HTML and JavaScript code required to render the chart.	
include('Includes/FusionCharts.php');
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>FusionCharts XT with PHP and MySQL</title>
		
		<!-- Include FusionCharts.js to provide client-side interactivity -->
        <script type="text/javascript" src="FusionCharts/FusionCharts.js"></script>
    </head>
    <body>
		
		<!-- This DIV would be our chart container -->
        <div id="chartContainer">
        <?php
            
			// Set the rendering mode to JavaScript
			FC_SetRenderer('javascript');
		//	$isbn=$_GET['isbn'];
			// Call the renderChart method, which would return the HTML and JavaScript required to generate the chart
            echo renderChart('FusionCharts/Column2D.swf', // Path to chart type
					'Chart_DataProvider.php?isbn='.$_GET['isbn'], // Path to the data provider
					'', 	// Empty string when using Data URL Method
					'top10_most_populous_countries', // Undique chart ID
					'1000', '600', // Width and height in pixels
					false,	// Disable debug mode
					true	// Enable 'Register with JavaScript' (Recommended)
				);
        ?>
        </div>
    </body>
</html>