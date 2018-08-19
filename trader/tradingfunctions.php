<?php
// create connection to database
include('../db.php');
// time zone is set to Indian Standard Time
date_default_timezone_set('Asia/Kolkata');

// limit is set per transaction from env var
$transaction_limit = intval(getenv('TRANSACTION_LIMIT'));

// function to get the live price of an item (cryptocurrency / commodity / stock)
function price($item) {
    global $db;

    // query to get current price of item
    $sql = "SELECT current FROM updates WHERE name = '$item' ORDER BY time DESC LIMIT 1;";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        // returns current prce of item
        return floatval($ar['current']);
    }

    return false;
}

// function to generate a transaction id based on username and current date time
function generate_transaction_id($username) {
    global $db;
    
    // query to get id of user
    $sql = "SELECT id FROM users WHERE name = '$username';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $user_id = intval($ar['id']);
        // if user id is less than 10 add 0 before
        if($user_id < 10) {
            $user_id = '0'.$user_id;
        }
        // generate a two digit random number
        $random = rand(10, 99);
        // generate a date time string
        $time = date('Ymdhis');
        // full tranasction id string consisting of 1000, user id, date time, random two digit number
        $transaction_id = '1000'.$user_id.$time.$random;
        // return transaction id
        return $transaction_id;
    }

    return false;
}

// function to get the available fund balance of specific user
function balance($username) {
    global $db;
    
    // query to get fund balance of user
    $sql = "SELECT balance FROM users WHERE name = '$username';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        // returns fund balance of user
        return floatval($ar['balance']);
    }

    return false;
}

// function to grant funds of specific amount to a specific user 
function grant_funds($username, $value) {
    global $db;
    
    $value = floatval($value);

    // get balance of user
    $balance = balance($username);
    if($balance !== false) {
        // date time stamp
        $time = date('Y-m-d H:i:s');
        // generate a transaction id
        $transaction_id = generate_transaction_id($username);

        // query to insert an entry to funds
        $sql = "INSERT INTO funds (name, time, value, id) VALUES ('$username', '$time', $value, '$transaction_id');";
        
        // find new balance after adding grant
        $new_balance = $balance + $value;

        // query to update user balance
        $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";

        // execute queries together
        if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
            // return that grant was successful
            return true;
        }
    }
    
    return false;
}

// function to deduct funds of specific amount to a specific user
function deduct_funds($username, $value) {
    // fund deduct to use negative value and same process of grant funds
    $value = - floatval($value);

    // grant funds of negative value as in deduction in funds
    return grant_funds($username, $value);
}

// function to allow a specific user to transact buy an item (cryptocurrency / commodity / stock) of the the specified quantity
function transact_buy($username, $item, $quantity) {
    global $db;
    global $transaction_limit;
    
    // get the price of item
    if($price = price($item)) {
        // calculate value of transaction
        $value = $price * $quantity;

        // no tranasction in case it crosses the per transaction limit
        if($value > $transaction_limit) {
            return false;
        }

        // date time stamp
        $time = date('Y-m-d H:i:s');
        // generate a tranasction id
        $transaction_id = generate_transaction_id($username);

        // get the balance of a user
        $balance = balance($username);
        if($balance > $value) {
            // query to insert an entry to funds
            $sql = "INSERT INTO transactions (name, time, value, price, quantity, item, id) VALUES ('$username', '$time', $value, $price, $quantity, '$item', '$transaction_id');";

            // find new balance after transaction
            $new_balance = $balance - $value;

            // query to update user balance
            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";
            
            // execute queries together
            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                // return that transaction was successful
                return true;
            }
        }
    }

    return false;
}

// function to allow a specific user to transact sell an item (cryptocurrency / commodity / stock) of the specified quantity
function transact_sell($username, $item, $quantity) {
    // transact sell to use negative value and same process of transact buy
    $quantity = - intval($quantity);

    // transact buy of negative value as in transaction of type sell
    return transact_buy($username, $item, $quantity);
}

// function to reverse / delete / rollback a transaction of a specific id that was made by mistake, user balance is reversed
function reverse_transaction($id) {
    global $db;

    // query to get a transaction of a specific id
    $sql = "SELECT name, value FROM transactions WHERE id = '$id';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $username = $ar['name'];
        $value = $ar['value'];

        // query to get balance of a user
        $balance = balance($username);
        if($balance !== false) {
            // query to remove entry from transactions
            $sql = "DELETE FROM transactions WHERE id = '$id';";

            // find updated user balance
            $new_balance = $balance + $value;

            // query to update user balance
            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";

            // execute queries together
            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                // return that transaction reversal was successful
                return true;
            }
        }
    }

    return false;
}

// function to reverse / delete / rollback a funding of a specific id that was made by mistake, user balance is reversed
function reverse_funding($id) {
    global $db;

    // query to get a transaction of a specific id
    $sql = "SELECT name, value FROM funds WHERE id = '$id';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        $username = $ar['name'];
        $value = $ar['value'];

        // get balance of user
        $balance = balance($username);
        if($balance !== false) {
            // query to remove entry from funds
            $sql = "DELETE FROM funds WHERE id = '$id';";

            // find updated user balance
            $new_balance = $balance - $value;

            // query to update user balance
            $sql2 = "UPDATE users SET balance = $new_balance WHERE name = '$username';";

            // execute queries together
            if(mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
                // return that fund reversal was successful
                return true;
            }
        }
    }

    return false;
}

// function to list quantity and name of items (cryptocurrencies and or commodities and or stocks) purchased by a specific user
function purchased($username) {
    global $db;

    // array that will store the items
    $items = array();

    // query to select item and quantity from transactions for given user
    $sql = "SELECT item, quantity FROM transactions WHERE name = '$username';";

    if($res = mysqli_query($db, $sql)) {
        // iterate each entry to add and subtract quantities for each item
        while($ar = mysqli_fetch_array($res)) {
            $item = $ar['item'];
            $quantity = intval($ar['quantity']);
            // when transaction was buy
            if(isset($items[$item])) {
                $items[$item] = $items[$item] + $quantity;
            }
            // when transaction was sell
            else {
                $items[$item] = $quantity;
            }
        }

        // iterate across list of purchased items and quantities
        foreach($items as $item => $quantity) {
            // if quantity less than equal zero remove array entry
            if($quantity <= 0) {
                unset($items[$item]);
            }
        }
        
        // return the purchased list of items with quantities
        return $items;
    }

    return false;
}

// function to list all items (cryptocurrencies and commodities and stocks) with their number of active buyers
function active_buyers() {
    global $db;

        // array that will store the items
        $items = array();
    
        // query to select item and quantity from transactions for all users
        $sql = "SELECT item, quantity FROM transactions;";
    
        if($res = mysqli_query($db, $sql)) {
            // iterate each entry to add and subtract quantities for each item
            while($ar = mysqli_fetch_array($res)) {
                $item = $ar['item'];
                $quantity = intval($ar['quantity']);
                // when transaction was buy
                if(isset($items[$item])) {
                    $items[$item] = $items[$item] + $quantity;
                }
                // when transaction was sell
                else {
                    $items[$item] = $quantity;
                }
            }
    
            // iterate across list of purchased items and quantities
            foreach($items as $item => $quantity) {
                // if quantity less than equal zero remove array entry
                if($quantity <= 0) {
                    unset($items[$item]);
                }
            }
            
            // return the list of items with active quantities
            return $items;
        }
    
        return false;
}