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
    <title>Online Shop - Cart</title>
</head>

<body>


    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <div class="view-product">
        <?php $products = getProd($con); ?>
        <?php foreach ($products as $product) : ?>
            <div class="product-card">
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