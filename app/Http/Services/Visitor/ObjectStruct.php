<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午10:25
 */
namespace App\Http\Services\Visitor;

/**
 * 结构对象
 * (这是使用访问者模式必备的角色。它具备以下特性：能枚举它的元素；可以提供一个高层接口以允许访问者访问它的元素；如有需要，
 * 可以设计成一个复合对象或者一个聚集（如一个列表或无序集合）)。
 * Class ObjectStruct
 * @package App\Http\Services\Visitor
 */
class ObjectStruct
{
    private $elements=array();
    //增加
    public function Add(Person $element)
    {
        array_push($this->elements,$element);
    }
    //移除
    public function Remove(Person $element)
    {
        foreach($this->elements as $k=>$v)
        {
            if($v==$element)
            {
                unset($this->elements[$k]);
            }
        }
    }

    //查看显示
    public function Display(State $visitor)
    {
        foreach ($this->elements as $v)
        {
            $v->Accept($visitor);
        }
    }
}

/**
 * 适用场景及优势：
 *1) 一个对象结构包含很多类对象，它们有不同的接口，而你想对这些对象实施一些依赖于其具体类的操作。

 *2) 需要对一个对象结构中的对象进行很多不同的并且不相关的操作，而你想避免让这些操作“污染”这些对象的类。Visitor模式使得你可以将相关的操作集中起来定义在一个类中。

 *3) 当该对象结构被很多应用共享时，用Visitor模式让每个应用仅包含需要用到的操作。

 *4) 定义对象结构的类很少改变，但经常需要在此结构上定义新的操作。改变对象结构类需要重定义对所有访问者的接口，这可能需要很大的代价。如果对象结构类经常改变，那么可能还是在这些类中定义这些操作较好。
 */
