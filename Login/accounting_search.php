
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
    </script>
  </head>
  <body style="font-family:cambria" >
    <nav  class="navbar navbar-inverse" style = "background-color:#1f386e; border: 0px; border-radius: 0px">
      <div class="container-fluid">
        <div class="navbar-brand" style="padding-top: 0px;">
            <img src="images/introbg3.jpg" style="width: 50px">
        </div>
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><font style="color: white">SHRINE OF OUR LADY LORETO SAVINGS AND CREDIT COOPERATIVE</font></a>    
        </div>
        <ul class="nav navbar-nav navbar-right ">
          <li ><a href="admin_page.php">Home <i class="glyphicon glyphicon-home"></i></a></li>
          <li ><a href="applicationform.php">Application Form <i class="glyphicon glyphicon-file"></i></a></li>
          <li ><a href="list_of_members.php">List Of Members <i class="glyphicon glyphicon-list"></i></a></li>
          <li class="active"><a href="accounting.php">Accounting Transactions <i class="glyphicon glyphicon-euro"></i></a></li>
          <li><a href="logout.php">Logout  <span class="glyphicon glyphicon-log-out"></a></li>
        </ul>
      </div>
    </nav>
    <div class="row" style="padding: 10px">
      <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
          <li class="active" role="presentation">
            <a href="accounting.php"><i class="glyphicon glyphicon-euro"></i> &nbsp&nbsp SAVINGS </a>
          </li>
          <li  role="presentation">
            <a href="admin_loan.php"><i class="glyphicon glyphicon-credit-card"></i> &nbsp&nbsp CREDIT/LOAN</a>
          </li>
        </ul>              
        <br>
        <form action = "accounting_search.php" method="POST">
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
                                                    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                                          ">
              </div>
            </div>
            <div class="col-md-3" >
              <a href="accounting.php" class="btn">View All </a>
            </div>
          </div>
        </form>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="scroll" style="height: 400px; overflow-x: hidden">
              <table border='1px' width="100%" class="table table-hover" >
                <thead>
                  <tr>
                    <th style="width: 30%" bgcolor='#F5F8F9'>Name</th>
                    <th style="width: 30%" bgcolor='#F5F8F9'><center>Total Savings</center></th>
                    <th colspan="2" bgcolor="#F5F8F9" style="width: 30%"> <center></center></th>
                  </tr>
                </thead>
                <tbody>
                  
                 <?php
                            $query = $_POST['search'];
                            $min_length = 1;
                            
                            if(strlen($query) >= $min_length){ 
                                $query = htmlspecialchars($query); 
                                $query = mysql_real_escape_string($query);
                                         
                                 $raw_results = mysql_query("SELECT dbname FROM dbmember WHERE (`dbname` LIKE '%".$query."%') ") or die(mysql_error());
                                 $num_rows = mysql_num_rows($raw_results);
                                if(mysql_num_rows($raw_results) > 0){ 

                                    while($results = mysql_fetch_array($raw_results)){
                                        
                                        $name = $results['dbname'];
                                        
                                        echo"<tr>";
                                        echo'<td  >'. $results['dbname'].'</td>';
                                          $raw_results2 = mysql_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit WHERE (`dbname` LIKE '%".$name."%') ") or die(mysql_error());
                                           $num_rows2 = mysql_num_rows($raw_results2);
                                          if(mysql_num_rows($raw_results2) > 0){ 
                                             while($results2 = mysql_fetch_array($raw_results2)){
                                           echo "<td  ><center><span class='badge'>". $results2['FORMAT(SUM(dbdeposit),0)']." Php</span></center></td>";
                                           echo "<td bgcolor='#F5F8F9'><center><a href='accounting_search2.php?name=$name#addsavings_popup' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-plus'></i> &nbsp ADD SAVINGS </a> &nbsp <a href='accounting_search2.php?name=$name#savings_record_popup' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-list'></i> &nbsp SAVINGS RECORD</a></td>";                  
                                            }
                                          }
                                        echo"</tr>";
                                        }
                                         
                                    }
                                    else{ 
                                        echo"<tr>";
                                        echo "<td colspan='9'>No results</td>";
                                        echo "</tr>";
                                    }
                                     
                                }
                                else{ // if query length is less than minimum
                                    echo"<tr>";
                                    echo "<td colspan='9'>No results</td>";
                                    echo "</tr>";
                                }
                            ?>
                </tbody>
                
              </table> 
            </div>
          </div>
        </div>       
      </div>
    </div>
