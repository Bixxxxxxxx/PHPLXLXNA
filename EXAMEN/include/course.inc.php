<?php


include_once "../course.insert.php";
include_once "../class/signup.class.controller.php";




$categorie  = $_POST['categorie'];
$module = $_POST['module'];
$course = $_POST['course'];
$teacher = $_POST['teacher'];
$insert = new CourseController();


if (isset($_POST['submit'])){
    if ($insert->CreateCourse($course, $module, $categorie,$teacher) == TRUE){
        $insert->CreateCourse($course, $module, $categorie, $teacher);
        header("location: ../course.insert.php?error=coursework");
    }
    else{
        header("location: ../course.insert.php?error=inserterror");
    }
}



