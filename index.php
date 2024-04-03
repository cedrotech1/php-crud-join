<?php
include("connection.php");
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
    <?php include('menu.php'); ?>
    <h1>student form</h1>
    <form action="index.php" method='post'>
        <input type="text" placeholder='student name' name='name'><br><br>
        <input type="text" placeholder='student address' name='address'><br><br>
        <input type="number" placeholder='student age' name='age'><br><br>
        <input type="submit" value='save' class='button' name='save'><br><br>
    </form>
    <br>
    <h3>list students</h3>
    <table border='1'>
        <tr class='th'>
            <th>student name</th>    <th>student address</th><th>student age</th><th>modify</th>
        </tr>
     <?php
     $ok=mysqli_query($connection,"select * from students");
     while($row=mysqli_fetch_array($ok)){
        ?>
           <tr class=''>
            <td><?php echo $row['names']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td>
                <a href="delete.php?id=<?php echo $row['id']; ?>"><button>delete</button></a>
                <a href="update.php?id=<?php echo $row['id']; ?>"> <button style='background-color:red;color:white'>update</button></a>
           
        </td>
        </tr>
        <?php

     }



?>
    </table>
</center>
</body>
</html>
<?php
if(isset($_POST['save'])){
    // variable declaration (geting data from form)
    $name=$_POST['name'];
    $address= $_POST['address'];
    $age=$_POST['age'];
    // insert query
    $ok=mysqli_query($connection,"INSERT INTO `students`(`id`, `names`, `address`, `age`) 
    VALUES (NULL,'$name','$address','$age')");
    if($ok==true){
        echo "<script>alert('student added successfully')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

}


?>