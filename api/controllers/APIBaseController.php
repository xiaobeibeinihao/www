<?php
namespace api\controllers;

use Yii;
use yii\rest\ActiveController;


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
        if(YII_DEBUG)
        {
            \Yii::getLogger()->log("app_response_data:",json_encode($arr));
        }
        echo $data;
        \Yii::$app->end();
    }
}
