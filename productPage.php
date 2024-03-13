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
    <title>Online Shop - Product</title>
</head>

<body>

    <style>
        /*style product*/
        .single-product {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .product-details {
            width: 600px;
            /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details img {
            width: 100%;
            height: 300px;
            margin: auto;
        }

        .product-details .name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-details .descripe {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 16px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-details button:hover {
            background-color: #0056b3;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <div class="single-product">
        <?php $product = getprodByID($con, $_GET['id']) ?>
        <?php foreach ($product as $product) : ?>
            <div class="product-details">
                <form action="server.php" method="post">
                    <img src="uploads/<?php echo $product['img']; ?>" alt="">
                    <div class="name"><?php echo $product['name']; ?></div>
                    <div class="descripe"><?php echo $product['descripe']; ?></div>
                    <div class="price">$<?php echo $product['price']; ?></div>
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                    <button type="submit" name="addToCart">Add to Cart</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html><?php
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
    <title>Online Shop - Product</title>
</head>

<body>

    <style>
        /*style product*/
        .single-product {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .product-details {
            width: 300px;
            /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-details .name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-details .descripe {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 16px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-details button:hover {
            background-color: #0056b3;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <div class="single-product">
        <?php $product = getprodByID($con, $_GET['id']) ?>
        <?php foreach ($product as $product) : ?>
            <div class="product-details">
                <form action="server.php" method="post">
                    <img src="uploads/<?php echo $product['img']; ?>" alt="">
                    <div class="name"><?php echo $product['name']; ?></div>
                    <div class="descripe"><?php echo $product['descripe']; ?></div>
                    <div class="price">$<?php echo $product['price']; ?></div>
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                    <button type="submit" name="addToCart">Add to Cart</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html><?php
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
    <title>Online Shop - Product</title>
</head>

<body>

    <style>
        /*style product*/
        .single-product {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .product-details {
            width: 300px;
            /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-details .name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-details .descripe {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 16px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-details button:hover {
            background-color: #0056b3;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <div class="single-product">
        <?php $product = getprodByID($con, $_GET['id']) ?>
        <?php foreach ($product as $product) : ?>
            <div class="product-details">
                <form action="server.php" method="post">
                    <img src="uploads/<?php echo $product['img']; ?>" alt="">
                    <div class="name"><?php echo $product['name']; ?></div>
                    <div class="descripe"><?php echo $product['descripe']; ?></div>
                    <div class="price">$<?php echo $product['price']; ?></div>
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                    <button type="submit" name="addToCart">Add to Cart</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html><?php
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
    <title>Online Shop - Product</title>
</head>

<body>

    <style>
        /*style product*/
        .single-product {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .product-details {
            width: 300px;
            /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-details .name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-details .descripe {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 16px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-details button:hover {
            background-color: #0056b3;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <div class="single-product">
        <?php $product = getprodByID($con, $_GET['id']) ?>
        <?php foreach ($product as $product) : ?>
            <div class="product-details">
                <form action="server.php" method="post">
                    <img src="uploads/<?php echo $product['img']; ?>" alt="">
                    <div class="name"><?php echo $product['name']; ?></div>
                    <div class="descripe"><?php echo $product['descripe']; ?></div>
                    <div class="price">$<?php echo $product['price']; ?></div>
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                    <button type="submit" name="addToCart">Add to Cart</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>