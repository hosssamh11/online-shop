<?php
include("server.php");
if (empty($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stytest.css">
    <title>Online Shop - Register</title>
</head>

<body>
    <style>
        .adminPanal {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .adminPanal label {
            font-weight: bold;
        }

        .adminPanal input[type="text"],
        .adminPanal input[type="number"],
        .adminPanal textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .adminPanal textarea {
            height: 100px;
        }

        .adminPanal button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .adminPanal button:hover {
            background-color: #0056b3;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>
    <h2>Add Product</h2>
    <div class="adminPanal">
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="descripe">Description:</label><br>
            <textarea id="descripe" name="descripe" rows="4" cols="50"></textarea><br><br>

            <label for="img">Image:</label><br>
            <input type="file" id="img" name="img" accept="image/*" required><br><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br><br>

            <label for="quantity">Quantity:</label><br>
            <input type="number" id="quantity" name="quantity" required><br><br>

            <button type="submit" name="addProduct">Add Product</button>
        </form>
    </div>

</body>

</html>