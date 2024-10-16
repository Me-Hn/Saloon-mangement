<?php
include("connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
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

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <!-- Trigger button to open modal -->

  <!-- Modal structure -->
  <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <section class="ftco-section ftco-booking bg-light">
            <div class="container ftco-relative">
              <div class="row justify-content-center pb-3">
                <div class="col-md-10 heading-section text-center ftco-animate">
                  <span class="subheading">Booking</span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
              </div>
              <h3 class="vr">Call Us: 012-3456-7890</h3>
              <div class="row justify-content-center">
                <div class="col-md-10 ftco-animate">
                  <form action="#" class="appointment-form" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="appointment_name" placeholder="Name" name="proname">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="appointment_email" placeholder="Email" name="proemail">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control appointment_date" placeholder="Date" name="prodate">
                        </div>    
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control appointment_time" placeholder="Time" name="protime">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="proselect" id="" class="form-control">
                              <option value="Professional Makeup">Professional Makeup</option>
                              <option value="Manicure Pedicure">Manicure Pedicure</option>
                              <option value="Body Treatment">Body Treatment</option>
                              <option value="Haircut &amp; Coloring">Haircut &amp; Coloring</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="phone" placeholder="Phone" name="prophone">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="promassge" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Make an Appointment" class="btn btn-primary" name="probtn">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['probtn'])) {
        $pro_name = $_POST['proname'];
        $pro_email = $_POST['proemail'];
        $pro_date = $_POST['prodate'];
        $pro_time = $_POST['protime'];
        $pro_select = $_POST['proselect'];
        $pro_phone = $_POST['prophone'];
        $pro_massge = $_POST['promassge'];

        // Assuming id is auto-incremented
        $query = mysqli_query($con, "INSERT INTO `appointment`(`name`, `email`, `date`, `time`, `categorey`, `phone`, `massge`)
        VALUES ('$pro_name','$pro_email','$pro_date','$pro_time','$pro_select','$pro_phone','$pro_massge')");

    if ($query) {
        // Get the last inserted appointment ID to pass it to the next page
        $appointment_id = mysqli_insert_id($con);

        // Use JavaScript for redirection
        echo "<script type='text/javascript'>
                window.location.href = 'viewappointment.php?id=$appointment_id';
              </script>";
    } else {
        echo "Failed to make an appointment.";
    }
}
?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
