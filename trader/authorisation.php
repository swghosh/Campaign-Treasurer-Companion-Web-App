<?php
use google\appengine\api\users\User;
use google\appengine\api\users\UserService;

include('userfunctions.php');

$user = UserService::getCurrentUser();

if(isset($user) && ($user->getEmail() == 'snwg@live.com') && is_valid_user('alpha')) {
    $username = 'alpha';
    $logoutUrl = UserService::createLogoutUrl('/');
} else {
    die('Authorisation failed. Please use this portion of the application with an app authorised Google Account logged in.');
}
