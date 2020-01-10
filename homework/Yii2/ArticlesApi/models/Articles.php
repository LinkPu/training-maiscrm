<?php

namespace app\models;
use yii\mongodb\ActiveRecord;


class Articles extends ActiveRecord{

    public static function collectionName()
    {
        return ['homework', 'article'];
    }

    public function attributes()
    {
        return [
            '_id',
            'id',
            'visited'
        ];
    }

    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'id' => 'Id',
            'visited' => 'Visited'
        ];
    }
}
