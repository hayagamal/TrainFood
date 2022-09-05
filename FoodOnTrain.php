<?php

session_start();
include "pdo.php";

if (isset($_POST['addreview'])) {
    if (isset($_SESSION['name'])) {
        $sql = $pdo->prepare("INSERT INTO review (reviewcomment, username)
VALUES (:rc,:un)");
        $sql->execute(
            array(
                ':rc' => $_POST['comment'],
                ':un' => $_SESSION['name']


            )
        );
    } else {
        $_SESSION['log'] = "you can not insert a review without having an account!";
    }
}
?>
<?php

if (isset($_POST['placeorder'])) {
    if (isset($_SESSION['name'])) {
        if (!empty($_POST['promo']) && $_POST['promo'] == 'TREAT') {
            $_SESSION['done'] = "A Free Drink and Cookie are successfully added to your order!";
        } else if (empty($_POST['promo']) || $_POST['promo'] != 'TREAT') {
            $_SESSION['done'] = "Order Placed";
        }

        $sql = $pdo->prepare("INSERT INTO food_order (ordertotal,username) VALUES (:did,:dn)");
        $sql->execute(
            array(

                ':did' => $_SESSION['total'],
                ':dn' => $_SESSION['name']
            )

        );
    } else if (isset($_SESSION['name']) == false) {
        $_SESSION['notdone'] = " You cannot proceed an order without logging in.";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">

    <title>Food On Train - TrainFood</title>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        //nav bar sticky

        function myFunction() {



            var navbar = document.getElementById("navbar");



            var sticky = navbar.offsetTop;



            if (window.pageYOffset >= sticky) {



                navbar.classList.add("sticky")



            } else {



                navbar.classList.remove("sticky");



            }



        }



        function scroll() {



            window.onscroll = function() {

                myFunction()

            };



        }



        //Haya Gamal 182081



        $(document).ready(function() {


            $("#cart").click(function() {
                window.location.href = '#title4';
            });



            $(".title3").click(function() {



                $("#context").slideToggle("slow");

            });





            $(".title2").click(function() {



                $("#viewall").slideToggle("slow");





            });



            $(".title1").click(function() {



                $(".best").slideToggle("slow");







            });



        });


        function displayname() {
            var e6 = document.getElementById("divdishname");
            e6.style.display = "block";

        }

        function displaydesc() {
            var e7 = document.getElementById("divdishdesc");
            e7.style.display = "block";

        }

        function displayprice() {
            var e8 = document.getElementById("divdishprice");
            e8.style.display = "block";

        }



        function addToCart() {

            let productNumbers = localStorage.getItem('cartNumbers');

            productNumbers = parseInt(productNumbers);

            if (productNumbers) {

                localStorage.setItem('cartNumbers', productNumbers + 1);

                document.querySelector('.basket span').textContent = productNumbers + 1;



            } else {

                localStorage.setItem('cartNumbers', 1);

                document.querySelector('.basket span').textContent = 1;

            }

        }



        function cartNumbers() {

            let productNumber = localStorage.getItem('cartNumbers');

            if (productNumber) {

                document.querySelector('.basket span').textContent = productNumber;

            }

        }



        function getact() {
            var act = document.getElementById("promoe");
            act.value = act.value.toUpperCase();
            if (act.value == 'TREAT') {
                $('#promoe').css('color', 'green');
                $('#promoe').css('background-color', '#90ee90');
                $('#promoe').css('border-color', 'green');
            } else {
                $('#promoe').css('color', 'red');
                $('#promoe').css('background-color', '#ffcccb');
                $('#promoe').css('border-color', 'red');
            }


        }


        function showKids() {

            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");



            c.style.display = "block";

            x.style.display = "block";

            y.style.display = "none";

            z.style.display = "none";

            w.style.display = "none";

            document.getElementById("ki").style.border = "15px solid #111";

            document.getElementById("mea").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("bev").style.border = "none";





        }



        function showMealMenu() {



            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");

            c.style.display = "block";

            y.style.display = "block";

            x.style.display = "none";

            z.style.display = "none";

            w.style.display = "none";

            document.getElementById("mea").style.border = "15px solid #111";



            document.getElementById("bev").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("ki").style.border = "none";





        }



        function showBeverages() {

            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");



            c.style.display = "block";

            w.style.display = "block";

            x.style.display = "none";

            z.style.display = "none";

            y.style.display = "none";

            document.getElementById("bev").style.border = "15px solid #111";

            document.getElementById("mea").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("ki").style.border = "none";



        }



        function showSnacks() {



            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");

            c.style.display = "block";

            z.style.display = "block";

            x.style.display = "none";

            w.style.display = "none";

            y.style.display = "none";



            document.getElementById("sn").style.border = "15px solid #111";

            document.getElementById("ki").style.border = "none";

            document.getElementById("mea").style.border = "none";

            document.getElementById("bev").style.border = "none";





        }



        function Cancel(e) {

            e.style.display = 'none';

        }



        function copyToClipboard() {

            const str = document.getElementById('cop').innerText;

            const el = document.createElement('textarea');

            el.value = str;

            document.body.appendChild(el);

            el.select();

            document.execCommand('copy');

            document.body.removeChild(el);

            var tooltip = document.getElementById("myTooltip");

            tooltip.innerHTML = "Copied to clipboard.";

        }



        function tool(e) {
            if (e.onmouseover) {


                var tooltip = document.getElementById("myTooltip");
                tooltip.style.display = "block";
                tooltip.innerHTML = "Click on coupon to copy.";
                tooltip.style.marginLeft = "-530px";

            }
        }



        function nodisplay(e) {

            var tooltip = document.getElementById("myTooltip");
            tooltip.style.marginLeft = "-470px";

            tooltip.style.display = "none";

        }

        document.addEventListener('DOMContentLoaded', function() {

            var checkbox = document.querySelector('input[type="checkbox"]');



            checkbox.addEventListener('change', function() {

                if (checkbox.checked) {

                    var novegan = document.getElementsByClassName("notvegan");

                    for (var i = 0; i < novegan.length; i++) {

                        novegan[i].style.display = "none";

                    }



                } else {

                    var novegan = document.getElementsByClassName("notvegan");

                    for (var i = 0; i < novegan.length; i++) {

                        novegan[i].style.display = "block";

                    }



                }

            });

        });
    </script>

</head>

<body>

    <div class="bk">
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
        <div class="ad">
            <p>Enjoy your delicious fresh meal while train travelling with us. </p>
        </div>
        <div class="code">
            <p><span id="cancel" onclick="Cancel(this.parentNode.parentNode)">&times;</span>Use coupon: <span id="cop" onclick="copyToClipboard()" onmouseover="tool(this)" onmouseout="nodisplay(this)">TREAT</span> &amp; get up to a Free Drink and a Cookie on your food order. No Minimum Order Value. </p>
            <span class="tooltiptext" id="myTooltip"></span>

        </div>


        <div class="food">

            <div class="bkgd"><br><img class="photo" src="images/n.jpg" alt="Flowers in Chania"><br>
            </div>
            <div class="works">
                <br> <br>
                <h1>What is Food on Train?</h1>
                <br>
                <p>During train journeys passengers need healthy, tasty and hygienic food to satiate their hunger. TrainTicket offers a wide variety of delicious meals to order online through our website and is delivered to your seat in no time!.</p>
                <br> <br> <br>
                <h1>How It Works?</h1>
                <br>
                <img class="tips" src="images/Capture.PNG">
                <br>
                <p>Follow these steps for a delicious meal at Train<a>Ticket</a>.</p>
            </div>

        </div>
        <div class="safety">

            <div>
                <h1><b>Your Safety Matters!</b></h1>
                <p><b>For all our passengers' safety, Food hygiene is highly concerned among our staff to ensure orders are safe on every step till seat dilvery:
                    </b></p>
                <ul>
                    <li>Sanitized Kitchens and Cooking Equipment.</li>
                    <li>Staff and Waiters change gloves and Masks Daily.</li>
                    <li>Daily Temerature checks of staff.</li>
                    <li>Food Delivered to train seat with zero-human contact.</li>
                </ul>


            </div>
            <div><img src="images/image2.jpg"></div>
        </div>
        <h1 class="title1"><span>TOP </span>DISHES</h1>
        <div class="best">

            <div class="dishes">
                <div id="dish1"><img src="images/curry.jpg">

                    <p><b>Chicken Curry Meal</b></p>

                    <p>5,222 users ordered this.</p>


                </div>
                <div id="dish1"><img src="images/salmon.jpg">



                    <p> <b> Lemon Roasted Salmon</b></p>
                    <p>1,773 users ordered this.</p>


                </div>
                <div id="dish1"><img src="images/fresh.jpg">

                    <p><b>Fresh Juice</b></p>

                    <p>1,241 users ordered this.</p>


                </div>
            </div>
        </div>
        <h1 class="title2">FOOD <span>MENU</span></h1>

        <div id="viewall">
            <div class="cat">
                <br>

                <div id="mea"><a href="#viewall"><img onclick="showMealMenu()" src="images/meeals.png"></a> </div>
                <div id="ki"> <a href="#viewall"><img onclick="showKids()" src="images/kidsmeals.png"></a></div>
                <div id="sn"><a href="#viewall"><img onclick="showSnacks()" src="images/Snacks.png"></a></div>
                <div id="bev"><a href="#viewall"><img onclick="showBeverages()" src="images/Beverages.png"></a></div>


            </div>


            <div id="content">

                <div id="meals">
                    <br> <br>
                    <h1> Main Meals</h1>
                    <div class="choices">

                        <div>
                            <h3 style="color:white;">Show Vegan Dishes</h3>
                        </div>
                        <div><label class="switch">

                                <input type="checkbox">

                                <span class="slider round"></span>

                            </label>
                        </div>

                    </div>
                    <br> <br>
                    <div class="maindishes">
                        <?php
                        $statment = $pdo->query("SELECT DishName, dishPrice, dishDescription, dishimage, Vegan  FROM dish where dishCategory = 'Main Meals' ");

                        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {


                            if (!$row) {
                                echo ("No rows found");
                                echo ("\n");
                            }
                            if ($row['Vegan'] === "no") {
                                echo "<div id='dish1' class='notvegan'>";
                            } else if ($row['Vegan'] === "yes") {

                                echo "<div id='dish1'>";
                            }
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['dishimage']) . '" height="200" width="200"/>';

                            echo '<p><b>';
                            echo (htmlentities($row['DishName']));
                            echo '</b></p>';

                            echo '<p>';
                            echo (htmlentities($row['dishDescription']));
                            echo '</p>';
                            echo '<p>';
                            echo (htmlentities($row['dishPrice']) . '' . htmlentities(" LE"));
                            echo '</p>';

                            echo '</div>';
                        }
                        ?>

                    </div>
                    <br> <br> <br>

                </div>
                <div id="kids">

                    <br> <br>
                    <h1>Happy Meals <span>For Kids!</span></h1>
                    <br> <br>
                    <div class="kidsdishes">
                        <?php
                        $statment1 = $pdo->query("SELECT DishName, dishPrice, dishDescription, dishimage  FROM dish where dishCategory = 'kids meal' ");

                        while ($row = $statment1->fetch(PDO::FETCH_ASSOC)) {


                            if (!$row) {
                                echo ("No rows found");
                                echo ("\n");
                            }

                            echo "<div id='dish1'>";

                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['dishimage']) . '" height="200" width="200"/>';
                            echo '<p><b>';
                            echo (htmlentities($row['DishName']));
                            echo '</b></p>';

                            echo '<p>';
                            echo (htmlentities($row['dishDescription']));
                            echo '</p>';
                            echo '<p>';
                            echo (htmlentities($row['dishPrice']) . '' . htmlentities(" LE"));
                            echo '</p>';

                            echo '</div>';
                        }


                        ?>

                    </div>


                </div>
                <div id="snacks">
                    <br> <br>
                    <h1>Snacks</h1>
                    <br> <br>
                    <div class="snacksdishes">
                        <?php
                        $statment2 = $pdo->query("SELECT DishName, dishPrice, dishDescription, dishimage  FROM dish where dishCategory = 'snacks' ");

                        while ($row = $statment2->fetch(PDO::FETCH_ASSOC)) {


                            if (!$row) {
                                echo ("No rows found");
                                echo ("\n");
                            }

                            echo "<div id='dish1'>";
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['dishimage']) . '" height="200" width="200"/>';

                            echo '<p><b>';
                            echo (htmlentities($row['DishName']));
                            echo '</b></p>';

                            echo '<p>';
                            echo (htmlentities($row['dishDescription']));
                            echo '</p>';
                            echo '<p>';
                            echo (htmlentities($row['dishPrice']) . '' . htmlentities(" LE"));
                            echo '</p>';

                            echo '</div>';
                        }


                        ?>

                    </div>

                </div>
                <br><br>
                <div id="beverages">
                    <h1>Beverages</h1>
                    <br> <br>
                    <div class="bevdishes">
                        <?php
                        $statment3 = $pdo->query("SELECT DishName, dishPrice, dishDescription, dishimage  FROM dish where dishCategory = 'beverages' ");

                        while ($row = $statment3->fetch(PDO::FETCH_ASSOC)) {


                            if (!$row) {
                                echo ("No rows found");
                                echo ("\n");
                            }

                            echo "<div id='dish1'>";

                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['dishimage']) . '" height="200" width="200"/>';
                            echo '<p><b>';
                            echo (htmlentities($row['DishName']));
                            echo '</b></p>';

                            echo '<p>';
                            echo (htmlentities($row['dishDescription']));
                            echo '</p>';
                            echo '<p>';
                            echo (htmlentities($row['dishPrice']) . '' . htmlentities(" LE"));
                            echo '</p>';

                            echo '</div>';
                        }


                        ?>


                    </div>
                </div>

            </div>
        </div>
        <h1 class="title3">
            <p><span>USERS</span> REVIEWS </p>
        </h1>
        <div id="context">
            <div class="review">
                <?php
                $statment4 = $pdo->query("SELECT reviewcomment, username from review ");

                while ($row = $statment4->fetch(PDO::FETCH_ASSOC)) {


                    if (!$row) {
                        echo ("No rows found");
                        echo ("\n");
                    }

                    echo "<div class='review1'>";

                    echo '<p><b>';
                    echo (htmlentities($row['username']));
                    echo '</b></p>';
                    echo '<br>';
                    echo '<p>';
                    echo (htmlentities($row['reviewcomment']));
                    echo '</p>';

                    echo '</div>';
                }

                ?>
            </div>
            <form method="post">
                <input class="comment" name="comment" rows="2" cols="50" placeholder="Write your review here." value="">

                <input class="addbutton" id="rev" type="submit" value="Add Review" name="addreview">
                <?php

                if (isset($_SESSION['log'])) {
                    echo ('<p style="color: red; margin-left:30px;">' . htmlentities($_SESSION['log']) . "</p>\n");
                    unset($_SESSION['log']);
                }
                ?>
            </form>
        </div>




        <h1 id="title4">
            <p><span>SHOPPING</span> CART </p>
        </h1>
        <div id="dishbuy">
            <form method="post">
                <br>
                <label style="margin-left: 10px;">Please Enter Dish Name to be added to cart</label>
                <input class="search" id="dishn" name="dishsearch" rows="4" cols="50" value="">

                <label style="margin-left: 10px;">Enter Quantity</label>
                <input class="search" name="quantity" rows="4" cols="50" value="">

                <input type="submit" class="cartbutton" id="cart" name="addtocart" value="Add to Cart">

            </form>
            <div class="dishes">
                <?php
                if (isset($_POST['addtocart'])) {
                    if (!empty($_POST['dishsearch']) && !empty($_POST['quantity'])) {
                        $dname = $_POST['dishsearch'];
                        $dname = ucwords($dname);
                        $statment = $pdo->query("SELECT DishName, dishPrice, dishimage FROM dish where DishName = '$dname'");

                        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {


                            if (!$row) {
                                echo ("No rows found");
                                echo ("\n");
                            }
                            $price = $_POST['quantity'];
                            $totalprice = $row['dishPrice'] * $price;


                            echo "<div id='dish1'>";

                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['dishimage']) . '" height="200" width="200"/>';

                            echo '<p><b>';
                            echo (htmlentities($price) . '  ' . htmlentities($row['DishName']));
                            echo '</b></p>';


                            echo '<p>';
                            echo (htmlentities("Total: ") . '' . htmlentities($totalprice) . '' . htmlentities(" LE"));
                            echo '</p>';
                            echo '<br>';

                            echo '</div>';
                            $_SESSION['total'] = $totalprice;
                            echo ' <form method="post" class="book" >';
                            echo '<br> ';
                            echo '<label style="margin-left: 10px;">Enter Promocode: </label>';
                            echo '<input type="text" class="search" id="promoe" name="promo" rows="4" cols="50" onkeyup="getact()" >';




                            echo '<div><input class="addbutton" type="submit" value="Place Order" name="placeorder"></div>';
                        }
                    } else if (isset($_POST['addtocart']) && empty($_POST['dishsearch']) && empty($_POST['quantity'])) {

                        $_SESSION['notdone'] = "Please Make sure you filled all empty fields";
                    }
                }

                ?>


            </div>


            <?php

            if (isset($_SESSION["done"])) {

                echo ('<p style="color: green;">' . htmlentities($_SESSION['done']) . "</p>\n");
                unset($_SESSION['done']);
            }
            if (isset($_SESSION["notdone"])) {

                echo ('<p style="color: red;">' . htmlentities($_SESSION['notdone']) . "</p>\n");
                unset($_SESSION['notdone']);
            }
            ?>



        </div>




        <footer>

            <div class="footercontent">
                <div class="part1">
                    <h3>Train<span>Food</span>
                    </h3>
                    <p>welcome to train food ordering system</p>
                    <ul class="socialmedia">
                        <li><a href="http://www.fb.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="youtube.com"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="instagram.com"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="part2">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="includes/checkout.php">Book a Ticket</a></li>
                        <li><a href="FoodOnTrain.php">Food on Train</a></li>
                        <li><a href="seasonTickets.php">Season Tickets</a></li>
                    </ul>
                </div>
                <div class="part3">
                    <h4>About TrainFood</h4>
                    <ul>
                        <li>
                            <a href="aboutUs.php">About Us</a>
                        </li>

                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                <p>copyrights &copy; 2021 TrainFood. designed by <span>Haya Gamal</span></p>
            </div>

        </footer>
    </div>

</body>
<script>
    scroll()
</script>

</html>