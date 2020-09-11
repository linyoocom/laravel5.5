<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 上午11:44
 */
namespace App\Http\Services\Bridge;

//抽象化角色
abstract class MiPhone{
    protected $_audio;      //存放音频软件对象
    abstract function output();
    public function __construct(Audio $audio){
        $this->_audio = $audio;
    }
}
