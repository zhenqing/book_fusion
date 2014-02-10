<?php
// Set the content type in the header to text/xml.
header('Content-type: text/xml');

// Include DBConn.php
include('Includes/Connection_inc.php');

// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
$link = connectToDB();
//echo $isbn;
// Form the SQL query which will return the Top 10 Most Populous Countries.
$strQuery = "select time,aprice,tnlprice,tulprice from pricehistory where isbn = ".$_GET['isbn'];

// Execute the query, or else return the error message.
$result = mysql_query($strQuery) or die(mysql_error());
$queryResultArray = mysql_fetch_array($result);
if ($result) {
	// Create the chart's XML string. We can add attributes here to customize our chart.
	$strXML = "<chart caption='Product-wise Sales' xaxisname='Day' canvasbgcolor='E7D9E6' canvasbordercolor='B38CB0' canvasborderthickness='1' basefontcolor='B38CB0' numberprefix='$' decimals='0' decimalseparator=',' rotatelabels='1' slantlabels='1' tooltipbordercolor='FFFFFF' showvalues='0' legendbordercolor='B38CB0' >";
		$strXML .= "<categories>";
		foreach($queryResultArray as $row) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<category  label='".$row['time']."' />";
		}
		$strXML .="</categories>";

		$strXML .= "<dataset seriesname='aprice' >";
		foreach($queryResultArray as $row) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['aprice']."' />";
		}
		$strXML .="</dataset>";
		$strXML .= "<dataset seriesname='tnlprice' >";
		foreach($queryResultArray as $row) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['tnlprice']."' />";
		}
		$strXML .="</dataset>";
		$strXML .= "<dataset seriesname='tulprice' >";
		foreach($queryResultArray as $row) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['tulprice']."' />";
		}
		$strXML .="</dataset>";
}   
// Close the chart's XML string.
$strXML .= "</chart>";	

// Return the valid XML string.
echo $strXML;
