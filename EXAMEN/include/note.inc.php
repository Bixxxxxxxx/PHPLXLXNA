<?php 

include_once "../note.insert.php";
include_once "../class/signup.class.controller.php";


$course = $_POST['course'];
$note = $_POST['note'];
$student = $_POST['student'];
$insert = new NoteController();

if (isset($_POST['submit'])){
    if ($insert->CreateNote($course, $note, $student)){
        $insert->CreateNote($course, $note, $student);
        header("location: ../note.insert.php?error=insertnotework");
    }
    else{
        header("location: ../note.insert.php?error=tsymandendraye");
    }
}