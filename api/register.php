<?php
    $regno = $_POST["regno"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $type = $_POST["type"];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "INSERT INTO users values('$regno', '$password', '$name', $type)";

    $conn->query($sql);

    // TODO: Page after registration
    header("Location: /lms/index.php");

    $conn->close();

    ?>