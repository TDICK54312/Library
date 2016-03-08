<?php
class Model
{
    public $tstring;

    public function __construct(){
        $this->clientIP = $_SERVER['REMOTE_ADDR'];
        $this->template = "tpl/template.php";
    }
}
?>
