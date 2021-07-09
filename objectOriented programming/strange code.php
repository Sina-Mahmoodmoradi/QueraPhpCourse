<?php

class Foo
{
    protected $x;
    function __construct()
    {
        $this->x=0;
    }
    public function __SET($x,$value)
    {
        if($x=='x'){
            if($value>=0){
                $this->x=substr((string)$value,-2);
            }else{
                $this->x=-1;
            }
        }
    }
    public function __GET($x){
        if($x=='x'){
            return $this->x;
        }
    }
    public function __call($name,$arg){
        if($name='')
    }

}

$p = new Foo();

echo $p->getX(); // 0

$p->x = 125;
echo $p->getX(); // 25

$p->x = 15874;
echo $p->getX(); // 74

$p->x = 8;
echo $p->getX(); // 8

$p->x = 13;
echo $p->getX(); // 13

$p->x = -15698;
echo $p->getX(); // -1
