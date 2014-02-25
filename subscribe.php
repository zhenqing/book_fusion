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
		.profit{

		}
		
		</style>
	</head>
	
	<body>
		<form action="submit_subscribe.php" method="post">
			isbn: <input type="text" name="isbn" id="isbn"/> 
			email:<input type="text" name="email" id="email"/>
			desired price:<input type="text" name="desired_price"/>
		    <select name="type">
		        <option VALUE="a" selected="selected">a</option>
		    	<option VALUE="tul"> tul</option>
		    	<option VALUE="tnl"> tnl</option>
		    </select>
			<input type="submit" name="submit"/><br/>
		</form>

	</body>
</html>
