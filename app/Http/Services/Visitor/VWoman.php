<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:24
 */
namespace App\Http\Services\Visitor;

//女人
class VWoman extends Person
{
    public function __construct()
    {
        $this->type_name="女人";
    }

    public  function Accept(State $visitor)
    {
        $visitor->GetWomanAction($this);
    }
}
