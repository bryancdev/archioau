
<?php
include('session.php');
?>

<?php 
    $dbServer = "localhost";
    $dbDatabase = "coop_dtbs";
    $dbUsername = "root";
    $dbPassword = "";

    if (!mysqli_connect($dbServer, $dbUsername))
        die("Can't connect to database");

    $connection = mysqli_connect("localhost", "root", "");

    if (!mysqli_select_db($connection, $dbDatabase))
        die("Can't select database");

    $strSQL = mysqli_query($connection,"SELECT * FROM dbmember");
    $num_rows = mysqli_num_rows($strSQL);




                                    
?>

<!DOCTYPE html>

<html>
<head>
  <title>SOLL-SCC</title>
  <link rel="icon" type="image/ico" href="images/intro-bg3.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

        <style>
            div.scroll 
            {
                width:100%;
                overflow: scroll;
            }
            td{
                padding-left: 5px;
            }
            @media print {
              #printPageButton {
                display: none;
              }
            }
            .collapsible {
                
            }

            

            .content1 {
                padding: 0 18px;
                display: none;
                overflow: hidden;
                background-color: #f1f1f1;
            }
        </style>
        <script type="text/javascript">
            function printDiv(divName) {
                 var printContents = document.getElementById(divName).innerHTML;
                 var originalContents = document.body.innerHTML;

                 document.body.innerHTML = printContents;

                 window.print();

                 document.body.innerHTML = originalContents;
            }
        </script>
        <script type="text/javascript">
             function deleteConfirm(){
                                var result = confirm("Are you sure you want to delete member?");
                                    if(result){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
        </script>
        <script type="text/javascript">
             function deleteConfirmDeposit(){
                                var result = confirm("Are you sure you want to delete deposit from this member?");
                                    if(result){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
        </script>
        <script type="text/javascript">
             function deleteConfirmLoan(){
                                var result = confirm("Are you sure you want to delete loan from this member?");
                                    if(result){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
        </script>

        
        

</head>
<body style="font-family:cambria;  background-image: url('images/logo2.png');" >
    <nav  class="navbar navbar-inverse" style = "background-color:#1f386e; border: 0px; border-radius: 0px">
      <div class="container-fluid">
        <div class="navbar-brand" style="padding-top: 0px;">
            <img src="images/introbg3.jpg" style="width: 50px">
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><font style="color: white">SHRINE OF OUR LADY LORETO SAVINGS AND CREDIT COOPERATIVE</font></a>    
        </div>
        <ul class="nav navbar-nav navbar-right ">
          <li  style="width: 100px; text-align:center"><a href="admin_page.php">Home <i class="glyphicon glyphicon-home"></i></a></li>
        <li class="nav-item dropdown active" style="width: 160px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <span style="font-size:20px"> &#8369;</span></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="#">Loan</a>      </li>
                <li><a class="btn btn-default" href="savings.php">Savings</a></li>
                <li><a class="btn btn-default" href="check.php">Cheque</a></li>
                
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 130px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Reports <i class="glyphicon glyphicon-file"></i></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="reports.php">List of Members </a></li>
                <li><a class="btn btn-default" href="dailytransaction.php">Daily Transactions</a>      </li>
                
                
            </ul>
        </li>
        <li><a href="logout.php">Logout  <span class="glyphicon glyphicon-log-out"></a></li>
        </ul>
      </div>
    </nav>
        <?php
           $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $conn = mysqli_connect('localhost', 'root', '');
            if (!$conn)
            {
            die('Could not connect: ' . mysql_error());
            }
            mysqli_select_db($conn, "coop_dtbs");

                    ?>
        
        <hr>
        <div class="row" style="padding: 10px">
          <center>
          <div class="pannel" style= 'width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1'>
            <h4 style="text-align: left"><i class="glyphicon glyphicon"></i> Loan Transaction</h4>
              <div class="row" style="text-align: right; padding-right: 20px">
                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="<?php echo date("m/d/Y");?>" ><br>
              </div>
              
              <?php
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "coop_dtbs";

                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                $query="SELECT * FROM dbmember";
                $result = mysqli_query($connect, $query);
                ?>
              <table class="table table-bordered " style="background-color: white; ">
                            
                            <tr>
                                <td style="border-right: 0px; "><b>Member ID </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px">
                                 <form action = "admin_addloan2.php" method="POST">
                                 <input type="text" class="form-control" name="textmem_id">
                                  
                                </td>
                            </tr>
                            

                        </table>
              <center><input type="submit" class="btn btn-success" value="SEARCH"></center>
              </form> 
          
          </div></center>
        </div>
        <hr>
        <div id="message" class="overlay" >
            <div class="popup">
            
               
            <a class="close" href="admin_addloan.php">&times;</a>
            <h3><center>Loan Successfully Added!</center></h3>

        </div>

</body>
</html>

