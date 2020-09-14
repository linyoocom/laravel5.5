<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 上午11:19
 */
namespace App\Http\Services\Command;

/**
 * Receiver类
 */
class Receiver
{
    /**
     * @param string $str
     */
    public function write($str)
    {
        echo $str;
    }
}
