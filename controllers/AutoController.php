<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Auto;

class AutoController extends Controller
{
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','admin','disp','add'],
                'rules' => [
                    [
                        'actions' => ['index','add'],
                        'allow' => true,
                        'roles' => ['engineer'],
                    ],
                    [
                        'actions' => ['admin'],
                        'allow' => true,
                        'roles' => ['superviser'],
                    ],
                    [
                        'actions' => ['disp'],
                        'allow' => true,
                        'roles' => ['dispatcher'],
                    ],


                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

	public function actionIndex()
	{
		$model = new Auto();
		if($model->load(Yii::$app->request->post()))
		{
			$model->approved=false;
			$model->done = false;
			$model->save();
		}

		$data = Auto::find()->all();
		return $this->render('index',['data'=>$data]);
	}
	public function actionAdd()
	{
		$model = new Auto;
		return $this->render('add',['model'=>$model]);
	}
	public function actionAdmin() 
	{
		$data = Auto::find()->all();
		return $this->render('admin',['data'=>$data]);
	
	}
	public function actionAjax() 
	{
		$id = $_GET['id'];
		$data = Auto::find()->where(['id'=>$id])->one();
		$data->approved = !$data->approved;
		$data->save();
		if ($data->approved)
		{
		echo "<tr id='" . $data->id . "' class='success'>";
		echo "<td>" . $data->name . "</td>";
		echo "<td>" . $data->licence . "</td>";
		echo "<td>" . $data->carnum . "</td>";
		echo "<td>";
		echo "ДА";
		echo "</td>";
		echo "</tr>";
		}
		else
		{
		echo "<tr id='" . $data->id . "' class='danger'>";
		echo "<td>" . $data->name . "</td>";
		echo "<td>" . $data->licence . "</td>";
		echo "<td>" . $data->carnum . "</td>";
		echo "<td>";
		echo "НЕТ";
		echo "</td>";
		echo "</tr>";
		}  		
	}
	public function actionDisp()
	{
		if (Yii::$app->request->get('id'))
		{
			$done = Auto::find()->where(['id'=>Yii::$app->request->get('id')])->one();
			$done->done = true;
			$done->save();
		}
		$data = Auto::find()->where(['done'=>false])->all();
		return $this->render('disp',['data'=>$data]);	
	}
}