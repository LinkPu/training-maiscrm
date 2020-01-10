<?php

namespace app\controllers;
use app\models\Articles;
use Yii;
use yii\web\Controller;

class ArticlesController extends Controller {
    function actionTest(){
        echo '123456';
    }

    function actionVisited($id){
        $article = Articles::find()->where(["id" => intval($id)])->one();
        if(!$article){
            echo "There is no article which id = $id";
        }
        $article->visited += 1;
        $article->save();
        return $article;
    }
}
