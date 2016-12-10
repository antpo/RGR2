<?php Use \yii\helpers\Html; ?>
<h2 align="center">Товары</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Наименование </th> 
		<th>Стоимость </th>
		<th>Наличие </th>
		<th>Действия </th>
	</tr>
	<?php foreach($items as $item){ ?>
	<tr>
		<td> <?= $item->id ?> </td>
		<td> <?= htmlspecialchars($item->name) ?> </td>
		<td> <?= htmlspecialchars($item->cost) ?> руб. </td>
		<td> <?php if ($item->availability == "1") {
						echo 'В наличии';
					}else{
						echo 'Нет в наличии';
					} 
				?>
		</td>
		<td> 

			<?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['item/edit', 'id' => $item ->id],['class'=>'btn btn-primary']) ?>

				<?php
			 if($item->getOrders()->count()==0) {
			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['item/delete', 'id' => $item ->id],['class'=>'btn btn-primary']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="4" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить', ['item/add']) ?>
	 </tr>
</table>