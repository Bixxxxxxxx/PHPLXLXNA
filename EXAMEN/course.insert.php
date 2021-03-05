<?php
       
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
<h2>Course Insert</h2>
    <form action="include/course.inc.php" method="POST"> 
                <input type="text" name="categorie" placeholder = "insert categorie name">       
                <input type="text" name="module" placeholder = "insert module name">    
                <input type="text" name="course" placeholder = "insert course name">   
                <input type="text" name="teacher" placeholder = "insert teacher id or teacher @"> 
                <button type = "submit" name ="submit">Insert</button>
    </form>

    <a href="note.insert.php">Go to note insert</a>
    <a href="course.php">Go to course </a>
</body>
</html>