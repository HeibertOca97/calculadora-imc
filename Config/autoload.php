<?php
$ruta = "http://localhost/www/backend/php/app-calculadora-IMC/";

function autoload($clase){
   include "./Clases/$clase.php";
}

spl_autoload_register("autoload");