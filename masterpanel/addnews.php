<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['content']) == false || empty($_POST['content'])) {
    form_error();
}

// get current time
date_default_timezone_set('Asia/Kolkata');
$news = mysqli_real_escape_string($db, htmlspecialchars($_POST['content']));
$time = date('Y-m-d H:i:s');

// query to insert entry to news
$sql = "INSERT INTO news (time, content) VALUES ('$time','$news');";

// insert data into database
if(mysqli_query($db, $sql) == false) {
    form_error();
}
die('Successfully processed the request.');
