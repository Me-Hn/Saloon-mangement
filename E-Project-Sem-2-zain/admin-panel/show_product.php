<?php
include('aside.php');
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
                        <td><img src="https://via.placeholder.com/100" alt="Product 1" class="product-img"></td>
                        <td>Product 1</td>
                        <td>A high-quality product with excellent features.</td>
                        <td>$49.99</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="Product 2" class="product-img"></td>
                        <td>Product 2</td>
                        <td>Durable and reliable, perfect for everyday use.</td>
                        <td>$59.99</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="Product 3" class="product-img"></td>
                        <td>Product 3</td>
                        <td>Elegant design with premium materials.</td>
                        <td>$99.99</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="Product 4" class="product-img"></td>
                        <td>Product 4</td>
                        <td>Highly rated and loved by customers worldwide.</td>
                        <td>$79.99</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>