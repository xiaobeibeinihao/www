<?php
namespace backend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class APIBaseController extends ActiveController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    private $secLevel   = 0;

    protected function apiResponse($data='', $status=0, $msg='ok', $alert_type=1)
    {
        $secLevel = $this->secLevel;
        $arr = array(
            'msg'   => $msg,
            'data'  => $data,
            'status' => $status,
            'alert_type' => $status ? $alert_type : 0,
            'server_time'   => time(),
        );
        //$crypt = new R360appCrypt($this->ukey);
       // $data = $crypt->encode($secLevel,$arr);
        if(Config::$devMode)
        {
            Yii::log("app_response_data:". json_encode($arr));
        }
        echo $data;
        $this->log($status,$msg);
        Yii::app()->end();
    }
}
