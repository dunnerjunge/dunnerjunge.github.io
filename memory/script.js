function randomIntBetween(min, max) {
return Math.floor(Math.random() * (max - min + 1) + min);
}

class Game {
	constructor(cardNumber, cardId, cardImg, background) {
		this.cardNumber *= 2;
		this.cardPairs = cardNumber;
		this.cardId = cardId;
		this.cardImg = cardImg;
		this.background = background;
		this.clickable = true;
		this.points = 0;
		this.moves = 0;
		this.totalSeconds = 0;
	}
}

class GameCard {
	constructor(id,front) {
		this.id = id;
		this.front = front;
	}
}

function createCards(number) {
let imgs = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28];
imgs = shuffle(imgs);
	for(let i = 0; i < number;i++) {	
		let card1 = new GameCard(i+1,imgs[imgs.length-1]);
		gridpositions.push(card1);
		let card2 = new GameCard(i+1+number,imgs[imgs.length-1]);
		gridpositions.push(card2);
		imgs.pop();
	}
document.getElementById('points').innerHTML = 'Found: ' + thisgame.points + " / " + thisgame.cardPairs;
}

function pushCards() {
	let x = 1;
	let y = 1;
	for(item of gridpositions) {
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
		divcard.setAttribute("onmousemove", "Shade(this)");
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


let thisgame = new Game(8, "", "", randomIntBetween(1,7));

let grid = document.createElement("div");
grid.setAttribute("id", "gamegrid");
document.getElementById("canvas").appendChild(grid);
let gridpositions = [];
document.body.style.backgroundImage = "url('bg/" + thisgame.background + ".png')"
createCards(thisgame.cardPairs);
shuffle(gridpositions);
pushCards();
const time = setInterval(StopWatch, 1000);
//optics

function Flip(element) {
	if (!thisgame.clickable) return;
  
	element.classList.remove("cover");
	element.classList.add("cover-static");
	element.parentElement.classList.remove("game-card");
	element.parentElement.classList.add("game-card-static");
	element.removeAttribute("onclick");
	element.removeAttribute("onmousemove");
	element.removeAttribute("onmouseleave");
	rotate(element);
	validate(element);
}

function validate(x) {
	if (thisgame.cardImg === "") {
		thisgame.cardImg = x.dataset.img;
		thisgame.cardId = x.id;
	} else {
		if (thisgame.cardImg === x.dataset.img) {
			thisgame.points++;
			document.getElementById("points").innerHTML =
			"Found: " + thisgame.points + " / " + thisgame.cardPairs;
			thisgame.cardImg = "";
			thisgame.cardId = "";
			if (thisgame.points === thisgame.cardPairs) {
				clearInterval(time);
				const winmsg = document.createElement("div");
				winmsg.classList.add("win");
				winmsg.innerHTML = "Du hast gewonnen!";
				document.getElementById("canvas").appendChild(winmsg);
			}
	  } else {
			thisgame.clickable = false;
			const y = document.getElementById(thisgame.cardId);
			setTimeout(() => {
				checkList(x);
				checkList(y);	  
				thisgame.cardImg = "";
				thisgame.cardId = "";
				thisgame.clickable = true;
			}, 1500);
	  	}
	}
}

function checkList(card){
	rotate(card, false);
	card.classList.add("cover");
	card.classList.remove("cover-static");
	card.parentElement.classList.add("game-card");
	card.parentElement.classList.remove("game-card-static");
	card.setAttribute("onclick", "Flip(this)");
	card.setAttribute("onmousemove", "Shade(this)");
	card.setAttribute("onmouseleave", "Clear(this)");
}

function rotate(element, show = true) {
	if(show == true){
		element.style.transform = "";
		element.style.filter = "";
	}

	element.classList.add('flip-90');

	setTimeout(function() {
		if(show == true){
			element.style.backgroundImage = "url(img/" + element.dataset.img + ".jpg)";
		} else {
			element.style.backgroundImage = "url(bg.jpg)";
		}
		element.classList.remove('flip-90');
	}, 500);
}

function Shade(item) {
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
}

function Clear(x) {
	x.style.transform = "";
	x.style.filter = "";
}

function StopWatch() {
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