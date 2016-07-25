<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use app\models\AuthRule;
use app\models\AuthItem;

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
                        'actions' => ['index', 'users', 'roles', 'create-role', 'assign-role'],
                        'allow' => true,
                        'roles' => ['admin'],
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
        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }else{
            return $this->redirect('rladmin/login');
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

        return $this->goHome();
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
}
