<?php

class Clasificacion extends Conectar{
   private $table;
   private $con;

   public function __construct(){
      parent::__construct();
      $this->table = "tb_clasificacion";
      $this->con = $this->conexion();
   }

   public function getAll(){
      $sql = "SELECT * FROM {$this->table}";
      $result = mysqli_query($this->con, $sql);

      $clasificacion = [];
      while ($fila = mysqli_fetch_assoc($result)) {
         $clasificacion[] = [
            "id" => $fila["id"],
            "valor" => $fila["valor_imc"],
            "clasificacion" => $fila["clasificacion"],
            "descripcion" => $fila["descripcion"]
         ];
      }

      return json_decode(json_encode($clasificacion));
   }
}