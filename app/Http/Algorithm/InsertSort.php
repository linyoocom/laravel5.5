<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午2:34
 */
namespace App\Http\Algorithm;

/**
 * 插入排序算法(稳定 O(n^2))
 * Class InsertSort
 * @package App\Http\Algorithm
 */
class InsertSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 插入排序是一种最简单的排序方法，它的基本思想是将一个记录插入到已经排好序的有序表中，从而一个新的、记录数增1的有序表。
     * 在其实现过程使用双层循环，外层循环对除了第一个元素之外的所有元素，内层循环对当前元素前面有序表进行待插入位置查找，并进行移动
     * @param $array
     * @return mixed
     */
    public function sort(&$array){
        //将a[]按升序排列
        $n = count($array);
        for ($i = 1;$i < $n; $i++)
        {
            //将a[i]插入到a[i-1]，a[i-2]，a[i-3]……之中
            for($j = $i;$j > 0 && $array[$j] < $array[$j-1];$j--)
            {
                $temp = $array[$j];
                $array[$j] = $array[$j-1];
                $array[$j-1] = $temp;
            }
        }

        return $array;
    }
}
