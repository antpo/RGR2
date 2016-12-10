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
use app\models\Item;
/**
 * Site controller
 */
class ItemController extends Controller
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
		$items=Item::find()
		->orderBy(['name' => SORT_ASC])
		->all ();
		return $this->render('index', ['items' => $items]);
	}
	

	public function actionEdit($id) {
		$item=Item::findOne($id);
		if (!$item) {
			throw new \yii\web\NotFoundHttpException('Товар не найден');
		}
		if (isset($_POST['Item'])) {
			$item->attributes=$_POST['Item'];
			if ($item->save()) {
				return $this->redirect(['item/index']);
			}
		}
		return $this->render('add', ['item'=>$item]);
	}
	
	public function actionDelete($id){
		$item=Item::findOne($id);
		if (!$item) {
			throw new \yii\web\NotFoundHttpException('Товар не найден');
		}
		$item->delete();
		return $this->redirect(['item/index']);
	}
	
	public function actionAdd() {
		$item=new Item;
		$item->availability=1;
		if (isset($_POST['Item'])){
			$item->attributes=$_POST['Item'];
			if ($item->save()) {
				return $this->redirect(['item/index']);
			}
			
		}
		return $this->render('add', ['item'=>$item]);
		
	}
}