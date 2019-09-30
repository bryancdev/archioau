<?php  
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $conn = mysql_connect('localhost', 'root', '');
     if (!$conn)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("coop_dtbs", $conn);


     $id =$_REQUEST['id'];
     $name =$_REQUEST['name'];
    // sending query
    mysql_query("DELETE FROM `dbloan` WHERE id='$id'")
    or die(mysql_error());      
    
    header("Location: admin_loan.php?name=".$name."#loan_popup");
    ?>