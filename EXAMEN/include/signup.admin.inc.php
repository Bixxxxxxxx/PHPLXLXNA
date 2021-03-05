<?php

include_once "../signup.admin.php";
include_once "../class/signup.class.controller.php";

$first_name = $_POST["firstname"];
$last_name = $_POST['lastname'];
$email_teacher = $_POST['email'];
$password_teacher = $_POST['pwd'];
$password_teacher_repeat = $_POST['pwdrepeat'];
$add = new AdminController();

if (isset($_POST["submit_admin_register"])){
    if ($password_teacher_repeat == $password_teacher) {
        if ($add->CreateAdmin($first_name, $last_name, $email_teacher, $password_teacher) == TRUE){
            $add->CreateAdmin($first_name, $last_name, $email_teacher, $password_teacher);
            header("location: ../login.php?error=NONE");
        }
        else{
            header("location: ../signup.admin.php?error=EFAMISY");  
        }
    }
}



