<?php

include_once "../signup.php";
include_once "../class/signup.class.controller.php";

$first_name = $_POST["firstname"];
$last_name = $_POST['lastname'];
$email_student = $_POST['email'];
$password_student = $_POST['pwd'];
$password_student_repeat = $_POST['pwdrepeat'];
$add = new StudentController();

if (isset($_POST["submit_student"])){
    if ($password_student_repeat == $password_student) {
        if ($add->CreateStudent($first_name, $last_name, $email_student, $password_student) == TRUE){
            $add->CreateStudent($first_name, $last_name, $email_student, $password_student);
            header("location: ../login.php?error=NONE");
        }
        else{
            header("location: ../signup.php?error=EFAMISYSTUDENT");
        }
    }
}








