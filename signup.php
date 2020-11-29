<!DOCTYPE html>
<html>
    <head>
        <title> LMS </title>
    </head>
    <body>
        <h1> RJIT LMS </h1>
        <form action="api/register.php" method="POST">
            Reg No: <input type="text" name="regno"><br>
            Name: <input type="text" name="name"><br>
            Password: <input type="password" name="password"><br>
            Type: 
            <select name="type">
                <option value="1">Student</option>
                <option value="2">Teacher</option>
            </select>
            <input type="submit" name="submit">
        </form>
    </body>
</html>