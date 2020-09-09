<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 */
namespace App\Http\Services\Strategy;

/**具体策略角色——Y产品
 * Class YItem
 */
class YItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是Y产品，我<span style='color: #ff0000;'>不能</span>惯性旋转。<br/>";
    }

    function unInertisRotate()
    {
        echo "我是Y产品，我非惯性旋转了。<br/>";
    }
}
