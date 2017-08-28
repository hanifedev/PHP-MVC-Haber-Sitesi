<?php

require_once "inc/function.php";
$all_news = News::get();
$tumb = News::orderRead();
$kategori = News::orderKategori();