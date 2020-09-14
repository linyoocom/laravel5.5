<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午1:44
 */
namespace App\Http\Services\Intermediary;

//抽象中介者
//抽象联合国机构
abstract class UnitedNations
{
    //声明
    public abstract function Declared($message,Country $colleague);
}
