<?php

session_start();
include "pdo.php";

if (isset($_POST['addreview']) && !empty($_POST['comment'])) {
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
    return false;
}


?>
<?php

if (isset($_POST['placeorder'])) {
    if (isset($_SESSION['name'])) {
        if (!empty($_POST['promo']) && $_POST['promo'] == 'TREAT') {
            $_SESSION['done'] = "A Free Drink and Cookie are successfully added to your order!";
            $_SESSION['promo'] = true;
        } else if (empty($_POST['promo']) || $_POST['promo'] != 'TREAT') {
            $_SESSION['done'] = "Order Placed";
            $_SESSION['promo'] = false;
        }
        $trackingcode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $sql = $pdo->prepare("INSERT INTO food_order (ordertotal,username,OrderTrackingID,OrderStatus,OrderDesc,Promocode) VALUES (:did,:dn,:oid,:os,:od,:promo)");
        $sql->execute(
            array(

                ':did' => $_SESSION['total'],
                ':dn' => $_SESSION['name'],
                ':oid' => $trackingcode,
                ':os' => "Pending",
                ':od' => $_SESSION['order'],
                ':promo' => $_SESSION['promo']


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
    <script src="file.js"></script>

</head>

<body>

    <div class="bk">
    <div id="navbar"></div>
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
            <?php
            $statment = $pdo->prepare('SELECT DishName FROM dish');
            $statment->execute();
            $rowy = $statment->fetchAll();

            ?>
            <form method="post">
                <br>
                <label style="margin-left: 10px;">Please Select Dish Name to be added to cart</label>

                <select class="search" id="dishn" name="dishsearch">
                    <option>--Dishes Available--</option>
                    <?php
                    foreach ($rowy as $output) { ?>
                        <option><?php echo $output['DishName'] ?></option>
                    <?php } ?>
                </select>
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

                        while ($rowd = $statment->fetch(PDO::FETCH_ASSOC)) {


                            if (!$rowd) {
                                echo ("No rows found");
                                echo ("\n");
                            }
                            $price = $_POST['quantity'];
                            $totalprice = $rowd['dishPrice'] * $price;
                            $order = $price . " " . $rowd['DishName'];
                            $_SESSION['order'] = $order;


                            echo "<div id='dish1'>";

                            echo '<img src="data:image/jpeg;base64,' . base64_encode($rowd['dishimage']) . '" height="200" width="200"/>';

                            echo '<p><b>';
                            echo (htmlentities($price) . '  ' . htmlentities($rowd['DishName']));
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
        
            <div class="footercontent"></div>
      
    </div>

</body>
<script>
    scroll()
</script>
</html>