<?php
//Set database settings
$host = getenv("RDS_HOSTNAME");
$username = getenv("RDS_USERNAME");
$password = getenv("RDS_PASSWORD");
$port = getenv("RDS_PORT");
$database = getenv("RDS_DB");
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database, $port) or die("Database connection failed.");
