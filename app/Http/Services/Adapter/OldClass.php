<?php
namespace App\Http\Services\Adapter;

class OldClass {
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}
