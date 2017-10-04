<?php
$categories =News::allKategories();
$newsObj = new News();
$admnObj = new Admin();
$cntEdt = (array)($newsObj->newsFindById($_GET["duzenle"]));
if($_POST){
    $id = $_GET["duzenle"];
    $title = $_POST["baslik"];
    $content = $_POST["metin"];
    $aciklama = $_POST["aciklama"];
    $kategori = $_POST["kategori"];
    $admnObj->editContent($id, $title,$aciklama, $content,$kategori);
}
