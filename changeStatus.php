
<?php
// Include DBConn.php
include('Includes/Connection_inc.php');
// Use the connectToDB() function provided in DBConn.php, and establish the connection between PHP and the World database in our MySQL setup.
$link = connectToDB();
echo $_POST['isbn'];
echo $_POST['status'];
//echo $date;
// Form the SQL query which will return the Top 10 Most Populous Countries.
$strQuery = "update summit set flag="."'".$_POST['status']."' where isbn="."'".$_POST['isbn']."'";
echo $strQuery;
// Execute the query, or else return the error messagestrtotime(echo $strQuery;
$result = mysql_query($strQuery) or die(mysql_error());
?>