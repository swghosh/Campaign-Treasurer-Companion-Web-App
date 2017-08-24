<?php
header('Content-Type: text/plain');

include('../db.php');
include('../trader/tradingfunctions.php');

function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['id']) == false || empty($_POST['id'])) {
    form_error();
}

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));

if(reverse_transaction($id) == false) {
    form_error();
}

die('Successfully processed the request.');