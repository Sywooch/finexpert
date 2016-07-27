<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use app\models\AuthRule;
use app\models\AuthItem;
use app\models\Offer;
use app\models\UploadForm;


class RladminController extends Controller
{
    public $layout = 'admin';


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'users', 'roles', 'create-role', 'assign-role','logout','login', 'offers', 'load-form-new-offer', 'save-new-offer', 'load-form-edit-offer', 'save-offer', 'load-form-edit-logo', 'save-logo', 'reload-list-offer'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                        
                    ],
                    [
                        'actions' => ['index','users', 'roles', 'create-role', 'assign-role', 'offers', 'load-form-new-offer', 'save-new-offer', 'load-form-edit-offer', 'save-offer', 'load-form-edit-logo', 'save-logo', 'reload-list-offer'],
                        'allow' => true,
                        'roles' => ['admin'],
                        'ips' => ['127.0.0.1','82.208.100.67'],
                    ],

                ],
                
                'denyCallback' => function ($rule, $action) {
                    if (!Yii::$app->user->isGuest) {
                        throw new \Exception('You are not allowed to access this page');
                    }else{
                        return $action->controller->redirect('login');    
                    }
                    
                }
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
        if (!Yii::$app->user->isGuest) {
            //var_dump(Yii::$app->request->userIP);
            //die();
            return $this->render('index');
        }else{
            return $this->redirect('login');
        }
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('index');
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    /*public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('login');
    }

    /**
    *
    * Users action
    * @return string
    */
    public function actionUsers()
    {
        $users = User::find()->all();
        
        return $this->render('users',[
                'users' => $users,

            ]);
    }

    /**
    *
    * Roles action
    * @return string
    */
    public function actionRoles()
    {
        $roles = AuthItem::find()->all();
        
        return $this->render('roles',[
                'roles' => $roles,

            ]);
    }

    /**
    * Create role action
    * @return string
    */
    public function actionCreateRole()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['name']) || !isset($post_data)) {
                    $error[] = 'The name or desciption is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $role = Yii::$app->authManager->createRole(trim($post_data['name']));
                $role->description = trim($post_data['data']);
                Yii::$app->authManager->add($role);

                return $this->renderAjax('role/table/_roles',[
                    'roles' => AuthItem::find()->all(),
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }
    
    /**
    * Assign role action
    * @return string
    */
    public function actionAssignRole()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();
                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                

                if (!isset($post_data['user'])) {
                    $error[] = 'The user is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $user = User::findOne($post_data['user']);

                if ($user == NULL) {
                    $error[] = 'The user is not found!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                Yii::$app->authManager->revokeAll($user->id);
                if (isset($post_data['roles'])) {
                    foreach ($post_data['roles'] as $roleName) {
                        $role = Yii::$app->authManager->getRole($roleName);
                        Yii::$app->authManager->assign($role, $user->id);    
                    }
                }
                
                

                $info[] = 'The roles is saved';

                return $this->renderAjax('info',[
                    'info' => $info,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
    *
    * Offers action
    * @return string
    */
    public function actionOffers()
    {
        $offers = Offer::find()->all();
        
        return $this->render('offers',[
                'offers' => $offers,

            ]);
    }
    
    /**
    * Load form new offer
    * @return string
    */
    public function actionLoadFormNewOffer()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                

                return $this->renderAjax('offer/modal/form/_new_form',[
                    
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }
    
    /**
    * Save new offer
    * @return string
    */
    public function actionSaveNewOffer()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['Offer'])) {
                    $error[] = 'The Offer data is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $new_offer = new Offer();
                if ($new_offer->load($post_data) && $new_offer->save()) {
                    $info[] = 'The new offer is saved';
                }else{
                    $error[] = 'The offer is not saved';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }
                return $this->renderAjax('info',[
                        'info' => $info,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }
    
    /**
    * Re-Load list of offers
    * @return string
    */
    public function actionReloadListOffer()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                

                return $this->renderAjax('offer/table/_list',[
                        'offers' => Offer::find()->all(),
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
    * Load form edit offer
    * @return string
    */
    public function actionLoadFormEditOffer()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();
                
                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['offer'])) {
                    $error[] = 'The offer is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $offer = Offer::findOne($post_data['offer']);

                if ($offer == NULL) {
                    $error[] = 'The offer is NULL';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }
                

                return $this->renderAjax('offer/modal/form/_edit_form',[
                        'offer' => $offer,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
    * Save offer
    * @return string
    */
    public function actionSaveOffer()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['Offer'])) {
                    $error[] = 'The Offer data is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['offer'])) {
                    $error[] = 'The offer is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $offer = Offer::findOne($post_data['offer']);
                if ($offer == NULL) {
                    $error[] = 'The offer is NULL';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if ($offer->load($post_data) && $offer->save()) {
                    $info[] = 'The offer is saved';
                }else{
                    $error[] = 'The offer is not saved';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }
                return $this->renderAjax('info',[
                        'info' => $info,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
    * Load form edit logo
    * @return string
    */
    public function actionLoadFormEditLogo()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();
                
                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                if (!isset($post_data['offer'])) {
                    $error[] = 'The offer is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $offer = Offer::findOne($post_data['offer']);

                if ($offer == NULL) {
                    $error[] = 'The offer is NULL';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }
                

                return $this->renderAjax('offer/modal/form/_load_logo',[
                        'offer' => $offer,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
    * Save logo
    * @return string
    */
    public function actionSaveLogo()
    {
        if (!\Yii::$app->user->isGuest) {
            if(Yii::$app->request->isAjax){
                $error = [];
                $info = [];
                
                $post_data = Yii::$app->request->post();

               
                if (!isset($post_data)) {
                    $error[] = 'The POST DATA is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                
                if (!isset($post_data['offer'])) {
                    $error[] = 'The offer is not set!';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $offer = Offer::findOne($post_data['offer']);
                if ($offer == NULL) {
                    $error[] = 'The offer is NULL';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                $model = new UploadForm();

                $model->imageFile = UploadedFile::getInstanceByName('imageFiles');

                if ($model->upload($offer->id)) {
                    $info[] = 'The logo is saved';
                }else{
                    $error[] = 'The logo is not saved';
                    return $this->renderAjax('error',[
                            'error' => $error,
                        ]);
                }

                                
                return $this->renderAjax('info',[
                        'info' => $info,
                    ]);
            }   
                
        }
        else{
            return $this->redirect(['index']);
        }
    }
}
