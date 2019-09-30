<?php
include('session.php');
?>
<?php


$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$dbServer = "localhost";
$dbDatabase = "coop_dtbs";
$dbUsername = "root";
$dbPassword = "";

$con = mysqli_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
mysqli_select_db($con, $dbDatabase) or die("Couldn't connect to database $dbDatabase");

 $id =$_REQUEST['code'];
			mysqli_query($con, "UPDATE dbloantype SET dbstatus='Activate' WHERE code='$id' ")
			or die(mysqli_error()); 

$dateToday = date("m/d/Y");
      $sql2="INSERT INTO dbloanlog (`dbusername`,`date`,`dbaction`) VALUES ('$login_session','$dateToday','Activate Loan $id')";
                if (!mysqli_query($con, $sql2))
          {

          die('Error: ' . mysqli_error());
      }

 header ('location:admin_loan.php') ;
mysqli_close($con)
?>