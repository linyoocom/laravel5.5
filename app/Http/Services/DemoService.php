<?php
namespace App\Http\Services;

use App\Interfaces\TestDemoInterface;

class DemoService implements TestDemoInterface {
    public function echoText(){
        echo "Demo";
    }

    /**
     * 动态规划算法
     */
    public function dongGui(){
        $c = [];
        $i = $j = 0;
        $N = 10; $T = 1000;
        for($i=0;$i<$N;$i++){
            for($j=0;$j<=$T;$j++){
                $c[$i][$j] = -1;
            }
        }
        return $this->doIt($c,[],[],$i,$j,$T);
    }

    public function doIt($c,$v,$w,$i,$j,$T){
        $temp = 0;
        if($c[$i][$j] != -1){
            return $c[$i][$j];
        }
        if($i==0 || $j == 0){
            return $c[$i][$j];
        }else{
            if($i>0 && $j >= $w[$i]){
                $temp = $this->doIt($c,$v,$w,$i-1,$j-$w[$i],$T);
                if($c[$i][$j] < $temp){
                    //max($c[$i-1][$T-$w[$i]]+$v[$i],$c[$i-1][$T]);
                    $c[$i][$j] = $temp;
                }
            }
        }
        return $c[$i][$j];
    }
}
