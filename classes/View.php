<?php
class View
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function output(){
	$data = "<p>" . $this->model->clientIP ."</p>";
        require_once('tpl/template.php');
    }
}
?>
