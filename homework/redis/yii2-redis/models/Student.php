<?php

namespace app\models;
use \yii\redis\ActiveRecord;


class Student extends ActiveRecord{
    public static function primaryKey()
    {
        return ['id'];
    }

    public function attributes()
    {
        return ['id', 'name', 'age', 'tickets'];
    }
}
