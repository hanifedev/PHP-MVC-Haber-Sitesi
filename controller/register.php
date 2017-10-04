<?php
if($_POST){
    $userObj = new User();
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $fullname = htmlspecialchars(strip_tags($_POST['fullname']));
    $userObj->registerUser($username, $password, $email, $fullname);
}
