<?php
include('connection.php');
session_start();
/* session_unset(); */
// include("head.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Login - Furni</title>
  <style>
    .login-section {
      background: #f8f9fa;
      padding: 60px 0;
    }

    .login-form {
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-form h2 {
      margin-bottom: 30px;
      font-weight: 700;
    }

    .login-form .form-control {
      border-radius: 4px;
      box-shadow: none;
    }

    .login-form .btn {
      background: #000;
      color: #fff;
      border-radius: 4px;
      padding: 10px 20px;
    }

    .login-form .btn:hover {
      background: #333;
    }

    .login-form .text-center {
      margin-top: 20px;
    }
  </style>
</head>

<body>


  <!-- Start Login Section -->
  <div class="login-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="login-form">
            <h2 class="text-center">Login</h2>
            <form class="user" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" name="User_email" placeholder="Enter your Email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="User_password" placeholder="Enter your password"
                  required>
              </div>
              <button type="submit" name="Login_button" class="btn btn-primary w-100">Login</button>
              <?php
              if (isset($_POST['Login_button'])) {
                $get_email = $_POST['User_email'];
                $get_password = $_POST['User_password'];
                $login_data_fetch = mysqli_query($con, "SELECT * FROM `userregister` WHERE `email`='$get_email' AND `pass`='$get_password'");
               $fetch=mysqli_fetch_array( $login_data_fetch);
               $_SESSION['Cid']=$fetch[0];
               $_SESSION['clientname']=$fetch[1];
               $_SESSION['email']=$fetch[2];
                if ($fetch) {
                  echo "<script>alert('Login Sucessfully');
                  window.location='index.php'</script>";
                } else {
                  echo "<script>alert('Login Failed')</script>";
                }
              };
              ?>

              <div class="text-center mt-3">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
                <p><a href="#">Forgot Password?</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Login Section -->

  <?php
// include("footer.php");
?>
</body>

</html>