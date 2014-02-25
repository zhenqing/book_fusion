<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
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
			$con =  mysqli_connect("localhost", "root", "", "inventory");
			header('Content-type: text/xml');
			mysqli_query($con,"INSERT INTO subscribe (isbn, email, desired_price,time)
VALUES ('Peter', 'Griffin',35)");
			mysqli_close($con);
		?>
		
	</body>
</html>
