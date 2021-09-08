<?php
require_once "./Config/autoload.php";

if(isset($_GET["identificador"])){
   $id = $_GET["identificador"];
   $imc = new MasaCorporal();

   $imc->destroy($id);
   header("location: {$ruta}");
}