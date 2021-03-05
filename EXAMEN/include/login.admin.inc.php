<?php 

include_once "../login.php";
include_once "../class/signup.class.controller.php";

$email_teacher = $_POST['email'];
$password_teacher = $_POST['pwd'];

$login2 = new AdminController();

if (isset($_POST["submit_login"])){
    if($login2->LoginAdmin($email_teacher, $password_teacher) == TRUE){
        $login2->LoginAdmin($email_teacher, $password_teacher);
        header("location: ../index.php?error=loginAdminwork ");
    }
   
    else{
        header('location: ../login.php?error=loginError2');
    }
}























