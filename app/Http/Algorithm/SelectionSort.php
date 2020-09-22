<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午3:42
 */
namespace App\Http\Algorithm;

/**
 * 选择排序算法(不稳定　O(n^2))
 * Class SelectionSort
 * @package App\Http\Algorithm
 */
class SelectionSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 第一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，然后再从剩余的未排序元素中寻找到最小（大）元素，
     * 然后放到已排序的序列的末尾。以此类推，直到全部待排序的数据元素的个数为零。选择排序是不稳定的排序方法
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $len = count($array);
        //需要比较的次数，数组长度减一
        for($i = 0; $i < $len - 1; $i++) {
            //先假设每次循环时，最小数的索引为i
            $minIndex = $i;

            //每一个元素都和剩下的未排序的元素比较
            for ($j = $i + 1; $j < $len; $j++) {
                if ($array[$j] < $array[$minIndex]) {//寻找最小数
                    $minIndex = $j;//将最小数的索引保存
                }
            }
            //经过一轮循环，就可以找出第一个最小值的索引，然后把最小值放到i的位置
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
        }
        return $array;
    }
}
