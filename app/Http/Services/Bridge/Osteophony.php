<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 上午11:51
 */
namespace App\Http\Services\Bridge;

//具体音频实现者 -骨传导音频输出
class Osteophony extends Audio{
    public function output(){
        echo "骨传导输出的声音-----哈哈".PHP_EOL;
    }
}
