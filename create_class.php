<?php session_start() ?>
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
            <h5 class="card-title text-center">Create Class</h5>
            <form class="form-signin" action="api/create_class.php" method="POST">
              <div class="form-label-group">
                <input name="name" type="text" id="inputEmail" class="form-control" placeholder="Registration Number" required autofocus>
                <label for="inputEmail">Class Name</label>
              </div>

              <div class="form-label-group">
                <input name="subcode" type="text" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Subject Code</label>
              </div>

            
              <button class="btn btn-lg btn-primary btn-block text-uppercase my-4" type="submit">Add Class</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
    </body>
</html>