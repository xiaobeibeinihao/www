<?php
/**
 * Created by PhpStorm.
 * User: cuikuangye
 * Date: 2016/11/8
 * Time: 11:50
 */

namespace backend\controllers;


class SmallLoansController extends APIBaseController
{

    public function actionIndex()
    {
        header('Content-Type: application/json; charset=utf-8');
        $platform = \Yii::$app->request->getParam('platform');
        $intPageNum = intval(\Yii::$app->request->getParam('page_num',0));
        $intPageSize = intval(\Yii::$app->request->getParam('page_size',20));
        $intPageNum = $intPageNum>1 ? $intPageNum : 1;

        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        //valid signature , option
        if($this->checkSignature($signature,$timestamp,$nonce)){
            echo $echoStr;
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
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
}