<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午3:26
 */
namespace App\Http\Algorithm;

/**
 * 冒泡排序算法(稳定 O(n^2))
 * Class BubbleSort
 * @package App\Http\Algorithm
 */
class BubbleSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 它重复地走访过要排序的元素列，依次比较两个相邻的元素，如果顺序（如从大到小、首字母从Z到A）错误就把他们交换过来。
     * 走访元素的工作是重复地进行直到没有相邻元素需要交换，也就是说该元素列已经排序完成。
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $len = count($array);
        for($i = 0; $i < $len; $i++){
            for($j = 1; $j < $len - $i; $j++){
                if($array[$j] < $array[$j-1]){
                    $temp = $array[$j];
                    $array[$j] = $array[$j-1];
                    $array[$j-1] = $temp;
                }
            }
        }
        return $array;
    }
}
