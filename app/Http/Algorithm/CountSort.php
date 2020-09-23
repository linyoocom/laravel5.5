<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午5:47
 */
namespace App\Http\Algorithm;

/**
 * 计数排序算法(稳定 O(n+k))
 * Class CountSort
 * @package App\Http\Algorithm
 */
class CountSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 计数排序是一个非基于比较的排序算法，该算法于1954年由 Harold H. Seward 提出。它的优势在于在对一定范围内的整数排序时，
     * 它的复杂度为Ο(n+k)（其中k是整数的范围），快于任何比较排序算法。当然这是一种牺牲空间换取时间的做法，而且当O(k)>O(n*log(n))的
     * 时候其效率反而不如基于比较的排序（基于比较的排序的时间复杂度在理论上的下限是O(n*log(n)), 如归并排序，堆排序）
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $len = count($array);
        $b = [];
        $max = $array[0];
        $min = $array[0];
        foreach ($array as $key => $value){
            if($value > $max){
                $max = $value;
            }
            if($value < $min){
                $min = $value;
            }
        }
        //这里k的大小是要排序的数组中，元素大小的极值差+1
        $k = $max-$min+1;
        $c = [];
        //初始化数组
        for($i = 0;$i < $len; $i++){
            $b[$i] = 0;
        }
        for($i = 0;$i < $k; $i++){
            $c[$i] = 0;
        }

        for($i = 0;$i < $len; ++$i){
            $c[$array[$i]-$min] += 1;//优化过的地方，减小了数组c的大小
        }
        for($i = 1; $i< $k; ++$i){
            $c[$i] = $c[$i] + $c[$i-1];
        }
        for($i = $len-1; $i >= 0; --$i){
            $b[--$c[$array[$i]-$min]] = $array[$i];//按存取的方式取出c的元素
        }
        return $b;
    }
}
