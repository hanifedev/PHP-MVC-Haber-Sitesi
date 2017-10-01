<?php

require_once "inc/function.php";
$all_news = News::get();
$newsObj = new News();
$tumb = $newsObj->orderByRead();
$kategori = News::orderKategori(1);
$katObj = new News();
$indexObj = new News();
$getKat = $indexObj->getSomeKats();