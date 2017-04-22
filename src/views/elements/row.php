<?php

namespace nighthawk\hw4\elements;

require_once('element.php');

class Row extends Element {
	public function render($data) {
		return "<row>".$data."</row>";
	}
}

?>