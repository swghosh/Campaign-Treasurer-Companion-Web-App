<?php
include('../db.php');
date_default_timezone_set('Asia/Kolkata');

function generate_transaction_id($username) {
    global $db;
    
    $sql = "SELECT id FROM users WHERE name = '$username';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $user_id = intval($ar['id']);
        if($user_id < 10) {
            $user_id = '0'.$user_id;
        }
        $random = rand(10, 99);
        $time = date('Ymdhis');
        $transaction_id = '1000'.$user_id.$time.$random;
        return $transaction_id;
    }

    return false;
}

function balance($username) {
    global $db;
    
    $sql = "SELECT balance FROM users WHERE name = '$username';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        return floatval($ar['balance']);
    }

    return false;
}

function grant_funds($username, $value) {
    global $db;
    
    $value = floatval($value);

    if($balance = balance($username)) {
        $time = date('Y-m-d H:i:s');
        $transaction_id = generate_transaction_id($username);

        $sql = "INSERT INTO funds (name, time, value, id) VALUES ('$username', '$time', $value, '$transaction_id');";
        $sql2 = "UPDATE users SET balance = ".($balance + $value)." WHERE name = '$username';";

        if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
            return true;
        }
    }
    
    return false;
}

function deduct_funds($username, $value) {
    $value = - floatval($value);

    return grant_funds($username, $value);
}