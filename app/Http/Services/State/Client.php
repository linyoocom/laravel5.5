<?php
/**
 * Create By PhpStorm
 * User: Yqing
 * Date: 2020/9/6
 */
namespace App\Http\Services\State;

class Client {
    public static function main(){
        //创建状态
        $state = new ContextState1();
        //创建环境
        $context = new Context();
        //将状态设置到环境中
        $context->setState($state);
        //请求
        $context->request("test");
    }
}