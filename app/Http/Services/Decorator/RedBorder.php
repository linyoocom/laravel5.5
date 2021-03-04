<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午2:53
 */
namespace App\Http\Services\Decorator;

class RedBorder extends ShapeDecorator {

    public function __construct(Shape $shape)
    {
        parent::__construct($shape);
    }

    public function draw(){
        $this->_element->draw();
        $this->addRedBorder('<img>__text__</img>');   ///在原有结构上增加新功能,即已改变了原draw方法,适配器模式不会改变原方法.
    }

    /**
     * 新功能 给形状增加红色的边框
     * @param $html
     */
    public function addRedBorder($html){
        echo $html;
    }
}
