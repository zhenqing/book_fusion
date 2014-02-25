
<?php

// Include DBConn.php
include('Includes/Connection_inc.php');
// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
$link = connectToDB();
$date = (new Datetime())->format('Y-m-d H:i:s');
echo $_POST['isbn'];
echo $_POST['email'];
echo $_POST['desired_price'];
echo $_POST['type'];
//echo $date;
// Form the SQL query which will return the Top 10 Most Populous Countries.
$strQuery = "insert into subscribe(isbn,email,desired_aprice,time,flag) values ('".$_POST['isbn']."','".$_POST['email']."',".$_POST['desired_price'].",'".$date.",'".$_POST['type']."')";
echo $strQuery;
// Execute the query, or else return the error messagestrtotime(echo $strQuery;
$result = mysql_query($strQuery) or die(mysql_error());
?>