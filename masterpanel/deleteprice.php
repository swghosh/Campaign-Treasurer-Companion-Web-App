<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['time']) == false || empty($_POST['time']) || isset($_POST['type']) == false || empty($_POST['type'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
$time = mysqli_real_escape_string($db, htmlspecialchars($_POST['time']));
$type = mysqli_real_escape_string($db, htmlspecialchars($_POST['type']));

// if type is stock
if($type == 'stock') {
    // query to remove update entry
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
    // query to get latest updates for item
    $sql2 = "SELECT current, difference, percentage FROM updates WHERE name = '".$name."' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);

    if($res == false || $res2 == false) {
        form_error();
    }
    else {
        $ar = mysqli_fetch_array($res2);
        $current = $ar['current'];
        $difference = $ar['difference'];
        $percentage = $ar['percentage'];

        // query to update live price
        $sql3 = "UPDATE stocks SET current = ".$current.", difference = ".$difference.", percentage = ".$percentage." WHERE name = '".$name."';";
        
        // execute query
        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}
// if type is commodity
else if($type == 'commodity') {
    // query to remove update entry
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
    // query to get latest updates for item
    $sql2 = "SELECT current FROM updates WHERE name = '".$name."' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);

    if($res == false || $res2 == false) {
        form_error();
    }
    else {
        $ar = mysqli_fetch_array($res2);
        $current = $ar['current'];

        // query to update live price
        $sql3 = "UPDATE commodities SET current = ".$current." WHERE name = '".$name."';";
        
        // execute query
        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}
// if type is cryptocurrency
else if($type == 'cryptocurrency') {
    // query to remove update entry
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
    // query to get latest updates for item
    $sql2 = "SELECT current FROM updates WHERE name = '".$name."' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);

    if($res == false || $res2 == false) {
        form_error();
    }
    else {
        $ar = mysqli_fetch_array($res2);
        $current = $ar['current'];

        // query to update live price
        $sql3 = "UPDATE cryptocurrencies SET current = ".$current." WHERE name = '".$name."';";

        // execute query
        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}

die('Unsuccessful, while processing the request.');
