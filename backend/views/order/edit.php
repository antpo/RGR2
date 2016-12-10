<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Редактирование заказа</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($order, 'employee_id')->listBox(ArrayHelper::map($employees,'id','firstname', 'lastname'))?>
<?=$form->field($order, 'perfomance_date')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>