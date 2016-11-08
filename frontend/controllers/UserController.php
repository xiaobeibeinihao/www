<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class UserController extends ActiveController
{
    public $modelClass = 'frontend\models\User';
}
