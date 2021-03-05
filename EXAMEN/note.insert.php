<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Note Insert</h2>
    <form action="include/note.inc.php" method="POST"> 
                <input type="text" name="course" placeholder = "insert course name">       
                <input type="number" name="note" placeholder = "note value">
                <input type="text" name="student" placeholder = "insert student email or student id">
                <button type = "submit" name ="submit">Insert</button>

                <a href="course.insert.php">Go to note insert</a>
    </form>
</body>
</html>