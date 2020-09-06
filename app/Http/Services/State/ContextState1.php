<?php
/**
 * Create By PhpStorm
 * User: Yqing
 * Date: 2020/9/6
 */
namespace App\Http\Services\State;

/**
 * 具体的状态行为实现
 * Class ContextState1
 * @package App\Http\Services\State
 */
class ContextState1 implements State {
    /**
     * @param $sampleParameter
     * @return mixed|void
     */
    public function handle($sampleParameter) {

        echo "ConcreteState1 handle ：".$sampleParameter;
    }
}