
	<?php
// Set the content type in the header to text/xml.
header('Content-type: text/xml');

// Include DBConn.php
include('Includes/Connection_inc.php');

// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
$link = connectToDB();
//echo $isbn;
// Form the SQL query which will return the Top 10 Most Populous Countries.
$strQuery = "select time,tnlprice from pricehistory
		where isbn = ".$_GET['isbn'];

// Execute the query, or else return the error message.
$result = mysql_query($strQuery) or die(mysql_error());


if ($result) {
	
	// Create the chart's XML string. We can add attributes here to customize our chart.
	$strXML = "<chart caption='Top 10 Most Populous Countries' showValues='0' useRoundEdges='1' palette='3'>";
	
	while($ors = mysql_fetch_array($result)) {
		// Append the names of the countries and their respective populations to the chart's XML string.
		$strXML .= "<set label='".$ors['time']."' value='".$ors['tnlprice']."' />";
	}
}   
// Close the chart's XML string.
$strXML .= "</chart>";	

// Return the valid XML string.
echo $strXML;