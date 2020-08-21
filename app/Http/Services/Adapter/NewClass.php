<?php
namespace App\Http\Services\Adapter;

use App\Http\Services\Adapter\NewClassInterface;

class NewClass implements NewClassInterface{
    protected $user;

    public function __construct(OldClass $oldClass)
    {
        $this->user = $oldClass;
    }

    public function getUserName()
    {
        return $this->user->getName();
    }
}
