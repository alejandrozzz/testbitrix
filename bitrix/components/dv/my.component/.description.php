<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 
$arComponentDescription = array(
    "NAME" => 'DV: список элементов инфоблока',
    "DESCRIPTION" => 'Список элементов инфоблока',
    "ICON" => "/images/sections_list.gif",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "utility",
    ),
);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>