<?php
require_once "inc/function.php";
$usrObj = new User();
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usrObj->login($username,$password);
}
if($usrObj->isLoggedIn() != "")
{
    $usrObj->redirect('index.php');
}