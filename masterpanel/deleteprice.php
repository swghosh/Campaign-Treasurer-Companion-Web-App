<?php
header('Content-Type: text/plain');

include('../db.php');

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

if($type == 'stock') {
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
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

        $sql3 = "UPDATE stocks SET current = ".$current.", difference = ".$difference.", percentage = ".$percentage." WHERE name = '".$name."';";
        
        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}
else if($type == 'commodity') {
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
    $sql2 = "SELECT current FROM updates WHERE name = '".$name."' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);

    if($res == false || $res2 == false) {
        form_error();
    }
    else {
        $ar = mysqli_fetch_array($res2);
        $current = $ar['current'];

        $sql3 = "UPDATE commodities SET current = ".$current." WHERE name = '".$name."';";
        
        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}
else if($type == 'cryptocurrency') {
    $sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
    $sql2 = "SELECT current FROM updates WHERE name = '".$name."' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);

    if($res == false || $res2 == false) {
        form_error();
    }
    else {
        $ar = mysqli_fetch_array($res2);
        $current = $ar['current'];

        $sql3 = "UPDATE cryptocurrencies SET current = ".$current." WHERE name = '".$name."';";

        if(mysqli_query($db, $sql3) == false) {
            form_error();
        }
    }
    die('Successfully processed the request.');
}

die('Unsuccessful, while processing the request.');
