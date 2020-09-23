<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 * Time: 下午4:47
 */
namespace App\Http\Services\Register;

/**
 * 注册模式
 * Class Register
 * @package App\Http\Services\Register
 */
class Register
{
    protected static  $objects;

    public function set($alias,$object)//将对象注册到全局的树上
    {
        self::$objects[$alias]=$object;//将对象放到树上
    }

    public static function get($name){
        return self::$objects[$name];//获取某个注册到树上的对象
    }

    public function _unset($alias)
    {
        unset(self::$objects[$alias]);//移除某个注册到树上的对象。
    }
}
