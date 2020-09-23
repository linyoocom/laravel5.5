<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午1:41
 */
namespace App\Http\Services\Intermediary;

//中介者接口：可以是公共的方法，如Change方法，也可以是小范围的交互方法。
//同事类定义：比如，每个具体同事类都应该知道中介者对象，也就是每个同事对象都会持有中介者对象的引用，这个功能可定义在这个类中。

//抽象国家
abstract class Country
{
    protected $mediator;
    public function __construct(UnitedNations $_mediator)
    {
        $this->mediator = $_mediator;
    }
}
