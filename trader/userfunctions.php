<?php
// create connection to database
include('../db.php');

function is_valid_user($username) {
    global $db;

    $sql = "SELECT id FROM users WHERE name = '$username';";

    $res = mysqli_query($db, $sql);
    if($ar = mysqli_fetch_array($res)) {
        return true;
    }

    return false;
}
