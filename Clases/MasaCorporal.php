<?php

class MasaCorporal{
   private $peso;
   private $altura;
   private $table;
   private $con;

   public function __construct() {
      $this->con = new Conectar();
      $this->table = "tb_masacorporal";
   }

   public function _set($propiedad, $valor){
      if(property_exists($this, $propiedad)){
         $this->$propiedad = $valor;
      }
   }

   public function _get($propiedad){
      if(property_exists($this, $propiedad)){
         return $this->$propiedad;
      }
   }

   public function setTable($table){
      $this->table = $table;
   }

   public function insertar($object){
      $sql = "INSERT INTO {$this->table}(id, peso,altura,imc,fecha,clasificacion_id) VALUES(null, $object->peso, $object->altura, $object->imc, NOW(), $object->clasificacion_id)";

      try {
         $result = mysqli_query($this->con->conexion(), $sql);
         
         if(!$result){
            throw new Throwable  ("Ocurrio un fallo en la creacion de los datos del IMC");
         }
      } catch (\Throwable   $e) {
         print "Error: " . $e;
      } finally {
         $this->con->cerrarConexion();
      }
   }

   public function getJoin(){
      $sql = "SELECT {$this->table}.id, peso, altura, imc, fecha, clasificacion_id, valor_imc, clasificacion, descripcion FROM {$this->table} INNER JOIN tb_clasificacion ON {$this->table}.clasificacion_id = tb_clasificacion.id ORDER BY {$this->table}.id DESC";

      $result = mysqli_query($this->con->conexion(), $sql);

      $clasificacion = [];
      
      while ($fila = mysqli_fetch_assoc($result)) {
         $clasificacion[] = [
            "id" => $fila["id"],
            "peso" => $fila["peso"],
            "altura" => $fila["altura"],
            "imc" => $fila["imc"],
            "fecha" => $fila["fecha"],
            "clasificacion_id" => $fila["clasificacion_id"],
            "valor" => $fila["valor_imc"],
            "clasificacion" => $fila["clasificacion"],
            "descripcion" => $fila["descripcion"]
         ];
      }

      return json_decode(json_encode($clasificacion));
   }

   public function getByJoin($min, $max){
      $sql = "SELECT {$this->table}.id, peso, altura, imc, fecha, clasificacion_id, valor_imc, clasificacion, descripcion FROM {$this->table} INNER JOIN tb_clasificacion ON {$this->table}.clasificacion_id = tb_clasificacion.id WHERE {$this->table}.imc BETWEEN $min AND $max ORDER BY {$this->table}.id DESC";

      $result = mysqli_query($this->con->conexion(), $sql);

      $clasificacion = [];
      
      while ($fila = mysqli_fetch_assoc($result)) {
         $clasificacion[] = [
            "id" => $fila["id"],
            "peso" => $fila["peso"],
            "altura" => $fila["altura"],
            "imc" => $fila["imc"],
            "fecha" => $fila["fecha"],
            "clasificacion_id" => $fila["clasificacion_id"],
            "valor" => $fila["valor_imc"],
            "clasificacion" => $fila["clasificacion"],
            "descripcion" => $fila["descripcion"]
         ];
      }

      return json_decode(json_encode($clasificacion));
   }

   public function destroy($id){
      $sql = "DELETE FROM {$this->table} WHERE id = $id";
      mysqli_query($this->con->conexion(), $sql);

   }

}