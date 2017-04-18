<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Url extends Helper {
	public function render($data) {
        return $data[0].' Url : <input type="text" name="code" value="'.$data[1].'" />';
	}
}
?>
