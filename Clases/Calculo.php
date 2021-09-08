<?php

class Calculo{
   
   public static function calcularIMC($peso, $altura){
      $r_imc = $peso / pow($altura, 2);
      return self::formatterResult($r_imc);
   }
      
   private static function formatterResult($resultado){
      return number_format($resultado, 2);
   }

}