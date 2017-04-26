<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/link.php');
require_once('helpers/url.php');
require_once('helpers/sheetEditable.php');
require_once('layouts/beginLayout.php');
require_once('layouts/endLayout.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class EditSheetView extends View {
	public function render($data) {
		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler('app_data/my_app.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('Visited edit sheet page');

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