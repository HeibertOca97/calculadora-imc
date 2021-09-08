"use strict";

const peso = document.querySelector("input[name=peso]"),
 estatura = document.querySelector("input[name=estatura]"),
 minimo = document.querySelector("input[name=imc_min]"),
 maximo = document.querySelector("input[name=imc_max]"),
formConsulta = document.getElementById("fr-consulta"),
formRegistro = document.getElementById("form-imc");
let btnEliminar = document.querySelectorAll(".btn-eliminar");


const sendDataFormRegister = (e)=>{
   e.preventDefault();
   if(Number(peso.value) > 0 && Number(estatura.value) > 0){
      e.target.submit();
   }
}

const sendDataFormConsult = (e)=>{
   e.preventDefault();
   if(Number(minimo.value) > 0 && Number(maximo.value) > 0){
      e.target.submit();
   }
}

const allowToWriteOnlyNumbers = (e) => {
   let key = window.event ? e.which : e.keyCode;
   if ((key !== 46 && key < 48) || key > 57) {
      e.preventDefault();
   }
};

[peso, estatura, maximo, minimo].forEach(element => {
   if(element){
      element.addEventListener("keypress", allowToWriteOnlyNumbers);
   }
});

formRegistro.addEventListener("submit", sendDataFormRegister);
formConsulta.addEventListener("submit", sendDataFormConsult);

if(btnEliminar){
   for (let index = 0; index < btnEliminar.length; index++) {
      
      btnEliminar[index].addEventListener("click", e => {
         e.preventDefault();
        let url = e.target.getAttribute("href");
        if(window.confirm("Esta seguro de eliminar este registro?")){
           window.location = `${url}`;
        }
      })
   }
}