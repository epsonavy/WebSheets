<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class FileUrl extends Helper {
	public function render($data) {
        ?>
		<form method="get" action="index.php?c=landing&m=form" onsubmit="return validateForm()">
        <input type="text" name="code" placeholder="New sheet name or code" />
        <input type="submit" value="Go" />
        </form>
        <?php
	}
}
?>

<script>
function validateForm() { 
    return true;
}
</script>