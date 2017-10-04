<?php
function __autoload($className)
{
    require_once "model/".$className.".php";
}