<?php
include("connection.php");
$id=$_GET['id'];
$ok=mysqli_query($connection,"delete from students where id=$id");
if($ok==true){
    // echo "<script>alert('student added successfully')</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>