<!--========================================================================-->
<!--========================= SAVINGS RECORD POPUP ================================-->
    <div id="savings_record_popup" class="overlay" >
      <div class="popup" style="  height: auto; height: 90% !important; width: 90%" >
        <?php
          $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
          $name =$_REQUEST['name'];
        ?>
        <h2><i class="glyphicon glyphicon-list"></i> Savings Record (<?php echo $name;?>)</h2>
        <hr>
        <a class="close" href="#">&times;</a>
        <div class="scroll" style="height: 400px; overflow-x: hidden">
          <table class="table table-bordered">
            <thead>
              <th bgcolor='#F5F8F9'><center>Date</center></th>
              <th bgcolor='#F5F8F9'><center>Amount</center></th>
              <th bgcolor='#F5F8F9'></th>
            </thead>
            <tbody>
              <?php
                $strSQL2 = mysql_query("SELECT dbdate, FORMAT(dbdeposit,0) FROM dbdeposit where dbname= '$name' ORDER BY dbdate Desc");
                while($test = mysql_fetch_array($strSQL2))
                  {
                  
                  echo "<tr>";
                  echo "<td  style='border-bottom: 0px' ><center>". $test['dbdate']."</center></td>";
                  echo "<td  style='border-bottom: 0px'><center>". $test['FORMAT(dbdeposit,0)']." Php</center></td>";
                  echo "<td  style='border-bottom: 0px' bgcolor='#F5F8F9'><center><a href='#' class='btn btn-danger btn-sm' onclick='return deleteConfirmDeposit();'><span class='glyphicon glyphicon-trash'> DELETE<span></a> </center></td>";
                  echo "</tr>";
                  }

                $strSQL = mysql_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where dbname= '$name'");
                while($test = mysql_fetch_array($strSQL))
                  {
                    $deposits = $test['FORMAT(SUM(dbdeposit),0)'];  
                  }
              ?>
              <tr>
                <td style="border-right: 0px;" class="bg-danger"> </td>
                <td style="border-left: 0px; border-right: 0px" class="bg-danger"><center>Total : <?php echo $deposits?> Php</center></td>
                <td style="border-left: 0px" class="bg-danger"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>   
<!--========================================================================-->
<!--========================= ADD SAVINGS POPUP ================================-->
    <div id="addsavings_popup" class="overlay" >
      <div class="popup" style="  height: auto; height: 90% !important; width: 90%" >
        <?php
          $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
          $name =$_REQUEST['name'];
        ?>
        <h2><i class="glyphicon glyphicon-plus"></i> Add Savings (<?php echo $name;?>)</h2>
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
                    Name: <b><u><?php echo $name; ?></u></b>
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
                        $dat = date('m/d/Y');
                        $strSQL2 = mysql_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where dbname= '$name' AND dbdate != '$dat'");
                          while($test = mysql_fetch_array($strSQL2))
                            {
                              $a = $test['FORMAT(SUM(dbdeposit),0)'];
                             
                              echo "<td  style='border-bottom: 0px'><center>". $a."</center></td>";
                              
                              
                            }

                      ?>
                    </tr>
                    
                      <?php
                          $dat = date('m/d/Y');

                          $strSQL3 = mysql_query("SELECT FORMAT(dbdeposit,0) , dbdate FROM dbdeposit where dbname= '$name' AND dbdate = '$dat'" );
                          while($test = mysql_fetch_array($strSQL3))
                            {
                              echo '<tr>';
                              echo '<td style="border-top: 0px; border-bottom: 0px">Deposit Amount ('.$test['dbdate'].')</td>';
                              echo "<td style='border-top: 0px; border-bottom: 0px'><center>".$test['FORMAT(dbdeposit,0)']."</center></td>";
                              echo '</tr>';
                            } 
                      ?>
                    
                    <tr>
                      <td style="text-align: right"> Total
                      </td>
                      <?php
                          $strSQL2 = mysql_query("SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit where dbname= '$name'");
                          while($test = mysql_fetch_array($strSQL2))
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
                <input type="text" name="txtname2" value="<?php echo $name;?>" hidden>
                <input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right" value="<?php echo date("m/d/Y");?>"><br>
              </div>
              Insert Amount
              <input type="number" name="txtamount" class="form-control"><br><br>
              <center><input type="submit" class="btn btn-success" value="SUBMIT"></center>
            </form>
          </div>
        </div>
        <hr>
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
