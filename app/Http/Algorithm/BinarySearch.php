<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午4:41
 */
namespace App\Http\Algorithm;

/**
 * 二分查找
 * Class BinarySearch
 * @package App\Http\Algorithm
 */
class BinarySearch {

    public function main(){
        $array = [1,2,5,6,7,8,9,10,20,36,42];
        echo $this->search($array,0);
    }

    /**
     * @param $array
     * @param $find
     * @return int
     */
    public function search($array,$find){
        $len = count($array);
        $index = -1;
        $start = 0;
        $end = $len-1;
        $middle = floor($len/2);

        while($middle >= $start && $middle <= $end){
            if($array[$middle] > $find){
                $end = $middle;
            }elseif($array[$middle] < $find){
                $start = $middle;
            }else{
                $index = $middle;
                break;
            }
            //查找目标不在数组内 结束循环
            if($middle == floor(($start + $end)/2)){
                break;
            }
            $middle = floor(($start + $end)/2);
        }
        if($index < 0){
            return 'not find!';
        }

        return $index;
    }
}
