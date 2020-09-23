<?php
namespace App\Http\Services\Decorator;

class Template2 extends HtmlTemplate {
    protected $_html;

    public function __construct() {
        $this->_html = "<div>__text__</div>";
    }

    public function set($html) {
        $this->_html = $html;
    }

    public function render() {
        echo $this->_html;
    }
}
