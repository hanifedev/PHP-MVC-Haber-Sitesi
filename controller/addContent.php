<?php
require_once "inc/function.php";
$adminObj = new Admin();
$icerik =News::all();
$categories =News::allKategories();
if($_POST && $_POST["baslik"] != "" && $_POST["aciklama"] != "" && $_POST["metin"] != ""){
    $baslik = trim($_POST["baslik"]);
    $kategori = $_POST["kategori"];
    $aciklama = trim($_POST["aciklama"]);
    $metin = $_POST["metin"];
    $fotograf = $_FILES["fotograf"]["name"];
    $adminObj->addContent($baslik,$kategori,$aciklama,$metin,$fotograf);
}
if(isset($_GET['sil']))
{
    $adminObj->deleteContent($_GET['sil']);
}