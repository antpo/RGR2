<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div align="center">
<h2>Заказ</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($order, 'lastname')?>
<?=$form->field($order, 'firstname')?>
<?=$form->field($order, 'number')?>
<?=$form->field($order, 'item_id')->listBox(ArrayHelper::map($items,'id','name'))?>
<button class="btn btn-primary" type="submit">
Сохранить</button></div>
<?php ActiveForm::end();?>
