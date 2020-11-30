<?php
    session_start();
    unset($_SESSION['regno']);
    unset($_SESSION['type']);

    header("Location: /lms/index.php");
?>