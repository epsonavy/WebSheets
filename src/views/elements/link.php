<?php

namespace nighthawk\hw4\elements;

require_once('element.php');

class Link extends Element {
    public function render($data) {
        return "<a href='" . $data . "'>" . $data . "</a>";
    }
}

?>