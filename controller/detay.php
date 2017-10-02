<?php

require_once "inc/function.php";
$id = (int)$_GET['id'];
$haber = News::find($id);
$obj = new News();
$getKat = $obj->getSomeKats();
$haber_id = $_GET['id'];
$yorumlar = $obj->getYorum($haber_id);
if($_POST) {
    $yorum = strip_tags(htmlspecialchars($_POST['yorum']));
    $obj->addYorum($haber_id,$yorum);
}
