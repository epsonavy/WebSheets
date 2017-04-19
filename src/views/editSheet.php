<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/link.php');
require_once('helpers/url.php');
require_once('helpers/sheetEditable.php');
require_once('layouts/beginLayout.php');
require_once('layouts/endLayout.php');

class EditSheetView extends View {
	public function render($data) {
		
		print_r($data);

		//dummy data for testing
		$data[0] = "dummy title";
		$data[1] = "[[\"Peter\", \"50\"],[\"Kevin\", \"6\"]]";
		$data[2] = "Edit";
		$data[3] = "12345678";
		$data[4] = "Read";
		$data[5] = "12345678";
		$data[6] = "File";
		$data[7] = "12345678";

		$h1 = new \nighthawk\hw4\elements\H1();
		$link = new \nighthawk\hw4\elements\Link();
		$url = new \nighthawk\hw4\helpers\Url();
		$sheet = new \nighthawk\hw4\helpers\SheetEditable();
		$beginLayout = new \nighthawk\hw4\layouts\BeginLayout();
		$endLayout = new \nighthawk\hw4\layouts\EndLayout();

		$titleLink = array("index.php", "Web Sheets");

		echo $beginLayout->render($data);
		echo $h1->render($link->render($titleLink)." : ".$data[0]);
		echo $url->render(array($data[2], $data[3]));
		echo $url->render(array($data[4], $data[5]));
		echo $url->render(array($data[6], $data[7]));
		echo $sheet->render($data[1]);
		echo $endLayout->render($data);
	}
}

?>