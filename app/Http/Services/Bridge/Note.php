<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 上午11:48
 */
namespace App\Http\Services\Bridge;

//具体手机
class Note extends MiPhone{
    //语音输出功能
    public function output(){
        $this->_audio->output();
    }
}
