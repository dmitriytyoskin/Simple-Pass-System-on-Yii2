<H1>Заявки на пропуска</H1>
<div id="table">
<table border='0' class='table table-condensed'>
	<tr class="active">
		<td>ФИО</td>
		<td>Права</td>
		<td>Номер авто</td>
		<td>Утвержден</td>
		<td>Выполнить</td>
	</tr>

<?php 
use yii\helpers\Url;
use yii\helpers\Html;

foreach ($data as $d)
{
	if ($d->approved) 
	{
	 	echo "<tr id='". $d->id . "' class='success'>";
		echo "<td>" . $d->name . "</td>";
		echo "<td>" . $d->licence . "</td>";
		echo "<td>" . $d->carnum . "</td>";
		echo "<td>";
		echo "ДА";
		echo "</td>";
		echo "<td>";
		echo Html::a('Выполнено',['auto/disp','id'=>$d->id]);
		echo "</td>";
		echo "</tr>";
	}
	else 
	{
	 	echo "<tr id='" . $d->id . "' class='danger'>";
		echo "<td>" . $d->name . "</td>";
		echo "<td>" . $d->licence . "</td>";
		echo "<td>" . $d->carnum . "</td>";
		echo "<td>";
		echo "НЕТ";
		echo "</td>";
		echo "<td>";
		echo Html::a('Выполнено',['auto/disp','id'=>$d->id]);
		echo "</td>";
		echo "</tr>";
	}
}
?>
</table>
</div>