<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:23
 */
namespace App\Http\Services\Visitor;

//男人
class VMan extends Person
{
    function __construct()
    {
        $this->type_name="男人";
    }

    public  function Accept(State $visitor)
    {
        $visitor->GetManAction($this);
    }
}
