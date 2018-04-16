<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовое задание");
?><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->IncludeComponent("dv:my.component", ".default", array(
    "IBLOCK_ID" => 5
    ),
    false);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>