<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		  	  function form_success_client(obj) {
			    $.ajax({
			       type: "POST",
			       url: 'changeStatus.php',
			       success: function(msg){
			       	//$('#msg').innerHTML=$(obj).closest("input").value();
			         $('#msg').load("success.php");
			       }
			     });
			}
			 
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
				$("select").each(function(){
					$(this).change(function(){
						$(this).closest("form").submit();
						$(this).closest(".record").hide();
					});
				});
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
		  width: 8rem;
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
		#filter div{
			widtH:;
		}
		</style>
	</head>
	
	<body>
		<div id="msg"></div>
		<!--<a href="createReport.php" target="_blank">create new report</a><br/>-->
	<form>
		<div id="filter">
	      <div>
	        <input type="checkbox" name="samsung"/>
	        <label for="car">samsung</label>
	      </div>
	      <div>
	        <input type="checkbox" name="iphone"/>
	        <label for="language">iphone</label>
	      </div>
	      <div>
	        <input type="checkbox" name="htc"/>
	        <label for="nights">htc</label>
	      </div>
	      <div>
	        <input type="checkbox" id="4" name="lg"/>
	        <label for="student">lg</label>
	      </div>
		   <div>
	        <input type="checkbox" id="5" name="nokia"/>
	        <label for="student">nokia</label>
	      </div>
	    </div>
	</form>
		<table id="example">
			 <thead>

			    <tr>
			      <th>isbn</th>
			      <th>tulprice</th>
			      <th>tulprice2</th>
			      <th>tnlprice</th>
			      <th>profit</th>
			      <th>lower than new</th>
			      <th>time</th>
			      <th>status</th>
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
$strQuery = "select isbn,tulprice,tulprice2,tnlprice,tulprice2*0.85-tulprice-5.35 as profit,tnlprice-tulprice2 as lower,time,flag from summit";
// Execute the query, or else return the error message.
$result = mysql_query($strQuery) or die(mysql_error());

			while(($ors = mysql_fetch_assoc($result))) {
				$isbn=$ors['isbn'];
		?>
				<tr class="record"><!--Seris_Chart.php -->
					<td><a href="http://www.amazon.com/gp/offer-listing/<?php echo $isbn;?>"><?php echo $isbn?></a></td>
					<td><?php echo $ors['tulprice']?></td>
					<td><?php echo round($ors['tulprice2'],2)?></td>
					<td><?php echo round($ors['tnlprice'],2)?></td>
					<td class="profit"><?php echo round($ors['profit'],2)?></td>
					<td><?php echo round($ors['lower'],2)?></td>
					<td><?php echo $ors['time']?></td>
					<td>
						<form method="post" action="changeStatus.php" target="_blank" onsubmit="form_success_client(this); return false;">
							<input type="hidden" name="isbn" value="<?php echo $isbn;?>"/>
							<select name="status">
								<option value="" selected="selected">unchecked</option>
								<option value="b" >buyed</option>
								<option value="c" >canceled</option>
							</select>
						</form>
					</td>
				</tr>
		<?php
		 } ?>
	</table>	 
	</body>
</html>
