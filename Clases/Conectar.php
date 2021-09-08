<?php
class Conectar{
   private $host = "127.0.0.1";
   private $user = "root";
   private $pass = "";
   private $db = "db_imc";
   private $con;

   public function __construct(){
      $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
   }

   public function comprobarConexion(){
      if(!$this->con){
        $this->con or die("Error en la conexion ". mysqli_connect_error());
      }
   }

   public function conexion(){
      return $this->con;
   }

   public function cerrarConexion(){
      mysqli_close($this->con);
   }

}