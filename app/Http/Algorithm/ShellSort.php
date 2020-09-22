<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午3:13
 */
namespace App\Http\Algorithm;

/**
 * 希尔排序算法(不稳定 O(n^2))
 * 插入排序算法中一种（缩小增量排序），是插入算法更高效的进化版
 * Class ShellSort
 * @package App\Http\Algorithm
 */
class ShellSort {
    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 希尔排序是把记录按下标的一定增量分组，对每组使用直接插入排序算法排序；随着增量逐渐减少，每组包含的关键词越来越多，
     * 当增量减至 1 时，整个文件恰被分成一组，算法便终止。相同值的数据经过多次排序后位置可能是变动的，所以不是稳定算法．
     * @param $array
     * @return mixed
     */
    public function sort($array){
        if(!is_array($array)) return;
        $n = count($array);
        for ($gap = floor($n/2); $gap > 0; $gap = floor($gap/=2)) {
            for($i = $gap; $i < $n; ++$i) {
                for($j = $i - $gap; $j >= 0 && $array[$j + $gap] < $array[$j]; $j -= $gap) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + $gap];
                    $array[$j + $gap] = $temp;
                }
            }
        }
        return $array;
    }
}
