<?php
session_start();
include "pdo.php";

//ADD DISH
if (isset($_POST['add'])) {



  if (
    !empty($_POST['did']) &&
    !empty($_POST['dname']) && !empty($_POST['cname']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['vegan'])
  ) {
    if (is_numeric($_POST['price']) === true  && ($_POST['cname'] === "Main Meals" || $_POST['cname'] === "kids meal" || $_POST['cname'] === "beverages" || $_POST['cname'] === "snacks") && ($_POST['vegan'] === "no" || $_POST['vegan'] === "yes")) {



      $sql = $pdo->prepare("INSERT INTO dish (dishID, DishName, dishCategory, dishPrice, dishDescription ,Vegan, dishimage)
VALUES ( :did,:dn,:dc,:dp,:dd,:dv,:di)");
      $sql->execute(
        array(
          ':did' => $_POST['did'],
          ':dn' => $_POST['dname'],
          ':dc' => $_POST['cname'],
          ':dp' => $_POST['price'],
          ':di' => $_POST['img'],
          ':dd' => $_POST['description'],
          ':dv' => $_POST['vegan']


        )
      );

      $_SESSION['success1'] = "Dish is added successfully.";
    } else if (is_numeric($_POST['price']) === false) {
      $_SESSION['error1'] = "Price must be of a numerical value";
    } else if (!($_POST['cname'] === "Main Meals" && $_POST['vegan'] === "kids meal" || $_POST['vegan'] === "beverages" || $_POST['vegan'] === "snacks")) {
      $_SESSION['error1'] = "inserted category is not found!";
    }
  } else {
    $_SESSION['error1'] = "Please Insert empty feilds";
  }
}


//DELETE DISH
if (isset($_POST['delete'])) {
  if (!empty($_POST['deletedish'])) {
    $sql = "DELETE FROM dish WHERE dishID= :dishdelete";
    $stat = $pdo->prepare($sql);
    $stat->execute(array(':dishdelete' => $_POST['deletedish']));



    $_SESSION["success2"] = "Dish Deleted";
  } else if (empty($_POST['deletedish'])) {
    $_SESSION['error2'] = "Please Insert dish id";
  } else {
    $_SESSION['error2'] = "dish of id inserted is not found";
  }
}
//EDIT DISH

if (isset($_POST['editdesc'])) {
  if (!empty($_POST['editdish']) && !empty($_POST['descriptionedit'])) {
    $sqlm = 'UPDATE dish SET dishDescription=:dd WHERE dishID=:id';
    $stmt = $pdo->prepare($sqlm);
    $stmt->execute(array(
      ':dd' => $_POST["descriptionedit"],
      ':id' => $_POST['editdish']
    ));
    $_SESSION["success3"] = "Record Updated";
  } else if (empty($_POST['editdish'])) {
    $_SESSION["error3"] = "Please enter dish id to be edited";
  } else {
    $_SESSION["error3"] = "Please insert data in empty fields";
  }
}



if (isset($_POST['editname'])) {
  if (!empty($_POST['editdish']) && !empty($_POST['dnameedit'])) {
    $sqlm = 'UPDATE dish SET DishName=:dd WHERE dishID=:id';
    $stmt = $pdo->prepare($sqlm);
    $stmt->execute(array(
      ':dd' => $_POST["dnameedit"],
      ':id' => $_POST['editdish']
    ));
    $_SESSION["success3"] = "Record Updated";
  } else if (empty($_POST['editdish'])) {
    $_SESSION["error3"] = "Please enter dish id to be edited";
  } else {
    $_SESSION["error3"] = "Please insert data in empty fields";
  }
}



if (isset($_POST['editprice'])) {
  if (!empty($_POST['editdish']) && !empty($_POST['priceedit'])) {
    $sqlm = 'UPDATE dish SET dishPrice=:dd WHERE dishID=:id';
    $stmt = $pdo->prepare($sqlm);
    $stmt->execute(array(
      ':dd' => $_POST["priceedit"],
      ':id' => $_POST['editdish']
    ));
    $_SESSION["success3"] = "Record Updated";
  } else if (empty($_POST['editdish'])) {
    $_SESSION["error3"] = "Please enter dish id to be edited";
  } else {
    $_SESSION["error3"] = "Please insert data in empty fields";
  }
}
?>

<html lang="en">

<body style="background-color:#F0F0F0;">

  <head>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="includes/file.js"></script>
  </head>
  <div id="navbar">
    <a class="logo">Train<span>Ticket</span></a>
    <a href="Admin-home.php">Add Train Lines</a>
    <a href="schedule.php">Set Schedules</a>
    <a href="adminSeasonTickets.php">Season Tickets</a>
    <a href="admin-manage-dishes.php">Manage Dishes</a>
    <?php if (isset($_SESSION['name'])) : ?>
      <a class="login" href="logout.php">Logout</a>
    <?php else : ?>
      <a class="login" href="login.php">Login</a>
    <?php endif; ?>
  </div>

  <h1 style="text-align: center; color:#01C3A7; margin: 10px 5px;">Manage Dishes</h1>

  <div id="adminadd">


    <div class="add-dishes">
      <h2>Add Dishes</h2>
      <br>
      <form method="post">
        <label for="did">Dish ID:</label><br>
        <input type="text" id="dname" name="did" value="<?php echo isset($_POST['did']) ? $_POST['did'] : '' ?>">
        <br>
        <label for="dname">Dish Name:</label><br>
        <input type="text" id="dname" name="dname" value="<?php echo isset($_POST['dname']) ? $_POST['dname'] : '' ?>">

        <br>
        <label for="cname">Category name:</label><br>
        <input type="text" id="cname" name="cname" value="<?php echo isset($_POST['cname']) ? $_POST['cname'] : '' ?>">
        <br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo isset($_POST['description']) ? $_POST['description'] : '' ?>">
        <br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"><br>
        <label for="vegan">Vegan?</label><br>
        <input type="text" name="vegan" value="<?php echo isset($_POST['vegan']) ? $_POST['vegan'] : '' ?>">
        <input name="img" type="file" id="actual-btn" accept=".png,.gif,.jpg,.webp" value="<?php echo isset($_POST['img']) ? $_POST['img'] : '' ?>" />

        <!--        <input name="img" type="file" id="actual-btn" hidden/>-->

        <br>



        <input class="addbutton" type="submit" value="Add Dish" name="add">
        <?php

        if (isset($_SESSION['success1'])) {
          echo ('<p style="color: green;">' . htmlentities($_SESSION['success1']) . "</p>\n");
          unset($_SESSION['success1']);
        }

        if (isset($_SESSION['error1'])) {
          echo ('<p style="color: red;">' . htmlentities($_SESSION['error1']) . "</p>\n");
          unset($_SESSION['error1']);
        }
        ?>
      </form>

    </div>

    <div class="delete-dishes">

      <h2>Delete Dishes</h2>
      <br>

      <form method="post">
        <label for="did">Insert Dish ID to be deleted:</label><br>
        <input type="text" id="dname" name="deletedish" value="">
        <br>




        <input class="addbutton" type="submit" value="Delete Dish" name="delete">
        <?php

        if (isset($_SESSION['success2'])) {
          echo ('<p style="color: green;">' . htmlentities($_SESSION['success2']) . "</p>\n");
          unset($_SESSION['success2']);
        }

        if (isset($_SESSION['error2'])) {
          echo ('<p style="color: red;">' . htmlentities($_SESSION['error2']) . "</p>\n");
          unset($_SESSION['error2']);
        }
        ?>
      </form>

    </div>

    <div class="edit-dishes">

      <h2>Edit Dishes</h2>
      <br>

      <form method="post">
        <label for="did">Insert Dish ID to edited:</label><br>
        <input type="text" id="dname" name="editdish" value="">
        <br><br>
        <a href="" onclick="displayname(); return false;">Edit Dish Name</a> <br>
        <div id="divdishname">
          <br>
          <label for="dname">Dish Name:</label><br>
          <input type="text" id="dname" name="dnameedit" value="">
          <br> <input class="addbutton" type="submit" value="Edit Dish Name" name="editname">
        </div>


        <br>
        <a href="" onclick="displaydesc(); return false;">Edit Dish Description</a> <br>
        <div id="divdishdesc">
          <br>
          <label for="description">Description:</label><br>
          <input type="text" id="description" name="descriptionedit" value="">
          <br>
          <input class="addbutton" type="submit" value="Edit Description" name="editdesc">
        </div>
        <br>
        <a href="" onclick="displayprice(); return false;">Edit Dish Price</a>
        <div id="divdishprice">
          <br>
          <label for="price">Price:</label><br>
          <input type="text" id="price" name="priceedit" value="">
          <br>
          <input class="addbutton" type="submit" value="Edit Dish Price" name="editprice">
        </div>

        <!--        <input name="img" type="file" id="actual-btn" hidden/>-->

        <br>




        <?php

        if (isset($_SESSION['success3'])) {
          echo ('<p style="color: green;">' . htmlentities($_SESSION['success3']) . "</p>\n");
          unset($_SESSION['success3']);
        }

        if (isset($_SESSION['error3'])) {
          echo ('<p style="color: red;">' . htmlentities($_SESSION['error3']) . "</p>\n");
          unset($_SESSION['error3']);
        }
        ?>
      </form>

    </div>


  </div>


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
        <h4>About TrainFood</h4>
        <ul>


          <li><a href="aboutUs.php">About Us</a></li>

        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <p>copyrights &copy; 2021 TrainFood. designed by <span>Haya Gamal</span></p>
    </div>

  </footer>
</body>

</html>