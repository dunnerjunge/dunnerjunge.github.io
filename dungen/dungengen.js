//Dungen referenzen
var pref = {
	tileset: ['o', 'r', 'or', 'u', 'ou', 'ru', 'oru', 'l', 'ol', 'rl', 'orl', 'ul', 'oul', 'rul', 'orul'],
	tiles: 0,
	remainTiles: 0,
	drawedTiles: 0,
	status: "noData"
};

function randomIntFromInterval(min, max) {
return Math.floor(Math.random() * (max - min + 1) + min);
}

//wie viele Tiles soll der Dungen haben?(Min,Max)
pref.tiles = randomIntFromInterval(5, 100);

const neededTiles = pref.tiles;
if(neededTiles <=4){pref.status = "Error - Zu wenig Tiles!";}

class tile {
	constructor(id, x, y, image){
	this.image = image;
	this.id = id;
	this.x = x;
	this.y = y;
	this.top = stringTile(image,'o');
	this.right = stringTile(image,'r');
	this.bottom = stringTile(image,'u');
	this.left = stringTile(image,'l');
	this.status = 1;
	}
}

function stringTile(x,y){
var x = x;
var y = y;
if(x.includes(y)){var a = 1;}else{var a = 0;}
return a;
}

function firstTileString(){
const rNr = randomIntFromInterval(0,14);

return pref.tileset[rNr];
}

var firstTile = new tile (2, 0, 0, firstTileString());
pref.remainTiles = pref.remainTiles+(firstTile.image.length+1);
//schaut ob ein tile rundherum exestiert und dieses geöffnet oder geschlossen ist und passt das tile an
function spawn(l,x,y,id){
var l = l;var x = x;var y = y;var id = id;
switch(l){
case 'o':
y = y+50;
var idNr = 2;
break;
case 'r':
x = x+50;
var idNr = 3;
break;
case 'u':
y = y-50;
var idNr = 4;
break;
case 'l':
x = x-50;
var idNr = 5;
break;
}
var TileStatusCounter = 0;

for(var i of dungenTiles){
if(i[1] == 1){
		if(i[2] == 1){
		TileStatusCounter = TileStatusCounter + 1;	
		}
		if(i[3] == 1){
		TileStatusCounter = TileStatusCounter + 1;	
		}
		if(i[4] == 1){
		TileStatusCounter = TileStatusCounter + 1;	
		}
		if(i[5] == 1){
		TileStatusCounter = TileStatusCounter + 1;	
		}	
}
	if(i[6] == x && i[7] == y){
		if(i[8].includes(l)){
		i[idNr] = id;	
		return i[0];
		}
	return 0;
	}
}

if(pref.remainTiles != pref.tiles && (randomIntFromInterval(0,1) == 1 || TileStatusCounter == 0)){
pref.remainTiles++;
return 1;	
}else{
return 0;	
}
}
//setzt den status auf 1 oder 0
function statusInsert(o,r,u,l){
var o = o;var r = r;var u = u;var l = l;
if(o == 1 || r == 1 || u == 1 || l == 1){
return 1;	
}
return 0;
}
//erzeugt ein bild
function imgGen(o,r,u,l){
var o = o;var r = r;var u = u;var l = l;var string = '';
if(o != 0){string += 'o';}
if(r != 0){string += 'r';}
if(u != 0){string += 'u';}
if(l != 0){string += 'l';}
return string;
}

//id, status, oben, rechts, unten, links, x, y;
var dungenTiles = [
[firstTile.id, firstTile.status, firstTile.top, firstTile.right, firstTile.bottom, firstTile.left, firstTile.x, firstTile.y, firstTile.image]
];

