<?php
include('../db.php');

header('Content-Type: text/plain');

function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['id']) == false || empty($_POST['id']) || isset($_POST['time']) == false || empty($_POST['time'])) {
    form_error();
}

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));
$time = mysqli_real_escape_string($db, htmlspecialchars($_POST['time']));

$sql = "DELETE FROM news WHERE id=$id AND time='$time';";

// insert data into database
if(mysqli_query($db, $sql) == false) {
    form_error();
}

die('Successfully processed the request.');
