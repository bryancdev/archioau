<?php  
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $conn = mysqli_connect('localhost', 'root', '');
     if (!$conn)
    {
     die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($conn,"coop_dtbs");


     $id =$_REQUEST['code'];
    // sending query
    mysqli_query($conn,"DELETE FROM `dbloantype` WHERE code='$id'")
    or die(mysqli_error());      
    
    header("Location: admin_loan.php");
    ?>