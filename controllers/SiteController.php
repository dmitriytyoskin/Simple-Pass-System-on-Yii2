<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->User->isGuest)
        {    
            $role = Users::findOne(Yii::$app->request->get('Users'))->role;
            $newmodel = new Users;
            $newmodel->scenario='login';
            //if model can load get request and User->login is true
            if ($newmodel->load(Yii::$app->request->get()) && $newmodel->login()) 
            {
              if($role == 1) 
              {  
                    if (Yii::$app->request->get('type') == 'auto')
                        $this->redirect(['auto/index']);
                    elseif (Yii::$app->request->get('type') == 'guest')
                        $this->redirect(['pass/index']);
                    else
                        return $this->render('withoutlogin');
              }elseif ($role == 2)

              {
                    if (Yii::$app->request->get('type') == 'auto')
                        {
                            $this->redirect(['auto/admin']);
                            
                        }
                    elseif (Yii::$app->request->get('type') == 'guest')
                        {
                            $this->redirect(['pass/admin']);
                            
                        }
                    else
                        return $this->render('withoutlogin');
              } elseif ($role == 3)
              {
                    if (Yii::$app->request->get('type') == 'auto')
                        {
                            $this->redirect(['auto/disp']);
                        }
                    elseif (Yii::$app->request->get('type') == 'guest')
                        {
                        
                            $this->redirect(['pass/disp']);
                            
                        }
                    else
                        return $this->render('withoutlogin');
              }
              elseif ($role == 4)
              {
                    $this->redirect(['admin/index']); 
              }
              else
              {
                    return $this->goHome();
              }

            }
            else
            {
                
                $model = Users::find()->all();
                return $this->render('index',['model'=>$model, 'newmodel'=>$newmodel]);
            }
        }
        else 
        {
              $role = Users::find()->where(['username'=>Yii::$app->user->identity->username])->one()->role;  
              if($role == 1) 
              {  
                    if (Yii::$app->request->get('type') == 'auto')
                        $this->redirect(['auto/index']);
                    elseif (Yii::$app->request->get('type') == 'guest')
                        $this->redirect(['pass/index']);
                    else
                        return $this->render('withoutlogin');
              }elseif ($role == 2)

              {
                    if (Yii::$app->request->get('type') == 'auto')
                        {
                            $this->redirect(['auto/admin']);
                        }
                    elseif (Yii::$app->request->get('type') == 'guest')
                        {
                            $this->redirect(['pass/admin']);
                        }
                    else
                        return $this->render('withoutlogin');
              } elseif ($role == 3)
              {
                    if (Yii::$app->request->get('type') == 'auto')
                        {
                            $this->redirect(['auto/disp']);
                            
                        }
                    elseif (Yii::$app->request->get('type') == 'guest')
                        {
                            $this->redirect(['pass/disp']);
                            
                        }
                    else
                        return $this->render('withoutlogin');
              }
              elseif ($role == 4)
              {
                    $this->redirect(['admin/index']); 
              }
              else
              {
                    return $this->goHome();
              }


        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
