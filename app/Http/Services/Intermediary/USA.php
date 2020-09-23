<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午1:42
 */
namespace App\Http\Services\Intermediary;

//具体国家类
//美国
class USA extends Country
{
    function __construct(UnitedNations $mediator)
    {
        parent::__construct($mediator);
    }

    //声明
    public function Declared($message)
    {
        $this->mediator->Declared($message,$this);
    }

    //获得消息
    public function GetMessage($message)
    {
        echo "美国获得对方消息：$message<br/>";
    }
}
