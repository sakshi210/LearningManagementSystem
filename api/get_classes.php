<?php
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    if ($type == "1") {
        $sql = "SELECT classid, name from classes inner join (SELECT classid from class_students WHERE sregno='$regno') t2 on classes.classid=t2.classid";
    } else if ($type == "2") {
        $sql = "SELECT classid, name from classes where teacher='$regno'";
    }

    $result = $conn->query($sql);
    if (!$result) {
        echo $conn->error;
        die("Error");
    }
    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo $row['name']." ".$row['regno']."<br>";
    //     }
    // }

    $res_array = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($res_array, array($row['classid'], $row['name']));
        }
    }

    header("Content-type: application/json");
    echo json_encode($res_array);

    $conn->close();
?>