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
if(isset($_POST['user']) == false || empty($_POST['user']) || isset($_POST['value']) == false || empty($_POST['value'])) {
    form_error();
}

$username = mysqli_real_escape_string($db, htmlspecialchars($_POST['user']));
$value = mysqli_real_escape_string($db, htmlspecialchars($_POST['value']));

// make fund grant
if(grant_funds($username, $value) == false) {
    form_error();
}

die('Successfully processed the request.');