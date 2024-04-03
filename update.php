<?php
include("connection.php");
$id=$_GET['id'];

$ok=mysqli_query($connection,"select * from students where id=$id");
     while($row=mysqli_fetch_array($ok)){
         $name=$row['names'];
        $address=$row['address'];
        $age=$row['age'];

     }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<center>
    <h1>student form</h1>
    <form action="finalupdate.php" method='post'>
    <input type="text" placeholder='student name' hidden name='id' value='<?php echo $id ?>'><br><br>
        <input type="text" placeholder='student name' name='name' value='<?php echo $name ?>'><br><br>
        <input type="text" placeholder='student address' name='address' value='<?php echo $address ?>'><br><br>
        <input type="number" placeholder='student age' name='age' value='<?php echo $age ?>'><br><br>
        <input type="submit" value='save change' class='button' name='save'><br><br>
    </form>

</center>
</body>
</html>
<?php
if(isset($_POST['save'])){
    // variable declaration (geting data from form)
    echo $name=$_POST['name'];
    echo $address= $_POST['address'];
    echo $age=$_POST['age'];
    // insert query
    // $ok=mysqli_query($connection,"UPDATE `students` 
    // SET `names`='$name',`address`='$address',`age`='$age' WHERE id=$id");
    // if($ok==true){
    //     echo "<script>alert('student updated successfully')</script>";
    //     echo "<script>window.location.href='index.php'</script>";
    // }

}


?>