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

        if (isset($_REQUEST['code'])) {
            echo "Analyzing hashcode : ".$_REQUEST['code']." ...";
            $dataFromCode = $model->getDataByCode($_REQUEST['code']);
            $id = $dataFromCode[0];
            $dataFromId = $model->getDataById($id);
            $name = $dataFromId[0];

            $md5_e = substr(md5($name.'edit'), 0, 7);
            $md5_r = substr(md5($name.'read'), 0, 7);
            $md5_f = substr(md5($name.'file'), 0, 7);

            array_push($newRes, $name);
            array_push($newRes, $dataFromId[1]);
        } else {

            $name = $_REQUEST['name'];
            $hasCode = $model->getDataByCode($name);
            $hasName = $model->getDataByName($name);

            // substr(string,start,length)
            $md5_e = substr(md5($name.'edit'), 0, 7);
            $md5_r = substr(md5($name.'read'), 0, 7);
            $md5_f = substr(md5($name.'file'), 0, 7);

            array_push($newRes, $name);

            if ($hasCode) {
               //echo "hashCode found!";
                $hashCode = $name;
                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                $V_URL = 'http://' . $_SERVER['HTTP_HOST'].$uri_parts[0];

                if ($hasCode[1] == 'edit') {
                    $link = $V_URL.'?c=editSheet&code='.$hashCode;
                    header('Location:'.$link);
                    exit;
                } else if ($hashcode[1] == 'read') {
                    $link = $V_URL.'?c=readSheet&code='.$hashCode;
                    header('Location:'.$link);
                    exit;
                } else {
                    $link = $V_URL.'?c=file&code='.$hashCode;
                    header('Location:'.$link);
                    exit;
                }

            } else if ($hasName) {
                echo $name." sheet found!";
                array_push($newRes, $hasName[0]);

            } else {
                $blank = "[[\"\", \"\"],[\"\", \"\"]]";
                $id = $model->addSheet_getID($name, $blank);
                
                $model->addHashCode($id[0], $md5_e, "edit");
                $model->addHashCode($id[0], $md5_r, "read");
                $model->addHashCode($id[0], $md5_f, "file");
                array_push($newRes, $blank);

            }
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