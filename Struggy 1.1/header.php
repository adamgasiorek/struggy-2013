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
}


</style>
<script>


var g=0;
var b=0;

 function map_poz(x,y){  
 $("#tlo").css("margin-left",x+"%"); 
 $("#character").css("margin-top",y+"%"); 
 }
 
function keyDown(e)
{
  var kluczKlawisza = e.keyCode ? e.keyCode : e.which;
  if (kluczKlawisza == 38)
    {
    	map_poz(g,b);
    	if (b>(-5))
    	b=b-0.3;
    }
  if (kluczKlawisza == 40)
     {
     	map_poz(g,b);
   		if (b<(4))
   		b=b+0.3;
   	 }
  if (kluczKlawisza == 37)
     {
     	map_poz(g,b);
    	if (g<46)
    	g=g+0.5;
     }
  if (kluczKlawisza == 39)
     {
     	map_poz(g,b);
    	if (g>(-1500))
    	g=g-0.5;
     }
}

</script>

<link rel="stylesheet" type="text/css" href="ajax-chat/style/stylee.css" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body onload="window.alert('Gra jest w caly czas tworzona wiec nie badz zaskoczony! Wroc wkrotce!');chat_api_onload('Glowny chat', false, '<?= $_POST['login'] ?>');" onkeydown="keyDown(event)" bgcolor="green">

<div id="PASEK" style="text-align: right;padding-right:0.5%;letter-spacing: 1">
	<a style="text-decoration: none;color:#C0C0C0;font-size: 90%;" href="index.php">(Wyloguj)</a>
</div>


 <img id='character' src='chlop.gif' style="position:absolute;left: 35%;top:55%;height:8%;width:2%;z-index: 99;"/>
   <!-- TUTAJ TLO GRY -->
<div id="okno_gry">
<img id="tlo" src="tloo.jpg" style="height: 100%;"/>

</div>





