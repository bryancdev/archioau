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
      $name =$_POST['txtname2'];
      $mem_id =$_POST['txtmem_id'];
      $amount =$_POST["txtamount"];
      $hiddenamto =$_POST["hiddenamto"];
      if($amount < $hiddenamto)
      {
        header('Location: shared.php?#message3');
      }
      else{
        $raw_results2 = mysqli_query($con, "SELECT * FROM dbshared WHERE `mem_id` = '$mem_id'") or die(mysqli_error());
        $num_rows2 = mysqli_num_rows($raw_results2);
        
        if($num_rows2 > 0)

        {
          $bal =$_POST["txtbal"];
          $dep = $bal - $amount;
          echo $dep;

          if($dep > -1)
          {

            $sql="INSERT INTO dbshared (`mem_id`,`dbname`,`dbdate`, `dbpledge`, `dbdeposit`) VALUES ('$mem_id','$name','$dateToday', '$pledge','$dep')";
            if (!mysqli_query($con, $sql))
            {
            die('Error: ' . mysqli_error());
            }
            header('Location: shared.php?#message');
          
          }
          else{
            header('Location: shared.php?#message2');
          }
        }
        else{
          $balanced =$_POST["txtbalanced"];

          $dep = $balanced - $amount;
          echo $dep;
          if($dep > -1)
          {

            $sql="INSERT INTO dbshared (`mem_id`,`dbname`,`dbdate`, `dbpledge`, `dbdeposit`) VALUES ('$mem_id','$name','$dateToday', '$pledge','$dep')";
            if (!mysqli_query($con, $sql))
            {
            die('Error: ' . mysqli_error());
            }
            header('Location: shared.php?#message');
          
          }
          else{
            header('Location: shared.php?#message2');
          }
        }
      }

  ?>