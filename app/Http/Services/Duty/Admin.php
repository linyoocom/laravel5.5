<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午6:33
 */
namespace App\Http\Services\Duty;

/**
 * 管理员
 * Class admin
 * @package App\Http\Services\Duty
 */
class Admin{
    protected $level = 2;//当前级别为2
    protected $top = 'police';//高一级的处理

    public function process($lv=2){
        if($lv <= $this->level){
            echo '管理员冻结登录账号' . '<br/>';
        }else{
            $topCls = new $this->top;
            $topCls->process($lv);
        }
    }
}
