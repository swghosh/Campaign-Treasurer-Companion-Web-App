<?php
//Set database settings
$db_host = getenv("RDS_HOSTNAME");
$db_username = getenv("RDS_USERNAME");
$db_password = getenv("RDS_PASSWORD");
$db_port = getenv("RDS_PORT");
$db_database = getenv("RDS_DB");
//-----------------------------
$db = mysqli_connect($db_host, $db_username, $db_password, $db_database, $db_port) or die("Database connection failed.");
