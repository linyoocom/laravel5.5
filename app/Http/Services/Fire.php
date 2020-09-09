<?php
namespace App\Http\Services;

use App\Http\Services\Adapter\NewClass;
use App\Http\Services\Adapter\OldClass;
use App\Http\Services\Viewer\Observer;
use App\Http\Services\Viewer\Observered;
use App\Http\Services\ObjectPool\Factory as ObjectPoolFactory;
use App\Http\Services\ObjectPool\Product;
use App\Http\Services\Prototype\SomeProduct;
use App\Http\Services\Prototype\Factory as PrototypeFactory;
use App\Http\Services\Builder\Factory as BuilderFactory;
use App\Http\Services\Builder\FirstBuilder;
use App\Http\Services\Builder\SecondBuilder;
use App\Http\Services\State\Client;
use App\Http\Services\Strategy\ContextStrategy;

class Fire {
    public function __construct()
    {
    }

    /**
     * 观察者
     * (一个类提供一种方法可以让其它类注册自己,使得自己可以被观察,当被观察者发生状态改变时,会通知到其它观察者并做出改变)
     * @return bool
     */
    public function fireViewer(){
        $obed = new Observered();
        $ob = new Observer($obed);
        $obed->setStatus('change01');
        $obed->doIt();
        return false;
    }

    /**
     * 适配器
     * (将一个类的接口转换成客户希望的另一个接口,适配器模式使得原本的由于接口不兼容而不能一起工作的那些类可以一起工作。)
     */
    public function fireAdapter(){
        $user = new OldClass("jack");
        echo $user->getName();
        $newUser = new NewClass($user);
        echo $newUser->getUserName();
    }

    /**
     * 对象池
     * (对象池可以用于构造并且存放一系列的对象并在需要时获取调用)
     */
    public function fireObjectPool(){
        ObjectPoolFactory::pushProduct(new Product('first'));
        ObjectPoolFactory::pushProduct(new Product('second'));

        print_r(ObjectPoolFactory::getProduct('first')->getId());
        print_r(ObjectPoolFactory::getProduct('second')->getId());
    }

    /**
     * 原型
     * (用一个已经创建的实例作为原型，通过复制该原型对象来创建一个和原型相同或相似的新对象)
     * (有些时候，部分对象需要被初始化多次。而特别是在如果初始化需要耗费大量时间与资源的时候进行预初始化并且存储下这些对象。)
     */
    public function firePrototype(){
        $prototypeFactory = new PrototypeFactory(new SomeProduct());

        $firstProduct = $prototypeFactory->getProduct();
        $firstProduct->name = 'The first product';

        $secondProduct = $prototypeFactory->getProduct();
        $secondProduct->name = 'Second product';

        print_r($firstProduct->name);
        // The first product
        print_r($secondProduct->name);
        // Second product
    }

    /**
     * 装饰器
     * (装饰器模式允许我们根据运行时不同的情景动态地为某个对象调用前后添加不同的行为动作。)
     */
    public function fireDecorator(){
        return false;
    }

    /**
     * 构造者
     * (构造者模式主要在于创建一些复杂的对象)
     */
    public function fireBuilder(){
        $firstDirector = new BuilderFactory(new FirstBuilder());
        $secondDirector = new BuilderFactory(new SecondBuilder());

        print_r($firstDirector->getProduct()->getName());
        // The product of the first builder
        print_r($secondDirector->getProduct()->getName());
        // The product of second builder
    }

    /**
     * 状态模式
     * （允许一个对象在其内部状态改变时改变它的行为）
     */
    public function fireState(){
        (new Client())->main();
    }

    /**
     * 策略模式
     * (定义一系列算法,把它们一个个封装起来,并且使它们之间可以互相替换,从而使算法独立于使用它的用户而变化)
     */
    public function fireStrategy(){
        $strategy=new ContextStrategy();

        echo "<span style='color: #ff0000;'>X产品</span><hr/>";
        $strategy->getItem('XItem');
        $strategy->inertiaRotate();
        $strategy->unInertisRotate();

        echo "<span style='color: #ff0000;'>Y产品</span><hr/>";
        $strategy->getItem('YItem');
        $strategy->inertiaRotate();
        $strategy->unInertisRotate();

        echo "<span style='color: #ff0000;'>XY产品</span><hr/>";
        $strategy->getItem('XYItem');
        $strategy->inertiaRotate();
        $strategy->unInertisRotate();
    }
}
