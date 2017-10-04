<?php
require_once "inc/function.php";
$usrObj = new User();
$usrEdt = $usrObj->getOneUser($_GET['duzenle']);
