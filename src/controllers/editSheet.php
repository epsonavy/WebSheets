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

        $model->initConnection();

        $name = $_REQUEST['name'];
        $hasCode = $model->getDataByCode($name);
        $hasName = $model->getDataByName($name);

        array_push($newRes, $name);
        if ($hasCode) {
            echo "hashCode found!";
        } else if ($hasName) {
            echo "name found!";
        } else {
            $blank = "[[\"\", \"\"],[\"\", \"\"]]";
            $id = $model->addSheet_getID($name, $blank);
            print_r($id);
            //$model->addHashCode($id[0], md5($name.'read'), "read");
            //$model->addHashCode($id[0], md5($name.'edit'), "edit");
            //$model->addHashCode($id[0], md5($name.'file'), "file");
            array_push($newRes, $blank);
        }
        
        $view->render($newRes);
    }

}

?>