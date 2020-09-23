<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午2:12
 */
namespace App\Http\Services\Template;

/**
 * 模板方法-设计模式
 * 模式中使用了一个类方法templateMethod(), 该方法是抽象类中的一个具体方法, 这个方法的作用是对抽象方法序列排序,具体实现留给具体类来完成
 * Class Client
 * @package App\Http\Services\Template
 */
class Client
{
    private $totalCost;
    private $hook;
    public function __construct($goodsTotal)
    {
        $this->totalCost = $goodsTotal;
        $this->hook = $this->totalCost >= 200;
        $concrete = new Concrete();
        $concrete->templateMethod($this->totalCost, $this->hook);
    }
}
