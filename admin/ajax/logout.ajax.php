<?php
    session_start();
    if (!isset($_SESSION["id"]) || $_SESSION["id"] === '') {
        header("Location: ../login");
        exit;
    }
    
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "logout success";
?>