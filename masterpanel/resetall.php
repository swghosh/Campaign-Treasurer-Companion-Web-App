<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// database query statements
// query to reset everything to initial state
$sqlfile = fopen("resetall.sql", "r");
$sql = fread($sqlfile, filesize("resetall.sql"));
fclose($sqlfile);

// execute queries together
if(mysqli_multi_query($db, $sql) == false) {
    die('Error');
}

die('Successfully processed the request.');