<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午2:10
 */
namespace App\Http\Services\Template;

abstract class IHook
{
    protected $hook;
    protected $fullCost;
    public function templateMethod($fullCost, $hook)
    {
        $this->fullCost = $fullCost;
        $this->hook = $hook;
        $this->addGoods();
        $this->addShippingHook();
        $this->displayCost();
    }
    protected abstract function addGoods();
    protected abstract function addShippingHook();
    protected abstract function displayCost();
}
