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


      mysql_query("UPDATE dbmember SET subscription_amount='$pledge' WHERE dbmemid='$id' ")
      or die(mysql_error()); 





      header('Location: admin_loan.php?id='.$id.'&&name='.$name.'#loan_popup');
      

  ?>