<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午11:20
 */
namespace App\Http\Services\Command;

/**
 * Invoker类
 */
class Invoker
{
    /**
     * @var CommandInterface
     */
    protected $command;

    /**
     * 在调用者中我们通常可以找到这种订阅命令的方法
     *
     * @param CommandInterface $cmd
     */
    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }

    /**
     * 执行命令
     */
    public function run()
    {
        $this->command->execute();
    }
}
