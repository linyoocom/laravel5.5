<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午6:10
 */
namespace App\Http\Services\Proxy;

class Proxy implements Subject{
    private $realSubject = null;
    public function __construct(RealSubject $realSubject = null){
        if(empty($realSubject)){
            $this->realSubject = new RealSubject();
        }else{
            $this->realSubject = $realSubject;
        }
    }
    public function say(){
        $this->realSubject->say();
    }
    public function run(){
        $this->realSubject->run();
    }
}
