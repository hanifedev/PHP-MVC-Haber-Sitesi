<?php
$adminObj = new Admin();
$categories =News::allKategories();
if($_POST && $_POST["catName"] != ""){
    $cat = trim(strip_tags($_POST["catName"]));
    $adminObj->addCategory($cat);
}

if(isset($_GET['sil']))
{
        $adminObj->deleteCategory($_GET['sil']);
}