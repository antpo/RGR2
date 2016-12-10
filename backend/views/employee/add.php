<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Сотрудник</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($employee, 'lastname')?>
<?=$form->field($employee, 'firstname')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
