<?php 
    session_start();
    error_reporting(0);
    include_once('./ajax/register.ajax.php');    
    if (isset($_SESSION["id"]) && $_SESSION["id"] !== '') {
        header("Location: ./index");
        exit;
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Register - PHP Ajax Login</title>
    <?php include_once('./include/link.inc.php'); ?>
</head>
<body>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="login-form-body">
            <form action="javascript:void(0);" class="login-form">
                <h1>Register</h1>
                <div class="form-input-material w-100">
                    <input type="text" name="name" id="registerInputName" placeholder=" " autocomplete="off" required="" class="form-control-material registerFromCheckInput w-100" registerinputattr="Name">
                    <label for="registerInputName">Enter your name</label>
                </div>
                <div class="form-input-material w-100">
                    <input type="email" name="email" id="registerInputEmail" placeholder=" " autocomplete="off" required="" class="form-control-material registerFromCheckInput w-100" registerinputattr="Email">
                    <label for="registerInputEmail">Enter your email</label>
                </div>
                <div class="form-input-material w-100">
                    <input type="password" name="password" id="registerInputPass" placeholder=" " autocomplete="off" required="" class="form-control-material registerFromCheckInput w-100" registerinputattr="Pass">
                    <label for="registerInputPass">Enter your password</label>
                </div>
                <button type="submit" class="btn btn-ghost" id="registerBtn">register</button>
                <button type="submit" class="btn btn-ghost d-none" id="registerBtnLoader">
                    <img src="http://realstateshop.com/assets/img/loader.gif" alt="" class="" style="width: 10%">
                </button>
                <span>Already have an account? <a href="./login">Click Here</a></span>
            </form>
        </div>
    </div>

    <?php include_once('./include/script.inc.php'); ?>
</body>
</html>