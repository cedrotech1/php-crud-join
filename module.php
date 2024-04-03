<?php
include("connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>module</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<center>
<?php include('menu.php'); ?>
    <h1>module form</h1>
    <form action="module.php" method='post'>
        <input type="text" placeholder='module code' name='code'><br><br>
        <input type="text" placeholder='title' name='title'><br><br>
   
        <input type="submit" value='save' class='button' name='save'><br><br>
    </form>
    <br>
    <h3>list students</h3>
    <table border='1'>
        <tr class='th'>
            <th> module code</th>    <th>module title</th>
        </tr>
     <?php
     $ok=mysqli_query($connection,"select * from module");
     while($row=mysqli_fetch_array($ok)){
        ?>
           <tr class=''>
            <td><?php echo $row['code']; ?></td>
            <td><?php echo $row['tile']; ?></td>
        
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
    $code=$_POST['code'];
    $title= $_POST['title'];
    
    // insert query
    $ok=mysqli_query($connection,"INSERT INTO `module` 
    VALUES (NULL,'$code','$title')");
    if($ok==true){
        echo "<script>alert('module added successfully')</script>";
        echo "<script>window.location.href='module.php'</script>";
    }

}


?>