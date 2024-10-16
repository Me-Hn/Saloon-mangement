<?php
include("connection.php");
include("details.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .background {
            background-image: url(PDH-Aesthetics-Salon-Iris-Mannings-11-1-scaled.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .mainsec {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .heading {
            color: white;
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
        }

        .persec {
            position: relative;
            top: 155px;
        }

        .sersec {
            position: relative;
            top: 150px;
        }

        label {
            color: chartreuse;
            font-size: 22px;
        }

        .inputfeild {
            color: white;
            width: 500px;
            height: 44px;
            background-color: transparent;
        }

        option {
            color: black;
            background-color: transparent;
        }

        .inputfeild:read-only {
            color: white;
            opacity: 1;
        }

        .inputfeild::placeholder {
            color: white;
            opacity: 1;
        }

        .submit-btn {
            position: relative;
            top: 25px;
            height: 45px;
            width: 500px;
        }

        .tablesec {
            background-color: transparent;
            position: relative;
            top: 18rem;
            z-index: 1;
            /* Ensure the section is transparent too */
        }

        .table {
            background-color: transparent !important;
            border: 1px solid white;
            /* Add a white border to the table */
        }

        .table th,
        .table td {
            background-color: transparent !important;
            border: 1px solid white;
            /* Add a white border to table headers and cells */
            color: white;
            /* Adjust text color for visibility */
        }

        .headingser {
            position: absolute;
            z-index: 2;
            top: 48rem;
            left: 54rem;
        }
    </style>

</head>

<body>
    <section class="background">
        <section class="mainsec">
            <section class="persec">
                <h1 class="heading"><span style="color: #32CD32;">P</span>ersonal <span
                        style="color: #32CD32;">I</span>nformation</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Name :</label>
                        <input type="text" id="disabledTextInput" name="cname" class="form-control inputfeild"
                            value="<?php echo $_SESSION['clientname']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Email :</label>
                        <input type="email" id="disabledTextInput" name="cemail" class="form-control inputfeild"
                            value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>

                    <input type="hidden" value="<?php echo $_SESSION['Cid'] ?>" class="form-control inputfeild"
                        name="cid" id="exampleInputPassword1" required>

                    <?php
                    if (isset($_GET['idslot'])) {
                        $getid = $_GET['idslot'];
                        $fetctime = mysqli_query($con, "SELECT * FROM `slots` WHERE `id`='$getid'");
                        $slotetime = mysqli_fetch_array($fetctime);
                    }
                    ?>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Slote :</label>
                        <input type="text" id="disabledTextInput" name="cslote" class="form-control inputfeild"
                            value="<?php echo $slotetime[1]; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date :</label>
                        <input type="date" class="form-control inputfeild" name="cdate" id="exampleInputPassword1"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Available Phone-no :</label>
                        <input type="number" class="form-control inputfeild" name="cnumber" placeholder="+92 XXXXXXXXXX"
                            id="exampleInputPassword1" required>
                    </div>

            </section>
            <section class="sersec">

                <h2 class="heading"><span style="color: #32CD32;">S</span>ervice <span
                        style="color: #32CD32;">I</span>nformation</h2>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Selected Deal :</label>

                    <input type="text" id="disabledTextInput" name="dealer" class="form-control inputfeild"
                        value="<?php echo $_SESSION['dal'] ?>" readonly>
                </div>




                <button type="submit" name="osumit" class="btn btn-primary submit-btn">Confirm Your Order</button>

                <?php
                if (isset($_POST['osumit'])) {
                    $ccname = $_POST['cname'];
                    $ccemail = $_POST['cemail'];
                    $cccid = $_POST['cid'];
                    $ccslote = $_POST['cslote'];
                    $ccdate = $_POST['cdate'];
                    $ccphone = $_POST['cnumber'];

                    $deal = $_POST['dealer'];

                    // Insert appointment into the database
                    $inputdata = mysqli_query($con, "INSERT INTO `appointement`(`client_id`, `Name`, `Email`, `Slote`, `Date`, `Phone_No`, `Hair_Style`, `Beard_Style`, `Face_Treatment`, `Hair_Treatment`, `Deal_No`)
             VALUES ('$cccid', '$ccname', '$ccemail', '$ccslote', '$ccdate', '$ccphone', 'No', 'NO', 'No', 'NO','$deal')");

                    /*   if ($inputdata) {
                          // Decrease the quantity for HydraFacial if it is selected
                          if ($cfser == 'HydraFacial') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'HydraFacial'");
                          }
                          // Check for another face treatment, e.g., Oxygen facial
                          elseif ($cfser == 'Oxygen facial') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Oxygen facial'");
                          } elseif ($cfser == 'Anti ageing treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Anti ageing treatment'");
                          } elseif ($cfser == 'Exfoliation') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Exfoliation'");
                          } elseif ($cfser == 'Acne facial') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Acne facial'");
                          } elseif ($cfser == 'Chemical peels') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Chemical peels'");
                          } elseif ($cfser == 'Cleansing') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Cleansing'");
                          } elseif ($cfser == 'Dermal fillers') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Dermal fillers'");
                          } elseif ($cfser == 'Microneedling') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Microneedling'");
                          } elseif ($cfser == 'Laser hair removal') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Laser hair removal'");
                          } elseif ($cfser == 'Facials') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Facials'");
                          } elseif ($cfser == 'Basic facial') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Basic facial'");
                          } elseif ($cfser == 'CoolSculpting') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'CoolSculpting'");
                          } elseif ($cfser == 'Gentleman facial') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Gentleman facial'");
                          } elseif ($cfser == 'On Your Demand') {
                              $decreaseFace = mysqli_query($con, "UPDATE `face_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'On Your Demand'");
                          } // You can add more elseif blocks for additional products
                  
                          // hair product
                          $chhser = trim($chhser);  // Removes any leading or trailing spaces
                  
                          if (strtolower($chhser) == 'scalp treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Scalp Treatment'");
                          } elseif (strtolower($chhser) == 'detox treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Detox treatment'");
                          } elseif (strtolower($chhser) == 'hair mesotherapy') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Hair mesotherapy'");
                          } elseif (strtolower($chhser) == 'hot oil treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Hot oil treatment'");
                          } elseif (strtolower($chhser) == 'moisture treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Moisture Treatment'");
                          } elseif (strtolower($chhser) == 'toning treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Toning Treatment'");
                          } elseif (strtolower($chhser) == 'hair glossing treatment') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'Hair Glossing Treatment'");
                          } elseif (strtolower($chhser) == 'on your demand') {
                              $decreaseFace = mysqli_query($con, "UPDATE `hair_product` SET `QTY` = `QTY` - 1 WHERE `name` = 'On Your Demand'");
                          }





                          // hair product
                          // Check if the decrease query ran successfully
                          if ($decreaseFace) {
                              echo '<div class="alert alert-success" role="alert">Appointment confirmed and quantity updated successfully for ' . $selectedFaceTreatment . '!</div>';
                          } else {
                              echo '<div class="alert alert-danger" role="alert">Failed to update quantity for face treatment: ' . mysqli_error($con) . '</div>';
                          }
                      } else {
                          echo '<div class="alert alert-danger" role="alert">Appointment submission failed!</div>';
                      } */

                }
                ?>
                </form>
            </section>
        </section>
        <div>
            <h3 style="color: white;" class="headingser"><span style="color: #32CD32;">H</span>istory <span
                    style="color: #32CD32;">Y</span>or <span style="color: #32CD32;">S</span>ervice <span
                    style="color: #32CD32;">A</span>leary <span style="color: #32CD32;">A</span>vailed</h3>
        </div>
        <section class="tablesec">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">client_id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">slote</th>
                        <th scope="col">Date</th>
                        <th scope="col">Phone NO</th>
                        <th scope="col">Hair Style</th>
                        <th scope="col">Beard Style</th>
                        <th scope="col">Facial Treatment</th>
                        <th scope="col">Hair Treatment</th>
                        <th scope="col">Deal No</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ddid = $_SESSION['Cid'];
                    $ddname = $_SESSION['clientname'];
                    $ddemail = $_SESSION['email'];
                    $histroy = mysqli_query($con, "SELECT * FROM `history_appointment` WHERE `Email`='$ddemail' AND `Name`='$ddname'");
                    if ($histroy) {
                        while ($hisrow = mysqli_fetch_array($histroy)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $hisrow[1] ?></th>
                                <td><?php echo $hisrow[2] ?></td>
                                <td><?php echo $hisrow[3] ?></td>
                                <td><?php echo $hisrow[4] ?></td>
                                <td><?php echo $hisrow[5] ?></td>
                                <td><?php echo $hisrow[6] ?></td>
                                <td><?php echo $hisrow[7] ?></td>
                                <td><?php echo $hisrow[8] ?></td>
                                <td><?php echo $hisrow[9] ?></td>
                                <td><?php echo $hisrow[10] ?></td>
                                <td><?php echo $hisrow[11] ?></td>
                            </tr>

                        <?php }
                    } else { ?>
                        <tr>
                            <th scope="row"><?php echo "No Service Avail"; ?></th>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-nD4kYjzv5vH7u2R3ge1bF9iUp1DtU0zL4Jo1CPvZ4U20z2gYIC/ax5dHPSW+56Ed"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_GET['idslot'])) {
    $id = intval($_GET['idslot']); // Get the appointment ID from the URL

    // You may want to fetch the current appointment details for display
    $query = mysqli_query($con, "SELECT * FROM `Slots` WHERE id = $id");
    $appointment = mysqli_fetch_array($query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Assume the appointment is successfully created
        // Update the appointment status to 'not available'
        mysqli_query($con, "UPDATE `Slots` SET is_booked = '0' WHERE id = $id");

        // Redirect back to the appointment slots page after successful booking
        header('Location: index.php'); // Make sure to change this to your slots page URL
        exit();
    }
} else {
    echo "<script>alert ('slot did not select')</script>";
    // Handle case where ID is not set
    // header('Location: slots.php');

    exit();
}
?>