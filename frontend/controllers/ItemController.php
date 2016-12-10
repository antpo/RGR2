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
/**
 * Site controller
 */
class ItemController extends Controller
{ 
	public function actionIndex ()
	{
		$items=Item::find()->having('availability=1')->orderBy(['name' => SORT_ASC])->all();
		return $this->render('index', ['items' => $items]);
	}

}