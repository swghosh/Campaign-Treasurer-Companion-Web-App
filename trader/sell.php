<?php
// will get username of current user
include('authorisation.php');

// contains several functions to allow trading
include('tradingfunctions.php');

// in case of error with form data
function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['item']) == false || empty($_POST['item']) || isset($_POST['quantity']) == false || empty($_POST['quantity'])) {
    form_error();
}

$item = mysqli_real_escape_string($db, htmlspecialchars($_POST['item']));
$quantity = mysqli_real_escape_string($db, htmlspecialchars($_POST['quantity']));

// get list of purchased items and quantities
$purchased = purchased($username);
// in case sell not possible due to inadequate quantity
if($purchased[$item] < $quantity) {
    form_error();
}

// make a sell transaction
if(transact_sell($username, $item, $quantity)) {
    die(header('Location: index.php?success'));
}

die(header('Location: index.php?unsuccess'));