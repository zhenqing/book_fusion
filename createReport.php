<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		
		<script type="text/javascript">
		    
			 
			$(document).ready(function() {
			    /* Build the DataTable with third column using our custom sort functions */
			  var oTable = $('#example').dataTable({
				"sScrollY": 500,
				"bScrollCollapse": true,
				"bPaginate": false
			});
			new AutoFill( oTable );
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
		</style>
	</head>
	
	<body>
		<?php 
			$mysqli = new mysqli("localhost", "root", "", "inventory");
			header('Content-type: text/xml');
			
			$stmt = $mysqli->prepare("CALL find_good_textbook"); 
			if($stmt ->execute()){
				echo "success, please go back to former page.";
			}else{
				echo "fail, please go back to former page and retry.";
			}
		?>
		
	</body>
</html>
