<?php
$usrObj = new User();
$admObj = new Admin();
$yorumlar = $admObj->onayBekleyenYorumlar();
if($usrObj->isLoggedIn() == NULL) {
    $usrObj->redirect('login.php');
}

if($usrObj->isLoggedIn()) {
    $userId = $_SESSION['user_id'];
    $userInfo = $usrObj->getOneUser($userId);
    if($userInfo["yetki"] == "1"){
        $usrObj->redirect('Admin.php');
    }
    else{
        $usrObj->redirect('index.php');
    }
}

if(isset($_GET['sil'])){
    $admObj->deleteComment($_GET['sil']);
}

if(isset($_GET['onayla'])){
    $admObj->yorumOnayla($_GET['onayla']);
}