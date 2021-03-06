﻿<?php
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
if ($result) {
	// Create the chart's XML string. We can add attributes here to customize our chart.
	$strXML = "<chart caption='Product-wise Sales' xaxisname='Day' canvasbgcolor='E7D9E6' canvasbordercolor='B38CB0' canvasborderthickness='1' basefontcolor='B38CB0' numberprefix='$' decimals='0' decimalseparator=',' rotatelabels='1' slantlabels='1' tooltipbordercolor='FFFFFF' showvalues='0' legendbordercolor='B38CB0' >";
		$strXML .= "<categories>";
		while ($row = mysql_fetch_assoc($result)) {
	    $strXML .= "<category  label='".$row['time']."' />";
	}
	$result = mysql_query($strQuery) or die(mysql_error());	
		$strXML .="</categories>";
		$row = 0;
		$strXML .= "<dataset seriesname='aprice' >";
		while ($row = mysql_fetch_assoc($result)) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['aprice']."' />";
		}
		$strXML .="</dataset>";
		$strXML .= "<dataset seriesname='tnlprice' >";
		$result = mysql_query($strQuery) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['tnlprice']."' />";
		}
		$strXML .="</dataset>";
		$strXML .= "<dataset seriesname='tulprice' >";
		$result = mysql_query($strQuery) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)) {
			// Append the names of the countries and their respective populations to the chart's XML string.
			$strXML .= "<set  value='".$row['tulprice']."' />";
		}
		$strXML .="</dataset>";
}   
// Close the chart's XML string.
$strXML .= "</chart>";	

// Return the valid XML string.
echo $strXML;
