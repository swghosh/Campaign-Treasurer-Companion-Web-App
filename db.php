<?php
//Set database settings
$host = getenv("RDS_HOST_NAME");
$username = getenv("RDS_USERNAME");
$password = getenv("RDS_PASSWORD");
$port = getenv("RDS_PORT");
$database = getenv("RDS_DB_NAME");
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database, $port) or die("Database connection failed.");
