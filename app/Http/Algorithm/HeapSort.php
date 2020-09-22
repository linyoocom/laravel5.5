<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/22
 * Time: 下午3:59
 */
namespace App\Http\Algorithm;

/**
 * 堆排序算法(不稳定　O(n*logn))
 * Class HeapSort
 * @package App\Http\Algorithm
 */
class HeapSort {

    public function main(){
        $array = [5,1,10,2,8,9,6,20,7,36,42];
        print_r($this->sort($array));
    }

    /**
     * 堆排序是指利用堆这种数据结构所设计的一种排序算法。堆是一个近似完全二叉树的结构，并同时满足堆积的性质：即子结点的键值或索引总是
     * 小于（或者大于）它的父节点
     * @param $array
     * @return mixed
     */
    public function sort($array){
        $len = count($array);
        //这里元素的索引是从0开始的,所以最后一个非叶子结点array.length/2 - 1
        for ($i = floor($len / 2) - 1; $i >= 0; $i--) {
            $this->adjustHeap($array, $i, $len);  //调整堆
        }

        // 上述逻辑，建堆结束
        // 下面，开始排序逻辑
        for ($j = $len - 1; $j > 0; $j--) {
            // 元素交换,作用是去掉大顶堆
            // 把大顶堆的根元素，放到数组的最后；换句话说，就是每一次的堆调整之后，都会有一个元素到达自己的最终位置
            $temp = $array[0];
            $array[0] = $array[$j];
            $array[$j] = $temp;
            // 元素交换之后，毫无疑问，最后一个元素无需再考虑排序问题了。
            // 接下来我们需要排序的，就是已经去掉了部分元素的堆了，这也是为什么此方法放在循环里的原因
            // 而这里，实质上是自上而下，自左向右进行调整的
            $this->adjustHeap($array, 0, $j);
        }
        return $array;
    }

    /**
     * 整个堆排序最关键的地方
     * @param array $array 待组堆
     * @param integer $i 起始结点
     * @param integer $length 堆的长度
     */
    public function adjustHeap(&$array, $i, $length) {
        // 先把当前元素取出来，因为当前元素可能要一直移动
        $temp = $array[$i];
        //2*i+1为左子树i的左子树(因为i是从0开始的),2*k+1为k的左子树
        for ($k = 2 * $i + 1; $k < $length; $k = 2 * $k + 1) {
            // 让k先指向子节点中最大的节点
            if ($k + 1 < $length && $array[$k] < $array[$k + 1]) {  //如果有右子树,并且右子树大于左子树
                $k++;
            }
            //如果发现结点(左右子结点)大于根结点，则进行值的交换
            if ($array[$k] > $temp) {
                $temp = $array[$i];
                $array[$i] = $array[$k];
                $array[$k] = $temp;
                // 如果子节点更换了，那么，以子节点为根的子树会受到影响,所以，循环对子节点所在的树继续进行判断
                $i  =  $k;
            } else {  //不用交换，直接终止循环
                break;
            }
        }
    }
}
