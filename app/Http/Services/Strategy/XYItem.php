<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 */
namespace App\Http\Services\Strategy;

/**具体策略角色——XY产品
 * Class XYItem
 */
class XYItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是XY产品，我惯性旋转。<br/>";
    }

    function unInertisRotate()
    {
        echo "我是XY产品，我非惯性旋转了。<br/>";
    }
}
