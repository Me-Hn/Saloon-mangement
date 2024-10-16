<?php
include('connection.php');
include('details.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Helvetica', 'Arial', sans-serif;
        }

        body {
            background-color: #f7f7f7;
        }

        .invoice-box {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .company-details {
            text-align: right;
            font-size: 14px;
            color: #888;
        }

        .information {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .client-details,
        .invoice-details {
            font-size: 16px;
            line-height: 1.6;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th {
            background-color: #f5f5f5;
            color: #333;
            text-align: left;
            padding: 10px;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }

        .invoice-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .invoice-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .total-section {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }

        .total-label {
            font-weight: bold;
            font-size: 16px;
            color: #666;
        }

        .total-value {
            font-size: 16px;
            color: #333;
        }

        .grand-total {
            font-size: 18px;
            color: #333;
            border-top: 2px solid #ddd;
            padding-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="header">
            <h1>Invoice</h1>
            <div class="company-details">
                <strong>Your Company Name</strong><br>
                123 Company Street, City, Country<br>
                contact@company.com<br>
                +1 234 567 890
            </div>
        </div>
        <form action="" method="post">
            <?php
            if (isset($_SESSION['Cart']) && !empty($_SESSION['Cart'])) {
                foreach ($_SESSION['Cart'] as $key => $val) {
                    ?>
                    <div class="information">
                        <div class="client-details">
                            <strong>Bill To:</strong><br>
                            Client ID : <?php echo $val['pid']; ?><br>
                            Client Name : <?php echo $val['pname']; ?><br>
                            Client Phone no : <?php echo $val['pnumber'] ?>
                        </div>
                        <div class="invoice-details">
                            Date: <?php echo $val['pdate'] ?><br>
                            Slote Timming: <?php echo $val['pslote'] ?>
                        </div>
                    </div>
                    <table class="invoice-table">
                        <div style="background-color: #00d4ff">
                            <h1
                                style=" position: relative;left:30%;font-size:1.5rem;font-family: 'Times New Roman', Times, serif;">
                                Services You Wants To Avail!</h1>
                        </div>
                        <thead>
                            <tr>

                            </tr>

                            <tr>
                                <th>Hair Style</th>
                                <th>Beard Style</th>
                                <th>Face Treatment</th>
                                <th>Hair Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $val['phairs'] ?></td>
                                <td><?php echo $val['pbeards'] ?></td>
                                <td><?php echo $val['pfaect'] ?></td>
                                <td><?php echo $val['phairt'] ?></td>
                            </tr>

                        </tbody>

                    </table>
                    <button type="submit" name="tankyou" class="btn btn-primary">Thanks You</button>


                    <?php
                    if (isset($_POST['tankyou'])) {
                        unset($_SESSION['Cart']);
                        unset($_SESSION['offerCart']);
                        unset($_SESSION['finalcard']);
                        echo "<script>window.location='index.php';</script>";
                    }
                    ?>
                    <?php

                }
            } else {
                echo "<p>No items in the cart.</p>";
            }
            ?>
            


         
        </form>
        <div class="footer">
            <p style="color: black;">Thank you for your business!</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>