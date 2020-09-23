<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:19
 */
namespace App\Http\Services\Visitor;

//成功状态
class Success extends State
{
    public function __construct()
    {
        $this->state_name="成功";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，背后多半有一个伟大的女人。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，背后大多有一个不成功的男人。<br/>";
    }
}
