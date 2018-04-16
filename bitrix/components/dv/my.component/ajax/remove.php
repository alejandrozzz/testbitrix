<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><? 
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}
	$APPLICATION->RestartBuffer();
 
    header('Content-type: application/json');

	if (isset($_POST['id'])){
		CModule::IncludeModule('iblock');
		if (CIBlockElement::Delete($_POST['id'])){
			$response = 'success';
		} else {
			$response = 'error';
		}
	}

	echo \Bitrix\Main\Web\Json::encode($response);
 
    die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>