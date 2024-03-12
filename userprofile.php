<?php

include("server.php");
if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
    <title>Online Shop - Profile</title>
</head>

<body>

    <?php include('include/nav.php'); ?>

    <div>
        <?php $userdata = getData($con, $_SESSION['username']); ?>
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->

                <form class="file-upload" method="post" action="server.php">
                    <div class="row mb-5 gx-5">
                        <?php include('include/errors.php'); ?>
                        <?php include('include/success.php'); ?>
                        <!-- Contact detail -->

                        <div class="mb-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">



                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input name="firstname" type="text" class="form-control" value="<?php echo $userdata['firstname']; ?>">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input name="lastname" type="text" class="form-control" value="<?php echo $userdata['lastname']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">User Name *</label>
                                        <input name="username" type="text" class="form-control" value="<?php echo $userdata['username']; ?>">
                                    </div>

                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile number *</label>
                                        <input name="phone" type="text" class="form-control" value="<?php echo $userdata['phone']; ?>">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input name="email" type="email" class="form-control" value="<?php echo $userdata['email']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Address *</label>
                                        <input name="address" type="text" class="form-control" value="<?php echo $userdata['address']; ?>">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- change password -->

                    <div class="mb-4">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="my-4">Change Password</h4>
                                <!-- Old password -->
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                    <input name="old-password" type="password" class="form-control">
                                </div>
                                <!-- New password -->
                                <div class="col-md-6">
                                    <label for="exampleInputPassword2" class="form-label">New password *</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <!-- Confirm password -->
                                <div class="col-md-12">
                                    <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                                    <input name="con-password" type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button name="delete-profile" type="submit" class="btn btn-danger btn-lg">Delete profile</button>
                        <button name="update-profile" type="submit" class="btn btn-primary btn-lg">Update profile</button>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>

</body>

</html>