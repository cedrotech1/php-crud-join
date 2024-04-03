<?php
include("connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>marks</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<center>
<?php include('menu.php'); ?>
    <h1>marks form</h1>
    <form action="marks.php" method='post'>
        choose student<select name="sid">
            <?php
               $ok=mysqli_query($connection,"select * from students");
               while($row=mysqli_fetch_array($ok)){
                  ?>
                    <option value="<?php echo $row['id']  ?>"><?php echo $row['names']  ?></option>
                  <?php
          
               }


        ?>
        </select>
<br><br>
        choose module<select name="mid">
            <?php
               $ok=mysqli_query($connection,"select * from module");
               while($row=mysqli_fetch_array($ok)){
                  ?>
                    <option value="<?php echo $row['mid']  ?>"><?php echo $row['tile']  ?></option>
                  <?php
          
               }


        ?>
        </select><br> <br>
        
        <input type="number" placeholder='score' name='score'><br><br>
   
        <input type="submit" value='save' class='button' name='save'><br><br>
    </form>
    <br>
    <h3>list students</h3>
    <table border='1'>
        <tr class='th'>
            <th> student names</th>    <th>module title</th><th>score</th>
        </tr>
     <?php
     $ok=mysqli_query($connection,"SELECT students.names,module.tile,marks.score 
     FROM students,marks,module 
     where students.id=marks.sid and module.mid=marks.mid");
     while($row=mysqli_fetch_array($ok)){
        ?>
           <tr class=''>
            <td><?php echo $row['0']; ?></td>
            <td><?php echo $row['1']; ?></td>
            <td><?php echo $row['2']; ?></td>
        
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
    $sid=$_POST['sid'];
    $mid= $_POST['mid'];
    $score= $_POST['score'];
    
    // insert query
    $ok=mysqli_query($connection,"INSERT INTO `marks` 
    VALUES (NULL,'$sid','$mid','$score')");
    if($ok==true){
        echo "<script>alert('marks added successfully')</script>";
        echo "<script>window.location.href='marks.php'</script>";
    }

}


?>