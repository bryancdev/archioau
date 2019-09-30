
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

    $strSQL = mysqli_query($connection, "SELECT * FROM dbmember");
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
                <script type="text/javascript">
             function addpayment(){
                var payment = document.getElementById("addpayment");
                var btnpayment = document.getElementById("btn");
                btnpayment.style.visibility = "hidden";
                payment.hidden = false;

            }
        </script>
               <script type="text/javascript">
           function loanablea(){
            var aa = document.getElementById("loanaa");
            var bb = document.getElementById("loanba");
            var cc = document.getElementById("txtamounta");
            var dd = document.getElementById("txtprincipala");
            var ee = document.getElementById("tla");
            var ff = document.getElementById("tlaa");
            var oldcc = document.getElementById("txtamounta").value;
            if (aa.checked)
            {
                cc.hidden = true;
                cc.value = "";
                ff.value = ""; 
                cc.value = oldcc;
                dd.hidden = false;
                ee.hidden = false;
                ff.hidden = true; 
            }
            else if (bb.checked){
               cc.hidden = false; 
                dd.hidden = true;
                ee.hidden = true;
                ff.hidden = false;
                cc.value = "";
            }
           }
       </script>
       <script type="text/javascript">
           
           function calculate(){
            var amounta = document.getElementById("txtamounta");
            var tlaa = document.getElementById("tlaa");
            var cb = document.getElementById("cb");
            var sf = document.getElementById("sf");


                tlaa.value = parseInt(amounta.value) - parseInt(cb.value) - parseInt(sf.value);
            
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <span style="font-size:20px"> &#8369;</span></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="admin_addloan.php">Loan</a>      </li>
                <li><a class="btn btn-default" href="savings.php">Savings</a></li>
                
                <li><a class="btn btn-default" href="check.php">Cheque</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown " style="width: 130px; text-align:center">
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
        
            
                            
                            <?php
                            $query = $_POST['textmem_id']; 
        
                            $min_length = 1;
                           
                            if(strlen($query) >= $min_length)
                            { 
                                $query = htmlspecialchars($query); 
                                $query = mysqli_real_escape_string($conn, $query);
                                         
                                $raw_results = mysqli_query($conn, "SELECT * FROM dbmember WHERE (`dbmemid` LIKE '%".$query."%')") or die(mysql_error());
                                 $num_rows = mysqli_num_rows($raw_results);
                                if(mysqli_num_rows($raw_results) == 1){ 

                                    while($results = mysqli_fetch_array($raw_results))
                                    {
                                        $id = $results['dbmemid'];

                                        $name = $results['dbfirstname']. " " .$results['dbmiddlename']. " " .$results['dblastname'];
                                        $subsam = $results['subscription_amount'];

                                            
                                                   $raw_results2 = mysqli_query($conn, "SELECT * FROM dbdeposit WHERE `mem_id` = '$id'") or die(mysql_error());
                                                    $num_rows2 = mysqli_num_rows($raw_results2);
                                                    $test = mysqli_fetch_array($raw_results2);
                                                    $idd = $test['mem_id'];
                                                    if($num_rows2 > 0)

                                                    {
                                                        $result9 = mysqli_query($conn, "SELECT * FROM dbloan WHERE `mem_id` = '$id' AND balance > 0") or die(mysqli_error());
                                                        $num_rows8 = mysqli_num_rows($result9);
                                                        $test = mysqli_fetch_array($result9);
                                                        if (!$result9) 
                                                        {
                                                            die("Error: Data not found..");
                                                        }
                                                        $ids = $test['mem_id'];
                                                        if($num_rows8 < 1)
                                                        {
                                                        $result2 = mysqli_query($conn, "SELECT SUM(dbdeposit), SUM(dbwithdrawal) FROM dbdeposit WHERE `mem_id` = '$id'");


                                                            $test = mysqli_fetch_array($result2);
                                                            if (!$result2) 
                                                            {
                                                                die("Error: Data not found..");
                                                            }

                                                            $deps =$test['SUM(dbdeposit)'] - $test['SUM(dbwithdrawal)'] ;
                                                            
                                                            if ($deps > 199)
                                                            {   

                                                            echo '
                                                            <center> <div class="pannel" style= "width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
         
                                                             <form action = "addloan.php" method="POST">
                                 
                                                              <h4 style="text-align: left">Loan Transaction</h4>
                                                                                                
                                                                <div class="row" style="text-align: right; padding-right: 20px">
                                                                    <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="'.date("m/d/Y").'" ><br>
                                                                </div>
                                                                <table class="table table-bordered" >
                                                                    <tr>
                                                                        <td style="border-right: 0px; "><b>Member ID </b></td>
                                                                        <td style="border-right: 0px; border-left: 0px">:</td>
                                                                        <td style="border-left: 0px"><input type="text" name="txtmem_id" value="'.$id.'" class="form-control" required readonly> </td>
                                                                        <td style="border-right: 0px; border-left: 0px; width: 20px"><a href="admin_addloan.php" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 0px"><b>Name </b></td>
                                                                        <td style="border-right: 0px; border-left: 0px">:</td>
                                                                        <td style="border-left: 0px" colspan="2"><input type="text" name="txtname2"  value="'.$name.'" class="form-control" required readonly></td>
                                                                    </tr>';
                                                                echo '
                                                                <tr>
                                                                    <td style="border-right: 0px"><b>Loan Type </b></td>
                                                                    <td style="border-right: 0px; border-left: 0px">:</td>
                                                                    <td style="border-left: 0px" colspan="2">';
                                                                        $hostname = "localhost";
                                                                        $username = "root";
                                                                        $password = "";
                                                                        $databaseName = "coop_dtbs";
                                                                        $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                                        $query="SELECT * FROM dbloantype Where dbstatus ='Activate' ";
                                                                        $result = mysqli_query($connect, $query);
                                                                        echo '<select class="form-control" name="cbcod" required onchange="refresh()";>
                                                                            ';
                                                                             while ($row = mysqli_fetch_array($result)):
                                                                             $aiTerm = 6;
                                                                        echo '<option value='.$row[2].'>'.$row[1].' - '.$row[2].'</option>';
                                                                            endwhile;
                                                                        echo'                                                                           
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                        
                                                                <tr hidden>
                                                                    <td style="border-right: 0px"><b>Principal </b></td>
                                                                    <td style="border-right: 0px; border-left: 0px">:</td>

                                                                ';
                                                            
                                                                    $result = mysqli_query($conn, "SELECT * FROM dbshared WHERE `mem_id` = '$id' Order by id DESC limit 1");


                                                                    $test = mysqli_fetch_array($result);
                                                                    if (!$result) 
                                                                    {
                                                                        die("Error: Data not found..");
                                                                    }
                                                                        
                                                                    $dep =$test["dbdeposit"];
                                                                    $deposit=$subsam - $dep;
                                                                    $idd =$test["mem_id"];
                                                                        $s = $deposit * 2;
                                                                        $d = $deps * 2;
                                                                        $t = $s + $d;
                                                                        $c = $t * 0.05;
                                                                        $ai = ($t * 0.015) * $aiTerm;
                                                                        $tla = $t - 150 - $c - $ai;
                                                                    $principal = $deposit + $deps;
                                                                        
                                                                echo '
                                                                    <td style="border-left: 0px" colspan="2" ><input type="text"  value="'.$principal.'" class="form-control" required readonly></td>
                                                                </tr>
                                                                 <tr style="border-bottom: 0px">
                                                                    <td style="border-right: 0px;border-bottom: 0px"><b>
                                                                        <input type="radio" id="loanaa"  onclick="loanablea()" name="loanable" value="a" checked> Principal Loanable Amount<br>
                                                                        <input type="radio" id="loanba" onclick="loanablea()" name="loanable" value="b"> Amount to be loaned other than 200%
                                                                         </b></td>
                                                                    <td style="border-right: 0px; border-left: 0px; border-bottom: 0px">:</td>
                                                                    <td style="border-left: 0px; border-bottom: 0px" colspan="2" ><input type="text" name="txtprincipal" id="txtprincipala"   value="'.$t.'" class="form-control" required readonly>
                                                                    <input type="number" name="txtamount" id="txtamounta" value="'.$t.'" onchange="calculate();" class="form-control" hidden></td>
                                                                </tr>

                                                                <tr id="lesscharges">
                                                                    <td style="border-right: 0px; border-top: 0px; border-left: 0px; text-align:right" ><b>Less Charges</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Service fee<br>Capital build up (5% of principal amt.)
                                                                    <br>Advanced Interest 
                                                                        <td style="border-right: 0px; border-top: 0px; border-left: 0px; ">: <br> : <br> :</td>
                                                                        <td style="border-right: 0px; border-top: 0px; border-left: 0px" colspan="2"><input type="text" name="sf" id="sf" value="150.00" style="border: 0px;" readonly><u></u><br>
                                                                        <input type="text" name="cb" id="cb" value="'.$c.'"  style="border: 0px; " readonly><u></u><br>
                                                                        <input type="text" name="cb" id="cb" value="'.$ai.'"  style="border: 0px; " readonly><u></u></td>
                                                                    </td>      
                                                                </tr>
                                                                <tr>
                                                                    <td style="border-right: 0px"><b>Net Amount Due</b></td>
                                                                    <td style="border-right: 0px; border-left: 0px">:</td>
                                                                    <td style="border-left: 0px" colspan="2"><input type="number"  class="form-control" id="tla" value="'.$tla.'"  required readonly><input type="number"  class="form-control" id="tlaa" value=""  required readonly hidden></td>
                                                                </tr>
                                                                    

                                                                <tr>
                                                                    <td style="border-right: 0px"><b>Payment Type </b></td>
                                                                    <td style="border-right: 0px; border-left: 0px">:</td>
                                                                    <td style="border-left: 0px" colspan="2">';
                                                                        $hostname = "localhost";
                                                                        $username = "root";
                                                                        $password = "";
                                                                        $databaseName = "coop_dtbs";
                                                                        $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                                        $query="SELECT * FROM dbpaymenttype Where dbstatus ='Activate'";
                                                                        $result = mysqli_query($connect, $query);
                                                                        echo '<select class="form-control" name="cbpay" required>
                                                                            <option></option>';
                                                                             while ($row = mysqli_fetch_array($result)):
                                                                        echo '<option value='.$row[1].'>'.$row[2].' - '.$row[3].' days</option>';
                                                                            endwhile;
                                                                        echo'    
                                                                        </select>
                                                                    </td>
                                                                </tr>';
                                                            echo'</table>
                                                            <center>';
                                                             echo'<input type="submit" class="btn btn-success" value="SAVE"></center>      
                                                            </form>
                                                            </div>';
                                                            }
                                                            else
                                                            {
                                                            echo '
                                                                <tr>
                                                                    <td colspan="4" style="color: red"> <center><span class="glyphicon glyphicon-alert"></span> Please settle atleast 200 of your savings!</center>
                                                                    </td>
                                                                </tr>';
                                                            }
                                                        
                                                        }
                                                        else{
                                                        $dbdate = $test['dbdate'];
                                                        $dbtypes = $test['dbtypes'];
                                                        $dblterm = $test['dblterm'];
                                                        $dblinterest = $test['dblinterest']; 
                                                        $paymenttype = $test['dbpaymenttype'];
                                                        $dbnumpay = $test['dbnumpay']; 
                                                        $lo = $test['dbloanof'];
                                                        $loanof = $test['dbloanof'] ;

                                                        $inte =  $dblinterest / 100;
                                                        $loano = $loanof * $inte;
                                                        $inter = $loano * $dblterm;
                                                        $loan = $lo + $inter;

                                                        $f =$test['dbdate_first_payment'];
                                                        $s =$test['dbdate_second_payment'];
                                                        $thr =$test['dbdate_third_payment'];
                                                        $four =$test['dbdate_fourth_payment'];
                                                        $fifth =$test['dbdate_fifth_payment'];
                                                        $six =$test['dbdate_six_payment'];
                                                        $seven =$test['dbdate_seven_payment'];
                                                        $eight =$test['dbdate_eight_payment'];
                                                        $nine =$test['dbdate_nine_payment'];
                                                        $ten =$test['dbdate_tenth_payment'];
                                                        $eleven =$test['dbdate_eleven_payment'];
                                                        $twelve =$test['dbdate_twelve_payment'];
                                                        
                                                        $la = $dbnumpay * $dblterm;
                                                        $l = $loan / $la;
                                                        $termss = $dblterm * $dbnumpay; 


                                                        echo '
                                                        <center><div class="pannel" style= "width: 90%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
         
                                                         <form action = "addloanpayment.php" method="POST">
                             
                                                          <h4 style="text-align: left">Loan Transaction</h4>
                                                                                     
                                                            <div class="row" style="text-align: right; padding-right: 20px">
                                                                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="'.date("m/d/Y").'" ><br>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <table class="table table-bordered" >
                                                                        <tr>
                                                                            <td style="border-right: 0px; "><b>Member ID </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2"><input type="text" name="txtmem_id" value="'.$id.'" class="form-control" required readonly> </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border-right: 0px"><b>Name </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2"><input type="text" name="txtname2"  value="'.$name.'" class="form-control" required readonly></td>
                                                                        </tr>';
                                                                    echo '
                                                                        <tr>
                                                                            <td style="border-right: 0px"><b>Loan Type </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2">'.$dbtypes.'<input type="text" name="cbcod" value="'.$dbtypes.'" hidden><input type="text" name="dateee" value="'.$dbdate.'" hidden></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border-right: 0px"><b>Loan Amount </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2">200% of Savings and Paid Share Capital<input type="text" name="ids" value="'.$ids.'" hidden></td>
                                                                        </tr>';
                                                                    echo'<tr>
                                                                            <td style="border-right: 0px"><b>Loan Term </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2">'.$dblterm.' Months ('.$paymenttype.')</td>
                                                                        </tr>';
                                                                    echo'
                                                                        <tr>
                                                                            <td style="border-right: 0px"><b>Loan Interest </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            <td style="border-left: 0px" colspan="2">'.$inter.'</td>
                                                                        </tr>';
                                                                    echo'<tr>
                                                                            <td style="border-right: 0px"><b>Total Loan to be paid </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            
                                                                            <td style="border-left: 0px" colspan="2">'.$loan.'<input type="text" name="totalloan" value="'.$loan.'" hidden></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border-right: 0px"><b>Monthly Amortization </b></td>
                                                                            <td style="border-right: 0px; border-left: 0px">:</td>
                                                                            
                                                                            <td style="border-left: 0px" colspan="2">'.round($l).'<input type="text" name="hiddenl" value="'.round($l).'" hidden></td>
                                                                        </tr>


                                                                        ';
                                                                    echo'</table>
                                                                </div>
                                                            
                                                            <center>';

                                                             echo'
                                                                <div class="col-md-6">
                                                                     <table class="table table-bordered" style="border-bottom: 0px; padding-bottom: 0px; ">
                                                                        
                                                                        <tr>
                                                                           <td colspan ="5"> <center>Payment List</center></td>
                                                                           <td style="border-right: 0px; border-left: 0px; width: 20px"><a href="admin_addloan.php" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></a></td>  
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Due Date</td>
                                                                            <td colspan="2">Date Paid</td>
                                                                            <td colspan="1">Amount</td>
                                                                            <td colspan="2">Penalty</td>
                                                                        </tr>

                                                                        ';
                                                                        
                                                                    $result30 = mysqli_query($conn, "SELECT * FROM dbpayment WHERE `dbid` = '$idd'") or die(mysql_error());
                                                                    $num_rows30 = mysqli_num_rows($result30);
                                                                    if (!$result30) 
                                                                    {
                                                                        die("Error: Data not found..");
                                                                    }
                                                                    if($num_rows30 > 0)
                                                                    {
                                                                        while($test = mysqli_fetch_array($result30))
                                                                        {
                                                                        echo '
                                                                        <tr>
                                                                            <td >
                                                                                '.$test['dbduedate'].'
                                                                            </td>
                                                                            <td colspan="2">
                                                                                '.$test['dbdatepaid'].'
                                                                            </td>
                                                                            <td colspan="1">
                                                                                '.round($test['dbamount']).'
                                                                            </td>
                                                                            <td colspan="2">
                                                                                '.round($test['dbpenalty']).'
                                                                            </td>
                                                                        <tr>';
                                                                        }
                                                                         $result32 = mysqli_query($conn, "SELECT SUM(dbpenalty) FROM dbpayment WHERE `dbid` = '$idd'"  ) or die(mysqli_error());
                                                                        $num_rows32 = mysqli_num_rows($result32);
                                                                        $test = mysqli_fetch_array($result32);
                                                                        if (!$result32) 
                                                                        {
                                                                            die("Error: Data not found..");
                                                                        }
                                                                         $loanll = $loan + $test['SUM(dbpenalty)'];
                                                                        $result31 = mysqli_query($conn, "SELECT SUM(dbamount) FROM dbpayment WHERE `dbid` = '$idd'") or die(mysqli_error());
                                                                        $num_rows31 = mysqli_num_rows($result31);
                                                                        $test = mysqli_fetch_array($result31);
                                                                        if (!$result31) 
                                                                        {
                                                                            die("Error: Data not found..");
                                                                        }
                                                                        echo '
                                                                        <tr>
                                                                            
                                                                            <td colspan="3">
                                                                                Total
                                                                            </td>
                                                                            <td colspan="1">
                                                                                '.round($test['SUM(dbamount)']).' <input type="text" name="sumpayamount" value="'.round($test['SUM(dbamount)']).'"  hidden>
                                                                            </td>
                                                                            <td colspan="2"></td>
                                                                        <tr>';
                                                                        $loanl =  $loanll - $test['SUM(dbamount)'];
                                                                        echo'<tr>
                                                                            
                                                                            <td colspan="3">
                                                                                Balance
                                                                            </td>
                                                                            <td colspan="1">
                                                                                '.round($loanl). '<input type="text" name="bal" value="'.round($loanl).'" hidden> 
                                                                            </td>
                                                                            <td colspan="2"></td>
                                                                        <tr>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo'
                                                                            <tr>
                                                                                <td colspan="6">
                                                                                    No results <input type="text" name="bal" value="9000" style="color: white; border-color:white; border-width: 0px">
                                                                                </td>
                                                                                
                                                                            <tr>
                                                                            ';

                                                                    }
                                                                    


                                                            echo'         </table>
                                                                    
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                             <div class="col-md-2"></div>
                                                             <div class="col-md-8" id="addpayment" hidden>
                                                             
                                                                         
                                                                         <table class="table " style="background-color: #DCDEDE; border-radius: 5px">
                                                                         <tr>
                                                                            <td style="text-align: right; " valign="center">
                                                                            Input Amount :
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="loanamountpaid" class="form-control" required>
                                                                            </td>
                                                                        
                                                                         <td style="text-align:right">
                                                                         <center>
                                                                         <input type="submit" class="btn btn-success" value="SUBMIT"></center>
                                                                         </td>
                                                                        </tr>
                                                                         </table>
                                                                     </div>
                                                                     </div>
                                                             <a id="btn" class="btn btn-primary" onclick="addpayment()" >ADD PAYMENT</a>
                                                        </form>
                                                        </div>';

                                                        
                                                        }

                                                    }
                                                    else
                                                    {
                                                        echo '
                                                        <center><div class="pannel" style= "width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
         
                                                             <form action = "addloan.php" method="POST">
                                 
                                                              <h4 style="text-align: left">Loan Transaction</h4>
                                                                                                
                                                                <div class="row" style="text-align: right; padding-right: 20px">
                                                                    <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="'.date("m/d/Y").'" ><br>
                                                                </div>
                                                                <table class="table table-bordered" >
                                                                    <tr>
                                                                        <td style="border-right: 0px; "><b>Member ID </b></td>
                                                                        <td style="border-right: 0px; border-left: 0px">:</td>
                                                                        <td style="border-left: 0px"><input type="text" name="txtmem_id" value="'.$id.'" class="form-control" required readonly> </td>
                                                                        <td style="border-right: 0px; border-left: 0px; width: 20px"><a href="admin_addloan.php" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 0px"><b>Name </b></td>
                                                                        <td style="border-right: 0px; border-left: 0px">:</td>
                                                                        <td style="border-left: 0px" colspan="2"><input type="text" name="txtname2"  value="'.$name.'" class="form-control" required readonly></td>
                                                                    </tr>
                                                        <tr>
                                                            <td colspan="4" style="color: red"> <center><span class="glyphicon glyphicon-alert"></span> Please settle the subscription amount and savings first!</center>
                                                            </td>
                                                        </tr>
                                                        </table>';
                                                    }
                                                
                                                
                                         
                                                
                                    }     
                                }
                                elseif(mysqli_num_rows($raw_results) > 1){ // if query length is less than minimum
                                   
                                    echo'<center><div class="pannel" style= "width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
         
                                             
                                                                          <h4 style="text-align: left">Loan Transaction</h4>
                                                                                                     
                                                                            <div class="row" style="text-align: right; padding-right: 20px">
                                                                                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="'.date("m/d/Y").'" ><br>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <table class="table table-bordered" >
                                                                                        <tr>
                                                                                            <td colspan="5">
                                                                                               Too many results, please be specific!
                                                                                            </td>
                                                                                        <tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <center><a href="admin_addloan.php" class="btn btn-success">BACK</a></center>
                                                                        </div>';
                                }
                                else{ 
                                        echo'<center><div class="pannel" style= "width: 50%; background-color: white; box-shadow:1px 1px 20px grey; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-style: solid; border-width: 1px; border-color: #4260a1; border-width: 2px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: #4260a1">
         
                                             
                                                                          <h4 style="text-align: left">Loan Transaction</h4>
                                                                                                     
                                                                            <div class="row" style="text-align: right; padding-right: 20px">
                                                                                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent" value="'.date("m/d/Y").'" ><br>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <table class="table table-bordered" >
                                                                                        <tr>
                                                                                            <td colspan="5">
                                                                                                No results
                                                                                            </td>
                                                                                        <tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <center><a href="admin_addloan.php" class="btn btn-success">BACK</a></center>
                                                                        </div>';
                                        
                                    }
                                     
                            }
                            
                            ?>

                            
            
          </div></center>
        </div>
        <hr>

      