<?php
class Outer{
    private $prop1 = 1;
    protected $prop2 = 2;

    protected function func1(){
        return 3;
    }

    public function func2(){
        return new class($this->prop1) extends Outer{
            // 通过传参获取外部类的 private 属性，通过继承获取外部类的 protected 属性
            private $prop3;

            public function __construct($prop1){
                $this->prop3 = $prop1;
            }

            public function func3(){
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}

echo (new Outer())->func2()->func3();
echo PHP_EOL;

function anonymous(){
    return new class{
        public $prop1;
    };
}

if(get_class(anonymous()) === get_class(anonymous())){
    echo "same class";
}
else{
    echo "different class";
}

echo PHP_EOL;

$test = anonymous();
$test->prop1 = 1;
if(anonymous() == $test){
    echo "singleton";
} else {
    echo "not singleton";
}
