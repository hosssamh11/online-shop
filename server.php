<?php
session_start();
require('include/dbconnect.php');
$fname = "";
$lname = "";
$username = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$con_password = "";
$total = 0;
$errors = array();
$success = array();



//Register
if (isset($_POST['register'])) {
    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $con_password = mysqli_real_escape_string($con, $_POST['confirm-password']);
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    if (empty($username)) {
        $errors[] = "Username is required";
    } else {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result)) {
            $errors[] = "Username is exist";
        }
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result)) {
            $errors[] = "Email is exist";
        }
    }
    if (empty($phone)) {
        $errors[] = "Phone is required";
    } else {
        $phone = "0" . ltrim($phone, '0');
        $query = "SELECT * FROM users WHERE phone='$phone'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result)) {
            $errors[] = "Phone is exist";
        }
    }
    if (empty($address)) {
        $errors[] = "Address is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($password != $con_password) {
        $errors[] = "Passwords must match";
    }
    if (count($errors) == 0) {
        $phone = "0" . ltrim($phone, '0');
        $password = md5($password . "hossamhussein");
        $query = "INSERT INTO users (username,email,firstname,lastname,password,address,phone) VALUES ('$username','$email','$fname','$lname','$password','$address','$phone')";
        if (mysqli_query($con, $query)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "User registered successfully!";
            header('location: index.php');
        } else {
            $errors[] = "ERROR Rgister" . mysqli_error($con);
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}

//Login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (count($errors) == 0) {
        $password = (md5($password . "hossamhussein"));
        $query = "SELECT * FROM users WHERE username='$username' && password='$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result)) {
            //login success
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "User login successfully!";
            header('location: index.php');
        } else {
            $errors[] = "Invalid username or password. Please try again.";
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}
//Get data user
function getData($con, $username)
{
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $userdata = mysqli_fetch_assoc($result);

        // Free the result set
        mysqli_free_result($result);

        return $userdata;
    }
}


//Delete account
if (isset($_POST['delete-profile'])) {
    $query = "DELETE FROM users WHERE username='" . $_SESSION['username'] . "'";
    mysqli_query($con, $query);
    if (mysqli_query($con, $query)) {
        session_destroy();
        header('location: index.php');
    }
}
//Update-Data
if (isset($_POST['update-profile'])) {
    $userdata = getData($con, $_SESSION['username']);
    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $oldpass = mysqli_real_escape_string($con, $_POST['old-password']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $con_password = mysqli_real_escape_string($con, $_POST['con-password']);
    $phone = "0" . ltrim($phone, '0');
    // var_dump($userdata['username'], $userdata['email'], $userdata['phone']);
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    if ($username !== $userdata['username']) {
        // Perform the check only if the username is different
        if (empty($username)) {
            $errors[] = "Username is required";
        } else {
            $query = "SELECT * FROM users WHERE username='$username' ";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Username is exist";
            }
        }
    }
    if ($email !== $userdata['email']) {
        // Perform the check only if the username is different
        if (empty($email)) {
            $errors[] = "Email is required";
        } else {
            $query = "SELECT * FROM users WHERE email='$email' ";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Email is exist";
            }
        }
    }

    if ($phone !== $userdata['phone']) {
        // Perform the check only if the username is different
        if (empty($phone)) {
            $errors[] = "Phone is required";
        } else {
            $query = "SELECT * FROM users WHERE phone='$phone' ";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Phone is exist";
            }
        }
    }
    if (empty($address)) {
        $errors[] = "Address is required";
    }

    if (count($errors) == 0) {
        // Perform the database update

        $query = "UPDATE users SET 
                    username='$username',
                    email='$email',
                    firstname='$fname', 
                    lastname='$lname', 
                    phone='$phone', 
                    address='$address' 
                    WHERE username = '" . $_SESSION['username'] . "'";

        if (mysqli_query($con, $query)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "User login successfully!";
        }

        // Optionally, update password if provided
        if (!empty($password) && !empty($oldpass) && !empty($con_password)) {
            $oldpass = md5($oldpass . "hossamhussein");
            $query = "SELECT * FROM users WHERE username='$username' AND password='$oldpass'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                if ($password == $con_password) {
                    $hashed_password = md5($password . "hossamhussein");
                    $update_password_query = "UPDATE users SET password='$hashed_password' WHERE username='" . $_SESSION['username'] . "'";
                    mysqli_query($con, $update_password_query);
                    $_SESSION['success'] = "Password updated successfully!";
                } else {
                    $errors[] = "Passwords must match";
                }
            } else {
                $_SESSION['errors'] = "Invalid old password";
            }
        }
    }
    header('location: userprofile.php');
    $_SESSION['errors'] = $errors;
}

//Logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: ' . $_SERVER['PHP_SELF']);
}



//----------------------------Products-----------------------//
//Get Products
function getProd($con)
{
    $query = "SELECT * FROM product";
    $result = mysqli_query($con, $query);
    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $products;
    }
}


//Add to card
if (isset($_POST['addToCart'])) {
    $userdata = getData($con, $_SESSION['username']);
    $p_id = mysqli_real_escape_string($con, $_POST['productId']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $price = mysqli_real_escape_string($con, $_POST['productPrice']);
    $quantity = 1;

    // Check if the product already exists in the cart
    $query_check = "SELECT * FROM cart WHERE product_id='$p_id' AND user_id='$user_id'";
    $result = mysqli_query($con, $query_check);

    if (mysqli_num_rows($result) > 0) {

        $query = "UPDATE cart SET quantity = quantity + 1, total_price = (total_price+'$price') WHERE product_id='$p_id' AND user_id='$user_id'";
    } else {

        $query = "INSERT INTO cart (product_id, user_id, quantity, total_price) VALUES ('$p_id', '$user_id', $quantity,$price)";
    }

    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Product added to the cart successfully!";
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
function getprodByID($con, $p_id)
{
    $query = "SELECT * FROM product WHERE id =$p_id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $product;
    }
}
//view product
if (isset($_POST['viewProduct'])) {
    $p_id = mysqli_real_escape_string($con, $_POST['productId']);
    if ($p_id) {
        // If product exists, redirect to product page
        header('location: productPage.php?id=' . $p_id); // Pass product ID to product page
        exit; // Terminate the script to prevent further execution
    } else {
        // Handle case where product does not exist
        echo "Product not found!";
    }
}
//Get Products from cart
function getCart($con)
{
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $query = "SELECT cart.*, product.name AS product_name,product.img AS product_img, product.price AS product_price FROM cart JOIN product ON cart.product_id = product.id WHERE cart.user_id = '$user_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $carts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $carts;
    }
}


//Delete product from cart
if (isset($_POST['deleteCart'])) {
    $p_id = mysqli_real_escape_string($con, $_POST['cartId']);
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $query = "DELETE FROM cart WHERE id='$p_id'";
    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Product deleted from the cart successfully!";
        header('location: cart.php');
    }
}

//UPdate quantity in cart
if (isset($_POST['updateCart'])) {
    $c_id = mysqli_real_escape_string($con, $_POST['cartId']);
    $quantity = mysqli_real_escape_string($con, $_POST['update-value']);
    $price = mysqli_real_escape_string($con, $_POST['p-price']);
    // var_dump($quantity);
    $query = "UPDATE cart SET quantity = '$quantity', total_price = '$price' * '$quantity' WHERE id='$c_id'";

    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Quantity updated successfully!";
        header('location: cart.php');
    } else {
        $_SESSION['error'] = "Error updating quantity: " . mysqli_error($con);
        header('location: cart.php');
    }
}

//delete all from cart
if (isset($_POST['deleteallCart'])) {
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $query = "DELETE FROM cart WHERE user_id='$user_id'";
    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Product deleted from the cart successfully!";
        header('location: cart.php');
    }
}
//confirm cart
if (isset($_POST['accept-order'])) {
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $query = "INSERT INTO confirm_order (user_id,total_price) VALUES ('$user_id','$total')";
    mysqli_query($con, $query);
    $order_id = mysqli_insert_id($con);

    // Get the items in the cart
    $carts = getCart($con);

    // Loop through each item in the cart
    foreach ($carts as $cartItem) {
        $product_id = $cartItem['product_id'];
        $quantity = $cartItem['quantity'];

        // Insert the item into the order_items table with the current order ID
        $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
        mysqli_query($con, $query);
    }
    $query = "DELETE FROM cart WHERE user_id = '$user_id'";
    mysqli_query($con, $query);

    $_SESSION['success'] = "Cart confirmed successfully!";
    header('location: cart.php');
}
//Get Order data
function getOrder($con)
{
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $query = "SELECT * FROM confirm_order WHERE user_id='$user_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $order = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $order;
    }
}
//delete order
if (isset($_POST['deleteorder'])) {
    $o_id = mysqli_real_escape_string($con, $_POST['oredrID']);
    $userdata = getData($con, $_SESSION['username']);
    $user_id = mysqli_real_escape_string($con, $userdata['id']);
    $queryDelOrIt = "DELETE FROM order_items WHERE order_id= $o_id";
    mysqli_query($con, $queryDelOrIt);
    $query = "DELETE FROM confirm_order WHERE user_id='$user_id' AND id= $o_id";
    mysqli_query($con, $query);
    $_SESSION['success'] = "Order deleted successfully!";
    header('location: cart.php');
}
