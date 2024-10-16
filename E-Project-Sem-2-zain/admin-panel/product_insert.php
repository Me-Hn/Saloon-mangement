<?php
include('connection.php');
session_start();
include('aside.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="file"],
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: skyblue;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" id="image" name="productimg" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description:</label>
                <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="productCost">Product Cost:</label>
                <input type="number" id="productCost" name="productCost" step="0.01" required>
            </div>
            <button type="submit" name="btn">Add Product</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['btn'])) {
    $productimg = $_FILES['productimg']['name'];
    $productimgtmp = $_FILES['productimg']['tmp_name'];
    $destination = "product_img/" . $productimg;
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productCost = $_POST['productCost'];
    $extension = pathinfo($productimg, PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
        if (move_uploaded_file($productimgtmp, $destination)) {
            $quer = mysqli_query($con, "INSERT INTO `produ`(`image`, `p_name`, `p_discription`, `p_cost`) VALUES ('$productimg','$productName','$productDescription','$productCost')");
            echo "<script>alert ('product Added')</script>";
        }
    }
}


?>