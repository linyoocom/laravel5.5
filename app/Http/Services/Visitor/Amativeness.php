<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:22
 */
namespace App\Http\Services\Visitor;

//恋爱状态
class Amativeness  extends State
{
    public function __construct()
    {
        $this->state_name="恋爱";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，凡事不懂也要装懂。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，遇事懂也要装作不懂。<br/>";
    }
}
