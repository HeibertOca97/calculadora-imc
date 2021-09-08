<?php
require_once "./Config/autoload.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Calculadora IMC</title>
   <!--FUENTES-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   <!--CSS-->
   <link rel="stylesheet" href="./src/css/index.css">
</head>
<body>

   <section class="container box-register">
      <div class="box-flex">
         <form action="./Registrar" method="post" id="form-imc" class="form-imc">
            <div class="fr-header">
               <h1>Indice de Masa Corporal</h1>
            </div>
            <div>
               <input type="text" class="input-register" name="estatura" placeholder="Estatura (m) Ejm: 1.65" autocomplete="off" required>
            </div>
            <div>
               <input type="text" class="input-register" name="peso" placeholder="Peso (Kg) Ejm: 68.59" autocomplete="off" required>
            </div>
            <div>
               <button type="submit" class="btn-default">Calcular y registrar</button>
            </div>
         </form>
         <table class="tb-clasificacion">
            <thead>
               <tr>
                  <th>IMC [peso (kg)/talla2 (m)]</th>
                  <th>Clasificacion de la OMS</th>
                  <th>Descripcion popular</th>
               </tr>
            </thead>
            <tbody>
               <?php
               include "./layout/tablaClasificacion.php";
               ?>
            </tbody>
         </table>
      </div>
   </section>

   <div class="container box-list">
      <?php
      include "./layout/seccionConsulta.php";
      ?>
   </div>
   <script src="./src/js/index.js"></script>
</body>
</html>