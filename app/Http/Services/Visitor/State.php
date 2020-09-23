<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:16
 */
namespace App\Http\Services\Visitor;

/**
 * 抽象访问者
 * (为该对象结构中具体元素角色声明一个访问操作接口。该操作接口的名字和参数标识了发送访问请求给具体访问者的具体元素角色，
 * 这样访问者就可以通过该元素角色的特定接口直接访问它。)
 * Class State
 * @package App\Http\Services\Visitor
 */
abstract class State
{
    protected $state_name;

    //得到男人反应
    public abstract function GetManAction(VMan $elementM);
    //得到女人反应
    public abstract function GetWomanAction(VWoman $elementW);
}

