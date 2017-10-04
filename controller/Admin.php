<?php
require_once "inc/function.php";
$usrObj = new User();
$admObj = new Admin();
$yorumlar = $admObj->onayBekleyenYorumlar();
if($usrObj->isLoggedIn() != "") {
    $usrObj->redirect('login.php');
}
if(isset($_GET['sil'])){
    $admObj->deleteComment($_GET['sil']);
}
if(isset($_GET['onayla'])){
    $admObj->yorumOnayla($_GET['onayla']);
}