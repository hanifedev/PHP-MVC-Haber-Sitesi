<?php

require_once "inc/function.php";
$id = (int)$_GET['id'];
$haber = News::find($id);
$indexObj = new News();
$getKat = $indexObj->getSomeKats();