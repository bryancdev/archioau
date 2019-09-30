 <?php

include('session.php');
    //get the name and comment entered by user
   
	
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                

		$dbServer = "localhost";
		$dbDatabase = "coop_dtbs";
		$dbUsername = "root";
		$dbPassword = "";


		$con = mysqli_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
		mysqli_select_db($con,$dbDatabase) or die("Couldn't connect to database $dbDatabase");
      $dateToday =$_POST['txtdateToday'];
      $name =$_POST['txtname2'];
      $mem_id =$_POST['txtmem_id'];
			$amount =$_POST["txtamount"];
      $check =$_POST["txtcheck"];
      $withdrawal =$_POST["txtwithdrawal"];


      if($amount < 200 AND $amount > 0)
      {
      header('Location: savings3.php?mem_id='.$mem_id.'#message');
      }

      else
      {

        $sql="INSERT INTO dbdeposit (`mem_id`,`dbname`,`dbdate`, `dbdeposit`, `dbcheckno`, `dbwithdrawal`) VALUES ('$mem_id','$name','$dateToday', '$amount', '$check', '$withdrawal')";
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error());
        }

        $sql2="INSERT INTO dbpaymentlog (`dbusername`,`date`,`dbaction`) VALUES ('$login_session','$dateToday','Add savings to $mem_id ')";
        if (!mysqli_query($con,$sql2))
        {

        die('Error: ' . mysqli_error());
        }


        header('Location: savings.php?#message');
      }
      

  ?>