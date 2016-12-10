<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Товар</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($item, 'name')?>
<?=$form->field($item, 'cost')?>
<?=$form->field($item, 'availability')->checkBox()?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
