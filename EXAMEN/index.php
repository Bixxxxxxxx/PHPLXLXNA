<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
 
            if (isset($_SESSION["student_email"])){
                if ($_SESSION["student_key"] === "1")   {
                    echo "<p>admin</p><br>";
                    echo "<p>admin : ".$_SESSION["student_email"]."</p>";
                    echo "<a href='note.insert.php'>insert note</a>";
                    echo "<a href='include/logout.inc.php'>LOGOUT</a>";
                }
                else if ($_SESSION["student_key"] === "0"){
                    echo "<p>student : ".$_SESSION["student_email"]."</p>";
                    echo "<a href='include/logout.inc.php'>LOGOUT</a>";
                }
            }
            else if(isset($_SESSION["teacher_email"])){
                if ($_SESSION["teacher_key"] === "1")  {
                    echo "<p>admin</p><br>";
                    echo "<p>admin : ".$_SESSION["teacher_email"]."</p>";
                    echo "<a href='note.insert.php'>insert note</a>";
                    echo "<a href='include/logout.inc.php'>LOGOUT</a>";
                }
                else if ($_SESSION["teacher_key"] === "0"){
                    echo "<p>student : ".$_SESSION["teacher_email"]."</p>";
                    echo "<a href='include/logout.inc.php'>LOGOUT</a>";
                }
            }
            else{
                echo "<a href='include/logout.inc.php'>LOGOUT</a>";
            }
           
        ?>
</body>
</html>