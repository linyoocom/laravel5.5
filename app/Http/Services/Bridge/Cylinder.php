<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 上午11:51
 */
namespace App\Http\Services\Bridge;

//具体音频实现者 -骨传导音频输出
class Cylinder extends Audio{
    public function output(){
        echo "声筒输出的声音-----呵呵".PHP_EOL;
    }
}
