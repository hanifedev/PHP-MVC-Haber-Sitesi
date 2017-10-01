<?php
require_once "inc/function.php";
$adminObj = new Admin();
$icerik =News::all();
$categories =News::allKategories();
if($_POST){
    $title = trim(strip_tags($_POST["baslik"]));
    $aciklama = trim(strip_tags($_POST["aciklama"]));
    $fotograf = $_FILES["fotograf"]["name"];
    $adminObj->addPicture($fotograf);
    $content = $_POST["metin"];
    $category_id = $_POST["kategori"];
    $adminObj->addContent($title,$aciklama,$content,$category_id);
}