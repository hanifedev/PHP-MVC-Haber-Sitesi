<?php
require_once "inc/function.php";
$usrObj = new User();
if($usrObj->isLoggedIn() == ""){
    $usrObj->redirect('login.php');
}
else{
    $users = $usrObj->getAllUsers();
    $userId = $_SESSION['user_session'];
    $userInfo = $usrObj->getOneUser($userId);
    if($userInfo["yetki"] != 1){
        $usrObj->redirect('login.php');
    }
    else{
        $usrObj->redirect('Admin.php');
    }
}