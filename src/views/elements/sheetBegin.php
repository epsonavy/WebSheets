<?php

namespace nighthawk\hw4\elements;

require_once('element.php');

class SheetBegin extends Element {
	public function render($data) {
		return "<?xml version='1.0' encoding='UTF-8'?>
        <!DOCTYPE sheet SYSTEM 'sheet.dtd' >
        <sheet name='".$data."'>";
	}
}

?>