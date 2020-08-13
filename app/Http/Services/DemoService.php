<?php
namespace App\Http\Services;

use App\TestDemoInterface;

class DemoService implements TestDemoInterface {
    public function echoText(){
        echo "Demo";
    }
}
