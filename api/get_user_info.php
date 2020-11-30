<?php
    function get_user_info($regno) {
        $conn = new mysqli("localhost", "root", "", "lms");

        if ($conn->connect_error) {
            die("Connection Failes");
        }
    }
?>