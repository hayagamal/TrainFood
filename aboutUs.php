<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <script src="includes/file.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>TrainTicket</title>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="navbar">
        <a class="logo">Train<span>Food</span></a>
        <a class="active" href="FoodOnTrain.php">Home</a>
        <a href="aboutUs.php">Track your Order</a>
        <a href="aboutUs.php">About Us</a>
        <a class="basket" href="#"><img src="images/cart.jpg"><span></span></a>
        <?php if (isset($_SESSION['name'])) : ?>
            <a class="login" href="logout.php">Logout</a>
        <?php else : ?>
            <a class="login" href="login.php">Login</a>
        <?php endif; ?>
    </div>



    <p style="color:#01C3A7; text-align: center; margin-top: 100px; font-weight:bold; font-size: 45px;">About Us</p>
    <div style="padding-bottom: 100px;">
        <div class="aboutUsBg" style="margin-left: 155px; margin-top: 40px;">
            <p style="font-weight:bold; font-size: 18px;">An Encompassing Insightful Experience- Give Power to Your Train Travel Decision-Making</p>
            <p style="font-weight:500; font-size: 16px; margin-top: 10px;">Travel is fun and when it comes to train travel, we go into the bypaths and un-trodden depths of wilderness and travel explorations to tell the world the glories of our journey!</p>

            <p style="font-weight:bold; font-size: 18px; margin-top: 20px;">What makes us drive through?</p>
            <p style="font-weight:500; font-size: 16px; margin-top: 10px;">Our Motto: Simplifying Train Travels
                With over 23.9 million passengers traveling and commuting daily by train, TrainTicket aims to serve its passengers with inclusive and comprehensive information that helps those making informed decisions, thus simplifying their train travels.TrainTicket.in is a premier portal for Egyptian Railways train travellers. We strive to be the fastest, mobile-friendly site that answers all your train travel questions in a few taps. A comprehensive hub of train travel information that dedicatedly works to give its users insightful information, all under one roof, to help them plan and take their train travel decisions in a better way..</p>

            <p style="font-weight:bold; font-size: 18px; margin-top: 20px;">How and Why We Started?</p>
            <p style="font-weight:500; font-size: 16px; margin-top: 10px;">The journey of TrainTicket started two years back when a handful of technology experts got together to remove the information black-box that shrouds information regarding Egyptian Railways. Egyptian Railways is the preferred transportation mode for a vast majority of Egyptian population, yet pertinent information is not readily available and the information rather available is scattered. It is then, TrainTicket stepped in to tackle such worries of its railway passengers. It has always aimed to be the capable train travel advisor helping passengers make informed decisions about their train travel.</p>
            <p style="font-weight:500; font-size: 16px; margin-top: 10px;">We, at TrainTicket do not just stop at presenting the dry numbers, but provide insights behind them. We offer analytical based information that makes us standout alone of the other sources of information. This is why our users’ base has been growing with every passing day.</p>

            <p style="font-weight:bold; font-size: 18px; margin-top: 20px;">Appreciation as a Travelers’ Delight</p>
            <p style="font-weight:500; font-size: 16px; margin-top: 10px;">TrainTicket has been awarded and recognized as one of the best travel and tourism apps of 2014. TrainTicket has won the mBillionth Africa Award and has also bagged the Best Utility Award in the Vodafone Appstar contest. In addition to this, TrainTicket has been continuously receiving vigorous critical appreciation throughout in various print and online media publishing.</p>
        </div>
    </div>


    <script>
        scroll();
    </script>
    <footer>

        <div class="footercontent">
            <div class="part1">
                <h3>Train<span>Ticket</span>
                </h3>
                <p>welcome to train reservation system</p>
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
                <h4>About TrainTicket</h4>
                <ul>
                    <li>
                        <a href="aboutUs.html">About Us</a>
                    </li>

                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>copyrights &copy; 2021 TrainTicket. designed by <span>group 1</span></p>
        </div>

    </footer>

</body>

</html>