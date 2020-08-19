<?php
namespace App\Http\Services\Builder;

abstract class Builder {

    protected $product;

    final public function getProduct() {
        return $this->product;
    }

    public function buildProduct() {
        $this->product = new Product();
    }
}
