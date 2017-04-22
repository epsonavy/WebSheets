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

		echo $sheet->render($name);

		$sheetData = substr($sheetData, 1, strlen($sheetData) - 2);
		$rows = explode("],[", $sheetData);
		$rows_length = count($rows);
		$cells = array();
		for ($i = 0; $i < $rows_length; $i++) {
			echo "<row>";
			array_push($cells, explode(",", $rows[$i]));
			foreach ($cells as $key => $data) {
				foreach ($data as $key => $value) {
					if (substr($value, 0, 1) == "[") {
						$value = substr($value, 1, strlen($value));
					}
					if (substr($value, strlen($value) - 1, strlen($value)) == "]") {
						$value = substr($value, 0, strlen($value) - 1);
					}
					$value = trim($value, "\"");

					echo $dataTag->render($value);
				}		
			}
			echo "</row>";
		}
		echo $sheetEnd->render(null);
	}
}

?>