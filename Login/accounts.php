
<?php
include('session.php');
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
    <div class="row" >
        <div class="col-md-12" >
            
                <div class="panel-body " style="padding-top: 2px">
                    
                    <form action = "accounts_search.php" method="POST">
                        <div class="row" >
                            <div class="col-md-4" >
                                <div class="input-group">

                                    <span class="input-group-addon" ><i class="glyphicon glyphicon-search"></i></span>
                                    <input type="text" name="search"  placeholder="Search" style=" width: 100%; height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
           box-shadow:1px 1px 20px grey;
">
                                </div>
                            </div>
                                  
                        </div>
                    </form>
                    <br>
                    <div class="scroll" style="padding: 5px ; height: 500px; overflow-x: hidden;">
                    <table border="1px" width="100%" class="table table-hover ">

                        <thead >
                            <tr class="info">
                                <th style="width: 180px" bgcolor="#F5F8F9">MEMBER ID</th>
                                <th bgcolor="#F5F8F9">NAME</th>
                                <th  bgcolor="#F5F8F9" > SAVINGS</th>
                                <th bgcolor="#F5F8F9">LOAN AMOUNT</th>
                                <th style="width: 200px" bgcolor="#F5F8F9">SUBSCRIPTION AMOUNT</th>
                                <th style="width: 200px" bgcolor="#F5F8F9">PAID UP SHARE CAPITAL</th>
                                <th bgcolor="#F5F8F9">BALANCE</th>
                                <th bgcolor="#F5F8F9">NO. OF SHARES</th>
                                
                            </tr>
                        </thead>
                        <tbody style="background-color: white">
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




                                while($test = mysqli_fetch_array($strSQL))
                                    {
                                    $id = $test['dbmemid'];
                                    $subs = $test['subscription_amount'];
                                        echo"<tr>";
                                        echo '<td>'. $test['dbmemid'].'</td>';
                                        echo '<td>'. $test['dblastname'] ;
                                        echo ", ";

                                        echo  $test['dbfirstname'];
                                        echo " ";
                                        echo  $test['dbmiddlename']."</td>";

                                       

                                        $strSQL4 = mysqli_query("SELECT * FROM dbdeposit where mem_id = '$id'");
                                        $num_rows3 = mysqli_num_rows($strSQL4);
                                        
                                        if ($num_rows3 > 0)
                                        {
                                            $strSQL5 = mysqli_query("SELECT SUM(dbdeposit), SUM(dbwithdrawal) FROM dbdeposit where mem_id = '$id'");
                                            while($test = mysqli_fetch_array($strSQL5))
                                            {
                                                $ddd = $test['SUM(dbdeposit)'] ;
                                                $wi = $test['SUM(dbwithdrawal)'] ;
                                                $save = $ddd - $wi;
                                              echo "<td style='border-right: 0px' >". $save." Php</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                               
                                            } 
                                        }
                                        else{
                                            echo "<td style='border-right: 0px' >0 Php</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                            
                                        }
                                         $strSQL2 = mysqli_query("SELECT * FROM dbloan where mem_id = '$id'");
                                        $num_rows2 = mysqli_num_rows($strSQL2);
                                        
                                        if ($num_rows2 > 0)
                                        {
                                             $strSQL3 = mysqli_query("SELECT FORMAT(SUM(dbloanof),0) FROM dbloan where mem_id = '$id'");
                                            while($test = mysqli_fetch_array($strSQL3))
                                            
                                              echo "<td style='border-right: 0px; '  >". $test['FORMAT(SUM(dbloanof),0)']." Php</td>";
                                            /*echo "<td style='border-left: 0px; '><a href='accounts.php?id=$id#payloan'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-euro '></i> PAY LOAN </a></td>";   */
                                            
                                        }
                                        else{
                                            echo '<td style="border-right: 0px" >0 Php</td>';
                                            
                                        }
                                        echo '<td style="border-right: 0px" >'.$subs.' Php</td>';
                                        $strSQL4 = mysqli_query("SELECT * FROM dbshared where mem_id = '$id'");
                                        $num_rows4 = mysqli_num_rows($strSQL4);
                                        
                                        if ($num_rows4 > 0)
                                        {
                                             $strSQL5 = mysqli_query("SELECT * FROM dbshared where mem_id = '$id' order by id desc limit 1");
                                            while($test = mysqli_fetch_array($strSQL5))
                                            $depos = $test['dbdeposit'];
                                            $p = $subs - $depos;
                                            echo '<td style="border-right: 0px" >'.$p.' Php</td>';
                                              echo "<td style='border-right: 0px; '  >". $depos." Php</td>";
                                            /*echo "<td style='border-left: 0px; '><a href='accounts.php?id=$id#payloan'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-euro '></i> PAY LOAN </a></td>";   */
                                            
                                        }
                                        else{
                                            echo '<td style="border-right: 0px" > 0 Php</td>';
                                            echo '<td style="border-right: 0px" > 0 Php</td>';
                                            
                                        }


                                        $strSQL8 = mysqli_query("SELECT * FROM dbshared where mem_id = '$id'");
                                        $num_rows8 = mysqli_num_rows($strSQL8);
                                        
                                        if ($num_rows8 > 0)
                                        {
                                            $strSQL5 = mysqli_query("SELECT * FROM dbshared where mem_id = '$id' order by id desc limit 1");
                                            
                                            while($test = mysqli_fetch_array($strSQL5))
                                            {
                                            $depos = $test['dbdeposit'];
                                            $p = $subs - $depos;
                                            $points = $p / 100;
                                              echo "<td style='border-right: 0px' >". $points." Pts</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                               
                                            } 
                                        }
                                        else{
                                            echo "<td style='border-right: 0px' >0 Pts</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                            
                                        }
                                        
                                        echo "</tr>";
                                    }
                                    
                                     ?>
                    
                                </tbody>
                           </tbody>
                    </table>
                </div>
                </div>
            
        </div>  
    </div>
    <div id="loan_popup" class="overlay" >
        <div class="popup" style="  height: auto;  min-height: 90% !important;" >
            <?php
                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                $name =$_REQUEST['name'];
            ?>
             <h2>Loan (<?php echo $name;?>)</h2>

            <hr>
            <a class="close" href="#">&times;</a>
            <div class="content">
                
                <button class="collapsible btn btn-primary">ADD LOAN</button>
                <div class="content1" style="padding: 10px">
                    <div class="row">
                        <form  method="post"  action="add_loan.php">
                            <center>
                            <div class="scroll" style="padding: 5px ; height: 350px; overflow-x: hidden;">
                            <table width="960px">
                                <tr>
                                    <td align="center" style="font-size: 16px; font-family: Tahoma" colspan="2" >
                                        <b>SHRINE OF OUR LADY OF LORETO SAVINGS AND CREDIT COOPERATIVE<br>
                                        J. Figueras St., Sampaloc, Manila (1008), Tel. No. 734-6961</b><br><br>
                                        <b>LOAN APPLICATION</b><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    </td>
                                    <td  style="font-size: 16px; font-family: Tahoma" >
                                        Types of Term 
                                        <select name="cbtype_loan"style=" border: 0px;" >
                                            <option></option>
                                            <option>Short Term</option>
                                            <option>Long Term</option>
                                            <option>Emergency</option>
                                        </select>
                                        <br><br>
                                    </td>
                                    <td align="right" style="font-size: 16px; font-family: Tahoma" >
                                        Book No. <input type="text" name="txtbookno" style="width: 30%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"><br><br>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-family: Tahoma" align="justify" colspan="2">
                                    I hereby apply for a loan of <input type="text" name="txtloanof" style="width: 74%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"> PESOS 
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 16px; font-family: Tahoma" align="justify" colspan="2">

                                    payable within a period of <input type="text" name="txtperiodof" style="width: 20%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"> months in semi-monthly <input type="text" name="txtsemimonth" style="width: 10%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"> or monthly <input type="text" name="txtmonthly" style="width: 20%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-family: Tahoma" align="justify" colspan="2">
                                     installments of <input type="text" name="txtinstallment" style="width: 50%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"> PESOS (₱<input type="text" name="txtpesos" style="width: 30%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;">) 
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-family: Tahoma" align="justify" colspan="2">     

                                     each plus interest. The first payment is due on <input type="text" name="txtdueon" style="width: 50%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;">. 
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 16px; font-family: Tahoma" align="justify" colspan="2">
                                    This loan is to be used for the following purposes:<br>  
                                    <textarea name="txtpurposes" style="width: 100%; height: 70px; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"></textarea>.Thank you very much.<br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; text-justify: inter-word; font-size: 16px; font-family: Tahoma" width="50%">
                                    <input type="text"  style="width: 80%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid; text-align: center;" disabled> <br>       
                                            Date                    


                                    </td>
                                     <td style="text-align: center; text-justify: inter-word; font-size: 16px; font-family: Tahoma" width="50%">
                                    <input type="text" name="txtnamesignature" style="width: 80%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid; text-align: center;" value="<?php echo $name;?>" >  <br>    
                                           Signature Over Printed Name                 


                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; text-justify: inter-word; font-size: 16px" colspan="2">
                                   =============================================================================================================
                                    </td>

                                   
                                </tr>
                                <tr>
                                    <td style="font-size: 16px;font-family: Tahoma" align="justify" colspan="2">     
                                    <br>
                                     At a meeting held on <input type="text" name="txtheldon" style="width: 55%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;">, 20<input type="text" name="txtheldon2" style="width: 10%; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;">, we approved the loan 
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-family: Tahoma" align="justify" colspan="2">  
                                        in the amount stated above and on the conditions requested by the applicant, except 
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-family: Tahoma" align="justify" colspan="2">  
                                     for the following conditions (changes in the amount, terms or conditions).
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px" align="justify" colspan="2">  
                                        <textarea name="txtexceptcondition" style="width: 100%; height: 70px; border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid;"></textarea>.
                                    </td>
                                </tr>
                                

                            </table>
                            </div><br>

                            <input type="submit" name="submit_loan" class="btn btn-info"><br>
                            <input type="text" name="txtname" value="<?php echo $name;?>" style="visibility: hidden">
                            <input type="text" name="txtid"  value="<?php echo $id;?>" style="visibility: hidden">
                            </center>


                            <!--<div class="col-md-3">

                                <input type="text" name="txtamount" class="form-control" placeholder="Amount">
                            </div>
                            <div class="col-md-3">
                                <select name="cbtype_loan" style=" border: 0px;" class="form-control" >
                                    <option hidden>-Types of Loan-</option>
                                    <option>Regular</option>
                                    <option>Short Term</option>
                                    <option>Emergency</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="submit_loan" class="btn btn-info">
                            </div>
                            <input type="text" name="txtname" placeholder="Amount" value="<?php echo $name;?>" style="visibility: hidden">
                            <input type="text" name="txtid" placeholder="Amount" value="<?php echo $id;?>" style="visibility: hidden">-->
                        </form>
                    </div>
                </div>
                <br><br>
                <div class="scroll" style="padding: 5px ; height: 350px; overflow-x: hidden;">
                <table border='1px' width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Book no.</th>
                            <th>Types</th>
                            <th>Amount</th>
                            <th>Purposes</th>
                            <th bgcolor="#F5F8F9">Records and Payment</th>
                            <th bgcolor="#F5F8F9"> <center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                $name1 =$_REQUEST['name'];
                                $strSQL1 = mysqli_query("SELECT * FROM dbloan where dbname ='$name1'");
                                $num_rows1 = mysqli_num_rows($strSQL1);
                                while($test = mysqli_fetch_array($strSQL1))
                                    {
                                    
                                    $id = $test['id'];
                                    $name = $test['dbname'];
                                        echo"<tr>";
                                        
                                        echo '<td>'. $test['dbdate'].'</td>';
                                        echo "<td>". $test['dbbookno']."</td>";
                                        echo "<td>". $test['dbtypes']."</td>";
                                        echo "<td>". $test['dbloanof']."</td>";
                                        echo "<td>". $test['dbpurposes']."</td>";
                                        echo "<td width='200px' bgcolor='#F5F8F9'><center>
                                            <a href='members.php?id=$id && name=$name#loan_popup'  class='btn btn-info'>VIEW RECORDS</a>&nbsp&nbsp&nbsp
                                            ";
                                        echo "<td width='20px' style='font-size: 12px' bgcolor='#F5F8F9'><center>
                                            <a href='deleteLoan.php?id=$id && name=$name'  title='Delete Loan'  onclick='return deleteConfirmLoan();'><img src='../images/img/b_empty.png' ></a> &nbsp";
                                                                                
                                        echo "</tr>";
                                    }
                                    
                            ?>
                    
                                
                    </tbody>
                </table>
                </div>
            </div>
            
        </div>
    </div>
    <div id="deposit_popup" class="overlay">
        <div class="popup"  style="  height: auto; min-height: 90% !important;">
           <?php
                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                $name =$_REQUEST['name'];
            ?>
             <h2>Deposit (<?php echo $name;?>)</h2>
            <hr>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <button class="collapsible btn btn-primary">ADD DEPOSIT</button>
                <div class="content1" style="padding: 10px">
                    <div class="row">
                        <form  method="post"  action="add_deposit.php">
                            <div class="col-md-3">
                                <input type="text" name="txtamount" class="form-control" placeholder="Amount" required>
                            </div>
                            
                            <div class="col-md-3">
                                <input type="submit" name="submit_deposit" class="btn btn-info">
                            </div>
                            <input type="text" name="txtname"  value="<?php echo $name;?>" style="visibility: hidden">
                        </form>
                    </div>
                </div>
                <br><br>
                <div class="scroll" style="padding: 5px ; height: 350px; overflow-x: hidden;">
                <table border='1px' width="100%" class="table table-hover;">

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th bgcolor="#F5F8F9"> <center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                $name1 =$_REQUEST['name'];
                                $strSQL1 = mysqli_query("SELECT * FROM dbdeposit where dbname ='$name1'");
                                $num_rows1 = mysqli_num_rows($strSQL1);
                                while($test = mysqli_fetch_array($strSQL1))
                                    {
                                    $id = $test['id'];
                                    $name = $test['dbname'];
                                        echo"<tr>";
                                        
                                        echo '<td  style="font-size: 12px" width="30%">'. $test['dbdate'].'</td>';
                                        echo "<td  style='font-size: 12px'>". $test['dbdeposit']."</td>";
                                        
                                        echo "<td width='20px' style='font-size: 12px' bgcolor='#F5F8F9'><center>
                                            <a href='deleteDeposit.php?id=$id && name=$name'  title='Delete Member'  onclick='return deleteConfirmDeposit();'><img src='../images/img/b_empty.png' ></a> &nbsp";
                                                                                
                                        echo "</tr>";
                                    }
                                    
                                     ?>
                    
                                
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!--<div id="savings" class="overlay">
        <?php 
            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $conn = mysqli_connect('localhost', 'root', '');
            if (!$conn)
            {
            die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db("coop_dtbs", $conn);

            $id =$_REQUEST['id'];
            $result = mysqli_query("SELECT * FROM dbmember WHERE id='$id'");


            $test = mysqli_fetch_array($result);
            if (!$result) 
                {
                die("Error: Data not found..");
                }
                $mem_id = $test['id'];
                $lastname=$test["dblastname"];
                $firstname=$test["dbfirstname"];
                $middlename=$test["dbmiddlename"];

                $name= $lastname + $firstname + $middlename;
                mysqli_close($conn);
        ?>
        <div class="popup" style="width: 60%; height: 80vh">
            <h2>SAVINGS</h2>
            <hr>
            <a class="close" href="#">&times;</a>
            <form  method="post"  action="update.php">
               
               <div class="content">
                    <div class="scroll" style="padding: 5px ; height: 60vh; overflow-x: hidden;">
                        <table class="table table-bordered">
                            <tr>
                                <td style="border-right: 0px; "><b>Member ID </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $mem_id; ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Name </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $lastname; echo ", "; echo $firstname; echo " "; echo $middlename; ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Amount to save </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><input type="number" name="amountsave" class="form-control"></td>
                            </tr>

                        </table>

                       <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-primary"></center>
                       
                    </div>
                </div>
            </form>    
        </div>
    </div> -->
    <div id="savings" class="overlay" >
      <div class="popup" style="  height: auto; height: 90% !important; width: 90%" >
        <?php
           $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $conn = mysqli_connect('localhost', 'root', '');
            if (!$conn)
            {
            die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db("coop_dtbs", $conn);

            $id =$_REQUEST['id'];
            $result = mysqli_query("SELECT * FROM dbmember WHERE id='$id'");


            $test = mysqli_fetch_array($result);
            if (!$result) 
                {
                die("Error: Data not found..");
                }
                $mem_id = $test['id'];
                $lastname=$test["dblastname"];
                $firstname=$test["dbfirstname"];
                $middlename=$test["dbmiddlename"];

                mysqli_close($conn);
        ?>
        <h2><i class="glyphicon glyphicon-plus"></i> Add Savings</h2>
        <hr>
        <a class="close" href="#">&times;</a>
        <div class="row">
          <div class="col-md-6">
            <div class="scroll" style="height: 400px; overflow-x: hidden">
              <div id="printableArea">
                <center>
                    <img src="images/logo.png" width="100px" >
                    <h3>Shrine of Our Lady of Loreto<br>
                    Savings and Loan Cooperative</h3>
                    <hr>
                    <h4><b>OFFICIAL RECEIPT</b></h4>
                    <hr>
                </center> 
                <div class="row">
                  <div class="col-md-6">
                    Name: <b><u><?php echo $lastname; echo ", "; echo $firstname; echo " "; echo $middlename; ?></u></b>
                  </div>
                  <div class="col=md-6" style="text-align: right">
                    Date: <u><input type="label" id="receiptdate" style="border: 0px;  width: 100px" value="<?php echo date("m/d/Y");?>"></u>
                    
                  </div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td width="70%"><center>Description</center></td>
                      <td><center>Amount</center></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="border-bottom: 0px">Last Savings Amount</td>
                      <?php

                       $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                        $conn = mysqli_connect('localhost', 'root', '');
                        if (!$conn)
                        {
                        die('Could not connect: ' . mysqli_error());
                        }
                        mysqli_select_db("coop_dtbs", $conn);

                        $id =$_REQUEST['id'];
                        $dat = date('m/d/Y');
                        $strSQL2 = mysqli_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where mem_id= '$id' AND dbdate != '$dat'");
                          while($test = mysqli_fetch_array($strSQL2))
                            {
                              $a = $test['FORMAT(SUM(dbdeposit),0)'];
                             
                              echo "<td  style='border-bottom: 0px'><center>". $a."</center></td>";
                              
                              
                            }

                      ?>
                    </tr>
                    <?php 
                     $dat = date('m/d/Y');

                          $strSQL3 = mysqli_query("SELECT FORMAT(dbdeposit,0) , dbdate FROM dbdeposit where mem_id= '$id' AND dbdate = '$dat'" );
                          $num_rows2 = mysqli_num_rows($strSQL2);
                          while($test = mysqli_fetch_array($strSQL3))
                          {
                            $dep = $test['FORMAT(dbdeposit,0)'];
                            $date =$test['dbdate'];
                          
                                        
                            if ($dep > 0)
                            {
                               
                                  echo '<tr>';
                                  echo '<td style="border-top: 0px; border-bottom: 0px">Deposit Amount ('.$date.')</td>';
                                  echo "<td style='border-top: 0px; border-bottom: 0px'><center>".$dep."</center></td>";
                                  echo '</tr>';
                                
                            }
                            else{
                                echo '<tr>';
                                  echo '<td style="border-top: 0px; border-bottom: 0px">Withdrawal Amount ('.$date.')</td>';
                                  echo "<td style='border-top: 0px; border-bottom: 0px'><center>".$dep."</center></td>";
                                  echo '</tr>';
                            }
                        }
                        ?>

                    
                    <tr>
                      <td style="text-align: right"> Total
                      </td>
                      <?php
                      $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                        $conn = mysqli_connect('localhost', 'root', '');
                        if (!$conn)
                        {
                        die('Could not connect: ' . mysqli_error());
                        }
                        mysqli_select_db("coop_dtbs", $conn);

                        $id =$_REQUEST['id'];
                          $strSQL2 = mysqli_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where mem_id= '$id'");
                          while($test = mysqli_fetch_array($strSQL2))
                            {
                              $a = $test['FORMAT(SUM(dbdeposit),0)'];
                             
                              echo "<td  style='border-bottom: 0px'><center>". $a."</center></td>";
                              
                            }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <a  onclick="printDiv('printableArea')"  class='btn btn-info form-control'><i class="glyphicon glyphicon-print"></i> &nbsp&nbsp PRINT RECEIPT</a>
          </div>
          <div class="col-md-6">
            <form action = "add_savings.php" method="POST">
              <div class="row" style="text-align: right; padding-right: 20px">
                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right" value="<?php echo date("m/d/Y");?>"><br>
              </div>
              <table class="table table-bordered">
                            <tr>
                                <td style="border-right: 0px; "><b>Member ID </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $mem_id; ?><input type="text" name="txtmem_id" value="<?php echo $mem_id;?>" hidden> </td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Name </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $lastname; echo ", "; echo $firstname; echo " "; echo $middlename; ?><input type="text" name="txtname2" value="<?php echo $lastname; echo ", "; echo $firstname; echo " "; echo $middlename; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Amount to save </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><input type="number" name="txtamount" class="form-control" required></td>
                            </tr>

                        </table>
              <center><input type="submit" class="btn btn-success" value="SUBMIT"></center>
            </form>
          </div>
        </div>
        <hr>
      </div>
    </div>

    <div id="payloan" class="overlay">
        <?php 
            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $conn = mysqli_connect('localhost', 'root', '');
            if (!$conn)
            {
            die('Could not connect: ' . mysqli_error());
            }
            mysqli_select_db("coop_dtbs", $conn);







            $id =$_REQUEST['id'];

            $result2 = mysqli_query("SELECT * FROM dbmember WHERE id='$id'");


            $test = mysqli_fetch_array($result2);
            if (!$result2) 
                {
                die("Error: Data not found..");
                }
                $mem_id = $test['id'];
                $lastname=$test["dblastname"];
                $firstname=$test["dbfirstname"];
                $middlename=$test["dbmiddlename"];

                mysqli_close($conn);

            
        ?>
        <div class="popup" style="width: 60%; height: 80vh">
            <h2>LOAN</h2>
            <hr>
            <a class="close" href="#">&times;</a>
            <form  method="post"  action="update.php">
               
                <div class="content">
                    <div class="scroll" style="padding: 5px ; height: 60vh; overflow-x: hidden;">
                        <table class="table table-bordered">
                            <tr>
                                <td style="border-right: 0px; "><b>Member ID </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $mem_id; ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Name </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $lastname; echo ", "; echo $firstname; echo " "; echo $middlename; ?></td>
                            </tr>
                            <?php 
                                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                $conn = mysqli_connect('localhost', 'root', '');
                                if (!$conn)
                                {
                                die('Could not connect: ' . mysqli_error());
                                }
                                mysqli_select_db("coop_dtbs", $conn);




                                 $id =$_REQUEST['id'];
                              $result = mysqli_query("SELECT * FROM dbloan WHERE mem_id='$id'");


                                $test = mysqli_fetch_array($result);
                                if (!$result) 
                                    {
                                    die("Error: Data not found..");
                                    }
                                    $types=$test["dbtypes"];
                                    $loanamount =$test["dbloanof"];
                                    $firstpayment =$test["dbfirst_payment"];
                                    $secondpayment =$test["dbsecond_payment"];
                                    $thirdpayment =$test["dbthird_payment"];


                                        
                                    mysqli_close($conn);
                                
                            ?>
                            <tr>
                                <td style="border-right: 0px"><b>Loan Type </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $types; ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: 0px"><b>Loan Amount </b></td>
                                <td style="border-right: 0px; border-left: 0px">:</td>
                                <td style="border-left: 0px"><?php echo $loanamount; ?></td>
                            </tr>

                        </table>

                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" ><center><b>Payment Schedule</b></center></td>
                            </tr>
                            <?php 
                            if ($types == "Emergency")
                            {
                                echo '
                                    <tr>
                                        <td  >'. $firstpayment .'</td>
                                        <td  ><input type="number" name="fpayment" class="form-control"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td  >'. $secondpayment .'</td>
                                        <td  ><input type="number" name="spayment" class="form-control"></td>
                                    </tr>';
                            }
                            elseif ($types == "Long Term") {
                                echo '
                                    <tr>
                                        <td  >'. $firstpayment .'</td>
                                        <td  ><input type="number" name="fpayment" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  >'. $secondpayment .'</td>
                                        <td  ><input type="number" name="spayment" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  >'. $thirdpayment .'</td>
                                        <td  ><input type="number" name="tpayment" class="form-control"></td>
                                    </tr>';
                            }
                            else{
                                 echo '
                                    <tr>
                                        <td  >'. $firstpayment .'</td>
                                        <td  ><input type="number" name="fpayment" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  >'. $secondpayment .'</td>
                                        <td  ><input type="number" name="spayment" class="form-control"></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td  >'. $thirdpayment .'</td>
                                        <td  ><input type="number" name="tpayment" class="form-control"></td>
                                    </tr>';
                            }
                            ?>
                        </table>
                        <center><input type="submit" value="SAVE" class="btn btn-primary"></center>
                    </div>
                </div>
            </form>    
        </div>
    </div> 
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content1 = this.nextElementSibling;
            if (content1.style.display === "block") {
              content1.style.display = "none";
            } else {
              content1.style.display = "block";
            }
          });
        }
        </script>


</body>
</html>
