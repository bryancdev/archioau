<?php
include('session.php');
?>
<?php  

$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $conn = mysqli_connect('localhost', 'root', '');
     if (!$conn)
    {
     die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($conn,"coop_dtbs");


     $id =$_REQUEST['id'];
     $mem_id =$_REQUEST['mem_id'];
    // sending query
    mysqli_query($conn,"DELETE FROM `dbmember` WHERE id='$id'")
    or die(mysqli_error());   

    $dateToday = date("m/d/Y");
    $sql2="INSERT INTO dbmemberlog (`dbusername`,`date`,`dbaction`) VALUES ('$login_session','$dateToday','Deleted member $mem_id')
";
                if (!mysqli_query($conn,$sql2))
          {

          die('Error: ' . mysqli_error());
          }
    header("Location: list_of_members.php");
    ?>