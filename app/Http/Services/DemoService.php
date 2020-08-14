<?php
namespace App\Http\Services;

use App\Interfaces\TestDemoInterface;

class DemoService implements TestDemoInterface {
    public function echoText(){
        echo "Demo";
    }
}
