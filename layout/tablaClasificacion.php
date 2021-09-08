<?php
$clasificacion = new Clasificacion();
$result = $clasificacion->getAll();

if(count($result) > 0){
   for ($i=0; $i < count($result); $i++) { 
      echo '
      <tr class="bg-nivel'.($i+1).'">
         <td middle="center">'.$result[$i]->valor.'</td>
         <td middle="center">'.$result[$i]->clasificacion.'</td>
         <td middle="center">'.$result[$i]->descripcion.'</td>
      </tr>
      ';
   }
}else{
   echo "
      <tr>
         <td colspan='2'>Por el momento no cuenta con ningun registro</td>
      </tr>
      ";
}