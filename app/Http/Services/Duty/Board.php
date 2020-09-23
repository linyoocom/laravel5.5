<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午6:32
 */
namespace App\Http\Services\Duty;

/**
 * 版主
 * Class board
 * @package App\Http\Services\Duty
 */
class Board{
    protected $level = 1;//当前级别为1
    protected $top = 'admin';//高一级的处理

    public function process($lv=1){
        if($lv <= $this->level){
            echo '版主删帖' . '<br/>';
        }else{
            $topCls = new $this->top;
            $topCls->process($lv);
        }
    }
}
