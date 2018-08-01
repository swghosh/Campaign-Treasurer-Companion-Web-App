<?php
use google\appengine\api\users\User;
use google\appengine\api\users\UserService;

$user = UserService::getCurrentUser();

if(isset($user) && ($user->getEmail() == 'snwg@live.com')) {
    $username = 'alpha';
} else {
    die('Authorisation failed. Please use this portion of the application with an app authorised Google Account logged in.');
}
