<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午6:11
 */
namespace App\Http\Services\Proxy;

class RealSubject implements Subject{
    private $name;

    function __construct($name){
        $this->name = $name;
    }

    function say(){
        echo $this->name."在吃饭<br>";
    }
    function run(){
        echo $this->name."在跑步<br>";
    }
}
