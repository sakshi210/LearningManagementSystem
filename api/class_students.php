<?php
    $classid = $_POST["classid"];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "SELECT regno, name from users inner join (SELECT sregno from class_students WHERE classid = $classid) t2 on users.regno=t2.sregno";

    $result = $conn->query($sql);
    if (!$result) {
        echo $conn->error;
        die("Error");
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row['name']." ".$row['regno']."<br>";
        }
    }

    $conn->close();
?>