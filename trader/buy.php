<?php
// will get username of current user
include('authorisation.php');

// contains several functions to allow trading
include('tradingfunctions.php');
// get balance of user
$balance = balance($username);

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

$value = 0;
// in case buy not possible due to inadequate balance than transaction value
if($price = price($item)) {
    $value = $price * $quantity;
    if($balance < $value) {
        form_error();
    }
}

// make a buy transaction
if(transact_buy($username, $item, $quantity)) {
    die(header('Location: index.php?success'));
}

die(header('Location: index.php?unsuccess'));