<?php
include("connection.php");
session_start();
include("aside.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory View</title>
  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Inventory View</h1>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>QTY</th>
          <th>Status</th>
        </tr>
      </thead>
      <?php
      
      $_SESSION['low_stock'] = []; // Initialize an empty array
      
      $faecpro = mysqli_query($con, "SELECT * FROM face_product");
      while ($row = mysqli_fetch_array($faecpro)) {
        $proname = $row[1]; // Assuming product name is in column index 1
        $quantity = $row[2]; // Assuming quantity is in column index 2
      
        if ($quantity < 10) {
          // Add a warning message to the session array with <hr> tag
          $_SESSION['low_stock'][] = "Product '$proname' has only $quantity left in stock!<hr>";
        }

        ?>




        <tbody>
          <tr>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <?php
            if ($row[2] > '7') { ?>
              <td><button class="btn btn-success">Good</button></td>

              <?php
            } elseif ($row[2] > '4') { ?>
              <td><button class="btn btn-warning">Half</button></td>
              <?php
            } elseif ($row[2] > '0') { ?>
              <td><button class="btn btn-danger" disabled>Warning</button></td>
              <?php
            }
            ?>
          </tr>

          <?php
      }
      ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap 5.3 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>