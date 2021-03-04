<?php
namespace App\Http\Services\Decorator;

class ShapeDecorator extends Shape {
    protected $_element;

    public function __construct(Shape $shape) {
        $this->_element = $shape;
    }

    public function draw(){
        $this->_element->draw();
    }

}
