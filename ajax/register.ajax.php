<?php 
session_start();

include_once('../include/conn.inc.php');

if (isset($_POST['pass_val'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name_val']);
    $email = mysqli_real_escape_string($conn, $_POST['email_val']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass_val']);

    $convertedPass = md5($pass);

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        echo "user exists";
        exit;
    }

    // Store the user in the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $convertedPass);
    $stmt->execute();
    echo "registered successfully";
}

?>