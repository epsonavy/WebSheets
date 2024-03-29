<?php

include 'src/configs/Config.php';

/*

No need to include 'src/configs/CreateDB.php';

To run this website, make sure modify database setting on src/configs/Config.php and then run command line at the that folder "php CreateDB.php" to initiate the database.

****************************************************************************

vendor folder and app_data folder has been added into .gitignore

Please Run command line "composer install" to install all dependencies

*/

require_once "vendor/autoload.php";

// Included all MVC modules

include 'src/models/landing.php';
include 'src/views/landing.php';
include 'src/controllers/landing.php';

include 'src/models/editSheet.php';
include 'src/views/editSheet.php';
include 'src/controllers/editSheet.php';

include 'src/models/readSheet.php';
include 'src/views/readSheet.php';
include 'src/controllers/readSheet.php';

include 'src/models/file.php';
include 'src/views/FileView.php';
include 'src/controllers/FileController.php';

include 'src/models/api.php';
include 'src/controllers/ApiController.php';

/*

An example to how to generate Monolog:

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/app_data/my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('My logger is now ready');

*/

// Web page debug use only
// ini_set('display_errors', 1);
// error_reporting(~0);

if (isset($_REQUEST['c'])) {
    $controller = $_REQUEST['c'];
    
    if ($controller == "editSheet") {
        $editSheetController = new nighthawk\hw4\controllers\EditSheetController();
        $editSheetController->handleRequest($_REQUEST);
    } else if ($controller == "readSheet") {
        $readSheetController = new nighthawk\hw4\controllers\ReadSheetController();
        $readSheetController->handleRequest($_REQUEST);
    } else if ($controller == "api") {
        $apiController = new nighthawk\hw4\controllers\ApiController();
        $apiController->handleRequest($_REQUEST);
    } else if ($controller == "file") {
        $fileController = new nighthawk\hw4\controllers\FileController();
        $fileController->handleRequest($_REQUEST);
    }
} else {
    $landingController = new nighthawk\hw4\controllers\LandingController();
    $landingController->handleRequest($_REQUEST);
}

?>



