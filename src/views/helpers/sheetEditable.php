<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class SheetEditable extends Helper {
	public function render($data) {
        ?>
		<div id="target"></div>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
        spreadsheet = new Spreadsheet("target", <?=$data ?>, {"mode":"write"});
        spreadsheet.draw();
        </script>
        <?php
	}
}
?>

