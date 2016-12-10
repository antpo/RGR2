<?php
namespace backend\controllers;
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
use app\models\Order;
use app\models\Employee;
use app\models\Item;
/**
 * Site controller
 */
class OrderController extends Controller
{ 
 	public function behaviors()
	    {
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
	                'rules' => [
	                    [
	                        'allow' => true,
	                        'roles' => ['@'],
	                    ],
	                ],
	            ]
	        ];
	    }
	public function actionIndex ()
	{
		$orders=Order::find()
		->orderBy (['order_date'=>SORT_ASC])
		->all ();
		return $this->render('index', ['orders' => $orders]);
	}

	public function actionArchive(){
		$orders=Order::find()
		->having('perfomance_date')
		->orderBy(['perfomance_date' => SORT_ASC])
		->all ();
		return $this->render('archive', ['orders' => $orders]);
	}
	
	public function actionEdit($id) {
		$order=Order::findOne($id);
		if (!$order) {
			throw new \yii\web\NotFoundHttpException('Запись не найдена');
		}
		$employees=Employee::find()->all();
		if (isset($_POST['Order'])) {
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/index']);
			}
		}
		$items=Item::find()->having('availability=1')->all();
		if (isset($_POST['Order'])) {
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/index']);
			}
		}
		return $this->render('edit', ['order'=>$order,'items'=>$items, 'employees'=>$employees]);
	}
	
	public function actionDelete($id){
		$order=Order::findOne($id);
		if (!$order) {
			throw new \yii\web\NotFoundHttpException('Запись не найдена');
		}
		$order->delete();
		return $this->redirect(['order/index']);
	}
	

}