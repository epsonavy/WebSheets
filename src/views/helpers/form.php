<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Form extends Helper {
	public function render($data) {
        ?>
		<form method="get" action="index.php"><input type="hidden" name="c" value="sublist" /><input type="submit" value="Add" /></form>
        <?php
	}
}
?>