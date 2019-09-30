
<?php
include('session.php');
?>


<?php 
    $dbServer = "localhost";
    $dbDatabase = "coop_dtbs";
    $dbUsername = "root";
    $dbPassword = "";

    if (!mysql_connect($dbServer, $dbUsername))
        die("Can't connect to database");

    if (!mysql_select_db($dbDatabase))
        die("Can't select database");

    $strSQL = mysql_query("SELECT * FROM dbmember");
    $num_rows = mysql_num_rows($strSQL);




                                    
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
                height: 400px;
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
        

</head>
<body style="font-family:cambria;   background-image: url('images/logo2.png');" >
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
                <li><a class="btn btn-default" href="#">Penalties</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 160px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <i class="glyphicon glyphicon-euro"></i></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="admin_addloan.php">Loan</a>      </li>
                <li><a class="btn btn-default" href="savings.php">Savings</a></li>
                <li><a class="btn btn-default" href="check.php">Cheque</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 130px; text-align:center">
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
    <div class="row" >
        <div class="col-md-12" >
            
            <div class="panel-body " style="padding-top: 2px">
            
                
                    <form action = "members_search.php" method="POST">
                        <div class="row" >
                            <div class="col-md-4" >

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input type="text" name="search"  placeholder="Search" value="<?php echo htmlspecialchars($_POST['search']); ?>" style=" width: 100%; height: 34px;
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
                                                  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;box-shadow:1px 1px 20px grey;
                                        ">
                                </div>
                            </div>
                            <div class="col-md-3" >
                            <a href="accounts.php" class="btn btn-info">View All </a>
                            </div>
                        </div>
                    
                    <br>
                    <div class="scroll" style="padding: 5px ; height: 500px; overflow-x: hidden;">
                    <table border="1px" width="100%" class="table table-hover ">

                        <thead >
                            <tr class="info">
                                <th style="width: 100px" bgcolor="#F5F8F9">MEMBER ID</th>
                                <th bgcolor="#F5F8F9">NAME</th>
                                <th  bgcolor="#F5F8F9" > SAVINGS</th>
                                <th bgcolor="#F5F8F9">LOAN AMOUNT</th>
                                <th bgcolor="#F5F8F9">SUBSCRIPTION AMOUNT</th>
                                <th bgcolor="#F5F8F9">PAID UP SHARE CAPITAL</th>
                                <th bgcolor="#F5F8F9">BALANCE</th>
                                <th bgcolor="#F5F8F9">POINTS</th>
                                
                            </tr>
                        </thead>
                        <tbody style="background-color: white">
                            <?php
                            $query = $_POST['search']; 
        
                            $min_length = 1;
                           
                            if(strlen($query) >= $min_length){ 
                                $query = htmlspecialchars($query); 
                                $query = mysql_real_escape_string($query);
                                         
                                $raw_results = mysql_query("SELECT * FROM dbmember WHERE (`dbmemid` LIKE '%".$query."%') ORDER BY `dbmemid` ASC") or die(mysql_error());
                                 $num_rows = mysql_num_rows($raw_results);
                                if(mysql_num_rows($raw_results) > 0){ 


                                while($test = mysql_fetch_array($raw_results))
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

                                       

                                        $strSQL4 = mysql_query("SELECT * FROM dbdeposit where mem_id = '$id'");
                                        $num_rows3 = mysql_num_rows($strSQL4);
                                        
                                        if ($num_rows3 > 0)
                                        {
                                            $strSQL5 = mysql_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where mem_id = '$id'");
                                            while($test = mysql_fetch_array($strSQL5))
                                            {
                                              echo "<td style='border-right: 0px' >". $test['FORMAT(SUM(dbdeposit),0)']." Php</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                               
                                            } 
                                        }
                                        else{
                                            echo "<td style='border-right: 0px' >0 Php</td>";
                                            /*echo "<td style='border-left: 0px'><a href='accounts.php?id=$id#savings'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-plus '></i> ADD </a></td>";*/
                                            
                                        }
                                         $strSQL2 = mysql_query("SELECT * FROM dbloan where mem_id = '$id'");
                                        $num_rows2 = mysql_num_rows($strSQL2);
                                        
                                        if ($num_rows2 > 0)
                                        {
                                             $strSQL3 = mysql_query("SELECT FORMAT(SUM(dbloanof),0) FROM dbloan where mem_id = '$id'");
                                            while($test = mysql_fetch_array($strSQL3))
                                            
                                              echo "<td style='border-right: 0px; '  >". $test['FORMAT(SUM(dbloanof),0)']." Php</td>";
                                            /*echo "<td style='border-left: 0px; '><a href='accounts.php?id=$id#payloan'  title='Edit Information' class='btn btn-link btn-sm'><i class='glyphicon glyphicon-euro '></i> PAY LOAN </a></td>";   */
                                            
                                        }
                                        else{
                                            echo '<td style="border-right: 0px" >0 Php</td>';
                                            
                                        }
                                        echo '<td style="border-right: 0px" >'.$subs.' Php</td>';
                                        $strSQL4 = mysql_query("SELECT * FROM dbshared where mem_id = '$id'");
                                        $num_rows4 = mysql_num_rows($strSQL4);
                                        
                                        if ($num_rows4 > 0)
                                        {
                                             $strSQL5 = mysql_query("SELECT * FROM dbshared where mem_id = '$id' order by id desc limit 1");
                                            while($test = mysql_fetch_array($strSQL5))
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


                                        $strSQL8 = mysql_query("SELECT * FROM dbshared where mem_id = '$id'");
                                        $num_rows8 = mysql_num_rows($strSQL8);
                                        
                                        if ($num_rows8 > 0)
                                        {
                                            $strSQL5 = mysql_query("SELECT * FROM dbshared where mem_id = '$id' order by id desc limit 1");
                                            
                                            while($test = mysql_fetch_array($strSQL5))
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
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    </form>
            </div>   
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
