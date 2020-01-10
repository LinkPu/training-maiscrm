<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $behaviors = parent::behaviors();
        if (!parent::beforeAction($action)) {
            return false;
        }
        $behaviors['corsFilter'] = [
          'class' => \yii\filters\Cors::className(),
        ];
        # 处理跨域和 OPTIONS 请求问题
        $response = Yii::$app->getResponse();
        $response->getHeaders()->set('Access-Control-Allow-Origin', '*');
        $response->getHeaders()->set('Access-Control-Allow-Methods', 'POST,GET,PUT,PATCH,DELETE,OPTIONS');
        $response->getHeaders()->set('Access-Control-Allow-Headers', 'x-requested-with,content-type');
        if (Yii::$app->request->isOptions) { # 统一处理 options 请求
            $response->data = 'options';
            $response->send();
            Yii::$app->end();
        }
        return $behaviors;
    }
}
