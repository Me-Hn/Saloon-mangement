<?php

include('connection.php');
session_start();
include('aside.php');
if(isset($_SESSION['username'])==null){
    echo"<script>window.location='login.php'</script>";
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
     body {
            background-color: #f8f9fa;
        }

        .table-custom th {
            background-color: #007bff;
            color: white;
        }

        .table-custom tr {
            transition: background-color 0.3s ease;
        }

        .table-custom tr:hover {
            background-color: #e9ecef;
        }

        .product-img {
            width: 100px;
            height: auto;
        }

        @media (max-width: 768px) {
            .product-img {
                width: 60px;
            }

            .table-responsive {
                font-size: 14px;
            }
        }
</style>
</head>
<body>
    

<?php
$query= mysqli_query($con, "select * from produ");
while($data = mysqli_fetch_array($query)){

?>
<div class="container my-5">
        <h2 class="text-center mb-4">Product List</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-custom text-center align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="product_img/<?php echo $data[1]?>" alt="Product 1" class="product-img"></td>
                        <td><?php echo $data[2]?></td>
                        <td><?php echo $data[3]?></td>
                        <td>$<?php echo $data[4]?></td>
                    </tr>
            
                </tbody>
                <?php
              }?>
            </table>
        </div>
    </div>

</body>
</html>
<?php }?>
