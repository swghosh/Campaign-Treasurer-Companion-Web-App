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
if(isset($_POST['id']) == false || empty($_POST['id'])) {
    form_error();
}

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));

// make the reversal of the transaction
if(reverse_transaction($id) == false) {
    form_error();
}

die('Successfully processed the request.');