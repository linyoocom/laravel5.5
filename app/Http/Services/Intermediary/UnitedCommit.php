<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/14
 * Time: 下午1:44
 */
namespace App\Http\Services\Intermediary;

//联合国机构
class UnitedCommit extends UnitedNations
{
    public $countryUsa;
    public $countryChina;

    //声明
    public function Declared($message, Country $colleague)
    {
        if($colleague==$this->countryChina)
        {
            $this->countryUsa->GetMessage($message);
        }
        else
        {
            $this->countryChina->GetMessage($message);
        }
    }
}
