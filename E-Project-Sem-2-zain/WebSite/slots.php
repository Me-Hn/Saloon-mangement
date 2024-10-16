<?php
include('connection.php');
include('details.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Slots</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            /* background: rgba(255, 255, 255, 0.1); */
            background-image: url(back2.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 800p;
            /* backdrop-filter: blur(10px); */

            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            /* Remove default margin */
        }

        .container {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            /* position: relative; 
            top: 300px;  */

        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: rgba(0, 123, 255, 0.7);
            color: white;
        }

        .table-bordered {
            border: 2px solid rgba(0, 0, 0, 0.2);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid rgba(0, 0, 0, 0.2);
        }

        #cl {
            text-align: center;
            text-transform: capitalize;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- <h2 class="text-center text-white" id="cl">Appointment Slots</h2> -->
        <h3 id="cl">Appointment Slots</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetching data from the appointments table
                $query = mysqli_query($con, "SELECT * FROM `Slots`");
                // Checking if the query returns results
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        // Displaying each row of data  
                
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row[0]); ?></td>
                            <td><?php echo htmlspecialchars($row[1]); ?></td>
                            <td>
                                <?php if ($row[2] == '1') {
                                    ?>
                                    <?php if (isset($_SESSION['offerCart'])) { unset($_SESSION['offerCart']) ?>
                                        <a href="offer_appointment.php?idslot=<?php echo $row[0] ?>"
                                            class="btn btn-success">Available</a><?php } else { ?>

                                                
                                    <a href="second_appointment.php?idslot=<?php echo $row[0] ?>"
                                        class="btn btn-success">Available</a><?php }?>


                                    <?php
                                } else { ?>
                                    <button class="btn btn-danger">Not Available</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // If no appointments are found
                    echo "<tr><td colspan='3' class='text-center'>No appointments available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>