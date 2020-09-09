<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 */
namespace App\Http\Services\Strategy;


class contextStrategy
{
    private $item;

    function getItem($item_name)
    {
        try {
            $class = new ReflectionClass($item_name);
            $this->item = $class->newInstance();
        } catch (ReflectionException $e) {
            $this->item = "";
        }
    }

    function inertiaRotate()
    {
        $this->item->inertiaRotate();
    }

    function unInertisRotate()
    {
        $this->item->unInertisRotate();
    }
}
/**
 * 缺点：

1、客户端必须知道所有的策略类，并自行决定使用哪一个策略类。

这就意味着客户端必须理解这些算法的区别，以便适时选择恰当的算法类。换言之，策略模式只适用于客户端知道所有的算法或行为的情况。

2、 策略模式造成很多的策略类，每个具体策略类都会产生一个新类。

有时候可以通过把依赖于环境的状态保存到客户端里面，而将策略类设计成可共享的，这样策略类实例可以被不同客户端使用。换言之，可以使用享元模式来减少对象的数量。

 */
