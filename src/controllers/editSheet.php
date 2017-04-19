<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler('app_data/my_app.log', Logger::DEBUG));
//$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('Visited edit sheet page');

class EditSheetController extends Controller {

    public function handleRequest($req) { 

        $model = new \nighthawk\hw4\models\EditSheetModel();
        $view = new \nighthawk\hw4\views\EditSheetView();
        $hasCode= $hasName = $newRes = Array();
        $md5_e = $md5_r = $md5_f = "";

        $model->initConnection();

        $name = $_REQUEST['name'];
        $hasCode = $model->getDataByCode($name);
        $hasName = $model->getDataByName($name);

        $md5_e = md5($name.'edit');
        $md5_r = md5($name.'read');
        $md5_f = md5($name.'file');

        array_push($newRes, $name);

        if ($hasCode) {
            echo "hashCode found!";

        } else if ($hasName) {
            echo "name found!";
            array_push($newRes, $hasName[0]);

        } else {
            $blank = "[[\"\", \"\"],[\"\", \"\"]]";
            $id = $model->addSheet_getID($name, $blank);
            
            $model->addHashCode($id[0], $md5_e, "edit");
            $model->addHashCode($id[0], $md5_r, "read");
            $model->addHashCode($id[0], $md5_f, "file");
            array_push($newRes, $blank);

        }

        array_push($newRes, "Edit");
        array_push($newRes, $md5_e);
        array_push($newRes, "Read");
        array_push($newRes, $md5_r);
        array_push($newRes, "File");
        array_push($newRes, $md5_f);

        $view->render($newRes);
    }

}

?>