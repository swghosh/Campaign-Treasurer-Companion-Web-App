<?php
include('../db.php');
date_default_timezone_set('Asia/Kolkata');

function price($item) {
    global $db;

    $sql = "SELECT current FROM updates WHERE name = '$item' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        return floatval($ar['current']);
    }

    return false;
}

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

    $balance = balance($username);
    if($balance !== false) {
        $time = date('Y-m-d H:i:s');
        $transaction_id = generate_transaction_id($username);

        $sql = "INSERT INTO funds (name, time, value, id) VALUES ('$username', '$time', $value, '$transaction_id');";
        
        $new_balance = $balance + $value;

        $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";
        
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

function transact_buy($username, $item, $quantity) {
    global $db;

    if($price = price($item)) {
        $value = $price * $quantity;
        $time = date('Y-m-d H:i:s');
        $transaction_id = generate_transaction_id($username);

        $balance = balance($username);
        if($balance > $value) {
            $sql = "INSERT INTO transactions (name, time, value, price, quantity, item, id) VALUES ('$username', '$time', $value, $price, $quantity, '$item', '$transaction_id');";

            $new_balance = $balance - $value;

            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";
            
            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                return true;
            }
        }
    }

    return false;
}

function transact_sell($username, $item, $quantity) {
    $quantity = - intval($quantity);

    return transact_buy($username, $item, $quantity);
}

function reverse_transaction($id) {
    global $db;

    $sql = "SELECT name, value FROM transactions WHERE id = '$id';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $username = $ar['name'];
        $value = $ar['value'];

        $balance = balance($username);
        if($balance !== false) {
            $sql = "DELETE FROM transactions WHERE id = '$id';";

            $new_balance = $balance + $value;

            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";

            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                return true;
            }
        }
    }

    return false;
}

function reverse_funding($id) {
    global $db;

    $sql = "SELECT name, value FROM funds WHERE id = '$id';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $username = $ar['name'];
        $value = $ar['value'];

        $balance = balance($username);
        if($balance !== false) {
            $sql = "DELETE FROM funds WHERE id = '$id';";

            $new_balance = $balance - $value;

            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";

            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                return true;
            }
        }
    }

    return false;
}

function purchased($username) {
    global $db;

    $items = array();

    $sql = "SELECT item, quantity FROM transactions WHERE name = '$username';";

    if($res = mysqli_query($db, $sql)) {
        while($ar = mysqli_fetch_array($res)) {
            $item = $ar['item'];
            $quantity = intval($ar['quantity']);
            if(isset($items[$item])) {
                $items[$item] = $items[$item] + $quantity;
            }
            else {
                $items[$item] = $quantity;
            }
        }

        foreach($items as $item => $quantity) {
            if($quantity <= 0) {
                unset($items[$item]);
            }
        }
        
        return $items;
    }

    return false;
}