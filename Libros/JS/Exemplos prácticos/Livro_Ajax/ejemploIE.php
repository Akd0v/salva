<html><head><title>P�gina de ejemplo</title>
<script language="JavaScript" type="text/javascript">
var peticion01 = null; //Creamos la variable
//Para Internet Explorer creamos un objeto ActiveX
peticion01 = new XMLHttpRequest();
function Coger(url) {//Funci�n coger, en esta caso le entra una direcci�n relativa al documento actual.

    if(peticion01) { //Si tenemos el objeto peticion01
        peticion01.open('GET', url, false); //Abrimos la url, false =forma s�ncrona
        peticion01.send(null); //No le enviamos datos al servidor.
//Escribimos la respuesta en el campo con ID=resultado
        document.getElementById('resultado').innerHTML =
            peticion01.responseText;
    }
}
</script>
</head>
<body>
<!--Cuando ocurra el evento oneclick se llamar� la funci�n coger-->
<button onclick="Coger('datos/videoclub.xml')">Coge un documento</button>
<table border="4">
<tr>
<!--El campo con id=resultado se sustituir� por causa de que ese id
est� en la funci�n coger-->
<td><span id="resultado">Sin resultado</span></td>
</tr>
</table>
</body></html>