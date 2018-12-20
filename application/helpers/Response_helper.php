<?php

class Response_helper{

    public static function part($file){
        include str_replace("system", "application/views/", BASEPATH) . "part/$file.php";
    }

    public static function render($file, $var = []){
        extract($var);
        include str_replace("system", "application/views/", BASEPATH)."/".$file.".php";
    }
}

?>