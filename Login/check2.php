

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
            function a(){
            var dw = document.getElementById("dw").value;
            var amount = document.getElementById("dep");
            var Withdrawal = document.getElementById("withdrawal");

                if (dw=="Deposits"){
                    Withdrawal.hidden = true;
                    amount.hidden = false;
                }
                else if(dw=="Withdrawal"){
                    amount.hidden = true;
                    Withdrawal.hidden = false;   
                }
                else{
                 amount.hidden = true;
                    Withdrawal.hidden = true;     
                }
            }
        </script>
        <script type="text/javascript">
            function dept(){
            var dt = document.getElementById("deptype").value;
            var check = document.getElementById("txtcheck");
            var cash = document.getElementById("txtcash");

                if (dt=="Check"){
                    cash.hidden = true;
                    check.hidden = false;
                }
                else if(dt=="Cash"){
                    check.hidden = true;
                    cash.hidden = false;   
                }
                else{
                 check.hidden = true;
                    cash.hidden = true;     
                }
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
        <script type="text/javascript">
             function ap(){
                var app = document.getElementById("appr");
                var appro = document.getElementById("appro");
                var amo = document.getElementById("amo");
                    
                var button1 = document.getElementById("button1");
                var button2 = document.getElementById("button2");

                if (button1.checked){
                    
                    app.hidden = false;
                        appro.hidden = true;
                }else if (button2.checked) {
                    amo.value="";
                    app.hidden = true;
                     appro.hidden = false;
                } 
            }
        </script>

        
        

</head>
<body style="font-family:cambria; background-image: url('images/logo2.png');" >
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
       
        <li class="nav-item dropdown active" style="width: 160px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <i class="glyphicon glyphicon-euro"></i></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="admin_addloan.php">Loan</a>      </li>
                <li><a class="btn btn-default" href="savings.php">Savings</a></li>
                <li><a class="btn btn-default" href="check.php">Cheque</a></li>
                
            </ul>
        </li>
        <li class="nav-item dropdown " style="width: 130px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Reports <i class="glyphicon glyphicon-euro"></i></a>
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
          <center><div class="pannel" style= "width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
        
             
          
          
            <form action = "cheqapp.php" method="POST">
               <h4 style="text-align: left;">Cheque Transaction</h4>
              <div class="row" style="text-align: right; padding-right: 20px">
                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="<?php echo date("m/d/Y");?>" ><br>
              </div>
              <table class="table table-bordered">
                            
                            <?php
                            $query = $_POST['text_check']; 
        
                            $min_length = 1;
                           
                            if(strlen($query) >= $min_length){ 
                                $query = htmlspecialchars($query); 
                                $query = mysqli_real_escape_string($conn, $query);
                                         
                                $raw_results = mysqli_query($conn,"SELECT * FROM dbdeposit WHERE (`dbcheckno` LIKE '%".$query."%' and `dbcheckstat` = ' ')") or die(mysqli_error());
                                 $num_rows = mysqli_num_rows($raw_results);
                                if(mysqli_num_rows($raw_results) == 1){ 

                                    while($results = mysqli_fetch_array($raw_results)){
                                        $cheq = $results['dbcheckno'];
                                        $name = $results['dbname'];
                                        $id = $results['id'];
                                        
                                        echo '
                                            <tr>
                                                <td style="border-right: 0px; "><b>Name  </b></td>
                                                <td style="border-right: 0px; border-left: 0px">:</td>
                                                <td style="border-left: 0px"><input type="text" name="txtname2"  value="'.$name.'" class="form-control" required readonly> </td>
                                                <td style="border-right: 0px; border-left: 0px; width: 20px"><a href="check.php" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></a></td>
                                            </tr>
                                            <tr>
                                                <td style="border-right: 0px"><b>Cheque Number</b></td>
                                                <td style="border-right: 0px; border-left: 0px">:</td>
                                                <td style="border-left: 0px" colspan="2"><input type="text"   name="txtcheq" value="'.$cheq.'" class="form-control" required readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="border-right: 0px"><b><center><input type="radio" name="appbou" value="Approve" onclick="ap()" id="button1" >  Approve &nbsp&nbsp&nbsp <input type="radio" name="appbou" onclick="ap()" value="Bounce"  id="button2">  Bounce</center></b></td>
                                            </tr>
                                            <tr id="appr" hidden>
                                                <td colspan="4" style="border-right: 0px">
                                                <b><center>
                                                    <input type="number" name="amo" id="amo" class="form-control" placeholder="Input Cheque Amount"><br><br>
                                                <input type="text" value="'.$id.'" name="id" hidden><input type="submit" class="btn btn-danger" value="SUBMIT"></center></b></td>
                                            </tr>
                                            <tr id="appro" hidden>
                                                <td colspan="4" style="border-right: 0px">
                                                <b><center>
                                                <input type="submit" class="btn btn-danger" value="SUBMIT"></center></b></td>
                                            </tr>'
                                            ;                            

                                }

                                }
                                else{ // if query length is less than minimum
                                    echo"<tr>";
                                    echo "<td colspan='9'>No results</td>";
                                    echo "</tr>";
                                    echo"</table>";
                                     echo"<center><a href='check.php' class='btn btn-success '>Back</a></center>";
                                   
                                }       

                                 }      
                                else{ // if query length is less than minimum
                                    echo"<tr>";
                                    echo "<td colspan='9'>No results</td>";
                                    echo "</tr>";
                                     echo"</table>";
                                     echo"<center><a href='check.php' class='btn btn-success '>Back</a></center>";
                                   
                                }
                            ?>

                            
            </form>
          </div></center>
        </div>      