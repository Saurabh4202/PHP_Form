<?php
include("connect.php");

$id = $_GET['id'];

$query = "DELETE FROM FORM WHERE id = '$id'"; 
$data = mysqli_query($conn,$query);


if($data)
{
    echo "<script>alert('Record Updated')</script>";
            
}
else{
    echo "Failed";
}
?>