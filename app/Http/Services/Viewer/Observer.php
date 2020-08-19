<?php
namespace App\Http\Services\Viewer;

class Observer{
    protected $status;

    public function __construct(Observered $ob)
    {
        $ob->attach($this);
    }

    public function update($change,$obServered){
        echo $change;
    }
}
