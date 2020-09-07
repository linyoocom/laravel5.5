<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/7
 */
namespace App\Http\Services\Singleton;

/**
 * 单例模式
 * Class SingletonObject
 * @package App\Http\Services\Singleton
 */
class SingletonObject {
    private static $instance;

    private function __construct()
    {
    }

    /**
     * @return SingletonObject
     */
    public static function get_instance(){
        if(self::$instance instanceof self){
            return self::$instance;
        }else{
            self::$instance = new self();
            return self::$instance;
        }
    }

    private function __clone()
    {
        return false;
    }
}
