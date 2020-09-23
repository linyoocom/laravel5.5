<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:18
 */
namespace App\Http\Services\Visitor;

/**
 * 抽象人
 * 定义一个接受访问操作accept()，它以一个访问者作为参数。
 * Class Person
 * @package App\Http\Services\Visitor
 */
abstract class Person
{
    public $type_name;

    public abstract function Accept(State $visitor);
}

