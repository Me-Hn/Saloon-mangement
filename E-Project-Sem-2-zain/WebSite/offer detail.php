<?php
include('details.php');
include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .main_sec {
            position: relative;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .main_sec::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/formen.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            z-index: -2;
        }

        .main_sec::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .inner_sec {
            background: rgba(0, 0, 0, 0.2);
            /* Blue overlay with transparency */
            border: 2px solid rgba(0, 255, 81, 1);
            /* Blue border */
            border-radius: 2rem;
            height: 50rem;
            width: 80rem;
            padding: 2rem;
            /* Add padding inside the section */
            backdrop-filter: blur(55px);
            /* Optional: Adds a slight blur to the background */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            /* Add a shadow for more emphasis */
        }

        .content {
            color: white;
            position: relative;
        }

        .image_container {
            width: 100%;
            max-width: 600px;
            height: auto;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            margin-bottom: 2rem;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: inherit;
        }

        span {
            font-size: 2.5rem;
            color: #00ff51;
            /* Blue color for headings */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            /* Text shadow for better visibility */
        }

        p {
            font-size: 1.5rem;
            line-height: 1.6;
            color: #fff;
            /* Keep the text white for readability */
        }

        h2 {
            position: absolute;
            top: 1rem;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 5rem;

        }
       
        .buttonbb {}
    </style>
</head>

<body>

    <section class="main_sec">
        <h2>Offer Detail</h2>
        <section class="inner_sec">
            <div class="content">
                <?php
                if (isset($_GET['id'])) {
                    $gotid = $_GET['id'];
                    $fetching = mysqli_query($con, "SELECT * FROM `deals` WHERE `ID`='$gotid'");
                    $row = mysqli_fetch_array($fetching);
                    $_SESSION['dal']=$row[1];
                }
                ?>
                <div class="image_container">
                    <h1>Deal No <?php echo $row[1]?></h1>
                    <img src="../admin-panel/img/<?php echo $row[4]; ?>" alt="Deal Image">
                </div>
                <h1><?php echo $row[2] ?></h1>
                <p><?php echo $row[3] ?></p>
                <p>Rs<?php echo $row[5] ?></p>
                
            </div>
            <form method="post">
                <input type="hidden" name="dealno" value="Deal No<?php echo $row[1]?>" id="">
                <input type="hidden" name="image" value="<?php echo $row[4] ?>" id="">
                <input type="hidden" name="name" value="<?php echo $row[2]?>" id="">
                <input type="hidden" name="des" value="<?php echo $row[3]?>" id="">
                <input type="hidden" name="prics" value="Rs<?php echo $row[5]?>" id="">
            <button type="submit" name="offerbtn" class="btn btn-primary">Continue To Slote Page</button>
            </form>
            <?php
          
            ?>
        </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"></script>
</body>

</html>