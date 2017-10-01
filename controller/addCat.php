<?php
require_once "inc/function.php";

$categories =News::allKategories();
if($_POST){
    $adminObj = new News();
    $cat = trim(strip_tags($_POST["catName"]));
    $adminObj->addCategory($cat);
}