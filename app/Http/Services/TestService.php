<?php
namespace App\Http\Services;

use App\TestDemoInterface;

class TestService implements TestDemoInterface {
    public function echoText(){
        echo "Test";
    }
}
