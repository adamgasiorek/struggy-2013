	var szerokoscOkna = 0, wysokoscOkna = 0;
if (window.innerWidth && window.innerHeight) {
 szerokoscOkna = window.innerWidth;
 wysokoscOkna = window.innerHeight;
}

var pozycja_x = 0.3*szerokoscOkna;
var pozycja_y = 0.4*wysokoscOkna;
var xspeed = 1;
var yspeed = 0;
var maxSpeed = 6; // Tu zmieniaj predkosc!!

// Granice
var minx = 0.007*szerokoscOkna;
var miny = 0.35*wysokoscOkna;
var maxx = 0.685*szerokoscOkna; 
var maxy = 0.53*wysokoscOkna; 

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
	
  location.reload(true)
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