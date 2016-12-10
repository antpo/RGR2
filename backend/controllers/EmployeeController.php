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
use app\models\Employee;
/**
 * Site controller
 */
class EmployeeController extends Controller
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
		$employees=Employee::find()
		->orderBy(['lastname' => SORT_ASC, 'firstname' => SORT_ASC])
		->all ();
		return $this->render('index', ['employees' => $employees]);
	}
	

	public function actionEdit($id) {
		$employee=Employee::findOne($id);
		if (!$employee) {
			throw new \yii\web\NotFoundHttpException('Сотрудник не найден');
		}
		if (isset($_POST['Employee'])) {
			$employee->attributes=$_POST['Employee'];
			if ($employee->save()) {
				return $this->redirect(['employee/index']);
			}
		}
		return $this->render('add', ['employee'=>$employee]);
	}
	
	public function actionDelete($id){
		$employee=Employee::findOne($id);
		if (!$employee) {
			throw new \yii\web\NotFoundHttpException('Сотрудник не найден');
		}
		$employee->delete();
		return $this->redirect(['employee/index']);
	}
	
	public function actionAdd() {
		$employee=new Employee;
		if (isset($_POST['Employee'])){
			$employee->attributes=$_POST['Employee'];
			if ($employee->save()) {
				return $this->redirect(['employee/index']);
			}
			
		}
		return $this->render('add', ['employee'=>$employee]);
		
	}
}