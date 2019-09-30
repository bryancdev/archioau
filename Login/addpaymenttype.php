 <?php
include('session.php');
?>
 <?php


    //get the name and comment entered by user
   
	
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                

		$dbServer = "localhost";
		$dbDatabase = "coop_dtbs";
		$dbUsername = "root";
		$dbPassword = "";


		$con = mysqli_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
		mysqli_select_db($con, $dbDatabase) or die("Couldn't connect to database $dbDatabase");
      $loantype =$_POST['loantype'];
      $code =$_POST['code'];
      $code1 =$_POST['code1'];
      $terms =$_POST['terms'];
      $numpay =$_POST['numpay'];

      
      
      $sql="INSERT INTO dbpaymenttype (`id`,`code`,`description`,`terms`,`dbstatus`,`dbnumpay`) VALUES ('$code1','$code','$loantype','$terms','Activate','$numpay')";
      if (!mysqli_query($con, $sql))
      {
      die('Error: ' . mysqli_error());
      }


      $dateToday = date("m/d/Y");
      $sql2="INSERT INTO dbpaymentlog (`dbusername`,`date`,`dbaction`) VALUES ('$login_session','$dateToday','Added Loan $code')";
                if (!mysqli_query($con,$sql2))
          {

          die('Error: ' . mysqli_error());
      }

      header('Location: payment.php?#message');
      

  ?>