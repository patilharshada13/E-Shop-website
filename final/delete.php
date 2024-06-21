<?php

$con=mysqli_connect('localhost','root','','task3');


if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}

if(isset($_GET['deleteid']))
{
    $srno=$_GET['deleteid'];

    $sql="DELETE FROM panel where srno=$srno";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        
        header('location:admin.php');
    }
}



?>