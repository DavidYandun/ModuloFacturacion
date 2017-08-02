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

function ValidaCedula(cedula){
  var cedula = cedula;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      alert( "La c\xe9dula ES v\xe1lida!!!" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      return false;
    }
  }
  else
  {
    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
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