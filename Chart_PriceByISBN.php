<?php
include("Includes/Connection_inc.php");
include("Includes/FusionCharts.php");
include("Includes/PageLayout.php");
include("DataQuery.php");
?>
<HTML>
<HEAD>
	<TITLE>
	FusionCharts v3 Demo Application - Sales By Country
	</TITLE>
	<?php
	//You need to include the following JS file, if you intend to embed the chart using JavaScript.
	//Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
	//When you make your own charts, make sure that the path to this JS file is correct. Else, you would get JavaScript errors.
	?>	
	<SCRIPT LANGUAGE="Javascript" SRC="FusionCharts/FusionCharts.js"></SCRIPT>		
	
	<LINK REL='stylesheet' HREF='Style.css' />
</HEAD>
<BODY topmargin='0' leftmargin='0' bottomMargin='0' rightMargin='0' bgColor='#EEEEEE'>

<table width='875' align='center' cellspacing='0' cellpadding='0'>
	<tr>
	<td align='center'>
	<?php
		//Generate the XML data for the main pie chart.
		
		//$strXML = "<chart caption='price By isbn for " . $intYear . "'   palette='" . getPalette() . "' animation='" . getAnimationState() . "' formatNumberScale='0' numberPrefix='$' labelDisplay='ROTATE' slantLabels='1' seriesNameInToolTip='0' sNumberSuffix='pcs.' showValues='0' plotSpacePercent='10'>";
		$strXML = getPriceHistoryByISBN("");

		//Add some styles to increase caption font size
		$strXML .= "<styles><definition><style type='font' name='CaptionFont' size='15' color='" . getCaptionFontColor() . "' /><style type='font' name='SubCaptionFont' bold='0' /></definition><application><apply toObject='caption' styles='CaptionFont' /><apply toObject='SubCaption' styles='SubCaptionFont' /></application></styles>";
		$strXML .= "</chart>";
		ECHO $strXML;
		echo renderChart("FusionCharts/MSColumn3DLineDY.swf", "", $strXML, "NewChart", "850", "300", false, false);
	?>
	</td>
	</tr>
</table>

<?php	
	//Separator line
	echo drawSepLine();
?>	

<P align='center' class='text'>Click on a column above to drill down to city and customer details.</P>

<?php
	//Separator line
	echo drawSepLine();
?>	

	
<?php
//Close the main table
echo render_pageTableClose();
?>
</BODY>
</HTML>