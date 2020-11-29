<?php
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];
    $classid = $_GET["classid"];

    $conn = new mysqli("localhost", "root", "", "lms");

    // TODO: Check if user present in group

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "SELECT post_id, title, description from posts where classid=$classid";

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
            array_push($res_array, array($row['title'], $row['description'], $row['post_id']));
        }
    }

    header("Content-type: application/json");
    echo json_encode($res_array);

    $conn->close();
?>