<?php
    $loggedin = false;
    if (isset($_SESSION['regno'])) {
        $loggedin = true;
        $type = $_SESSION['type'];
        $regno = $_SESSION['regno'];
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RJIT LMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <?php
            if ($loggedin == false) {
             echo   '<a class="btn btn-outline-primary my-2 my-sm-0 mx-2" href="/lms/signup.php">Sign Up</a>
                    <a class="btn btn-primary my-2 my-sm-0" href="/lms/login.php">Login</a>';
            }

            else {
                if ($type == 2) {
                    echo '<a class="btn btn-outline-primary my-2 my-sm-0 mx-2" href="/lms/create_class.php">Create Class</a>';
                }
                echo '<a class="btn btn-primary my-2 my-sm-0" href="/lms/logout.php">Logout</a>';
            }
        ?>
        
    </form>
  </div>
</nav>