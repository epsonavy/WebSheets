<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/link.php');
require_once('helpers/form.php');
require_once('layouts/beginLayout.php');
require_once('layouts/endLayout.php');

class LandingView extends View {
	public function render($data) {
		
		$h1 = new \nighthawk\hw4\elements\H1();
		$link = new \nighthawk\hw4\elements\Link();
		$form = new \nighthawk\hw4\helpers\Form();
		$beginLayout = new \nighthawk\hw4\layouts\BeginLayout();
		$endLayout = new \nighthawk\hw4\layouts\EndLayout();

		$titleLink = array("index.php", "Web Sheets");

		echo $beginLayout->render($data);
		echo $h1->render($link->render($titleLink));
		
		echo $endLayout->render($data);
	}
}

?>