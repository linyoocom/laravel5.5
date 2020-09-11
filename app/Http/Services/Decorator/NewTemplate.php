<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2020/9/11
 * Time: 下午2:53
 */
namespace App\Http\Services\Decorator;

class NewTemplate extends TemplateDecorator{

    public function __construct($s)
    {
        parent::__construct($s);
    }

    public function render(){
        $this->newHtml('<img>__text__</img>');   ///在原有结构上增加新功能
        $this->_element->render();
    }

    public function newHtml($html){
        echo $html;
    }
}
