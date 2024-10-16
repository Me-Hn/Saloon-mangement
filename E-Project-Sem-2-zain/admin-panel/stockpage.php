<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Stock Management with Supplier Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-custom th {
            background-color: #28a745;
            color: white;
        }

        .table-custom tr:hover {
            background-color: #e9ecef;
        }

        .product-img {
            width: 80px;
            height: auto;
        }

        .badge-stock {
            padding: 0.5em;
        }

        .badge-instock {
            background-color: #28a745;
        }

        .badge-lowstock {
            background-color: #ffc107;
        }

        .badge-outofstock {
            background-color: #dc3545;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 14px;
            }

            .product-img {
                width: 50px;
            }
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h2 class="text-center mb-4">Product Stock Management</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-custom text-center align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Stock Level</th>
                        <th>Stock Status</th>
                        <th>Restock</th>
                        <th>Cost</th>
                        <th>Supplier Name</th>
                        <th>Supplier Contact</th>
                        <th>Lead Time (Days)</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://via.placeholder.com/80" alt="Product 1" class="product-img"></td>
                        <td>Product 1</td>
                        <td>SKU001</td>
                        <td>25</td>
                        <td><span class="badge badge-stock badge-instock">In Stock</span></td>
                        <td><button class="btn btn-primary btn-sm">Restock</button></td>
                        <td>$49.99</td>
                        <td>Supplier A</td>
                        <td>supplierA@example.com</td>
                        <td>7</td>
                        <td>2024-09-15</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/80" alt="Product 2" class="product-img"></td>
                        <td>Product 2</td>
                        <td>SKU002</td>
                        <td>5</td>
                        <td><span class="badge badge-stock badge-lowstock">Low Stock</span></td>
                        <td><button class="btn btn-primary btn-sm">Restock</button></td>
                        <td>$59.99</td>
                        <td>Supplier B</td>
                        <td>supplierB@example.com</td>
                        <td>10</td>
                        <td>2024-09-14</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/80" alt="Product 3" class="product-img"></td>
                        <td>Product 3</td>
                        <td>SKU003</td>
                        <td>0</td>
                        <td><span class="badge badge-stock badge-outofstock">Out of Stock</span></td>
                        <td><button class="btn btn-primary btn-sm">Restock</button></td>
                        <td>$99.99</td>
                        <td>Supplier C</td>
                        <td>supplierC@example.com</td>
                        <td>14</td>
                        <td>2024-09-13</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/80" alt="Product 4" class="product-img"></td>
                        <td>Product 4</td>
                        <td>SKU004</td>
                        <td>100</td>
                        <td><span class="badge badge-stock badge-instock">In Stock</span></td>
                        <td><button class="btn btn-primary btn-sm">Restock</button></td>
                        <td>$79.99</td>
                        <td>Supplier D</td>
                        <td>supplierD@example.com</td>
                        <td>5</td>
                        <td>2024-09-15</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
