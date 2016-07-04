
function hacerClic()
	{
		document.querySelector("#principal p:firstchild").onclick=mostrarAlerta;
	}
function mostrarAlerta()
	{
		alert('hizo clic!');
	}
			
window.onload=hacerClic;

