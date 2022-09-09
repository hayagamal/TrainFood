<div id="navbar">
            <a class="logo">Train<span>Food</span></a>
            <a class="navi" class="active" href="FoodOnTrain.php">Home</a>
            <a class="navi" href="includes/checkout.php">Track your Order</a>
            <a class="navi" href="aboutUs.php">About Us</a>
            <a class="basket" href="#dishbuy"><img src="images/cart.jpg"><span></span></a>
            <?php if (isset($_SESSION['name'])) : ?>
                <a class="login" href="logout.php">Logout</a>
            <?php else : ?>
                <a class="login" href="login.php">Login</a>
                <a class="login" href="signup.php">Sign Up</a>
            <?php endif; ?>

        </div>
        