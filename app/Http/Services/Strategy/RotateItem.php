<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 */
namespace App\Http\Services\Strategy;

/**抽象策略角色
 * Interface RotateItem
 */
interface RotateItem
{
    function inertiaRotate();

    function unInertisRotate();
}
