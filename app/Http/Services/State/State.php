<?php
/**
 * Create By PhpStorm
 * User: Yqing
 * Date: 2020/9/6
 */
namespace App\Http\Services\State;

interface State {
    /**
     * 状态对应的处理
     * @param $sampleParameter
     * @return mixed
     */
    public function handle($sampleParameter);
}