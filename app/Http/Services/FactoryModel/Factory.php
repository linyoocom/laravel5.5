<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/7
 */
namespace App\Http\Services\FactoryModel;

/**
 * 工厂模式
 * Class Factory
 * @package App\Http\Services\FactoryModel
 */
class Factory {
    private $objectList = [];

    public function __construct()
    {
    }

    public function createObject($condition){
        switch ($condition){
            case 1:
                if(isset($this->objectList[1]) && $this->objectList[1] instanceof Class1){
                    return $this->objectList[1];
                }else{
                    $this->objectList[1] = new Class1();
                    return $this->objectList[1];
                }
            case 2:
                if(isset($this->objectList[2]) && $this->objectList[2] instanceof Class2){
                    return $this->objectList[2];
                }else{
                    $this->objectList[2] = new Class2();
                    return $this->objectList[2];
                }
            default:
                if(isset($this->objectList[3]) && $this->objectList[3] instanceof Class3){
                    return $this->objectList[3];
                }else{
                    $this->objectList[3] = new Class3();
                    return $this->objectList[3];
                }
        }
    }
}
