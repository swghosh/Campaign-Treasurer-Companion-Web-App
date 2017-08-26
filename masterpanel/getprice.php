<?php
header('Content-Type: text/plain');

include('../db.php');
include('../trader/tradingfunctions.php');

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

$price = price($name);
if($price == false) {
    form_error();
}

die($time."\n".$price);
