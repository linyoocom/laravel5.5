<?php
namespace App\Http\Services\Builder;

class FirstBuilder extends Builder {

    public function buildProduct() {
        parent::buildProduct();
        $this->product->setName('The product of the first builder');
    }
}
