<?php

namespace app\controllers;
use app\models\Student;
use Exception;
use Yii;
use yii\web\Controller;

class StudentController extends Controller {
    function actionCreation(){
        $upper = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $lower = "qwertyuiopasdfghjklzxcvbnm";
        for($i = 0; $i < 10; $i ++){
            $nameLength = mt_rand(4, 10);
            $firstChar = $this.randomChoice($upper);
            $name = $firstChar.$this->randomChoice($lower, $nameLength - 1);
            $student = new Student();
            $student->name = $name;
            $student->age = mt_rand(20,30);
            $student->tickets = mt_rand(0,20);
            $student->save();
        }
        return true;
    }

    function randomChoice($str, $length=1){
        $strLen = strlen($str);
        if ($strLen == 0){
            throw new Exception('Str could not be empty.');
        }
        else if (!is_string($str)){
            throw new Exception('Must pass in a string.');
        }
        $result = '';
        for ($i=0; $i<$length; $i++){
            $result = $result.substr($str, mt_rand(0, $strLen-1), 1);
        }
        return $result;
    }

    function actionReader(){
        $result = Student::find()->orderBy('tickets')->all();
        return $result;
    }
}
