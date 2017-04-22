<?php

namespace nighthawk\hw4\elements;

require_once('element.php');

class Data extends Element {
	public function render($data) {
		return "<data>".$data."</data>";
	}
}

?>