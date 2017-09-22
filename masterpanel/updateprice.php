<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// in case of error with form data
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
// query to get a stock
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

    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');

    // query to update stocks live price values
    $sql = "UPDATE stocks SET current = $current, difference = $difference, percentage = $percentage WHERE name = '$name';";
    // query to insert updates entry
    $sql2 = "INSERT INTO updates (name, current, difference, percentage, time) VALUES ('$name', $current, $difference, $percentage, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

// try commodities
// query to get a commodity
$sql_commodities = "SELECT name, ovalue FROM commodities WHERE name = '".$name."';";
$res = mysqli_query($db, $sql_commodities);
if($res == false) {
    form_error();
}
$ar = mysqli_fetch_array($res);
if($ar) {
    $ovalue = $ar['ovalue'];

    $current = $price;

    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');

    // query to update commodities live price values
    $sql = "UPDATE commodities SET current = $current WHERE name = '$name';";
    // query to insert updates entry
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

// try cryptocurrencies
// query to get a cryptocurrency
$sql_cryptocurrencies = "SELECT name, ovalue FROM cryptocurrencies WHERE name = '".$name."';";
$res = mysqli_query($db, $sql_cryptocurrencies);
if($res == false) {
    form_error();
}
$ar = mysqli_fetch_array($res);
if($ar) {
    $ovalue = $ar['ovalue'];

    $current = $price;

    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');

    // query to update cryptocurrencies live price values
    $sql = "UPDATE cryptocurrencies SET current = $current WHERE name = '$name';";
    // query to insert updates entry
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }

    die('Successfully processed the request.');
}

die('Unsuccessful, while processing the request.');