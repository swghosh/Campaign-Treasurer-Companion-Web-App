<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');
// contains several functions to allow trading
include('../trader/tradingfunctions.php');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_GET['name']) == false || empty($_GET['name'])) {
    form_error();
}

// get current time
date_default_timezone_set('Asia/Kolkata');
$name = mysqli_real_escape_string($db, htmlspecialchars($_GET['name']));
$time = date('Y-m-d H:i:s');

// get price of item
$price = price($name);
if($price == false) {
    form_error();
}

die($time."\n".$price);
