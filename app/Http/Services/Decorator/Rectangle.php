<?php
namespace App\Http\Services\Decorator;

class Rectangle extends Shape {
    protected $_html;

    public function draw() {
        echo '形状: 矩形';
    }
}
