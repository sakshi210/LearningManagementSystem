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
        
        <?php include 'segments/bootstrap.php' ?>

        <style>
            .card a:hover {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php include 'segments/navbar.php' ?>
    
        <div class="container my-4">
            <div id='class_list' class="row">
            </div>
        </div>


        <!-- Check Functionality -->
        <!-- <form action="api/add_student_class.php" method="POST">
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
        </form> -->
    </body>

    <script>
        class_list = document.getElementById('class_list');
        color_index = 0

        colors = ["red", "green", "black", "orange"]

        function getColor() {
            color_index += 1
            return colors[color_index % colors.length]
        }

        function create_class_card(class_info) {
            ele = document.createElement("div")
            ele.className = "col-sm-4 my-2"
            html_string = `
                    <div class="card">
                        <a href="/lms/class.php?classid=${class_info[0]}">
                        <div class="card-header" style="background-color: ${getColor()}">
                            <h3 class="text-light mb-5">${class_info[1]}</h3>
                            <span class="text-light mt-2">${class_info[2]}</span>
                        </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text">Dr Jagdish Makhijani</p>
                        </div>
                    </div>
            `
            ele.innerHTML = html_string.trim()
            return ele;
        } 

        function load_classes() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    classes = JSON.parse(this.responseText);
                    console.log(classes);
                    classes.forEach(element => {
                        class_list.appendChild(create_class_card(element))
                    });
                }
            }
            xhttp.open("GET", "api/get_classes.php", true)
            xhttp.send()
        }

        load_classes()
    </script>
</html>
