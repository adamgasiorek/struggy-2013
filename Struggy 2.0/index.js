var handler = function(req, res) {
	fs.readFile('./game.html', function(err, data) {
		if (err)
			throw err;
		res.writeHead(200);
		res.end(data);
	});
}
fs = require('fs');
http = require('http');
url = require('url');


http.createServer(function(req, res){
  var request = url.parse(req.url, true);
  var action = request.pathname;

  if (action == '/image.jpg') {
     var img = fs.readFileSync('./image.jpg');
     res.writeHead(200, {'Content-Type': 'image/jpg' });
     res.end(img, 'binary');
  }  
  if (action == '/postac.gif') {
     var img = fs.readFileSync('./postac.gif');
     res.writeHead(200, {'Content-Type': 'image/gif' });
     res.end(img, 'binary');
  } 
}).listen(8080, '127.0.0.1');


var app = require('http').createServer(handler);
var io = require('socket.io').listen(app);
var fs = require('fs');
var port = 3250;

app.listen(port);

var listaPostaci = [];
var liczbaGraczy = 1;

io.sockets.on('connection', function(socket) {

	socket.on('room', function(data) {

		room = data;
		if (room == 'plac') {
			socket.join(room);

			var licznik = liczbaGraczy++;
			var naszaPOSTAC = stworzPOSTAC(licznik,500);
			socket.emit('dodawajELEMENTY',room);
			socket.emit("dodajMojaPostac", naszaPOSTAC);
			socket.emit("listaPostaci", listaPostaci);
			socket.broadcast.emit("dodajINNYMmojaPostac", naszaPOSTAC)
			listaPostaci.push(naszaPOSTAC);

			
			socket.on('wyjdz',function(data)
			{
				socket.leave(data);
			})

			socket.on("edytujListe", function(data) {

				for (var i = 0, n = listaPostaci.length; i < n; i++) {
					if (listaPostaci[i].id == data.id) {

						listaPostaci[i].pozycjaX = data.X;
						listaPostaci[i].pozycjaY = data.Y;
					}
				}
			});

			socket.on("odbierzKluczKlawisza", function(data) {

				io.sockets.in(room).emit("zmienPozycjePostaci", {
					pozycjee : data.klucze,
					id : data.id
				});
				socket.emit('przewin', {
					pozycja : data.klucze
				});
			});

			socket.on("disconnect", function() {
				var licznik = --liczbaGraczy;
				var sId = licznik;
				for (var i = 0, n = listaPostaci.length; i < n; ++i) {
					var postac = listaPostaci[i];
					if (postac.id == sId) {
						io.sockets.in(room).emit("leave", {
							id : postac.id
						});
						listaPostaci.splice(i, 1);
						break;
					}
				}
			});
		}
		if (room == 'sklepik') {
			socket.join(room);

			var licznik = liczbaGraczy++;
			var naszaPOSTAC = stworzPOSTAC(licznik,130);
			socket.emit('dodawajELEMENTY',room);
			socket.emit("dodajMojaPostac", naszaPOSTAC);
			socket.emit("listaPostaci", listaPostaci);
			socket.broadcast.emit("dodajINNYMmojaPostac", naszaPOSTAC)
			listaPostaci.push(naszaPOSTAC);


			socket.on("edytujListe", function(data) {

				for (var i = 0, n = listaPostaci.length; i < n; i++) {
					if (listaPostaci[i].id == data.id) {

						listaPostaci[i].pozycjaX = data.X;
						listaPostaci[i].pozycjaY = data.Y;
					}
				}
			});

			socket.on("odbierzKluczKlawisza", function(data) {

				io.sockets.in(room).emit("zmienPozycjePostaci", {
					pozycjee : data.klucze,
					id : data.id
				});
				socket.emit('przewin', {
					pozycja : data.klucze
				});
			});

			socket.on("disconnect", function() {
				var licznik = --liczbaGraczy;
				var sId = licznik;
				for (var i = 0, n = listaPostaci.length; i < n; ++i) {
					var postac = listaPostaci[i];
					if (postac.id == sId) {
						io.sockets.in(room).emit("leave", {
							id : postac.id
						});
						listaPostaci.splice(i, 1);
						break;
					}
				}
			});
		}

	});


});

function stworzPOSTAC(id,procent) {
	var postac = {		
		id : id,
		pozycjaX : procent,
		pozycjaY : (-25),
		opis : 'adama' + id,
		alt : 500

	}
	return postac;
}

////////////// RUCH ///////////////

///////////////////////////////////////////////////////////

