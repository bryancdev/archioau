<?php


$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$dbServer = "localhost";
$dbDatabase = "coop_dtbs";
$dbUsername = "root";
$dbPassword = "";

$con = mysql_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
mysql_select_db($dbDatabase, $con) or die("Couldn't connect to database $dbDatabase");
			$id =$_POST["id"];
			$amount =$_POST["amo"];
			$appbou =$_POST["appbou"];
			
			mysql_query("UPDATE dbdeposit SET dbdeposit='$amount', dbcheckstat='$appbou'  WHERE id='$id' ")
			or die(mysql_error()); 


 header ('location:check.php#message') ;
mysql_close($con)
?>