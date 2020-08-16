<?php
namespace App\Http\Services;

use App\Interfaces\TestDemoInterface;

class TestService implements TestDemoInterface {
    public function echoText(){
        echo "Test";
    }
}
