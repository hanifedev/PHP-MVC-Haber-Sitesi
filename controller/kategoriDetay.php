<?php
require_once "inc/function.php";
$id = (int)$_GET['id'];
$kategoriDetay = News::orderKategori($id);
$getKat = News::allKategories();