<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午5:56
 */
namespace App\Http\Services\Iterator;

class Users implements \Iterator
{
    protected $index = 0;
    protected $data = [];

    public function __construct()
    {
        $this->data = [
            ['id'=>1,'name'=>'first name'],
            ['id'=>2,'name'=>'second name']
        ];
    }

    //1 重置迭代器
    public function rewind()
    {
        $this->index = 0;
    }

    //2 验证迭代器是否有数据
    public function valid()
    {
        return $this->index < count($this->data);
    }

    //3 获取当前内容
    public function current()
    {
        return $this->data[$this->index];
    }

    //4 移动key到下一个
    public function next()
    {
        return $this->index++;
    }


    //5 迭代器位置key
    public function key()
    {
        return $this->index;
    }
}
