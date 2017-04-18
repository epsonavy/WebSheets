<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Sheet extends Helper {
	public function render($data) {
        ?>
		<div id="target"></div>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
        spreadsheet = new Spreadsheet("target", <?=$data ?>);
        spreadsheet.draw();
        </script>
        <?php
	}
}
?>

