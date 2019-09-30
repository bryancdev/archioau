 <?php


    //get the name and comment entered by user
   
	
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                

		$dbServer = "localhost";
		$dbDatabase = "coop_dtbs";
		$dbUsername = "root";
		$dbPassword = "";


		$con = mysqli_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
		mysqli_select_db($con, $dbDatabase) or die("Couldn't connect to database $dbDatabase");
      $dateToday =$_POST['txtdateToday'];

      $firstdate = date("m/d/Y", strtotime($dateToday.' + 15 days'));
      $seconddate = date("m/d/Y", strtotime($dateToday.' + 30 days'));
      $thirddate = date("m/d/Y", strtotime($dateToday.' + 45 days'));
      $fourthdate = date("m/d/Y", strtotime($dateToday.' + 60 days'));
      $fifthdate = date("m/d/Y", strtotime($dateToday.' + 75 days'));
      $sixthdate = date("m/d/Y", strtotime($dateToday.' + 90 days'));
      $seventhdate = date("m/d/Y", strtotime($dateToday.' + 105 days'));
      $eightdate = date("m/d/Y", strtotime($dateToday.' + 120 days'));
      $ninthdate = date("m/d/Y", strtotime($dateToday.' + 135 days'));
      $tenthdate = date("m/d/Y", strtotime($dateToday.' + 150 days'));
      $eleventhdate = date("m/d/Y", strtotime($dateToday.' + 165 days'));
      $twelvethdate = date("m/d/Y", strtotime($dateToday.' + 180 days'));
      $name =$_POST['txtname2'];
      $mem_id =$_POST['txtmem_id'];
      $type =$_POST['cbcod'];
      $payment =$_POST['cbpay'];
      $amount =$_POST["txtamount"];
      $principal =$_POST["txtprincipal"];
      $result2 = mysqli_query($con, "SELECT * FROM dbloantype WHERE `description` = '$type'");
      $test = mysqli_fetch_array($result2);
      if (!$result2) 
      {
        die("Error: Data not found..");
      }
                                                    
      $interest =$test["interest"];
      $terms =$test["terms"];
      
      $result = mysqli_query($con,"SELECT * FROM dbpaymenttype WHERE `code` = '$payment'");
      $test = mysqli_fetch_array($result);
      if (!$result) 
      {
        die("Error: Data not found..");
      }
                                                    
      $numpay =$test["dbnumpay"];
      $des = $test["description"];
      $pterm = $test["terms"];
      
      if($numpay == 2)
      {
        $sql2="INSERT INTO dbloan (`mem_id`,`dbname`,`dbdate` , `dbtypes`, `dblterm`, `dbpterm`,`dblinterest`, `dbloanof`, `dbpaymenttype`, `dbnumpay`, `balance`) VALUES ('$mem_id','$name','$dateToday', '$type','$terms','$pterm','$interest','$amount','$des','$numpay','$amount')";
        if (!mysqli_query($con, $sql2))
        {
        die('Error: ' . mysqli_error());
        }
        
      }else if($numpay == 1){
        $sql="INSERT INTO dbloan (`mem_id`,`dbname`,`dbdate` , `dbtypes`, `dblterm`, `dbpterm`,`dblinterest`, `dbloanof`, `dbpaymenttype`,  `dbnumpay`, `balance`) VALUES ('$mem_id','$name','$dateToday', '$type','$terms','$pterm','$interest','$amount','$des','$numpay','$amount')";
        if (!mysqli_query($con, $sql))
        {
        die('Error: ' . mysqli_error());
        }
      }


     

      header('Location: admin_addloan.php?#message');
      

  ?>