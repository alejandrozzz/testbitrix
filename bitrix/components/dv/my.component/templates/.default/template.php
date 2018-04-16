<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Книги");
?><style>
#books {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#books td, #books th {
    border: 1px solid #ddd;
    padding: 8px;
}

#books tr:nth-child(even){background-color: #f2f2f2;}

#books tr:hover {background-color: #ddd;}

#books th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #E40000;
    color: white;
}
</style>
<?if (is_array($arResult)):?>
	
		<table id="books">
  <tr>
    <th>Название книги</th>
    <th>Год выпуска</th>
    <th>Удалить</th>
  </tr>
<?foreach($arResult as $category):?>
  <tr>
    <td><?=$category['NAME']?></td>
    <td><?=$category['YEAR']?></td>
    <td class="remove" data-id="<?=$category['ID']?>">X</td>
  </tr>
<?endforeach;?>
</table>


<?endif;?>
<script>
	$(document).ready(function(){
		$('.remove').click(function(){
			$.post('/bitrix/components/dv/my.component/ajax/remove.php',{id: $(this).attr('data-id')},onAjaxSuccess);
		})
			function onAjaxSuccess(data){
			alert(data)
		}
	})
</script><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>