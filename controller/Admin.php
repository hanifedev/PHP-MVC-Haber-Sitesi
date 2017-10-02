<?php
require_once "inc/function.php";
$usrObj = new User();
if($usrObj->isLoggedIn() == ""){
    $usrObj->redirect('login.php');
}
else{
    $userId = $_SESSION['user_id'];
    $userInfo = $usrObj->getOneUser($userId);
    if($userInfo["yetki"] == 1){
        $usrObj->redirect('Admin.php');
    }
    else{
        $usrObj->redirect('index.php');
    }
}