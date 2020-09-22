<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午5:35
 */
namespace App\Http\Algorithm;

/**
 * 快速排序法(不稳定 O(n*logn))
 * 该排序方法被认为是目前最好的一种内部排序方法
 * Class QuickSort
 * @package App\Http\Algorithm
 */
class QuickSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 它的基本思想是：通过一趟排序将要排序的数据分割成独立的两部分，其中一部分的所有数据都比另外一部分的所有数据都要小，
     * 然后再按此方法对这两部分数据分别进行快速排序，整个排序过程可以递归进行，以此达到整个数据变成有序序列
     * @param $array
     * @return mixed
     */
    public function sort($array){
        // 判断是否需要继续
        if (count($array) <= 1) {
            return $array;
        }

        $middle = $array[0]; // 中间值

        $left = array(); // 小于中间值
        $right = array();// 大于中间值

        // 循环比较
        for ($i=1; $i < count($array); $i++) {
            if ($middle < $array[$i]) {
                // 大于中间值
                $right[] = $array[$i];
            } else {

                // 小于中间值
                $left[] = $array[$i];
            }
        }

        // 递归排序两边
        $left = $this->sort($left);
        $right = $this->sort($right);

        // 合并排序后的数据，别忘了合并中间值
        return array_merge($left, array($middle), $right);
    }
}
