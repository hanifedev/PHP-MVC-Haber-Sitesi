<?php
$usrObj = new User();
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $usrObj->login($username,$password);
}

if($usrObj->isLoggedIn() != "") {
    $userId = $_SESSION['user_id'];
    $userInfo = $usrObj->getOneUser($userId);
    if($userInfo["yetki"] == "1"){
        $usrObj->redirect('Admin.php');
    }
    else{
        $usrObj->redirect('index.php');
    }
}