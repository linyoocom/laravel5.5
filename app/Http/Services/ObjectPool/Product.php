<?php
namespace App\Http\Services\ObjectPool;

class Product {

    protected $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
