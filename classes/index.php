<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('classes/Model.php');
require_once('classes/Controller.php');
require_once('classes/View.php');

$page = $_GET['page'];
if (!empty($page)) {

    $data = array(
        'index' => array('model' => 'Model', 'view' => 'View', 'controller' => 'Controller'),
    );

    foreach($data as $key => $components){
        if ($page == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }

    if (isset($model)) {
        $m = new $model();
        $c = new $controller($model);
        $v = new $view($m);
        echo $v->output();
    }
}


?>
