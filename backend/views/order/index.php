<?php Use \yii\helpers\Html; ?>
<h2 align="center">Активные заказы</h2>
<div class="text">
</div>

<table class="table">
	<tr>
		<th>№ </th> 
		<th>Фамилия </th> 
		<th>Имя </th>
		<th>Номер </th>
		<th>Товар </th>
		<th>Дата заказа </th>
		<th>Назначенный сотрудник </th> 
		<th>Действия </th>
	</tr>

	<?php foreach($orders as $order){
		if (isset($order->perfomance_date)) {?>
		<?php } else {?>
	<tr>
		<td> <?= $order->id ?> </td>
		<td> <?php echo htmlspecialchars($order->lastname) ?> </td>
		<td> <?php echo htmlspecialchars($order->firstname) ?> </td>
		<td> <?php echo htmlspecialchars($order->number) ?> </td>
		<td> <?php echo htmlspecialchars($order->getItem()->one()->name) ?> </td>
		<td> <?php echo htmlspecialchars($order->order_date) ?> </td>
		<td> <?php if (isset($order->employee_id)) {
						echo htmlspecialchars($order->getEmployee()->one()->lastname); ?> 
						<?php echo htmlspecialchars($order->getEmployee()->one()->firstname);
					}else{
						echo 'Сотрудник не назначен';
					} 
				?>

		</td>
		
		<td> 
			 <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['order/edit', 'id' => $order ->id],['class'=>'btn btn-primary']) ?>
			 <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['order/delete', 'id' => $order ->id],['class'=>'btn btn-primary'])
			 ?>
		</td>
	</tr>
	 <?php }} ?>

	 

</table>
