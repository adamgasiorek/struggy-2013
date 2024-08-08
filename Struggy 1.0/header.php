<html>
<head>
	<title>STRUGGLE :D</title>
	
	<style>
	
	/*Tu nawet nie zmieniaj*/
	#PLANSZA_GRY{
		width: 70%;
		height: 80%;
		position:absolute;		
	}
	#DOLNY_PANEL{
		width: 70%;
		height: 26%;
		top:72%;
		position:absolute;	
		background: #ffffff;
		
	}
	#GORNY_PANEL{
		height: 5%;
		width: 28%;
		float: right;
		position:absolute;	
		top: 3%;
		right: 0.5%;
	}
	#PASEK{
		width: 100%;
		height: 2%;
		position:absolute;	
		top: 0%;
		right: 0%;
		background-color: 2F4F4F;	
		z-index: 1;
		
	}
	#PANEL{
		height: 75%;
		width: 28%;
		float: right;
		position:absolute;
		top: 9%;
		right: 0.5%;
		
	}
	#MOJE_LOGO{
		height: 13%;
		width: 28%;
		float: right;
		position:absolute;
		right: 0.5%;
		top: 85%;
		
	}
	
	/*TU ZMIENIAMY PLANSZE GRY*/	
#okno_gry {
    position: relative;
    width: 70.8%;
    height: 73%;
    top: 2%;
    border: 1px solid black;
    overflow: hidden;
}
#przewijane {
   height: 100%;   
   width: 105%;
   overflow-x: scroll;    
}


</style>
	
<script>
		var szerokoscOkna = 0, wysokoscOkna = 0;
if (window.innerWidth && window.innerHeight) {
 szerokoscOkna = window.innerWidth;
 wysokoscOkna = window.innerHeight;
}

var pozycja_x = 0.35*szerokoscOkna;
var pozycja_y = 0.51*wysokoscOkna;
var xspeed = 1;
var yspeed = 0;
var maxSpeed = 7; // Tu zmieniaj predkosc!!

// Granice
var minx = 0.007*szerokoscOkna;
var miny = 0.41*wysokoscOkna;
var maxx = 0.685*szerokoscOkna; 
var maxy = 0.64*wysokoscOkna; 

// Kontrolki
var gora = 0;
var dol = 0;
var lewo = 0;
var prawo = 0;

function slowDownX()
{
  if (xspeed > 0)
    xspeed = xspeed - 1;
  if (xspeed < 0)
    xspeed = xspeed + 1;
}

function slowDownY()
{
  if (yspeed > 0)
    yspeed = yspeed - 1;
  if (yspeed < 0)
    yspeed = yspeed + 1;
}

function gameLoop()
{
	
  // Zmiana pozycji
  pozycja_x = Math.min(Math.max(pozycja_x + xspeed,minx),maxx);
  pozycja_y = Math.min(Math.max(pozycja_y + yspeed,miny),maxy);

  // lub bez granic
  // xpos = xpos + xspeed;
  // ypos = ypos + yspeed;

  // zmien aktualna pozycje
  document.getElementById('character').style.left = pozycja_x;
  document.getElementById('character').style.top = pozycja_y;

  // zmien predkosc bazujac na klawiszach
  if (gora == 1)
    yspeed = Math.max(yspeed - 1,-1*maxSpeed);
  if (dol == 1)
    yspeed = Math.min(yspeed + 1,1*maxSpeed)
  if (prawo == 1)
    xspeed = Math.min(xspeed + 1,1*maxSpeed);
  if (lewo == 1)
    xspeed = Math.max(xspeed - 1,-1*maxSpeed);

  // Zatrzym
  if (gora == 0 && dol == 0)
     slowDownY();
  if (lewo == 0 && prawo == 0)
     slowDownX();
	okno_gry.onclick = null;
  // Petla
  setTimeout("gameLoop()",30);
  
}

function keyDown(e)
{
  var kluczKlawisza = e.keyCode ? e.keyCode : e.which;
  if (kluczKlawisza == 38)
    gora = 1;
  if (kluczKlawisza == 40)
    dol = 1;
  if (kluczKlawisza == 37)
    lewo = 1;
  if (kluczKlawisza == 39)
    prawo = 1;
}

function keyUp(e)
{
  var kluczKlawisza = e.keyCode ? e.keyCode : e.which;
  if (kluczKlawisza == 38)
    gora = 0;
  if (kluczKlawisza == 40)
    dol = 0;
  if (kluczKlawisza == 37)
    lewo = 0;
  if (kluczKlawisza == 39)
    prawo = 0;
}
</script>
<link rel="stylesheet" type="text/css" href="ajax-chat/style/stylee.css" />
</head>

<body onload="window.alert('Gra jest w caly czas tworzona wiec nie badz zaskoczony! Wroc wkrotce!');chat_api_onload('Glowny chat', false, '<?= $_POST['login'] ?>');" onkeydown="keyDown(event)" onkeyup="keyUp(event)" bgcolor="green">

<div id="PASEK" style="text-align: right;padding-right:0.5%;letter-spacing: 1">
	<a style="text-decoration: none;color:#C0C0C0;font-size: 90%;" href="index.php">(Wyloguj)</a>
</div>


   <!-- TUTAJ TLO GRY -->
<div onclick="gameLoop()" name="okno_gry" id="okno_gry">
<div name="przewijane" id="przewijane">
<img name="tlo" src="tloo.jpg" style="height: 100%" />
</div>
</div>

   
 <img id='character' src='chlop.gif' style='position:absolute;left:-5%;top:-5%;height:8%;width:2%;'/>

	



