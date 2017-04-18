<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Url extends Helper {
	public function render($data) {
        if (strcasecmp($data[0], "edit") == 0) {
            return 'Edit Url : <input type="text" name="code" value="'.$data[1].'" /><br />';
        } else if (strcasecmp($data[0], "read") == 0) {
            return 'Read Url : <input type="text" name="code" value="'.$data[1].'" /><br />';
        } else if (strcasecmp($data[0], "file") == 0) {
            return 'File Url : <input type="text" name="code" value="'.$data[1].'" /><br />';
        } else {
            return $data[0].' Url : <input type="text" name="code" value="'.$data[1].'" /><br />';
        }      
	}
}
?>
