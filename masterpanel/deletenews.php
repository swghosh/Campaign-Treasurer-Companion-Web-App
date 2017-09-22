<?php
// create connection to database
include('../db.php');

header('Content-Type: text/plain');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['id']) == false || empty($_POST['id']) || isset($_POST['time']) == false || empty($_POST['time'])) {
    form_error();
}

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));
$time = mysqli_real_escape_string($db, htmlspecialchars($_POST['time']));

// query to remove news entry
$sql = "DELETE FROM news WHERE id=$id AND time='$time';";

// execute query
if(mysqli_query($db, $sql) == false) {
    form_error();
}

die('Successfully processed the request.');
