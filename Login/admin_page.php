
<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SOLL-SCC</title>
  <link rel="icon" type="image/ico" href="images/intro-bg3.jpg" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
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
       	

</style>

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
    $strSQL3 = mysqli_query($connection,"SELECT * FROM dbloan where dbtypes = 'Emergency'");
    $num_rows3 = mysqli_num_rows($strSQL3);
    $strSQL4 = mysqli_query($connection,"SELECT * FROM dbloan where dbtypes = 'Regular'");
    $num_rows4 = mysqli_num_rows($strSQL4);

    $strSQL5 = mysqli_query($connection,"SELECT * FROM dbloan where dbtypes = 'Short-Term'");
    $num_rows5 = mysqli_num_rows($strSQL5);

    $strSQL2 = mysqli_query($connection,"SELECT FORMAT(SUM(dbdeposit),0) FROM dbdeposit");
    while($test = mysqli_fetch_array($strSQL2))
    {
      $dep= $test['FORMAT(SUM(dbdeposit),0)'];
    }

                                    
?>

<body style='font-family:cambria; '>
	<nav  class="navbar navbar-inverse" style = "background-color:#1f386e; border: 0px; border-radius: 0px;">
	  <div class="container-fluid">
      <div class="navbar-brand" style="padding-top: 0px;">
            <img src="images/introbg3.jpg" style="width: 50px">
        </div>
	    <div class="navbar-header">
			<a class="navbar-brand" href="#"><font style="color: white">SHRINE OF OUR LADY LORETO SAVINGS AND CREDIT COOPERATIVE</font></a>    
	    </div>
	    <ul class="nav navbar-nav navbar-right ">
	      <li class="active"  style="width: 100px; text-align:center"><a href="admin_page.php">Home <i class="glyphicon glyphicon-home"></i></a></li>
        
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
	</nav><br>
  <div class="row" >
    <div class="col-md-12" style="padding-left: 20px">
      

        <div class="col-md-3">
          <div class="panel panel-primary" style=" box-shadow:5px 5px 50px grey;  ">

            <div class="panel-body bg-danger" style="text-align: center; ">
              
                <img src="../img/members.png" width="150px">  
              
            </div>
            <div class="panel-footer" style="padding-top: 0px">
              <div class="row bg-primary" >
                <center>Total Members</center>
              </div>
                <center><h3><?php echo $num_rows?></h3></center>
                <br>
            </div>
          </div>
        </div>
        <div class="col-md-6" style="padding: 0px">
          <div class="panel panel-primary" style=" box-shadow:5px 5px 50px grey;  ">
            <div class="panel-body bg-info" style="text-align: center">
              
                <img src="../img/loan.png" height ="150px">  
              
            </div>
            <div class="panel-footer" style="padding-top: 0px">
              <div class="row bg-primary" >
                <center>Total Loans</center>
              </div>
              <div class="row">
              <div class="col-md-4" style="text-align: center">
              
                Emergency Loan: <h3><?php echo $num_rows4?></h3>
              </div>
              <div class="col-md-4" style="text-align: center">
                Regular  Loan: <h3><?php echo $num_rows3?></h3>
              </div>
              <div class="col-md-4" style="text-align: center">

                Long-Term Loan: <h3><?php echo $num_rows5?></h3>
              </div>
            </div>

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-primary" style=" box-shadow:5px 5px 50px grey;  ">
            <div class="panel-body bg-warning" style="text-align: center">
              
                <img src="../img/message.png" height ="150px">  
              
            </div>
           <div class="panel-footer" style="padding-top: 0px">
              <div class="row bg-primary" >
                <center>Messages</center>
              </div>
                <center>  <h3>3</h3>
              <a href="#">View Message</a></center>

            </div>
          </div>
        </div>
        <!--
        <div class="col-md-6">
          <div class="panel panel-primary" >
            <div class="panel-body bg-success">
              <div class="col-md-5">
              Total Savings
                <h3><span class="badge" style="font-size: 25px; padding-left: 20px; padding-right: 20px"><?php echo $dep?></span></h3>
              </div>
              <div class="col-md-5">
                <img src="../img/peso.png" width="150px">  
              </div>
            </div>
            <div class="panel-footer">
              

            </div>
          </div>
        </div>
      -->
        
        <div class="col-md-4">
          <div class="panel panel-primary" style=" box-shadow:5px 5px 50px grey;  ">
            <div class="panel-body bg-success" >
              <div class="col-md-6">
                <canvas id="canvas" 
                >
                </canvas>
              </div>
              <div class="col-md-6">
                Date Today<br>
                <h2><?php echo date('m/d/Y')?></h2>
                <h3><?php echo date('l')?></h3>

              </div>
              
            </div>
          </div>
        </div>
        
    </div>
   <!-- <div class="col-md-4" style="padding-right: 40px">
      <center>
        <img src="images/logo.png" width="295px">
      </center>
      
    </div>-->
  </div>


<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
  
</body>
</html>
