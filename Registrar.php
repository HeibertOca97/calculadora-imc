<?php
require_once "./Config/autoload.php";

if(isset($_POST["peso"]) && isset($_POST["estatura"])){
   $imc = new MasaCorporal();
   $peso = $_POST["peso"];
   $altura = $_POST["estatura"];
   $r_imc =Calculo::calcularIMC($peso, $altura);
   
   $array = (object)[
      "peso"=>$peso, 
      "altura"=>$altura,
      "imc"=>$r_imc,
      "clasificacion_id" => obtenerClasificacion($r_imc) //1 - 2 - 3 - 4 - 5 - 6
   ];

   try {
      $imc->insertar($array);
   } catch (\Throwable $th) {
      header("location: {$ruta}");
   } finally {
      header("location: {$ruta}");
   }

}

function obtenerClasificacion($resultado){
   if($resultado < 18.5){
      return 1;
   }else if($resultado >= 18.5 && $resultado <= 24.9){
      return 2;
   }else if($resultado >= 25 && $resultado <= 29.9){
      return 3;
   }else if($resultado >= 30 && $resultado <= 34.9){
      return 4;
   }else if($resultado >= 35 && $resultado <= 39.9){
      return 5;
   }else{
      return 6;
   }
} 