<H1>Утверждение заявок на пропуска</H1>
<p id = 'p1'>Нажмите на строку чтобы утвердить или отменить утверждение пропуска</p>
<div id="table">
<table border='0' class='table table-condensed'>
	<tr class="active">
		<td>ФИО</td>
		<td>Пасспорт</td>
		<td>Принимающий</td>
		<td>Утвержден</td>
	</tr>

<?php 
use yii\helpers\Url;
foreach ($data as $d)
{
	if ($d->approved) 
	{
	 	echo "<tr id='". $d->id . "' class='success'>";
		echo "<td>" . $d->name . "</td>";
		echo "<td>" . $d->passnum . "</td>";
		echo "<td>" . $d->receiver . "</td>";
		echo "<td>";
		echo "ДА";
		echo "</td>";
		echo "</tr>";
		$url = urldecode(Url::to(['pass/ajax']));
		$javascript = $javascript . '$(document).on("click","#'. $d->id . '",function(){
		$.get("'.$url.'","id='.$d->id.'", function(result) {
			//$("#table").slideUp(300);
			$("#'.$d->id.'").after(result);
			$("#'.$d->id.'").detach();
			//$("#table").slideDown(300);
		});
	});';


	}
	else 
	{
	 	echo "<tr id='" . $d->id . "' class='danger'>";
		echo "<td>" . $d->name . "</td>";
		echo "<td>" . $d->passnum . "</td>";
		echo "<td>" . $d->receiver . "</td>";
		echo "<td>";
		echo "НЕТ";
		echo "</td>";
		echo "</tr>";
		$url = urldecode(Url::to(['pass/ajax']));
		$javascript = $javascript . '$(document).on("click","#'. $d->id . '",function(){
		$.get("'.$url.'","id='.$d->id.'", function(result) {
			//$("#table").slideUp(300);
			$("#'.$d->id.'").after(result);
			$("#'.$d->id.'").detach();
			//$("#table").slideDown(300);
		});
	});';

	}
}

$this->registerJs($javascript);
 ?>
</table>
</div>
