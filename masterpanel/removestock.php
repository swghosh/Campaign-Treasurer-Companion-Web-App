<?php
header('Content-Type: text/plain');

include('../db.php');

function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['item']) == false || empty($_POST['item'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['item']));

// database query statements
$sql1 = "DELETE FROM stocks WHERE name = '".$name."';";
$sql2 = "DELETE FROM commodities WHERE name = '".$name."';";
$sql3 = "DELETE FROM cryptocurrencies WHERE name = '".$name."';";

if(mysqli_query($db, $sql1) == false || mysqli_query($db, $sql2) == false || mysqli_query($db, $sql3) == false) {
    form_error();
}

die('Successfully processed the request.');