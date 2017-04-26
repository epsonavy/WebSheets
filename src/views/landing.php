<?php

namespace nighthawk\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/link.php');
require_once('helpers/form.php');
require_once('layouts/beginLayout.php');
require_once('layouts/endLayout.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class LandingView extends View {
	public function render($data) {

		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler('app_data/my_app.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('Visited landing page');

		$h1 = new \nighthawk\hw4\elements\H1();
		$link = new \nighthawk\hw4\elements\Link();
		$form = new \nighthawk\hw4\helpers\Form();
		$beginLayout = new \nighthawk\hw4\layouts\BeginLayout();
		$endLayout = new \nighthawk\hw4\layouts\EndLayout();

		$titleLink = array("index.php", "Web Sheets");

		echo $beginLayout->render($data);
		echo $h1->render($link->render($titleLink));
		echo $form->render($data);
		echo $endLayout->render($data);
	}
}

?>