<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['item']) == false || empty($_POST['item'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['item']));

// database query statements
// query to delete item of some name from all tables
$sql1 = "DELETE FROM stocks WHERE name = '".$name."';";
$sql2 = "DELETE FROM commodities WHERE name = '".$name."';";
$sql3 = "DELETE FROM cryptocurrencies WHERE name = '".$name."';";
$sql4 = "DELETE FROM updates WHERE name = '".$name."';";

// execute queries together
if(mysqli_query($db, $sql1) == false || mysqli_query($db, $sql2) == false || mysqli_query($db, $sql3) == false || mysqli_query($db, $sql4) == false) {
    form_error();
}

die('Successfully processed the request.');