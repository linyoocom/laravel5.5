<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:21
 */
namespace App\Http\Services\Visitor;

//失败状态
class Failure extends State
{
    public function __construct()
    {
        $this->state_name="失败";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，闷头喝酒，谁也不用劝。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，眼泪汪汪，谁也劝不了。<br/>";
    }
}
