<?php Use \yii\helpers\Html; ?>
<h2 align="center">Сотрудники</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Фамилия </th> 
		<th>Имя </th>
		<th>Действия </th>
	</tr>
	<?php foreach($employees as $employee){ ?>
	<tr>
		<td> <?= $employee->id ?> </td>
		<td> <?= htmlspecialchars($employee->lastname) ?> </td>
		<td> <?= htmlspecialchars($employee->firstname) ?></td>
		<td> 

			<?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['employee/edit', 'id' => $employee ->id],['class'=>'btn btn-primary']) ?>

				<?php
			 if($employee->getOrders()->count()==0) {
			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['employee/delete', 'id' => $employee ->id],['class'=>'btn btn-primary']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="3" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить', ['employee/add']) ?>
	 </tr>
</table>