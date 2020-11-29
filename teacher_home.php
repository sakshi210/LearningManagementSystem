<?php
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];

    if ($type != "2") {
        header("Location: /lms/home.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> LMS </title>
    </head>
    <body>
        <h1> Teacher Portal </h1>
        <h2>Classes</h2>
        <div id='class_list'>
        </div>


        <!-- Check Functionality -->
        <form action="api/create_class.php" method="POST">
            <h2> Create Class </h2>
            Name: <input type="text" name="name"><br>
            Subject Code: <input type="text" name="subcode"><br>
            <input type="submit" name="submit" value="Create Class">
        </form>

        <form action="api/add_student_class.php" method="POST">
            <h2> Add Student To Class </h2>
            Student Reg no: <input type="text" name="sregno"><br>
            Class Id: <input type="text" name="classid"><br>
            <input type="submit" name="submit" value="Add Student">
        </form>

        <form action="api/class_students.php" method="POST">
            <h2> View Students </h2>
            Class Id: <input type="text" name="classid"><br>
            <input type="submit" name="submit" value="View Students">
        </form>

        <form action="api/add_post.php" method="POST">
            <h2>Add Post</h2>
            Class Id: <input type="text" name="classid"><br>
            Title: <input type="text" name="title"><br>
            Description: <input type="text" name="description"><br>
            <input type="submit" name="submit" value="Add Post">
        </form>
    </body>

    <script>
        class_list = document.getElementById('class_list');

        function load_classes() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    classes = JSON.parse(this.responseText);
                    console.log(classes);
                    classes.forEach(element => {
                        console.log(element[1])
                        ele = document.createElement("span")
                        ele.innerText = element[0] + ": " + element[1];
                        class_list.appendChild(ele)
                        class_list.appendChild(document.createElement("br"))
                    });
                }
            }
            xhttp.open("GET", "api/get_classes.php", true)
            xhttp.send()
        }

        load_classes()
    </script>
</html>
