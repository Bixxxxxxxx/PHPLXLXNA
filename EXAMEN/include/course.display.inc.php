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
include "../class/signup.class.controller.php"; 

$shownote = new NoteController;
if ($show->ShowNote()){
    $koko = $show->ShowNote();
    if (isset($_POST['display'])){
        echo "<h2>Note</h2>";
        echo '<table>';
        while($row = $koko->fetch())
        {
            echo' <tr>
                            <td>'.$row["course_libelle"].'</td>
                            <td>'.$row["course_module"].'</td>
                            <td>'.$row["course_categorie"].'</td>
                         </tr>';   
        }
        echo '</table>';
        echo "<a href='#'>Note</a>";
    }
}
?>
</body>
</html>