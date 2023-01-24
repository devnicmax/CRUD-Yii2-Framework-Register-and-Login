<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use yii\helpers\Url;



class SiteController extends Controller
{

    public $layout = "base";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->redirect('index.php?r=task/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */


     public function actionSignup() 
     {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Se ha registrado correctamente.');
            return $this->goHome();
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Redirect login action.
     *
     * @return Redirect
     */

     public function actionLogin()
     {
        return $this->redirect('site/index');
     }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    
}
