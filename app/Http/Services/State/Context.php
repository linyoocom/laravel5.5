<?php
/**
 * 状态设计模式
 */
namespace App\Http\Services\State;

class Context {
    //持有一个State类型的对象实例
    private $state;

    public function setState(State $state) {
        $this->state = $state;
    }

    /**
     * 用户感兴趣的接口方法
     * @param $sampleParameter
     */
    public function request($sampleParameter) {
        //转调state来处理
        $this->state->handle(sampleParameter);
    }
}