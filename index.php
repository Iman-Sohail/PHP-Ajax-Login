<?php
    session_start();
    include_once('./include/conn.inc.php');
    if (!isset($_SESSION["id"]) || $_SESSION["id"] === '') {
        header("Location: ./login");
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
    <title>Dashboard - PHP Ajax Login</title>    
    <?php include_once('./include/link.inc.php'); ?>
</head>
<body>

    <?php
        $id = $_SESSION["id"];
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id"));     
    ?>

    Welcome User: <?php echo $user["name"] ?>

    <br/>
    <br/>
    <br/>
    <br/>

    <button class="btn btn-danger" id="logoutBtn">Logout</button>

    <?php include_once('./include/script.inc.php'); ?>
</body>
</html>