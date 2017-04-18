<?php

namespace nighthawk\hw4\helpers;

require_once('helper.php');

class Url extends Helper {

	public function render($data) {

        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);

        $V_URL = 'http://' . $_SERVER['HTTP_HOST'].$uri_parts[0];

        if (strcasecmp($data[0], "edit") == 0) {
            return 'Edit Url : <input type="text" name="code" size="80" value="'.$V_URL.'?c=editSheet&code='.$data[1].'" /><br />';
        } else if (strcasecmp($data[0], "read") == 0) {
            return 'Read Url : <input type="text" name="code" size="80" value="'.$V_URL.'?c=readSheet&code='.$data[1].'" /><br />';
        } else if (strcasecmp($data[0], "file") == 0) {
            return 'File Url : <input type="text" name="code" size="80" value="'.$V_URL.'?c=file&code='.$data[1].'" /><br />';
        } else {
            return $data[0].' Url : <input type="text" name="code" size="80" value="'.$data[1].'" /><br />';
        }      
	}
}
?>
