<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/sheetBegin.php');
require_once('elements/sheetEnd.php');
require_once('elements/row.php');
require_once('elements/data.php');

class FileView extends View {
	public function render($data) {
		
		$sheet = new \nighthawk\hw4\elements\SheetBegin();
		$sheetEnd = new \nighthawk\hw4\elements\SheetEnd();
		$rowTag = new \nighthawk\hw4\elements\Row();
		$dataTag = new \nighthawk\hw4\elements\Data();

		$name = $data[0];
		$sheetData = $data[1];
		$sheetData = substr($sheetData, 1, strlen($sheetData) - 2);
		$rows = explode("],[", $sheetData);
		$rows_length = count($rows);
		$cells = array();
		for ($i = 0; $i < $rows_length; $i++) {
			array_push($cells, explode(",", $rows[$i]));
		}
		
		echo $sheet->render($name);
		/*
		$h1 = new \nighthawk\hw4\elements\H1();
		$link = new \nighthawk\hw4\elements\Link();
		$form = new \nighthawk\hw4\helpers\Form();
		$beginLayout = new \nighthawk\hw4\layouts\BeginLayout();
		$endLayout = new \nighthawk\hw4\layouts\EndLayout();

		$titleLink = array("index.php", "Web Sheets");

		echo $beginLayout->render($data);
		echo $h1->render($link->render($titleLink));
		echo $form->render($data);
		echo $endLayout->render($data);*/
	}
}

?>