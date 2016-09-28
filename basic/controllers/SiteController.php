<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Offer;
use app\models\RuCity2;
use app\models\Subscibe;

//use DavidePastore\Ipinfo\Ipinfo;

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
        
        $this->metaTagIndex();

        return $this->render('index');
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

        $this->metaTagCalculator();

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
     * Displays city page.
     *
     * @return string
     */
    public function actionCity($id,$payment = null)
    {

        // default value
        $amount = 5000;
        $time = 10;
        //dedault value

        $city  = RuCity2::findOne($id);

        $query = Offer::find()->where(['and',['status' => Offer::ACTIVE],['<=','min_loan',$amount],['>=', 'max_loan', $amount],['<=','min_time',$time],['>=', 'max_time', $time]])->indexBy('id');
        if ($payment != NULL) {
            $query->andWhere(['like','payment', $this->paymentConvert($payment)]);
        }
        $offers = $query->all();
        
        if ($offers != NULL) {
            $calculate_offers = [];
            foreach ($offers as $offer) {
                $calculate_offers[] = $offer->calculate($amount, $time);
            }
        }
        ArrayHelper::multisort($calculate_offers, ['commision'], [SORT_ASC]);

        Yii::$app->view->title = $this->getTitle($city,$payment);

        $this->metaTag($city,$payment);

        
        return $this->render('city',[
                'city' => $city,
                'offers' => $offers,
                'data' => $calculate_offers,
                'amount' => $amount,
                'time' => $time,
                'payment' => $payment,
                'near_cities' => $this->nearbyСities($id),
            ]);
    }

    /**
     * Displays loans page.
     *
     * @return string
     */
    public function actionLoans($payment)
    {

        // default value
        $amount = 5000;
        $time = 10;
        //dedault value

        
        $query = Offer::find()->where(['and',['status' => Offer::ACTIVE],['<=','min_loan',$amount],['>=', 'max_loan', $amount],['<=','min_time',$time],['>=', 'max_time', $time]])->indexBy('id');
        if ($payment != NULL) {
            $query->andWhere(['like','payment', $this->paymentConvert($payment)]);
        }
        $offers = $query->all();
        
        if ($offers != NULL) {
            $calculate_offers = [];
            foreach ($offers as $offer) {
                $calculate_offers[] = $offer->calculate($amount, $time);
            }
        }
        ArrayHelper::multisort($calculate_offers, ['commision'], [SORT_ASC]);

        Yii::$app->view->title = $this->getTitle(null,$payment);

        $this->metaTag(null,$payment);

        

        return $this->render('loans',[
                'offers' => $offers,
                'data' => $calculate_offers,
                'amount' => $amount,
                'time' => $time,
                'payment' => $payment,

            ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $this->metaTagContact();

        $contact = new ContactForm();
        if ($contact->load(Yii::$app->request->post()) && $contact->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'contact' => $contact,
        ]);
    }

    /**
    * calculate offers
    * @return string
    */
    public function actionCalculate()
    {
        
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
    
    /**
    * subscribe
    * @return string
    */
    public function actionSubscribe()
    {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();
              

                if (!isset($post_data)) {
                    $error[] = 'Форма подписки пуста!';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['email'])) {
                    $error[] = 'Email не задан';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);
                }

                if (Subscibe::findOne(['email' => trim($post_data['email'])]) == NULL) {
                    $new_subscribe = new Subscibe();
                    $new_subscribe->email = trim($post_data['email']);
                    if ($new_subscribe->save()) {
                        $info[] = 'Спасибо за подписку!';
                        return $this->renderAjax('result',[
                            'info' => $info,
                        ]);   

                    }else{
                        foreach ($new_subscribe->getErrors() as $item) {
                            $error[] = $item[0];
                        }
                        return $this->renderAjax('_error', [
                            'error' => $error,
                        ]);
                    }
                }else{
                    $error[] = 'Email уже добавлен';
                    return $this->renderAjax('result',[
                            'error' => $error,
                        ]);   
                }
                
                
                
            }   
                
        
        
    }
    
    public function actionAutocompleteCity()
    {
        if(Yii::$app->request->isAjax){
            $get_data = Yii::$app->request->get();   

            $result = RuCity2::find()->where(['like','name',$get_data['q']])->limit(10)->all();

            $resp = [];
            if ($result != NULL) {
                $n_res = 0;
                foreach ($result as $item) {
                    $resp[$n_res]['value'] = $item->id;
                    if ($item->district == $item->region) {
                        $resp[$n_res]['label'] = $item->name.' / '.$item->district;    
                    }else{
                        $resp[$n_res]['label'] = $item->name.' / '.$item->district.' / '.$item->region;    
                    }
                    $n_res++;
                }
            }
            return json_encode($resp);
        }
    }

    public function actionGo($url)
    {
        return $this->redirect($url);
    }

    public function getIp()
    {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function IpData()
    {
        //$ip = getIp();
        $ip = '82.208.101.208';

        $ipInfo = new Ipinfo();
        $host = $ipInfo->getIpGeoDetails($ip);

        //var_dump($host);
        //die();
        /*$ip_from_base = ipFromBase($ip);
        if ($ip_from_base == null) {
            $ipInfo = new Ipinfo();
            $host = $ipInfo->getIpGeoDetails()($ip);
            $properties = $host->getProperties();
            saveIpData($properties);
            return $properties;
        }else{
            if (isset($ip_from_base[0])) {
                return $ip_from_base[0];
            }
            
        }*/
    }
    
    /**
     * [getTitle description]
     * @param  [type] $city    [description]
     * @param  [type] $payment [description]
     * @return [type]          [description]
     */
    public function getTitle($city = null, $payment = null)
    {
        if ($city != NULL && $payment != NULL) {
            $payments = $this->payments();
            if ($payment == $payments['card']) {
                return 'Займы онлайн на карту '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['account']) {
                return 'Займы онлайн на банковский счет '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['contact']) {
                return 'Займы через систему контакт '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['qiwi']) {
                return 'Займы онлайн на киви '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['yandex']) {
                return 'Займ на яндекс деньги '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['webmoney']) {
                return 'Займ на вебмани '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['cash']) {
                return 'Срочный займ наличными '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['unistream']) {
                return 'Займ через систему юнистрим '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['corn']) {
                return 'Займ на карту кукуруза онлайн '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['gold']) {
                return 'Займ через систему золотая корона '.$this->cityNameTitle($city);
            }
            if ($payment == $payments['leader']) {
                return 'Займы через систему лидер '.$this->cityNameTitle($city);
            }


        }
        if ($city != NULL && $payment == NULL) {
            return 'Займы онлайн '.$this->cityNameTitle($city);
        }
        if ($city == NULL && $payment != NULL) {
            return $this->paymentNameTitle($payment);
        }
        
    }

    /**
    *
    * @param model $city
    * @return string
    *
    */
    public function cityNameTitle($city)
    {
        if ($city->district == $city->region) {
            return $city->name.' / '.$city->district;
        }else{
            return $city->name.' / '.$city->district.' / '.$city->region;
        }
    }

    /**
    *
    * @param model $city
    * @return string
    *
    */
    public function cityNameDescription($city)
    {
        if ($city->district == $city->region) {
            return $city->name.', '.$city->district;
        }else{
            return $city->name.', '.$city->district.', '.$city->region;
        }
    }

    /**
    *
    * @param model $city
    * @return string
    *
    */
    public function cityNameKeywords($city)
    {
        if ($city->district == $city->region) {
            return mb_strtolower($city->name.' '.$city->district);
        }else{
            return mb_strtolower($city->name.' '.$city->district.' '.$city->region);
        }
    }

    /**
    *
    * @param model $city
    * @param string $payment
    *
    */
    public function metaTag($city = null,$payment = null)
    {
        if ($city != NULL && $payment != NULL) {
            $payments = $this->payments();
            if ($payment == $payments['card']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на карту '.$this->cityNameDescription($city).'. Мгновенный займ на карту '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы онлайн на карту '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на карту '.$this->cityNameDescription($city).'. Мгновенный займ на карту '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['account']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на банковский счет '.$this->cityNameDescription($city).'. Займ на банковский счет мгновенно круглосуточно '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы банковский счет мгновенно круглосуточно '.$this->cityNameKeywords($city),

                    ]
                );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на банковский счет '.$this->cityNameDescription($city).'. Займ на банковский счет мгновенно круглосуточно '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['contact']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы через систему контакт '.$this->cityNameDescription($city).'. Займы онлайн без отказа через контакт '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы через систему контакт '.$this->cityNameKeywords($city),

                    ]
                );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы через систему контакт '.$this->cityNameDescription($city).'. Займы онлайн без отказа через контакт '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['qiwi']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на киви '.$this->cityNameDescription($city).'. Займы онлайн +на киви кошелек без отказов '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы онлайн на киви '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на киви '.$this->cityNameDescription($city).'. Займы онлайн +на киви кошелек без отказов '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['yandex']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на яндекс деньги '.$this->cityNameDescription($city).'. Займ срочно яндекс деньги без отказа '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ на яндекс деньги '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на яндекс деньги '.$this->cityNameDescription($city).'. Займ срочно яндекс деньги без отказа '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['webmoney']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на вебмани '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'Займ на вебмани '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на вебмани '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['cash']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Срочный займ наличными '.$this->cityNameDescription($city).'. Займы наличными +по паспорту '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'срочный займ наличными '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Срочный займ наличными '.$this->cityNameDescription($city).'. Займы наличными +по паспорту '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['unistream']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ через систему юнистрим '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ через систему юнистрим '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ через систему юнистрим '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['corn']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на карту кукуруза онлайн '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ на карту кукуруза онлайн '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на карту кукуруза онлайн '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['gold']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ через систему золотая корона '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ через систему золотая корона '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ через систему золотая корона '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['leader']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы через систему лидер '.$this->cityNameDescription($city).'.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы через систему лидер '.$this->cityNameKeywords($city),

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы через систему лидер '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id,'payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
        }
        if ($city != NULL && $payment == NULL) {
            Yii::$app->view->registerMetaTag(
                [
                    'name' => 'description',
                    'content' => 'Займы онлайн '.$this->cityNameDescription($city).'. Экспресс заем '.$this->cityNameDescription($city).'.',

                ]
            );
            Yii::$app->view->registerMetaTag(
                [
                    'name' => 'keywords',
                    'content' => 'займы онлайн '.$this->cityNameKeywords($city),

                ]
            );
            Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн '.$this->cityNameDescription($city).'. Экспресс заем '.$this->cityNameDescription($city).'.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/city','id'=> $city->id],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );    
        }
        if ($city == NULL && $payment != NULL) {
            $payments = $this->payments();
            if ($payment == $payments['card']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на карту.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы онлайн на карту',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на карту.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['account']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на банковский счет.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы банковский счет мгновенно круглосуточно',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на банковский счет.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['contact']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы через систему контакт.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы через систему контакт',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы через систему контакт.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['qiwi']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы онлайн на киви.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы онлайн на киви',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы онлайн на киви.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['yandex']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на яндекс деньги.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ на яндекс деньги',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на яндекс деньги.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['webmoney']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на вебмани.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'Займ на вебмани',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на вебмани.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['cash']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Срочный займ наличными.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'срочный займ наличными',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Срочный займ наличными.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['unistream']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ через систему юнистрим.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ через систему юнистрим',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ через систему юнистрим.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['corn']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ на карту кукуруза онлайн.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ на карту кукуруза онлайн',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ на карту кукуруза онлайн.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['gold']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займ через систему золотая корона.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займ через систему золотая корона',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займ через систему золотая корона.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
            if ($payment == $payments['leader']) {
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' => 'Займы через систему лидер.',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'name' => 'keywords',
                        'content' => 'займы через систему лидер',

                    ]
                );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:title',
                        'content' => Yii::$app->view->title,

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:description',
                        'content' => 'Займы через систему лидер.',

                            ]
                    );
                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:url',
                        'content' => Url::to(['site/loans','payment' => $payment],true),

                            ]
                    );

                Yii::$app->view->registerMetaTag(
                    [
                        'property' => 'og:image',
                        'content' => Url::to('/images/logo.png', true),

                            ]
                    );
            }
        }
        
    }

    /**
    *
    * @param string $payment
    * @return string
    *
    */
    public function paymentConvert($payment)
    {
        $payments = $this->payments();
        if ($payment == $payments['card']) {
            return 'visa';
        }
        if ($payment == $payments['account']) {
            return 'счет';
        }
        if ($payment == $payments['contact']) {
            return 'contact';
        }
        if ($payment == $payments['qiwi']) {
            return 'qiwi';
        }
        if ($payment == $payments['yandex']) {
            return 'яндекс';
        }
        if ($payment == $payments['webmoney']) {
            return 'webmoney';
        }
        if ($payment == $payments['cash']) {
            return 'наличные';
        }
        if ($payment == $payments['unistream']) {
            return 'unistream';
        }
        if ($payment == $payments['corn']) {
            return 'кукуруза';
        }
        if ($payment == $payments['gold']) {
            return 'корона';
        }
        if ($payment == $payments['leader']) {
            return 'лидер';
        }
    }

    /**
    *
    * @param string $payment
    * @return string
    *
    */
    public function paymentNameTitle($payment)
    {
        $payments = $this->payments();
        if ($payment == $payments['card']) {
            return 'Займы онлайн на карту';
        }
        if ($payment == $payments['account']) {
            return 'Займы онлайн на банковский счет';
        }
        if ($payment == $payments['contact']) {
            return 'Займы через систему контакт';
        }
        if ($payment == $payments['qiwi']) {
            return 'Займы онлайн на киви';
        }
        if ($payment == $payments['yandex']) {
            return 'Займ на яндекс деньги';
        }
        if ($payment == $payments['webmoney']) {
            return 'Займ на вебмани';
        }
        if ($payment == $payments['cash']) {
            return 'Срочный займ наличными';
        }
        if ($payment == $payments['unistream']) {
            return 'Займ через систему юнистрим';
        }
        if ($payment == $payments['corn']) {
            return 'Займ на карту кукуруза онлайн';
        }
        if ($payment == $payments['gold']) {
            return 'Займ через систему золотая корона';
        }
        if ($payment == $payments['leader']) {
            return 'Займы через систему лидер';
        }
    }

    /**
    * @return array
    */
    public function payments()
    {
        return [
            'card' => 'card',
            'account' => 'account',
            'contact' => 'contact',
            'qiwi' => 'qiwi',
            'yandex' => 'yandex',
            'webmoney' => 'webmoney',
            'cash' => 'cash',
            'corn' => 'corn',
            'gold' => 'gold',
            'leader' => 'leader',
            'unistream' => 'unistream'
        ];
    }


    /**
    *
    * @param integer $id
    * @return array
    */
    public function nearbyСities($id)
    {
        $max = $id + 6;
        $min = $id - 6;
        return RuCity2::find()
            ->where('id < :max AND id > :min AND id != :cid',
                [
                    'cid' => $id, 'min' => $min, 'max' => $max,
                ]
            )
            ->limit(10)
            ->all();

    }

    public function metaTagIndex()
    {
        Yii::$app->view->title = "Экспрерт на рынке микрофинансирования.";

        Yii::$app->view->registerMetaTag(
            [
                'name' => 'description',
                'content' => 'Экспрерт на рынке микрофинансирования. Мы собрали все лущшие предложения МФО и отфильтровали по вашим запросам.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'name' => 'keywords',
                'content' => 'займы онлайн, займы на карту, займы на банковский счет, займы на киви, займы на яндекс деньги',

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:title',
                'content' => Yii::$app->view->title,

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:description',
                'content' => 'Экспрерт на рынке микрофинансирования. Мы собрали все лущшие предложения МФО и отфильтровали по вашим запросам.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:url',
                'content' => Url::home(true),

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:image',
                'content' => Url::to('/images/logo.png', true),

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'name' => 'yandex-verification',
                'content' => '7c0cd0d864c795ca',

                    ]
            );
    }

    public function metaTagCalculator()
    {
        Yii::$app->view->title = "Калькулятор займа, расчитать займ";

        Yii::$app->view->registerMetaTag(
            [
                'name' => 'description',
                'content' => 'Быберите сумму и срок займа и мы подберем для вас лучшие предложения!.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'name' => 'keywords',
                'content' => 'калькулятор займа, расчитать займ',

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:title',
                'content' => Yii::$app->view->title,

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:description',
                'content' => 'Быберите сумму и срок займа и мы подберем для вас лучшие предложения!.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:url',
                'content' => Url::to(['site/calculator'],true),

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:image',
                'content' => Url::to('/images/logo.png', true),

                    ]
            );
    }

    public function metaTagContact()
    {
        Yii::$app->view->title = "Контакты";

        Yii::$app->view->registerMetaTag(
            [
                'name' => 'description',
                'content' => 'Свяжитесь с нами, и мы сможем подобрать самое выгодное предложение.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'name' => 'keywords',
                'content' => 'контакты',

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:title',
                'content' => Yii::$app->view->title,

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:description',
                'content' => 'Свяжитесь с нами, и мы сможем подобрать самое выгодное предложение.',

                    ]
            );
        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:url',
                'content' => Url::to(['site/contact'],true),

                    ]
            );

        Yii::$app->view->registerMetaTag(
            [
                'property' => 'og:image',
                'content' => Url::to('/images/logo.png', true),

                    ]
            );
    }

}
