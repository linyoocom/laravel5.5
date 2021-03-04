<?php
namespace App\Http\Services;

use App\Http\Services\Adapter\NewClass;
use App\Http\Services\Adapter\OldClass;
use App\Http\Services\Decorator\Circle;
use App\Http\Services\Decorator\Rectangle;
use App\Http\Services\Decorator\RedBorder;
use App\Http\Services\Facade\UserCenter;
use App\Http\Services\Intermediary\China;
use App\Http\Services\Intermediary\UnitedCommit;
use App\Http\Services\Intermediary\USA;
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
use App\Http\Services\Bridge\Mix;
use App\Http\Services\Bridge\Note;
use App\Http\Services\Bridge\Osteophony;
use App\Http\Services\Bridge\Cylinder;
use App\Http\Services\Iterator\Users;
use App\Http\Services\Proxy\RealSubject;
use App\Http\Services\Proxy\Proxy;
use App\Http\Services\Duty\Board;
use App\Http\Services\Visitor\Amativeness;
use App\Http\Services\Visitor\Failure;
use App\Http\Services\Visitor\ObjectStruct;
use App\Http\Services\Visitor\Success;
use App\Http\Services\Visitor\VMan;
use App\Http\Services\Visitor\VWoman;
use App\Http\Services\Command\Invoker;
use App\Http\Services\Command\Receiver;
use App\Http\Services\Command\HelloCommand;
use App\Http\Services\Template\Client as TClient;

class Fire {
    public function __construct()
    {
    }

    /**
     * 迭代器模式
     * (在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素)
     * @param Users $users
     */
    public function fireIterator(Users $users){
        foreach ($users as $user){
            echo $user->id;
            $user->name = 'third name';
        }
    }

    /**
     * 观察者
     * (一个类提供一种方法可以让其它类注册自己,使得自己可以被观察,当被观察者发生状态改变时,会通知到其它观察者并做出改变)
     * @return bool
     */
    public function fireViewer(){
        $obed = new Observered();
        $ob = new Observer($obed);  //注册
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
     * (允许向一个现有的对象添加新的功能，同时又不改变其结构)
     * (装饰器模式允许我们根据运行时不同的情景动态地为某个对象调用前后添加不同的行为动作。)
     */
    public function fireDecorator(){
        $newCircle = new RedBorder(new Circle());
        $newRectangle = new RedBorder(new Rectangle());
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
     *（允许一个对象在其内部状态改变时改变它的行为）
     * (传统思维一般用if else switch去判断,没什么拓展性，维护性，复用性,可以用状态模式把这些状态封装起来,杜绝"牵一发而动全身"的情况)
     */
    public function fireState(){
        (new Client())->main();
    }

    /**
     * 策略模式
     * (定义一系列算法,把它们一个个封装起来,并且使它们之间可以互相替换,从而使算法独立于使用它的用户而变化)
     * @param ContextStrategy $strategy
     */
    public function fireStrategy(ContextStrategy $strategy){

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

    /**
     * 外观模式
     */
    public function fireFacade(){
        echo UserCenter::login();
    }

    /**
     * 桥接模式
     * (Bridge模式将继承关系转换为组合关系，从而降低了系统间的耦合，根据需要实现多种组合，减少了代码编写量)
     */
    public function fireBridge(){
        $mix = new Mix(new Osteophony());
        $mix->output();
        $note = new Note(new Cylinder());
        $note->output();
        //这样写的好处是把抽象化角色手机和实现化角色手机的具体功能音频输出 分离了出来,
        //如果现在最新的小米note系列也要用上骨传导输出，那么我们只需实例化时传入的声筒音频类改为骨传导音频类
    }

    /**
     * 代理模式
     * (多用于远程代理的情况)
     */
    public function fireProxy(){
        $subject = new RealSubject("张三");
        $proxy = new Proxy($subject);
        $proxy->say();
        $proxy->run();
    }

    /**
     * 职任链模式
     */
    public function fireDuty(){
        $lv = isset($_GET['lv'])?$_GET['lv']:1;

        $cls = new Board();
        $cls->process($lv);
    }

    /**
     * 访问者模式
     */
    public function fireVisitor(){
        $os = new ObjectStruct();
        $os->Add(new VMan());
        $os->Add(new VWoman());

        //成功时反应
        $ss = new Success();
        $os->Display($ss);

        //失败时反应
        $fs = new Failure();
        $os->Display($fs);

        //恋爱时反应
        $ats=new Amativeness();
        $os->Display($ats);
    }

    /**
     * 命令模式
     * (命令模式就是将一组对象的相似行为，进行了抽象，将调用者与被调用者之间进行解耦，提高了应用的灵活性。
     * 命令模式将调用的目标对象的一些异构性给封装起来，通过统一的方式来为调用者提供服务。)
     * @param Invoker $invoker
     * @param Receiver $receiver
     */
    public function fireCommand(Invoker $invoker,Receiver $receiver){
        $invoker->setCommand(new HelloCommand($receiver));
        $invoker->run();
    }

    /**
     * 中介者模式
     * (适用场景:如果一组对象之间的通信方式比较复杂，导致相互依赖，结构混乱，可以采用中介者模式
     * 如果一个对象引用很多对象，并且跟这些对象交互，导致难以复用该对象)
     */
    public function fireIntermediary(){
        $UNSC = new UnitedCommit();
        $c1 = new USA($UNSC);
        $c2 = new China($UNSC);
        $UNSC->countryChina = $c2;
        $UNSC->countryUsa =$c1;
        $c1->Declared("姚明的篮球打的就是好");
        $c2->Declared("谢谢。");
    }

    /**
     * 模板方法模式
     * (定义一个操作中的算法骨架,而将一些步骤延迟到子类中,使得子类可以不改变一个算法的结构可以定义该算法的某些特定步骤)
     */
    public function fireTemplate(){
        $worker = new TClient(100);
        $worker = new TClient(200);
    }
}
