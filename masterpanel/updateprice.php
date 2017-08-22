<?php
header('Content-Type: text/plain');

include('../db.php');

function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['item']) == false || empty($_POST['item']) || isset($_POST['current']) == false || empty($_POST['current'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['item']));
$price = mysqli_real_escape_string($db, htmlspecialchars($_POST['current']));

// try stocks
$sql_stocks = "SELECT name, pclose, ovalue FROM stocks WHERE name = '".$name."';";
$res = mysqli_query($db, $sql_stocks);
if($res == false) {
    form_error();
}
$ar = mysqli_fetch_array($res);
if($ar) {
    $pclose = $ar['pclose'];
    $ovalue = $ar['ovalue'];

    $current = $price;
    $difference = $pclose - $current;
    $percentage = ($difference / $pclose) * 100;

    date_default_timezone_set('Asia/Kolkata');
    $time = date('Y-m-d H:i:s');

    $sql = "UPDATE stocks SET current = $current, difference = $difference, percentage = $percentage WHERE name = '$name';";
    $sql2 = "INSERT INTO updates (name, current, difference, percentage, time) VALUES ('$name', $current, $difference, $percentage, '$time');";

    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

// try commodities
$sql_commodities = "SELECT name, ovalue FROM commodities WHERE name = '".$name."';";
$res = mysqli_query($db, $sql_commodities);
if($res == false) {
    form_error();
}
$ar = mysqli_fetch_array($res);
if($ar) {
    $ovalue = $ar['ovalue'];

    $current = $price;

    date_default_timezone_set('Asia/Kolkata');
    $time = date('Y-m-d H:i:s');

    $sql = "UPDATE commodities SET current = $current WHERE name = '$name';";
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

// try cryptocurrencies
$sql_cryptocurrencies = "SELECT name, ovalue FROM cryptocurrencies WHERE name = '".$name."';";
$res = mysqli_query($db, $sql_cryptocurrencies);
if($res == false) {
    form_error();
}
$ar = mysqli_fetch_array($res);
if($ar) {
    $ovalue = $ar['ovalue'];

    $current = $price;

    date_default_timezone_set('Asia/Kolkata');
    $time = date('Y-m-d H:i:s');

    $sql = "UPDATE cryptocurrencies SET current = $current WHERE name = '$name';";
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

die('Unsuccessful, while processing the request.');