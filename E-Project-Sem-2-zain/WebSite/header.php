<?php
session_start();
// session_unset();
include("appointment.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Haircare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">


    
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .btn{
        color: red;
      }
      html, body {
    overflow-x: hidden;
}

    </style>
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php"><span class="flaticon-scissors-in-a-hair-salon-badge"></span>Haircare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <!-- Appointment Button - Opens Modal -->

            <form method="post" class="nav-item">
              <button type="submit" name="appoin"style="background-color: transparent; border: none;" class="nav-link" >Appointment</button></form>
             
            <!-- Login Button -->
<?php
if(isset($_POST['appoin'])){
if($_SESSION['clientname']==null){
  echo"<script>window.location.href='login.php'</script>";
}
else{ echo"<script>window.location.href='slots.php'</script>";}
}
if(isset($_SESSION['clientname'])){ ?>
  <li class="nav-item dropdown">
  <a  class="btn nav-link text-light" href="" id="clname" >
    <?php echo "wellcom"."  ".$_SESSION['clientname']
    ?>

  </a> 
  <div class="dropdown-menu bg-dark" >
    <a class="dropdown-item text-light" href="logout.php">logout</a>
  </div>

<?php
}
?>


</li>
</li>


          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

   

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    


    <script>
    function changeLinkColor() {
      // Select the anchor tag by its ID
      const link = document.getElementById('clname');

      // Change the text color
      link.style.color = 'red';  // Change the color to red
    }
  </script>

  </body>
</html>

