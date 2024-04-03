<?php
include("connection.php");
if(isset($_POST['save'])){
    // variable declaration (geting data from form)
    echo $id=$_POST['id'];
    echo $name=$_POST['name'];
    echo $address= $_POST['address'];
    echo $age=$_POST['age'];
    // insert query
    $ok=mysqli_query($connection,"UPDATE `students` 
    SET `names`='$name',`address`='$address',`age`='$age' WHERE id=$id");
    if($ok==true){
        echo "<script>alert('student updated successfully')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

}
