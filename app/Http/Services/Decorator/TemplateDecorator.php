<?php
namespace App\Http\Services\Decorator;

class TemplateDecorator extends HtmlTemplate {
    protected $_element;

    public function __construct($s) {
        $this->_element = $s;
        $this->set("<h2>" . $this->_html . "</h2>");
    }

    public function render(){
        $this->_element->render();
    }

    public function __call($name, $args) {
        $this->_element->$name($args[0]);
    }
}