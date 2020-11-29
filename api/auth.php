<?php
    $regno = $_POST["regno"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "SELECT regno, PASSWORD, type from users where regno = '$regno'";

    $result = $conn->query($sql);
    if (!$result) {
        echo $conn->error;
        die("Error");
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["PASSWORD"] == $password) {
            session_start();
            
            $_SESSION["regno"] = $regno;
            $_SESSION["type"] = $row["type"];

            header("Location: /lms/home.php");
            exit();
        } else {
            header("Location: /lms/login.php?wrong_password=true");
            exit();
        }
    } else {
        header("Location: /lms/login.php?user_not_found=true");
        exit();
    }

    $conn->close();
?>