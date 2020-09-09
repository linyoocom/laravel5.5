<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/9
 * Time: 下午5:00
 */
namespace App\Http\Services\Facade;

/**
 * 外观模式
 * Class Facade
 * @package App\Http\Services\Facade
 */
class Facade {

    protected static $resolvedInstance = [];

    public static function getFacadeRoot($name)
    {
        if (is_object($name)) {
            return $name;
        }

        if (isset(static::$resolvedInstance[$name])) {
            return static::$resolvedInstance[$name];
        }

        return static::$resolvedInstance[$name] = new $name;
    }

    protected static function getFacadeAccessor()
    {
        throw new \RuntimeException('Facade does not implement getFacadeAccessor method.');
    }

    public static function __callStatic($method, $arguments)
    {
        $instance = static::getFacadeRoot(static::getFacadeAccessor());

        if (! $instance) {
            throw new \RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$arguments);
    }
}
