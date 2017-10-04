<?php
require_once "inc/function.php";
$categories =News::allKategories();
$usrObj = new User();
$usrEdt = $usrObj->getOneUser($_GET['duzenle']);
