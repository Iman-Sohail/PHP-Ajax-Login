<?php 
    session_start();
    error_reporting(0);
    include_once('./ajax/login.ajax.php');    
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
    <title>Login - PHP Ajax Login</title>
    <?php include_once('./include/link.inc.php'); ?>
</head>
<body>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="login-form-body">
            <form action="javascript:void(0);" class="login-form">
                <h1>Login</h1>
                <div class="form-input-material w-100">
                    <input type="email" name="email" id="LoginInputEmail" placeholder=" " autocomplete="off" required="" class="form-control-material loginFromCheckInput w-100" logininputattr="Email">
                    <label for="LoginInputEmail">Enter your email</label>
                </div>
                <div class="form-input-material w-100">
                    <input type="password" name="password" id="loginInputPass" placeholder=" " autocomplete="off" required="" class="form-control-material loginFromCheckInput w-100" logininputattr="Pass">
                    <label for="loginInputPass">Enter your password</label>
                </div>
                <button type="submit" class="btn btn-ghost" id="loginBtn">Login</button>
                <button type="submit" class="btn btn-ghost d-none" id="loginBtnLoader">
                    <img src="./assets/img/loader.gif" alt="" class="" style="width: 10%">
                </button>
                <span>Don't have an account yet? <a href="./register">Click Here</a></span>
            </form>
        </div>
    </div>

    <?php include_once('./include/script.inc.php'); ?>
</body>
</html>