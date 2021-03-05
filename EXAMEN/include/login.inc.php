<?php 

include_once "../login.php";
include_once "../class/signup.class.controller.php";

$email_student = $_POST['email'];
$password_student = $_POST['pwd'];
$login = new StudentController();
$login2 = new StudentController();

if (isset($_POST["submit_login"])){
    if ($login->LoginStudent($email_student, $password_student) == TRUE){
        $login->LoginStudent($email_student, $password_student);
        header("location: ../index.php?error=loginstudentwork ");
    }
   
    else{
        header('location: ../login.php?error=loginError1');
    }
}