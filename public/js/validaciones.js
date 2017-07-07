function esDigito() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(cod);
    if (caracter >= 0 && caracter <= 9 && caracter!==" ") {
        return true;
    }
    return false;
}

function esAlfaNum() {
  var evento = window.event;
  var cod = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(cod);
  if (caracter >= 0 && caracter <= 9 && caracter!==" " || (caracter >= 'a' && caracter <= 'z')) {
      return true;
  }
  return false;
}

function esLetra() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(cod);
    if (caracter >= 'a' && caracter <= 'z' || caracter >= 'A' && caracter <= 'Z' || caracter==='ñ' || caracter==='Ñ' || caracter===" "
           || caracter==='Á' || caracter==='É' || caracter==='Í' || caracter==='Ó' || caracter==='Ú' || caracter==='á' || caracter==='é'
           || caracter==='í' || caracter==='ó' || caracter==='ú') {
        return true;
    }
    return false;
}

function verificarCedulaRuc(cedula,boton) {
    var digitos = cedula.split("");
    var a = new Array();
    var c1 = 0, c2 = 0, d, e, f = 0;
    for (var i = 0; i < 9; i++) {
        a[i] = parseInt(digitos[i]);
        if (i % 2 === 0) {
            d = a[i] * 2;
            if (d < 9) {
                c1 += d;
            } else {
                c1 += d - 9;
            }
        } else {
            d = a[i];
            c2 += d;
        }
    }
    e = c1 + c2;
    for (var j = 10; j <= 60; j = j + 10) {
        if (e <= j) {
            f = j - e;
            break;
        }
    }

    if(digitos.length===10){
        return parseInt(digitos[9]) === f;
    }else if(digitos.length===13){
        return parseInt(digitos[9])===f && digitos[10]==='0' && digitos[11]==='0' && digitos[12]==='1';
    }
    return parseInt(digitos[9]) === f;
}

function ValidarCedula(cedula, boton)
{
    var cedula = cedula;
    array = cedula.split("");
    num = array.length;
    if (num == 10)
    {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++)
        {
            mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            } else
            {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final == 10 && digito == 0) || (final == digito)) {
            boton.disabled = false;
            return true;
        } else
        {
            alert("La c\xe9dula NO es v\xe1lida!!!");
            boton.disabled = true;
            return false;
        }
    } else {
        alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
        boton.disabled = true;
        return false;
    }

    
    function validarRuc(){
  var number = document.getElementById('ruc').value;
  var dto = number.length;
  var valor;
  var acu=0;
  if(number==""){
   alert('No has ingresado ningún dato, porfavor ingresar los datos correspondientes.');
   }
  else{
   for (var i=0; i<dto; i++){
   valor = number.substring(i,i+1);
   if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
    acu = acu+1;
   }
   }
   if(acu==dto){
    while(number.substring(10,13)!=001){
     alert('Los tres últimos dígitos no tienen el código del RUC 001.');
     return;
    }
    while(number.substring(0,2)>24){    
     alert('Los dos primeros dígitos no pueden ser mayores a 24.');
     return;
    }
    alert('El RUC está escrito correctamente');
    alert('Se procederá a analizar el respectivo RUC.');
    var porcion1 = number.substring(2,3);
    if(porcion1<6){
     alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
    }
    else{
     if(porcion1==6){
      alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
     }
     else{
      if(porcion1==9){
       alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
      }
     }
    }
   }
   else{
   alert("ERROR: Por favor no ingrese texto");
   }
  }
 }
}