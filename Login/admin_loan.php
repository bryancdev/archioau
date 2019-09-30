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

        if (!mysqli_select_db($connection , $dbDatabase))
            die("Can't select database");

    $strSQL = mysqli_query($connection, "SELECT * FROM dbmember");
    $num_rows = mysqli_num_rows($strSQL);




                                    
?>

<!DOCTYPE html>

<html>
<head>

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
             function deactivateConfirm(){
                                var result = confirm("Are you sure you want to deactivate loan?");
                                    if(result){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
        </script>
        
        <script type="text/javascript">
             function deleteConfirm(){
                                var result = confirm("Are you sure you want to delete loan?");
                                    if(result){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
        </script>
        <script type="text/javascript">
             function activateConfirm(){
                                var result = confirm("Are you sure you want to activate loan?");
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
          <li style="width: 100px; text-align:center"><a href="admin_page.php">Home <i class="glyphicon glyphicon-home"></i></a></li>
        <li class="dropdown active" style="width: 160px; text-align:center">
            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >File Maintenance <i class="glyphicon glyphicon-cog"></i></a>
            <ul class="dropdown-menu" style="padding: 10px;">
                <li><a class="btn btn-default" href="list_of_members.php">Members Info</a></li>
                <li><a class="btn btn-default" href="admin_loan.php">Loan Type</a></li>
                <li><a class="btn btn-default" href="payment.php">Payment Type</a></li>
                <li><a class="btn btn-default" href="accounts.php">Accounts</a></li>
                <!--<li><a class="btn btn-default" href="#">Penalties</a></li>-->
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 160px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <span style="font-size:20px"> &#8369;</span></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="admin_addloan.php">Loan</a>      </li>
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
            die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db($conn, "coop_dtbs");

                    ?>
        
        <hr>
        <div class="row" style="padding: 10px">
          <center>
          <div class="pannel" style= 'width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px'>
            <h4 style="text-align: left">Loan </h4>
              <div class="row" style="text-align: right; padding-right: 20px">
                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="<?php echo date("m/d/Y");?>" hidden><br>
              </div>
              
              
              <?php 
                  $dbServer = "localhost";
                  $dbDatabase = "coop_dtbs";
                  $dbUsername = "root";
                  $dbPassword = "";

                  if (!mysqli_connect($dbServer, $dbUsername))
                      die("Can't connect to database");

                  
      
    $connection = mysqli_connect("localhost", "root", "");

    if (!mysqli_select_db($connection , $dbDatabase))
        die("Can't select database");

                  $strSQL = mysqli_query($connection, "SELECT * FROM dbloantype");
                  $num_rows = mysqli_num_rows($strSQL);




                                                  
              ?>
                      <div class="scroll" style="height: 50vh; overflow-x: hidden">
                        <table class="table table-bordered " style="background-color: white; ">
                          <thead>
                            <tr>
                              <td>Code</td>
                              <td>Description</td>
                              <td>Interest</td>
                              <td>Terms</td>
                              <td>Status</td>
                              <td width="30%"></td>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            while($test = mysqli_fetch_array($strSQL))
                                    {
                                    $id = $test['code'];
                                    $i = $test['id'];
                                    $status = $test['dbstatus'];
                                        echo"<tr>";
                                        echo '<td>'. $test['code'].'</td>';
                                        echo '<td>'. $test['description'].'</td>';
                                        echo '<td>'. $test['interest'].' %</td>';
                                        echo '<td>'. $test['terms'].' Months</td>';
                                        echo '<td>'. $test['dbstatus'].'</td>';
                                       
                                        if($status == "Activate"){
                                          echo "<td style='font-size: 12px' bgcolor='#F5F8F9' ><center>
                                            &nbsp
                                            <a href='activate.php?code=$id'  title='Deactivate this Loan'  onclick='return deactivateConfirm();' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i>  DEACTIVATE </a> &nbsp / &nbsp <a href='delete.php?code=$id'  title='Delete this Loan'  onclick='return deleteConfirm();' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i> </a>
                                            </td>";
                                        }
                                        else{

                                        echo "<td style='font-size: 12px' bgcolor='#F5F8F9' ><center>
                                            &nbsp
                                            <a href='deactivate.php?code=$id'  title='Activate this Loan'  onclick='return activateConfirm();' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-ok'></i>  ACTIVATE </a> &nbsp / &nbsp <a href='delete.php?code=$id'  title='Delete this Loan'  onclick='return deleteConfirm();' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i> </a>
                                            </td>";
                                        }
                                    
                                        echo "</tr>";
                                    }
                                    //<a href='admin_loan.php?code=$id#editloantype'  title='Edit Information' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit '></i>  EDIT </a> &nbsp / 
                                     ?>
                        
                          </tbody>
                        </table>
                      </div>
              <center><a href="#addloantype" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> ADD</a></center>
          
          </div></center>
        </div>
        <hr>
  <div id="addloantype" class="overlay">
    <div class="popup" style="width: 30%">
            
            <a class="close" href="#">&times;</a>
            <h4>Add Loan Type</h4>
            <hr>
            Code
            <form action="addloantype.php" method="POST" >
              <?php 
              if ($num_rows==0)
              {
              echo '<input type="text" name="code" class="form-control" value="L0001" readonly>';
              echo '<input type="text" name="code1" class="form-control" value="1"  style="visibility: hidden">';
                 
              }else{
                $sum = $i + 1;
                echo '<input type="text" name="code" class="form-control" value="L000'.$sum.'" readonly>';
              
                echo '<input type="text" name="code1" class="form-control" value="'.$sum.'" style="visibility: hidden">';
              }
              ?>
            Input Loan Type
              <input type="text" name="loantype" class="form-control">
              <br><br>

            Input Interest %
              <input type="number" name="interest" class="form-control">
              <br><br>

            Input Terms
            <input type="number" name="terms" class="form-control">
              
              <br><br>
              <center><input type="submit" name="submit" value="Submit" class="btn btn-primary"></center>
            </form>
    </div>
  </div>
    <div id="editloantype" class="overlay">
    <div class="popup" style="width: 30%">
            
            <a class="close" href="admin_loan.php">&times;</a>
            <h4>Add Loan Type</h4>
            <hr>
            Code
            <form action="../addloantype.php" method="POST" >
              <?php 
              $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                  $dbServer = "localhost";
                  $dbDatabase = "coop_dtbs";
                  $dbUsername = "root";
                  $dbPassword = "";

                  if (!mysqli_connect($dbServer, $dbUsername))
                      die("Can't connect to database");

                  if (!mysqli_select_db($dbDatabase))
                      die("Can't select database");

                  $id =$_REQUEST['code'];
                  $strSQL3 = mysqli_query("SELECT * FROM dbloantype where code='$id'");
                  $num_rows3 = mysqli_num_rows($strSQL3);

                  while($test = mysqli_fetch_array($strSQL3))
                                    {
                                    $id = $test['code'];
                                    $loantype = $test['description'];
                                    $interest = $test['interest'];
                                    $terms = $test['terms'];

                 }
              
              ?>
              <input type="text" name="code" class="form-control" value="<?php echo $id?>" readonly><br><br>
            Input Loan Type
              <input type="text" name="loantype" class="form-control" value="<?php echo $loantype?>">
              <br><br>
              Input Interest
              <input type="text" name="interest" class="form-control" value="<?php echo $interest?>">
              <br><br>

            Input Terms
            <textarea name="terms" class="form-control" ><?php echo $terms?></textarea>
              <br><br>            
              <center><input type="submit" name="submit" value="SAVE" class="btn btn-primary"></center>
            </form>
    </div>
  </div>
  <div id="message" class="overlay">
    <div class="popup">
            
            <a class="close" href="#">&times;</a>
            <h3><center>Loan Type Successfully Added!</center></h3>
    </div>
  </div>