function createTiles(){
var unfinishedTiles = [];
for(var i of dungenTiles){
	if(i[1] == 1 && (i[2] == 1 || i[3] == 1 || i[4] == 1 || i[5] == 1)){unfinishedTiles.push(i);}}
var chooseNextTile = unfinishedTiles[randomIntFromInterval(0, unfinishedTiles.length-1)];
if(chooseNextTile == undefined){
	pref.status = "fertig";
return 'ohne';
}
var string = '';
var idChosenTile = chooseNextTile[0];
var idCurrentTile = dungenTiles.length+2;
if(chooseNextTile[2] == 1){string += 'o';}
if(chooseNextTile[3] == 1){string += 'r';}
if(chooseNextTile[4] == 1){string += 'u';}
if(chooseNextTile[5] == 1){string += 'l';}
if(string.length == 1){
dungenTiles[idChosenTile-2][1] = 0;
}
string = string.charAt(randomIntFromInterval(0, string.length-1));
var x = chooseNextTile[6];
var y = chooseNextTile[7];
switch(string){
case 'o':
y = y-50;
dungenTiles[idChosenTile-2][2] = idCurrentTile;
var top = spawn('u',x,y,idCurrentTile);
var right = spawn('l',x,y,idCurrentTile);
var bottom = idChosenTile;
var left = spawn('r',x,y,idCurrentTile);
dungenTiles.push([idCurrentTile, statusInsert(top,right,bottom,left), top, right, bottom, left, x, y, imgGen(top,right,bottom,left)]);
break;
case 'r':
x = x-50;
dungenTiles[idChosenTile-2][3] = idCurrentTile;
var top = spawn('u',x,y,idCurrentTile);
var right = spawn('l',x,y,idCurrentTile);
var bottom = spawn('o',x,y,idCurrentTile);
var left = idChosenTile;
dungenTiles.push([idCurrentTile, statusInsert(top,right,bottom,left), top, right, bottom, left, x, y, imgGen(top,right,bottom,left)]);
break;
case 'u':
y = y+50;
dungenTiles[idChosenTile-2][4] = idCurrentTile;
var top = idChosenTile;
var right = spawn('l',x,y,idCurrentTile);
var bottom = spawn('o',x,y,idCurrentTile);
var left = spawn('r',x,y,idCurrentTile);
dungenTiles.push([idCurrentTile, statusInsert(top,right,bottom,left), top, right, bottom, left, x, y, imgGen(top,right,bottom,left)]);
break;
case 'l':
x = x+50;
dungenTiles[idChosenTile-2][5] = idCurrentTile;
var top = spawn('u',x,y,idCurrentTile);
var right = idChosenTile;
var bottom = spawn('o',x,y,idCurrentTile);
var left = spawn('r',x,y,idCurrentTile);
dungenTiles.push([idCurrentTile, statusInsert(top,right,bottom,left), top, right, bottom, left, x, y, imgGen(top,right,bottom,left)]);
break;
}
return string;
}

var counter = 0;
while(pref.status != "fertig"){
	counter++;
	createTiles();
	if(dungenTiles.length >= pref.tiles){
	pref.status = "fertig";
	}else if(counter > 1000){
	pref.status = "Error - Creation too small";
	break;	
	}
}

async function drawDungon(){
for (var i of dungenTiles){
	await drawTile(i[0], i[6], i[7], i[8]);
}};

//zeichnet die Teile aus dem Array
async function drawTile(id, x, y, image){
await timer(1);
pref.drawedTiles = pref.drawedTiles+1;
var div = document.createElement("div");
div.id = id;
//div.innerHTML += id;
div.style.top = y+"px";
div.style.right = x+"px";
div.classList.add("tile");
if(x == 0 && y == 0){
div.classList.add("start");
var player = document.createElement("div");
player.id = 'player';
player.classList.add("player");
div.appendChild(player);
}else if(dungenTiles.length-1 == id){
//div.classList.add("ende");	
}
div.style.backgroundImage = "url(tiles/"+ image +".png)";
document.getElementById("fix").appendChild(div);
}

drawDungon();

async function drawDungon(){
for (var i of dungenTiles){
	await drawTile(i[0], i[6], i[7], i[8]);
}
};

function timer(ms) { return new Promise(res => setTimeout(res, ms)); }

//Dungen finished now can play

var player = {
	positionId: 0,
	winTile: dungenTiles.length-1
};

function movePlayer(newPositionId,newTileId) {
	document.getElementById(newTileId).appendChild(document.getElementById('player'));
	document.getElementById(newTileId).classList.add("start");	
	player.positionId = newPositionId;
}

function dispatchKeyboardEvent(eventType, key) {
    var event = new KeyboardEvent(eventType, {
        bubbles: true,
        cancelable: true,
        key: key
    });
    document.dispatchEvent(event);
}

document.onkeydown = function(event) {
	switch (event.key) {
		case "ArrowUp":
			if(dungenTiles[player.positionId][2] != 0) {
				movePlayer((dungenTiles[player.positionId][2])-2, dungenTiles[player.positionId][2]);
			}
		break;
		case "ArrowRight":
			if(dungenTiles[player.positionId][3] != 0) {
				movePlayer((dungenTiles[player.positionId][3])-2, dungenTiles[player.positionId][3]);
			}
		break;
		case "ArrowDown":
			if(dungenTiles[player.positionId][4] != 0) {
				movePlayer((dungenTiles[player.positionId][4])-2, dungenTiles[player.positionId][4]);
			}
		break;
		case "ArrowLeft":
			if(dungenTiles[player.positionId][5] != 0) {
				movePlayer((dungenTiles[player.positionId][5])-2, dungenTiles[player.positionId][5]);
			}
		break;
	}
	
	if(dungenTiles[player.positionId][0] == player.winTile){
		document.getElementById(dungenTiles.length-1).style.backgroundColor = 'rgba(0,255,0,0.1)';
		document.getElementById('text').innerHTML = 'Glückwunsch, du hast den Ausgang gefunden!';
	}
};