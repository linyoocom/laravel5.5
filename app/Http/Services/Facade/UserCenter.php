<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 * Time: 下午5:22
 */
namespace App\Http\Services\Facade;

class UserCenter extends Facade {
    protected static function getFacadeAccessor()
    {
        return UserCenterService::class;
    }
}
