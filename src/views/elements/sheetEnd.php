<?php

namespace nighthawk\hw4\elements;

require_once('element.php');

class SheetEnd extends Element {
	public function render($data) {
		return "</sheet>";
	}
}

?>