<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haircare - Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .blur-background {
            background-image: url("images/bg-2.jpg");
            /* Replace with your background image URL */
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Sign Up</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-wrap p-4 p-md-5">
                    <form action="" method="post" class="login-form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phoneno" class="form-control" placeholder="Phone No" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confrimpassword" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="sign_btn" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                        <?php
                        if (isset($_POST['sign_btn'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone_no = $_POST['phoneno'];
                            $password = $_POST['password'];
                            $conf_password = $_POST['confrimpassword'];
                            if ($password == $conf_password) {
                                $register_query = mysqli_query($con, "INSERT INTO `userregister`(`name`, `email`, `phone`, `pass`, `confirm_pass`) VALUES ('$name','$email','$phone_no','$password ','$conf_password')");
                                if ($register_query) {
                                    echo "<script>alert('Register Sucessfully')
                                    window.location='login.php'</script>";
                                } else {
                                    echo "<script>alert('Register Failed')</script>";
                                }
                            } else {
                                echo "<script>alert('Passowrd And Confrim Password Dose Not Match')</script>";
                            }
                        }
                        ?>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <a href="login.php" class="small">Already have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>