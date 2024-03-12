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
        .cart-table button {
            margin-left: 20px;
            padding: 8px 12px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;

        }

        .cart-table button:hover {
            background-color: #45a049;
        }

        .cart-table td button[name="deleteCart"] {
            background-color: #f44336;
        }

        .cart-table button[name="accept-oreder"] {
            background-color: #f44336;
        }

        .cart-table td button[name="deleteCart"]:hover {
            background-color: #d32f2f;
        }

        .cart-table button[name="deleteallCart"] {
            background-color: #f44336;
        }

        .cart-table button[name="deleteallCart"]:hover {
            background-color: #d32f2f;

        }

        #totalOFcart {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-left: 1020px;
        }
    </style>

    <?php include('include/nav.php'); ?>

    <?php include('include/errors.php'); ?>
    <?php include('include/success.php'); ?>

    <table class="cart-table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $carts = getCart($con); ?>
            <?php foreach ($carts as $cartItem) :   ?>
                <tr>
                    <form action="server.php" method="post">
                        <td><img src="uploads/<?php echo $cartItem['product_img']; ?>" alt="Product Image"></td>
                        <td><?php echo $cartItem['product_name']; ?></td>
                        <td>$<?php echo $cartItem['product_price']; ?></td>
                        <form action="server.php" method="post">
                            <td>
                                <input id="quantityInput<?php echo $cartItem['id']; ?>" style="display: none;" type="number" name="update-value" value="<?php echo $cartItem['quantity']; ?>">
                                <span id="quantityView<?php echo $cartItem['id']; ?>"><?php echo $cartItem['quantity']; ?></span>
                            </td>

                            <td>$<?php echo $cartItem['total_price']; ?></td>
                            <?php
                            if ($cartItem['total_price']) {
                                $total = $total + $cartItem['total_price'];
                            }

                            ?>
                            <td>

                                <input type="hidden" name="cartId" value="<?php echo $cartItem['id']; ?>">
                                <input type="hidden" name="p-price" value="<?php echo $cartItem['product_price']; ?>">
                                <button id="view<?php echo $cartItem['id']; ?>" type="button" onclick="editfun(<?php echo $cartItem['id']; ?>);">Update</button>
                                <button style="display: none;" id="edit<?php echo $cartItem['id']; ?>" name="updateCart" type="submit" onclick="savefun(<?php echo $cartItem['id']; ?>);">Save</button>
                                <button type="submit" name="deleteCart">Delete</button>

                            </td>
                        </form>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <div class="cart-table">
        <form action="server.php" method="post">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <span id="totalOFcart"><?php echo $total; ?></span>
            <button type="submit" name="deleteallCart">Delete ALL</button>
            <button type="submit" name="accept-order" onclick="displayOrder();">Accept Order</button>

        </form>
    </div>
    <div id="viewOrder">
        <h1>Order Confirmation</h1>

        <!-- Display order details here -->
        <div>
            <?php $order = getOrder($con); ?>
            <p><strong>Confirmation date:</strong> <?php echo $order['confirmation_date'] ?? 'null'; ?></p>
            <p><strong>Total Price:</strong><?php echo '$' . ($order['total_price'] ?? 'null'); ?></p>
            <p><strong>Status:</strong> <?php echo $order['status'] ?? 'null'; ?></p>
            <!-- Add more details as needed -->
        </div>
    </div>
    <script>
        function editfun(cartItem) {
            document.getElementById("quantityView" + cartItem).style.display = "none";
            document.getElementById("quantityInput" + cartItem).style.display = "inline-block";
            document.getElementById("view" + cartItem).style.display = "none";
            document.getElementById("edit" + cartItem).style.display = "inline-block";
        }

        function savefun(cartItem) {
            document.getElementById("quantityInput" + cartItem).style.display = "none";
            document.getElementById("quantityView" + cartItem).style.display = "inline-block";
            document.getElementById("edit" + cartItem).style.display = "none";
            document.getElementById("view" + cartItem).style.display = "inline-block";
        }

        // function displayOrder() {
        //     document.getElementById("viewOrder").style.display = "block";
        // }
    </script>

</body>

</html>