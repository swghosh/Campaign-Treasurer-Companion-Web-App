<?php
function notAuthenticated() {
    header('WWW-Authenticate: Basic realm="Protected Access"');
    header('HTTP/1.0 401 Unauthorized');
    die('You are unathorised to access this portion.');
}

if(!isset($_SERVER['HTTP_AUTHORIZATION'])) {
    notAuthenticated();
}

$properAuthorisationString = 'Basic '.base64_encode(getenv('UPDATER_USERNAME').':'.getenv('UPDATER_PASSWORD'));

if($_SERVER['HTTP_AUTHORIZATION'] != $properAuthorisationString) {
    notAuthenticated();
}