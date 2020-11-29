<?php
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];

    if ($type != "2") {
        header("Location: /lms/home.php");
    }

    $classname = $_POST["name"];
    $subcode = $_POST["subcode"];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "INSERT INTO classes(name, subcode, teacher) values('$classname', '$subcode', '$regno')";

    $result = $conn->query($sql);
    if (!$result) {
        echo $conn->error;
        die("Error");
    }

    // implement result
    header("Location: /lms/teacher_home.php");

    $conn->close();
?>