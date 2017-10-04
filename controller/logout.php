<?php
$usrObj = new User();
if($usrObj->isLoggedIn()) {
    $usrObj->logout();
}