<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Form extends Helper {
	public function render($data) {
        ?>
		<form method="get" action="index.php?c=editSheet&m=form" name="myForm" onsubmit="return validateForm()">
        <input type="text" name="name" placeholder="New sheet name or code" />
        <input type="submit" value="Go" />
        </form>
        <?php
	}
}
?>

<script>
function validateForm() { 
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name or hash code must be filled out");
        return false;
    }

    // Check whitespace
    x = x.replace(/^\s+/, '').replace(/\s+$/, '');
    if ( x == '') {
        alert("Whitespace is not allow, please enter correct name!");
        return false;
    }
}
</script>