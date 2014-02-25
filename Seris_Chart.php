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
            
			include('Includes/Connection_inc.php');
			// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
			$link = connectToDB();
			// Form the SQL query which will return the Top 10 Most Populous Countries.
			$strQuery = "select avg_aprice,avg_tnlprice,avg_tulprice from textbook_good where isbn=".$_GET['isbn'];
			// Execute the query, or else return the error message.
			$result = mysql_query($strQuery) or die(mysql_error());

			while(($ors = mysql_fetch_assoc($result))) {
				echo "avg_aprice:".round($ors['avg_aprice'],2)."\t";
				echo "avg_tnlprice:".round($ors['avg_tnlprice'],2)."\t";
				echo "avg_tulprice:".round($ors['avg_tulprice'],2)."\t";
			}
		?>
			<a href="http://www.amazon.com/gp/offer-listing/<?php echo $_GET['isbn']?>"/>amazon online</a>

		<?php
			// Set the rendering mode to JavaScript
			FC_SetRenderer('javascript');
		//	$isbn=$_GET['isbn'];
			// Call the renderChart method, which would return the HTML and JavaScript required to generate the chart
            echo renderChart('FusionCharts/StackedColumn3D.swf', // Path to chart type
					'Seris_DataProvider.php?isbn='.$_GET['isbn'], // Path to the data provider
					'', 	// Empty string when using Data URL Method
					'top10_most_populous_countries', // Undique chart ID
					'1000', '700', // Width and height in pixels
					false,	// Disable debug mode
					true	// Enable 'Register with JavaScript' (Recommended)
				);
        ?>
        </div>
    </body>
</html>