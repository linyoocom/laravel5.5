<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 */
namespace App\Http\Services\Strategy;

/**具体策略角色——X产品
 * Class XItem
 */
class XItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是X产品，我惯性旋转了。<br/>";
    }

    function unInertisRotate()
    {
        echo "我是X产品，我非惯性旋转了。<br/>";
    }
}
