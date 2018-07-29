<?php
// set database settings
$db_username = getenv("MYSQL_USERNAME");
$db_password = getenv("MYSQL_PASSWORD");
$db_database = getenv("MYSQL_DATABASE");
$db_socket = getenv("MYSQL_SOCKET");
// connect to database
$db = mysqli_connect(NULL, $db_username, $db_password, $db_database, NULL, $db_socket) or die("Database connection failed.");
