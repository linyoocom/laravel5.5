<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午2:11
 */
namespace App\Http\Services\Template;

class Concrete extends IHook
{
    protected function addGoods()
    {
        $this->fullCost = $this->fullCost * 0.8;
    }
    protected function addShippingHook()
    {
        if(!$this->hook)
        {
            $this->fullCost += 12.95;
        }
    }
    protected function displayCost()
    {
        echo "您需要支付: " . $this->fullCost . '元<br />';
    }
}
