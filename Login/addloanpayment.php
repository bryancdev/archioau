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
      $ids =$_POST['ids'];
      $ddd =$_POST['dateee'];

      $loanamountpaid =$_POST['loanamountpaid'];
      $totalloan =$_POST['totalloan'];
      $hiddenl =$_POST['hiddenl'];
      $bal =$_POST['bal'];
      $bals =$_POST['bal'] - $loanamountpaid;
      $sumpayamount =$_POST['sumpayamount'];
      $sumloan = $sumpayamount + $loanamountpaid;
      if($bal < $hiddenl and $bal > 0){
        mysqli_query($con, "UPDATE dbloan SET balance='$bals' WHERE id='$ids' ")
            or die(mysqli_error());
          $result = mysqli_query($con, "SELECT * FROM dbloan WHERE `id` = '$ids'");
          $num_rows = mysqli_num_rows($result);
          $test = mysqli_fetch_array($result);
          if (!$result) 
          {
            die("Error: Data not found..");
          }
          $date =$test['dbdate'];
          $numpay =$test['dbpterm'];

          $result2 = mysqli_query($con, "SELECT * FROM dbpayment WHERE `dbid` = '$ids'");
          $num_rows2 = mysqli_num_rows($result2);
          $test = mysqli_fetch_array($result2);
          if (!$result2) 
          {
            die("Error: Data not found..");
          }

          if($num_rows2 <= 0)
          {
            $d = date("m/d/Y", strtotime($dateToday.' + '.$numpay.' days'));
            if($d < $dateToday)
            {
              $pen = $hiddenl * 0.035;
            }
            else{
              $pen = 0;
            }
            $sql2="INSERT INTO dbpayment (`dbid`,`dbduedate`,`dbdatepaid` , `dbamount`, `dbpenalty`) VALUES ('$ids','$d','$dateToday', '$loanamountpaid', '$pen')";
            if (!mysqli_query($con, $sql2))
            {
            die('Error: ' . mysqli_error());
            }
            
          }
          else
          {
            $result3 = mysqli_query($con, "SELECT * FROM dbpayment WHERE `dbid` = '$ids' order by id desc limit 1");
            $num_rows3 = mysqli_num_rows($result3);
            $test = mysqli_fetch_array($result3);
            if (!$result3) 
            {
              die("Error: Data not found..");
            }
            $duedate =$test['dbduedate'];
            $d = date("m/d/Y", strtotime($duedate.' + '.$numpay.' days')); //duedate
            if($d < $dateToday)
            {
              $pen = $hiddenl * 0.035;
            }
            else{
              $pen = 0;
            }
              $sql2="INSERT INTO dbpayment (`dbid`,`dbduedate`,`dbdatepaid` , `dbamount`, `dbpenalty`) VALUES ('$ids','$d','$dateToday', '$loanamountpaid', '$pen')";
            
            if (!mysqli_query($con,$sql2))
            {
            die('Error: ' . mysqli_error());
            }
          }
          header('Location: admin_addloan3.php?id='.$mem_id.'#message');
        
      }

      else{
        mysqli_query($con, "UPDATE dbloan SET balance='$bals' WHERE id='$ids' ")
            or die(mysqli_error());
        if($hiddenl > $loanamountpaid)
        {
         header('Location: admin_addloan3.php?id='.$mem_id.'#message2'); 
        }
        else{
          if($sumloan > $totalloan)
          {
           header('Location: admin_addloan3.php?id='.$mem_id.'#message3');  
          }
          else{
            $result = mysqli_query($con, "SELECT * FROM dbloan WHERE `id` = '$ids'");
            $num_rows = mysqli_num_rows($result);
            $test = mysqli_fetch_array($result);
            if (!$result) 
            {
              die("Error: Data not found..");
            }
            $date =$test['dbdate'];
            $numpay =$test['dbpterm'];

            $result2 = mysqli_query($con, "SELECT * FROM dbpayment WHERE `dbid` = '$ids'");
            $num_rows2 = mysqli_num_rows($result2);
            $test = mysqli_fetch_array($result2);
            if (!$result2) 
            {
              die("Error: Data not found..");
            }

            if($num_rows2 <= 0)
            {
              $d = date("m/d/Y", strtotime($dateToday.' + '.$numpay.' days'));
              if($d < $dateToday)
              {
                $pen = $hiddenl * 0.035;
              }
              else{
                $pen = 0;
              }
              $sql2="INSERT INTO dbpayment (`dbid`,`dbduedate`,`dbdatepaid` , `dbamount`, `dbpenalty`) VALUES ('$ids','$d','$dateToday', '$loanamountpaid', '$pen')"; //dto
              if (!mysqli_query($con, $sql2))
              {
              die('Error: ' . mysql_error());
              }
            }
            else
            {
              $result3 = mysqli_query($con, "SELECT * FROM dbpayment WHERE `dbid` = '$ids' order by id desc limit 1");
              $num_rows3 = mysqli_num_rows($result3);
              $test = mysqli_fetch_array($result3);
              if (!$result3) 
              {
                die("Error: Data not found..");
              }
              $duedate =$test['dbduedate'];
              $d = date("m/d/Y", strtotime($duedate.' + '.$numpay.' days'));
              if($d < $dateToday)
              {
                $pen = $hiddenl * 0.035;
              }
              else{
                $pen = 0;
              }
                $sql2="INSERT INTO dbpayment (`dbid`,`dbduedate`,`dbdatepaid` , `dbamount`, `dbpenalty`) VALUES ('$ids','$d','$dateToday', '$loanamountpaid', '$pen')";
              
              if (!mysqli_query($con, $sql2))
              {
              die('Error: ' . mysqli_error());
              }
              mysqli_query($con,"UPDATE dbloan SET balance='$bal' WHERE id='$ids' ")
            or die(mysqli_error());
            }
           header('Location: admin_addloan3.php?id='.$mem_id.'#message');
          }
        }
      }
  ?>