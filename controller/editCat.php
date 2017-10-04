<?php
$usrObj = new News();
$admnObj = new Admin();
$catEdt = (array)($usrObj->findById($_GET["duzenle"]));
if($_POST){
    $admnObj->editCategory($_POST["id"], $_POST["baslik"]);
}