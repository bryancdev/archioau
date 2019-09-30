 <?php


    //get the name and comment entered by user
   
	
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                

		$dbServer = "localhost";
		$dbDatabase = "coop_dtbs";
		$dbUsername = "root";
		$dbPassword = "";


		$con = mysql_connect($dbServer, $dbUsername, $dbPassword) or die("Couldn't connect to database server");
		mysql_select_db($dbDatabase, $con) or die("Couldn't connect to database $dbDatabase");
      $id =$_POST['txtid'];
      $name =$_POST['cbname'];
			$type_loan=$_POST["cbtype_loan"];
      $bookno=$_POST["txtbookno"];
      $loanof=$_POST["txtloanof"];
      $periodof=$_POST["txtperiodof"];
      $semimonth=$_POST["txtsemimonth"];
      $monthly=$_POST["txtmonthly"];
      $installment=$_POST["txtinstallment"];
      $pesos=$_POST["txtpesos"];
      $dueon=$_POST["txtdueon"];
      $purposes=$_POST["txtpurposes"];
      $nameignature=$_POST["txtnamesignature"];
      $heldon=$_POST["txtheldon"];
      $heldon2=$_POST["txtheldon2"];
      $exceptcondition=$_POST["txtexceptcondition"];


      $sql="INSERT INTO dbloan (`dbname`, `dbtypes`, `dbbookno`, `dbloanof`, `dbperiodof`, `dbsemimonth`, `dbmonthly`, `dbinstallment`, `dbpesos`, `dbdueon`, `dbpurposes`, `dbnamesignature`, `dbheldon`, `dbheldon2`, `dbexceptcondition`) VALUES ('$name', '$type_loan', '$bookno', '$loanof', '$periodof', '$semimonth', '$monthly', '$installment', '$pesos', '$dueon', '$purposes', '$nameignature', '$heldon', '$heldon2', '$exceptcondition'  )";
      if (!mysql_query($sql,$con))
      {
      die('Error: ' . mysql_error());
      }




      header('Location: admin_loan.php?id='.$id.'&&name='.$name.'#loan_popup');
      

  ?>