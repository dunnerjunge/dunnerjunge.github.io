function randomIntBetween(min, max) {
return Math.floor(Math.random() * (max - min + 1) + min);
}

class game {
	constructor(cardNumber, cardId, cardImg, background) {
		this.cardNumber = cardNumber;
		this.cardId = cardId;
		this.cardImg = cardImg;
		this.background = background;
		this.won = "no";
		this.clickable = "yes";
		this.points = 0;
		this.moves = 0;
		this.totalSeconds = 0;
		this.timer = setInterval(setTime, 1000);
	}

}

class gameCard {
	constructor(id,front) {
		this.id = id;
		this.front = front;
	}
	
}

function createCards(number) {
let imgs = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
imgs = shuffle(imgs);
for(var i = 0; i < number;i++){	
var card = new gameCard(i+1,imgs[imgs.length-1]);
gridpositions.push(card);
var card = new gameCard(i+1+number,imgs[imgs.length-1]);
gridpositions.push(card);
imgs.pop();
}
document.getElementById('points').innerHTML = 'Found: ' + thisgame.points + " / " + thisgame.cardNumber/2;
}

function pushCards()
{
	let x = 1;
	let y = 1;
	for(item of gridpositions)
	{
		let div = document.createElement("div");
		div.classList.add("game-card");
		div.style.gridRow = x;
		div.style.gridColumn = y;
		x++;
		if(x == 5){y++;x = 1;}
		let divcard = document.createElement("div");
		divcard.classList.add("cover");
		divcard.setAttribute("id", item.id);
		divcard.setAttribute("data-img", item.front);
		divcard.setAttribute("onclick", "Flip(this)");
		//divcard.setAttribute("onmousemove", "Shade(this)");
		divcard.setAttribute("onmouseleave", "Clear(this)");
		div.appendChild(divcard);
		document.getElementById("gamegrid").appendChild(div);
	}
}

function shuffle(array)
{
    let counter = array.length;
    while (counter > 0) {
        let index = Math.floor(Math.random() * counter);
        counter--;
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }
    return array;
}


let thisgame = new game(16, "", "", randomIntBetween(1,7));

let grid = document.createElement("div");
grid.setAttribute("id", "gamegrid");
document.getElementById("canvas").appendChild(grid);
let gridpositions = [];
document.body.style.backgroundImage = "url('bg/" + thisgame.background + ".png')"
createCards(thisgame.cardNumber/2);
shuffle(gridpositions);
pushCards();
thisgame.timer;
//optics

function Flip(x) {
	if(thisgame.clickable == "yes")
	{
		x.classList.remove("cover");
		x.classList.add("cover-static");
		x.parentElement.classList.remove("game-card");
		x.parentElement.classList.add("game-card-static");
		x.removeAttribute("onclick");
		x.removeAttribute("onmousemove");
		x.removeAttribute("onmouseleave");	
		rotate(x);
		validate(x);
}
}

function validate(x){
	if(thisgame.cardImg == "")
	{
		thisgame.cardImg = x.dataset.img;
		thisgame.cardId = x.id;
	}
	else
	{
		if(thisgame.cardImg == x.dataset.img)
		{
			thisgame.points++;
			document.getElementById('points').innerHTML = 'Found: ' + thisgame.points + " / " + thisgame.cardNumber/2;
			thisgame.cardImg = "";
			thisgame.cardId = "";
			if(thisgame.points == thisgame.cardNumber/2)
			{
				clearInterval (thisgame.timer);
				let winmsg = document.createElement("div");
				winmsg.classList.add("win");
				winmsg.innerHTML = "Du hast Gewonnen!";
				document.getElementById("canvas").appendChild(winmsg);
			}
		}
		else
		{
			thisgame.clickable = "no";
			
			setTimeout(function() {
			
			rotateback(x);
			
			let y = document.getElementById(thisgame.cardId);
			rotateback(y);
			
			
			}, 1500)
			
			setTimeout(function() {
			
			
			x.classList.add("cover");
			x.classList.remove("cover-static");
			x.parentElement.classList.add("game-card");
			x.parentElement.classList.remove("game-card-static");
			x.setAttribute("onclick", "Flip(this)");
			//x.setAttribute("onmousemove", "Shade(this)");
			x.setAttribute("onmouseleave", "Clear(this)");
			
			let y = document.getElementById(thisgame.cardId);
			
			y.classList.add("cover");
			y.classList.remove("cover-static");
			y.parentElement.classList.add("game-card");
			y.parentElement.classList.remove("game-card-static");
			y.setAttribute("onclick", "Flip(this)");
			//y.setAttribute("onmousemove", "Shade(this)");
			y.setAttribute("onmouseleave", "Clear(this)");
			
			thisgame.cardImg = "";
			thisgame.cardId = "";
			thisgame.clickable = "yes";
			}, 2000)
		}
	}
}

function rotateback(br) {
	br.classList.add('flip-90');
	setTimeout(function() {
	br.style.backgroundImage = "url(bg.jpg)";	
	br.classList.remove('flip-90');
  }, 500)
}

function rotate(x) { 
	x.style.transform = "";
	x.style.filter = "";
	x.classList.add('flip-90');
	setTimeout(function() {
		x.style.backgroundImage = "url(img/" + x.dataset.img + ".jpg)";
		x.classList.remove('flip-90');
		}, 500)
}


/*function Shade(item) {

	let bounding = item.getBoundingClientRect();

	bounding.x = Math.max(0, (event.clientX - Math.round(bounding.left)));
	bounding.y = Math.max(0, (event.clientY - Math.round(bounding.top)));
    bounding.width = Math.round(bounding.width);
    bounding.height = Math.round(bounding.height);

	let posX = bounding.width / 2 - bounding.x;
	let posY = bounding.height / 2 - bounding.y;
	let hypotenuseCursor = Math.sqrt(Math.pow(posX, 2) + Math.pow(posY, 2));
	let hypotenuseMax = Math.sqrt(Math.pow(bounding.width / 2, 2) + Math.pow(bounding.height / 2, 2));
	let ratio = hypotenuseCursor / hypotenuseMax;

	item.style.transform = "rotate3d(" + (posY / hypotenuseCursor) + ", " + (-posX / hypotenuseCursor) + ", 0, " + (ratio * 30) + "deg)";
	item.style.filter = "brightness(" + (1.6 - bounding.y / bounding.height) + ")";
}*/

function Clear(x) {
	x.style.transform = "";
	x.style.filter = "";
}

function setTime() {
  thisgame.totalSeconds++;
  document.getElementById("time").innerHTML = pad(parseInt(thisgame.totalSeconds / 60)) + ":" + pad(thisgame.totalSeconds % 60);
}

function pad(val) {
  let valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}