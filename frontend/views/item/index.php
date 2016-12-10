<?php Use \yii\helpers\Html; ?>
<h2 align="center">Наша продукция</h2>
<table class="table">
	<tr>
		<th>Наименование </th> 
		<th>Стоимость </th>
		<th>Действия </th>
	</tr>
	<?php foreach($items as $item){ ?>
	<tr>
		<td> <?= htmlspecialchars($item->name) ?> </td>
		<td> <?= htmlspecialchars($item->cost) ?> руб. </td>
		<td> 

			<?= Html::a('<span class="glyphicon glyphicon-plus"></span>Заказать', ['order/add', 'id' => $item ->id, 'item' => $item -> id],['class'=>'btn btn-success']) ?>
		</td>
	</tr>
	 <?php } ?>
</table>