<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/23
 * Time: 上午9:15
 */
namespace App\Http\Algorithm;

/**
 * 基数排序算法(稳定 O(n*k))
 * Class RadixSort
 * @package App\Http\Algorithm
 */
class RadixSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array,2));
    }

    /**
     * 基数排序（radix sort）属于“分配式排序”（distribution sort），又称“桶子法”（bucket sort）或bin sort，顾名思义，
     * 它是透过键值的部份资讯，将要排序的元素分配至某些“桶”中，藉以达到排序的作用，基数排序法是属于稳定性的排序，其时间复杂度为O (nlog(r)m)，
     * 其中r为所采取的基数，而m为堆数，在某些时候，基数排序法的效率高于其它的稳定性排序法。
     * @param $array
     * @return mixed
     */
    public function sort($array,$d){ //d表示最大的数有多少位
        $len = count($array);
        $k = 0;
        $n = 1;
        $m = 1; //控制键值排序依据在哪一位
        //分配到10个"桶"中
        $temp = [];
        $order = [];
        for($i = 0; $i < 10; $i++){
            $order[$i] = 0;
            for($j = 0; $j < $len; $j++){
                $temp[$i][$j] = 0;
            }
        }

        while($m <= $d)
        {
            for($i = 0; $i < $len; $i++)
            {
                $lsd = (($array[$i] / $n) % 10);
                $temp[$lsd][$order[$lsd]] = $array[$i];
                $order[$lsd]++;
            }
            for($i = 0; $i < 10; $i++)
            {
                if($order[$i] != 0)
                    for($j = 0; $j < $order[$i]; $j++)
                    {
                        $array[$k] = $temp[$i][$j];
                        $k++;
                    }
                $order[$i] = 0;
            }
            $n *= 10;
            $k = 0;
            $m++;
        }
        return $array;
    }
}
