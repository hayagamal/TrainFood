<?php
session_start();
include "pdo.php";


unset($_SESSION['name']);

header('Location: login.php');



?>