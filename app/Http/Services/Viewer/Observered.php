<?php
namespace App\Http\Services\Viewer;

class Observered {
    protected $observers = [];
    protected $status = 1;

    public function __construct()
    {

    }

    public function attach($ob){
        $this->observers[] = $ob;
    }

    public function remove($ob){
        $index = array_search($ob,$this->observers);
        array_splice($this->observers,$index,1);
    }

    public function doIt(){
        foreach ($this->observers as $ob){
            $ob->update($this->status,$this);
        }
    }

    public function setStatus($changeStatus){
        $this->status = $changeStatus;
    }
}
