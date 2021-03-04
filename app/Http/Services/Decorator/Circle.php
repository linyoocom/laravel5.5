<?php
namespace App\Http\Services\Decorator;

class Circle extends Shape {
    protected $_html;

    public function draw() {
        echo '形状: 圆圈';
    }
}
