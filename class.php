<?PHP
    session_start();

    $regno = $_SESSION["regno"];
    $type = $_SESSION["type"];
    $classid = $_GET['classid'];

    $conn = new mysqli("localhost", "root", "", "lms");

    if ($conn->connect_error) {
        die("Connection Failes");
    }

    $sql = "SELECT name from classes where classid=$classid";

    $result = $conn->query($sql);
    if (!$result) {
        echo $conn->error;
        die("Error");
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $class_name = $row['name'];
    }

    $conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> LMS </title>
        <style>
            .post {
                background-color: green;
            }
        </style>
    </head>
    <body>
        <h1> Class: <?php echo $class_name ?></h1>
        <h2>Posts</h2>
        <div id='post_list'>
        </div>


        
    </body>

    <script>
        post_list = document.getElementById('post_list');

        function load_classes() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    classes = JSON.parse(this.responseText);
                    console.log(classes);
                    classes.forEach(element => {
                        console.log(element[1])
                        ele = document.createElement("div")
                        ele.className = "post"
                        html_string = `
                            <h3>${element[0]}</h3>
                            <p>${element[1]}</p>
                        `
                        ele.innerHTML = html_string.trim()
                        post_list.appendChild(ele)
                        // post_list.appendChild(document.createElement("br"))
                    });
                }
            }
            xhttp.open("GET", "api/view_posts.php?classid=<?php echo $classid; ?>", true)
            xhttp.send()
        }

        load_classes()
    </script>
</html>
