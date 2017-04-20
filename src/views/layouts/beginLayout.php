<?php

namespace nighthawk\hw4\layouts;

require_once('layout.php');

class BeginLayout extends Layout {
	
	public function render($data) {

	    ?><!DOCTYPE html>
	    <html>
	    <head>
	        <meta charset="UTF-8">
	        <title>Web Sheets</title>
	        <script type="text/javascript" src="spreadsheet.js"></script>
	        <link rel="stylesheet" type="text/css" href="src/styles/style.css">
	    </head>
	    <body>
	    <?php
	}
}

?>