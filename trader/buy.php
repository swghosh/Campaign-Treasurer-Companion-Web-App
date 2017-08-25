<?php
$username = $_SERVER['REMOTE_USER'];
$balance = balance($username);

include('tradingfunctions.php');

function form_error() {
    die(header('index.php?error'));
}

// form validation
if(isset($_POST['item']) == false || empty($_POST['item']) || isset($_POST['quantity']) == false || empty($_POST['quantity'])) {
    form_error();
}

$item = mysqli_real_escape_string($db, htmlspecialchars($_POST['item']));
$quantity = mysqli_real_escape_string($db, htmlspecialchars($_POST['quantity']));

$purchased = purchased($username);
$value = 0;
if($price = price($item)) {
    $value = $price * $quantity;
    if($balance < $value) {
        form_error();
    }
}

if(transact_sell($username, $item, $quantity)) {
    die(header('index.php?success'));
}

die(header('index.php?unsuccess'));