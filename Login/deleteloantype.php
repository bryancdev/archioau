<?php  
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $conn = mysql_connect('localhost', 'root', '');
     if (!$conn)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("coop_dtbs", $conn);


     $id =$_REQUEST['code'];
    // sending query
    mysql_query("DELETE FROM `dbloantype` WHERE code='$id'")
    or die(mysql_error());      
    
    header("Location: admin_loan.php");
    ?>