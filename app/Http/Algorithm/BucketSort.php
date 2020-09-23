<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/23
 * Time: 上午9:34
 */
namespace App\Http\Algorithm;

/**
 * 桶排序算法(稳定 平均O(n+k) 最坏O(n^2))
 * Class BucketSort
 * @package App\Http\Algorithm
 */
class BucketSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->otherSort($array));
    }

    /**
     * 桶排序 (Bucket sort)或所谓的箱排序，是一个排序算法，工作的原理是将数组分到有限数量的桶子里。每个桶子再个别排序（
     * 有可能再使用别的排序算法或是以递归方式继续使用桶排序进行排序）。桶排序是鸽巢排序的一种归纳结果。
     * 当要被排序的数组内的数值是均匀分配的时候，桶排序使用线性时间（Θ（n））。但桶排序并不是 比较排序，他不受到 O(n log n) 下限的影响。
     * 适用于海量数据排序,如在一个文件中有10G个整数，乱序排列，要求找出中位数(位置在最中间的数值)。内存限制为2G。
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $n = count($array);
        $bask = [];   // [10][$n]
        $index = [];  // [10]
        $max = PHP_INT_MIN; //当前系统字长的最小整数
        //初始化数组
        for($i = 0; $i < 10; $i++){
            $index[$i] = 0;
            for($j = 0; $j < $n; $j++)
            {
                $bask[$i][$j] = 0;
            }
        }
        for($i = 0; $i < $n; $i++)
        {
            $max= $max > strlen($array[$i]) ? $max : strlen($array[$i]);
        }
        for($i = $max-1; $i >= 0; $i--)
        {
            for($j = 0; $j < $n; $j++)
            {
                $str = "";
                if(strlen($array[$j]) < $max)
                {
                    for($k = 0;$k < $max-strlen($array[$j]); $k++){
                        $str .= "0";
                    }
                }
                $str .= strval($array[$j]);
                $bask[$str[$i]][$index[$str[$i]]++] = $array[$j];
            }
            $pos = 0;
            for($j = 0;$j < 10; $j++)
            {
                for($k = 0; $k < $index[$j]; $k++)
                {
                    $array[$pos++] = $bask[$j][$k];
                }
            }
            for($x = 0; $x < 10; $x++){
                $index[$x] = 0;
            }
        }
        return $array;
    }

    /**
     * 最简单直观的实现方法,每个桶用插入排序法排序,然后组合起来
     * @param $array
     * @return array
     */
    public function otherSort($array){
        $n = count($array);
        $bucket = [];
        $insertSort = new InsertSort();
        $max = max($array);
        //创建n个桶
        for($i = 0; $i < $n; $i++){
            $bucket[$i] = []; //创建一个桶
        }
        for($i = 0; $i < $n; $i++){
            //将n个输入数分布到各个桶中去。因为输入数均匀分布在[0，1)上
            $bucket_index = floor($n * $array[$i]/($max+1));
            array_push($bucket[$bucket_index],$array[$i]);//放到桶里去
            $insertSort->sort($bucket[$bucket_index]); //对每个桶进行插入排序
        }
        $newArray = [];
        array_walk($bucket,function ($item)use(&$newArray){
            $newArray = array_merge($newArray,$item);
        });
        return $newArray;
    }
}
