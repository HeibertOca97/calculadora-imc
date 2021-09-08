<?php
require_once "./Config/autoload.php";

$imc = new MasaCorporal();
//************** CREAR ****************
$array = (object)[
   "peso"=>68.69, 
   "altura"=>1.65,
   "imc"=>Calculo::calcularIMC(68.69, 1.65),
   "clasificacion_id" => 3 //1 - 2 - 3 - 4 - 5 - 6
];
//var_dump($array);
//print $array->peso;
// $imc->insertar($array);

print "<h3>- Listado de Indice de Masa Corporal</h3>";
$result1 = $imc->getJoin();
if(count($result1) > 0){
   for ($i=0; $i < count($result1); $i++) { 
      print "<b>id: </b> ".$result1[$i]->id." <b>Peso:</b> ".$result1[$i]->peso." <b>Altura:</b> ".$result1[$i]->altura." <b>IMC:</b> ".$result1[$i]->imc." <b>Valores IMC:</b> ".$result1[$i]->valor." <b>Clasificacion:</b> ".$result1[$i]->clasificacion." <b>Descripcion:</b> ".$result1[$i]->descripcion."<br>";
   }
}else{
   print "<h4>Por el momento no hay ningun registro</h4>";
}

$clasificacion = new Clasificacion();
$result2 = $clasificacion->getAll();
print "<h3>- Tabla de clasificacion IMC</h3>";
if(count($result2) > 0){
   for ($i=0; $i < count($result2); $i++) { 
      print "<b>id: </b> ".$result2[$i]->id." <b>IMC:</b> ".$result2[$i]->valor." <b>Clasificacion:</b> ".$result2[$i]->clasificacion." <b>Descripcion:</b> ".$result2[$i]->descripcion."<br>";
   }
}else{
   print "<h4>Por el momento no hay ningun registro</h4>";
}