<?php
namespace App\Http\Services\Decorator;

class Template1 extends HtmlTemplate {
    protected $_html;

    public function __construct() {
        $this->_html = "<p>__text__</p>";
    }

    public function set($html) {
        $this->_html = $html;
    }

    public function render() {
        echo $this->_html;
    }
}
