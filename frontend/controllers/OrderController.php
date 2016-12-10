<?php
namespace frontend\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Item;
use app\models\Order;
use app\models\Employee;
/**
 * Site controller
 */
class OrderController extends Controller
{ 
	public function actionAdd($item=null) {
		$order=new Order;
		$order->item_id=$item;
		$items=Item::find()->having('availability=1') ->all();
		if (isset($_POST['Order'])){
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->render('success',['order'=>$order]);
			}
			
		}
		return $this->render('add', ['order'=>$order,'items'=>$items]);
		
	}

}