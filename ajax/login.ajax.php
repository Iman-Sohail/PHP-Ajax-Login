<?php 

session_start();

include_once('../include/conn.inc.php');

if (isset($_POST['pass_val'])) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email_val']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass_val']);

    $convertedPass = md5($pass);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $convertedPass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                
                $_SESSION["id"] = $row[0];
                $_SESSION["name"] = $row[1];
                $_SESSION["email"] = $row[2];
                $_SESSION["password"] = $row[3];
                $_SESSION["role"] = $row[4];
                $_SESSION["active"] = $row[5];
                
                $row[0] =  $_SESSION["id"];
                $row[1] =  $_SESSION["name"];
                $row[2] =  $_SESSION["email"];
                $row[3] =  $_SESSION["password"];                
                $row[4] =  $_SESSION["role"];
                $row[5] =  $_SESSION["active"];

                if ($row[4] == 0) {
                    echo "login successfully";
                }
                else if ($row[4] == 1) {
                    echo "login success";
                }

            }
        }

    } else {
        echo "user doesn't exists";
        exit;
    }


}

?>