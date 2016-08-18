<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Offer;

class SiteController extends Controller
{
        public $layout = 'user';
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
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

    

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
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

    /**
     * Displays calculator page.
     *
     * @return string
     */
    public function actionCalculator()
    {

        // default value
        $amount = 5000;
        $time = 10;
        //dedault value

        $offers = Offer::find()->where(['and',['status' => Offer::ACTIVE],['<=','min_loan',$amount],['>=', 'max_loan', $amount],['<=','min_time',$time],['>=', 'max_time', $time]])->indexBy('id')->all();
        
        if ($offers != NULL) {
            $calculate_offers = [];
            foreach ($offers as $offer) {
                $calculate_offers[] = $offer->calculate($amount, $time);
            }
        }
        ArrayHelper::multisort($calculate_offers, ['commision'], [SORT_ASC]);
        return $this->render('calculator',[
                'offers' => $offers,
                'data' => $calculate_offers,
                'amount' => $amount,
                'time' => $time,
            ]);
    }

    /**
    * calculate offers
    * @return string
    */
    public function actionCalculate()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();
              

                if (!isset($post_data)) {
                    $error[] = 'Данные для расчета не заданы';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['amount'])) {
                    $error[] = 'Размер займа не задан';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['time'])) {
                    $error[] = 'Срок займа не задан';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);
                }

                $query = Offer::find()->where(['and',['status' => Offer::ACTIVE],['<=','min_loan',(int)$post_data['amount']],['>=', 'max_loan', (int)$post_data['amount']],['<=','min_time',(int)$post_data['time']],['>=', 'max_time', (int)$post_data['time']]])->indexBy('id');
                if ($post_data['payment'] != NULL) {
                    $query->andWhere(['like','payment', trim($post_data['payment'])]);
                }
                if ($post_data['age'] != NULL) {
                    $query->andWhere(['and',['<=','min_age', (int)$post_data['age']],['>=', 'max_age', (int)$post_data['age']]]);
                }

                $offers = $query->all();
                
                if ($offers != NULL) {
                    $calculate_offers = [];
                    foreach ($offers as $offer) {
                        $calculate_offers[] = $offer->calculate((int)$post_data['amount'], (int)$post_data['time']);

                    }
                }
                ArrayHelper::multisort($calculate_offers, ['commision'], [SORT_ASC]);
                return $this->renderAjax('calculator/_offers',[
                        'offers' => $offers,
                        'data' => $calculate_offers,
                        'amount' => $post_data['amount'],
                        'time' => $post_data['time'],
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }
}
