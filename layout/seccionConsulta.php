<?php
   $imc = new MasaCorporal();
   if(count($imc->getJoin()) > 0){
?>
<h2>Lista de registros</h2><br>
<p>Consulte su registros, para ello ingrese el resultado minino y maximo del Indice de Masa Corporal obtenido, para que posteriormente se muestren los registros que estan entre ese rango.</p>
<form action="./index" method="post" class="fr-consulta" id="fr-consulta">
   <input type="text" name="imc_min" placeholder="IMC minimo" autocomplete="off" required>
   <input type="text" name="imc_max" placeholder="IMC maximo" autocomplete="off" required>
   <button type="submit" class="btn-default">Consultar</button>
   <a href="<?php $ruta ?>" class="btn-listar">Listar todo</a>
</form>
<div class="box-max-height">

<?php
   }
if(isset($_POST["imc_min"]) && isset($_POST["imc_max"])){
   $min = $_POST["imc_min"];
   $max = $_POST["imc_max"];
   try {
      $recuperarResultados = $imc->getByJoin($min, $max);
      if($recuperarResultados){
         templateCards($recuperarResultados);
      }else{
         echo '
         <article class="box-card-vacio">
            <p>No se encontraron resultados de esta busqueda</p>
         </article>
         ';
      }
   } catch (\Throwable $th) {
      //Si $min = null o $max = null
      $listadoResultados = $imc->getJoin();
      templateCards($listadoResultados);
   }
}else{
   $listadoResultados = $imc->getJoin();
   templateCards($listadoResultados);
}

function templateCards($datoRecuperado){
   if(count($datoRecuperado) > 0){
      for ($i=0; $i < count($datoRecuperado); $i++) { 
         echo '
         <article class="box-card">
            <p>
               <strong>Fecha de creacion: </strong> <span>'.$datoRecuperado[$i]->fecha.'</span>
            <p>
            <p>
               <strong>Peso: </strong> <span>'.$datoRecuperado[$i]->peso.'</span>
               - <strong>Altura: </strong> <span>'.$datoRecuperado[$i]->altura.'</span>
               - <strong>Masa Corporal: </strong> <span>'.$datoRecuperado[$i]->imc.'</span>
            <p>
            <h4>Descripcion:</h4>
            <p>Su IMC es <strong class="cl-nivel'.$datoRecuperado[$i]->clasificacion_id.'">'.$datoRecuperado[$i]->imc.'</strong>, lo que indica que su peso está en la categoría de <strong class="cl-nivel'.$datoRecuperado[$i]->clasificacion_id.'">"'.$datoRecuperado[$i]->clasificacion.'"</strong> para adultos de su misma estatura.</p>
            <a href="./Eliminar?identificador='.$datoRecuperado[$i]->id.'" class="btn-eliminar">Eliminar</a>
         </article>
         ';
      }
   }else{
      echo '
      <article class="box-card-vacio">
         <p>Por el momento no hay ningun registro</p>
      </article>
      ';
   }
}
?>
</div>