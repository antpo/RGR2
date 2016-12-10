<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2 align="center">Спасибо за заказ! </h2><br>
<h2 align="center">Вы заказали:
<?= htmlspecialchars( $order->getItem()->one()->name)?> <br>
Стоимость:
<?= htmlspecialchars( $order->getItem()->one()->cost)?> руб.<br><br>
С вами свяжутся по указанному телефону!
</h2>

<p align="center"><a class="btn btn-lg btn-success" href="/?r=item">Вернуться в каталог</a></p>