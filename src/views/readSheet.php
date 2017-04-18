<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/link.php');
require_once('helpers/url.php');
require_once('layouts/beginLayout.php');
require_once('layouts/endLayout.php');

class ReadSheetView extends View {
	public function render($data) {
		if ($data) {
			if ($data[1]) {
				echo $data[1];
			}
		}
		//dummy data for testing
		$data[0] = "dummy title";
		$data[1] = [["Tom",5],["Sally", 6]];
		$data[2] = "File";
		$data[3] = "12345678";

		$h1 = new \nighthawk\hw4\elements\H1();
		$link = new \nighthawk\hw4\elements\Link();
		$url = new \nighthawk\hw4\helpers\Url();
		$beginLayout = new \nighthawk\hw4\layouts\BeginLayout();
		$endLayout = new \nighthawk\hw4\layouts\EndLayout();

		$titleLink = array("index.php", "Web Sheets");

		echo $beginLayout->render($data);
		echo $h1->render($link->render($titleLink)." : ".$data[0]);
		echo $url->render(array($data[2], $data[3]));

		echo $endLayout->render($data);
	}
}

?>