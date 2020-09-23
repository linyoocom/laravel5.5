<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午4:27
 */
namespace App\Http\Algorithm;

/**
 * 归并排序算法(稳定　O(n*logn))
 * Class MergeSort
 * @package App\Http\Algorithm
 */
class MergeSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 归并排序是建立在归并操作上的一种有效，稳定的排序算法，该算法是采用分治法（Divide and Conquer）的一个非常典型的应用。
     * 将已有序的子序列合并，得到完全有序的序列；即先使每个子序列有序，再使子序列段间有序。若将两个有序表合并成一个有序表，称为二路归并。
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $len = count($array);
        if($len <= 1){
            //递归结束条件,到达这步的时候,数组就只剩下一个元素了,也就是分离了数组
            return $array;
        }
        $mid = intval($len/2);//取数组中间
        $left_arr = array_slice($array, 0, $mid);//拆分数组0-mid这部分给左边left_arr
        $right_arr = array_slice($array, $mid);//拆分数组mid-末尾这部分给右边right_arr
        $left_arr = $this->sort($left_arr);//左边拆分完后开始递归合并往上走
        $right_arr = $this->sort($right_arr);//右边拆分完毕开始递归往上走
        $array = $this->al_merge($left_arr, $right_arr);//合并两个数组,继续递归

        return $array;
    }

    /**
     * merge函数将指定的两个有序数组(arr1,arr2)合并并且排序
     * 我们可以找到第三个数组,然后依次从两个数组的开始取数据哪个数据小就先取哪个的,然后删除掉刚刚取过///的数据
     * @param $arrA
     * @param $arrB
     * @return array
     */
    public function al_merge($arrA,$arrB)
    {
        $arrC = array();
        while(count($arrA) && count($arrB)){
            //这里不断的判断哪个值小,就将小的值给到arrC,但是到最后肯定要剩下几个值,
            //不是剩下arrA里面的就是剩下arrB里面的而且这几个有序的值,肯定比arrC里面所有的值都大所以使用
            $arrC[] = $arrA['0'] < $arrB['0'] ? array_shift($arrA) : array_shift($arrB);
        }
        return array_merge($arrC, $arrA, $arrB);
    }
}
