<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Online Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Your-Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userprofile.php">User-Profile</a>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <a class="nav-link" href="login.php">
                            <?php if (isset($_SESSION['username'])) : ?>
                                <!-- User is logged in -->
                                <button class="nav-link" type="submit" name="logout">Logout</button>
                            <?php else : ?>
                                <!-- User is not logged in -->
                                <?php echo "Login"; ?>
                            <?php endif; ?>
                        </a>
                    </form>
                </li>
            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-sm-2" type="search" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>