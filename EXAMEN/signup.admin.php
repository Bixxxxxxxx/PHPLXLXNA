<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="koko1">
    <section class = "signup-form">
            <h2>Sign up admin</h2>
            <form action="include/signup.admin.inc.php" method = "POST">
            <input type="text" name="lastname" placeholder = "input your last name">
                <input type="text" name="firstname" placeholder = "input your first name">
                <input type="email" name="email" placeholder = "input you email">
                <input type="password" name="pwd" placeholder = "input your password">
                <input type="password" name="pwdrepeat" placeholder = "Repeat it please">
                <button type = "submit" name ="submit_admin_register">register as admin/teacher</button>
                
            </form> 
           <a href="signup.php">Go to signup as student</a>
            
        </section>
    </div>
</body>
</html>