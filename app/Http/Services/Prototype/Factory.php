<?php
namespace App\Http\Services\Prototype;

class Factory {

    private $product;

    public function __construct(ProductInterface $product) {
        $this->product = $product;
    }

    public function getProduct() {
        return clone $this->product;
    }
}
