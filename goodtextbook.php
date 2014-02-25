<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		
		<script type="text/javascript">
		    
			 
			$(document).ready(function() {
			    /* Build the DataTable with third column using our custom sort functions */
			 /* var oTable = $('#example').dataTable({
				"sScrollY": 500,
				"bScrollCollapse": true,
				"bPaginate": false
			}); */
				
				$("td.profit").each(function(){
				if($(this).text()>10)
				$(this).css("background","green");
				});
				/*	
				$("td.profit").ready(function(){
				if($(this).text()>10)
				$(this).css("background","green");
				});
				*/
			} );

		</script>
		<style type="text/css">
		table
		{
		border-collapse:collapse;
		}
		table,th, td
		{
		border: 1px solid black;
		}
		td, th {
		  width: 4rem;
		  height: 2rem;
		  border: 1px solid #ccc;
		  text-align: center;
		}
		th {
		  background: lightblue;
		  border-color: white;
		}
		.profit{

		}
		
		</style>
	</head>
	
	<body>
		<!--<a href="createReport.php" target="_blank">create new report</a><br/>-->
		<table id="example">
			 <thead>

			    <tr>
			      <th>isbn</th>
			      <th>aprice</th>
			      <th>avg_aprice</th>
			      <th>profit_a</th>
			      <th>tnlprice</th>
			      <th>avg_tnlprice</th>
			      <th>profit_tnl</th>
			      <th>tulprice</th>
			      <th>avg_tulprice</th>
			      <th>profit_tul</th>
			    </tr>
  </thead>
<?php
// Set the content type in the header to text/xml.
header('Content-type: text/xml');
// Include DBConn.php
include('Includes/Connection_inc.php');
// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
$link = connectToDB();
// Form the SQL query which will return the Top 10 Most Populous Countries.
$strQuery = "select isbn,aprice,avg_aprice,avg_aprice*0.85-aprice-5.35 as profit_a,tnlprice,avg_tnlprice,avg_tnlprice*0.85-tnlprice-5.35 as profit_tnl,tulprice,avg_tulprice,avg_tulprice*0.85-tulprice-5.35 as profit_tul from textbook_good";
// Execute the query, or else return the error message.
$result = mysql_query($strQuery) or die(mysql_error());

			while(($ors = mysql_fetch_assoc($result))) {
				$isbn=$ors['isbn'];
		?>
				<tr><!--Seris_Chart.php -->
					<td><a href="Seris_Chart.php?isbn=<?php echo $isbn;?>"><?php echo $isbn?></a></td>
					<td><?php echo $ors['aprice']?></td>
					<td><?php echo round($ors['avg_aprice'],2)?></td>
					<td class="profit"><?php echo round($ors['profit_a'],2)?></td>
					<td><?php echo $ors['tnlprice']?></td>
					<td><?php echo round($ors['avg_tnlprice'],2)?></td>
					<td class="profit"><?php echo round($ors['profit_tnl'],2)?></td>
					<td><?php echo $ors['tulprice']?></td>
					<td><?php echo round($ors['avg_tulprice'],2)?></td>
					<td class="profit"><?php echo round($ors['profit_tul'],2)?></td>
				</tr>
		<?php
		 } ?>
	</table>	 
	</body>
</html>
