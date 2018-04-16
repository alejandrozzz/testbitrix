<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CJSCore::Init(array("jquery"));
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600))
{
    $iblock_id = $arParams['IBLOCK_ID'];
    $arFilter = array('IBLOCK_ID'=>$iblock_id);
    $db_list = CIBlockElement::GetList(array("PROPERTY_NAME"=>"ASC"), $arFilter, false, false, array("ID", "PROPERTY_NAME", "PROPERTY_YEAR"));

    while($ar_result = $db_list->GetNextElement())
    {
		$arFields = $ar_result->GetFields();
        $arResult[] = array(
                    "ID" => $arFields['ID'],
                    "NAME" => $arFields['PROPERTY_NAME_VALUE'],
					"YEAR" => $arFields['PROPERTY_YEAR_VALUE']
                   );
    }
    $this->IncludeComponentTemplate();
}
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>