<?php

class Base {
    public function sayHello(){
        echo "Hello ";
    }
}

trait SayWorld {
    public function sayHello(){
        parent::sayHello();
        echo "World!";
    }
}

class MyHelloWorld extends Base{
    use SayWorld;
    // public function sayHello(){
    //     echo "hahaha";
    // }
}

$hello = new MyHelloWorld();
$hello->sayHello();
// exit();

// trait冲突解决
trait A{
    // 定义抽象方法
    abstract function getWorld();

    public function smallTalk(){
        echo "a";
    }

    public function bigTalk(){
        echo "A";
    }
}

trait B{
    public function smallTalk(){
        echo "b";
    }

    public function bigTalk(){
        echo "B";
    }
}

class AliasedTalker{
    use A, B{
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }

    public function getWorld(){
        return "World";
    }
}

$obj = new AliasedTalker();
$obj->smallTalk();
$obj->bigTalk();
$obj->talk();
