<?php
/**
 * Created by PhpStorm.
 * User: cuikuangye
 * Date: 2016/11/8
 * Time: 15:41
 */
namespace backend\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'api\models\User';
}