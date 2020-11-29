<?php
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];
    
    echo "Hi, $regno<br>";

    if ($type == "1") {
        echo "You are Student";
    } else if ($type == "2") {
        header("Location: /lms/teacher_home.php");
    } else {
        echo "Who are you ???";
    }
?>