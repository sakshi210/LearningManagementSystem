<!DOCTYPE html>
<html>
    <head>
        <title> LMS </title>

        <?php include 'segments/bootstrap.php' ?>
        <link type="text/css" rel="stylesheet" href="/lms/css/login.css">
    </head>
    <body>
        <?php include 'segments/navbar.php' ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="/lms/api/auth.php" method="post">
              <div class="form-label-group">
                <input name="regno" type="text" id="inputEmail" class="form-control" placeholder="Registration Number" required autofocus>
                <label for="inputEmail">Registration Number</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

            
              <button class="btn btn-lg btn-primary btn-block text-uppercase my-4" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- <form action="api/auth.php" method="POST">
            Reg No: <input type="text" name="regno"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login">
        </form> -->
    </body>
</html>