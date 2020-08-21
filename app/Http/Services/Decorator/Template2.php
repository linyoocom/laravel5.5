<?php
namespace App\Http\Services\Decorator;

class Template2 extends HtmlTemplate {
    protected $_element;

    public function __construct($s) {
        $this->_element = $s;
        $this->set("<h2>" . $this->_html . "</h2>");
    }

    public function __call($name, $args) {
        $this->_element->$name($args[0]);
    }
}
