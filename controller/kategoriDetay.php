<?php
require_once "inc/function.php";
$id = (int)$_GET['id'];
$kategoriDetay = News::orderKategori($id);
$indexObj = new News();
$getKat = $indexObj->getSomeKats();