<script id="_wau3kb">var _wau = _wau || []; _wau.push(["tab", "2m40pef1pc", "3kb", "right-lower"]);</script><script async src="../bla.js"></script>
<?php 
$x = 10;
$y = 10;
$size = $x * $y;
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Christian Pichler" />
	<title>Island</title>
	<style type="text/css">
	*{
		 box-sizing: border-box;
	}
	
	@font-face {
	font-family: 'meine-schrift';
	src: url('../images/Regular.ttf') format('truetype'); }

body{
font-family: 'meine-schrift';
position:relative;
}
	
	.wrapper{
	height:100%;
	width:100%;
	display:flex;
	align-items: center;
	justify-content: center;
	background-color:lightblue;			
	}
	
		#array{
			display:grid;
			grid-template-columns:<?php for($icss=0;$icss < $y;$icss++){echo "1fr ";}?>;
			grid-template-rows:<?php for($jcss=0;$jcss < $x;$jcss++){echo "1fr ";}?>;
			height:1000px;
			width:1000px;
			background-color:#ccc;
		}
		.tile{
			display:flex;
			align-items: center;
			justify-content: center;
			border:solid 1px black;
		}
		.land{
			background-repeat: no-repeat;
			background-size: 100%;
			background-color:lightblue;
		}
		.water{
			background-color:lightblue;
		}
		.fix{
		position:absolute;
		top:10;
		left:10;
		color:white;
		padding:10px 20px;
		margin:0px auto;
		width:500px;
		border-radius:0.5rem;
		background-color:rgba(33,37,41,1);
		border:5px solid rgba(59,64,69,1);
		box-shadow:0px 14px 28px rgba(0,255,255,0.5), 0px 10px 10px rgba(255,0,255,0.5);
}

.fix a{
display:block;
font-size:20px;
cursor:pointer;
color:rgba(232,62,140,1);
text-decoration:none;
transition:300ms;
}

.fix a:hover, .fix a:focus{
color:rgba(170,9,109,1);
outline:none;
}
	</style>
</head>
<body><div class="wrapper">
	<div id="array">
	</div>
	<div class="fix">
	<a href="https://pixelbaum.at/">Zurück zu Pixelbaum</a>
	<h3>Island Generator V.0.4 </h3>
	<p>Hier kannst du eine einfache pixel Insel generieren.
	<a onclick="window.location.reload()">Neue Insel</a>
	</div>
	</div>
<script>
function randomIntBetween(min, max) {
return Math.floor(Math.random() * (max - min + 1) + min);
}

function draw(){
	var increment = 0;
	for(var i=0;i<islandTiles.length;i++){
		var div = document.createElement("div");	
		div.id = "n"+islandTiles[i][0] +""+ islandTiles[i][1];
		//div.innerHTML = islandTiles[i][0] +""+ islandTiles[i][1];
		//div.classList.add("tile");
		if(islandTiles[i][2] == 1){
		div.classList.add("land");

			if(islandLandImages[increment][1] == "01011010"){div.style.backgroundImage="url(img/e.png)";}
			else if(islandLandImages[increment][1] == "01011011"){div.style.backgroundImage="url(img/elorolu.png)";}
			else if(islandLandImages[increment][1] == "01011000" || islandLandImages[increment][1] == "01011001" || islandLandImages[increment][1] == "01011100" || islandLandImages[increment][1] == "01011101"){div.style.backgroundImage="url(img/orleloro.png)";}
			else if(islandLandImages[increment][1] == "01011110"){div.style.backgroundImage="url(img/elororu.png)";}
			else if(islandLandImages[increment][1] == "01011111"){div.style.backgroundImage="url(img/eloro.png)";}
			else if(islandLandImages[increment][1] == "01010010" || islandLandImages[increment][1] == "01010011" || islandLandImages[increment][1] == "01110010" || islandLandImages[increment][1] == "01110011"){div.style.backgroundImage="url(img/oulelolu.png)";}
			else if(islandLandImages[increment][1] == "01010000" || islandLandImages[increment][1] == "01010001" || islandLandImages[increment][1] == "01010100" || islandLandImages[increment][1] == "01010101" || islandLandImages[increment][1] == "01110000" || islandLandImages[increment][1] == "01110001" || islandLandImages[increment][1] == "01110100" || islandLandImages[increment][1] == "01110101"){div.style.backgroundImage="url(img/olelo.png)";}
			else if(islandLandImages[increment][1] == "01010110" || islandLandImages[increment][1] == "01010111" || islandLandImages[increment][1] == "01110110" || islandLandImages[increment][1] == "01110111"){div.style.backgroundImage="url(img/oulelo.png)";}
			else if(islandLandImages[increment][1] == "01111010"){div.style.backgroundImage="url(img/elorulu.png)";}
			else if(islandLandImages[increment][1] == "01111011"){div.style.backgroundImage="url(img/elolu.png)";}
			else if(islandLandImages[increment][1] == "01111000" || islandLandImages[increment][1] == "01111001" || islandLandImages[increment][1] == "01111100" || islandLandImages[increment][1] == "01111101"){div.style.backgroundImage="url(img/orlelo.png)";}
			else if(islandLandImages[increment][1] == "01111110"){div.style.backgroundImage="url(img/eloru.png)";}
			else if(islandLandImages[increment][1] == "01111111"){div.style.backgroundImage="url(img/elo.png)";}
			else if(islandLandImages[increment][1] == "00000000" || islandLandImages[increment][1] == "00000001" || islandLandImages[increment][1] == "00000101" || islandLandImages[increment][1] == "00000100" || islandLandImages[increment][1] == "00100000" || islandLandImages[increment][1] == "00100001" || islandLandImages[increment][1] == "00100100" || islandLandImages[increment][1] == "00100101" || islandLandImages[increment][1] == "10000000" || islandLandImages[increment][1] == "10000001" || islandLandImages[increment][1] == "10000100" || islandLandImages[increment][1] == "10000101" || islandLandImages[increment][1] == "10100000" || islandLandImages[increment][1] == "10100001" || islandLandImages[increment][1] == "10100100" || islandLandImages[increment][1] == "10100101"){div.style.backgroundImage="url(img/n.png)";}
			else if(islandLandImages[increment][1] == "00000010" || islandLandImages[increment][1] == "00000011" || islandLandImages[increment][1] == "00000110" || islandLandImages[increment][1] == "00000111" || islandLandImages[increment][1] == "00100010" || islandLandImages[increment][1] == "00100011" || islandLandImages[increment][1] == "00100110" || islandLandImages[increment][1] == "00100111" || islandLandImages[increment][1] == "10000010" || islandLandImages[increment][1] == "10000011" || islandLandImages[increment][1] == "10000110" || islandLandImages[increment][1] == "10000111" || islandLandImages[increment][1] == "10100010" || islandLandImages[increment][1] == "10100011" || islandLandImages[increment][1] == "10100110" || islandLandImages[increment][1] == "10100111"){div.style.backgroundImage="url(img/u.png)";}
			else if(islandLandImages[increment][1] == "00001000" || islandLandImages[increment][1] == "00001001" || islandLandImages[increment][1] == "00001100" || islandLandImages[increment][1] == "00001101" || islandLandImages[increment][1] == "00101000" || islandLandImages[increment][1] == "00101001" || islandLandImages[increment][1] == "00101100" || islandLandImages[increment][1] == "00101101" || islandLandImages[increment][1] == "10001000" || islandLandImages[increment][1] == "10001001" || islandLandImages[increment][1] == "10001100" || islandLandImages[increment][1] == "10001101" || islandLandImages[increment][1] == "10101000" || islandLandImages[increment][1] == "10101100" || islandLandImages[increment][1] == "10101001" || islandLandImages[increment][1] == "10101101"){div.style.backgroundImage="url(img/r.png)";}
			else if(islandLandImages[increment][1] == "00001010" || islandLandImages[increment][1] == "00001110" || islandLandImages[increment][1] == "00101010" || islandLandImages[increment][1] == "00101110" || islandLandImages[increment][1] == "10001010" || islandLandImages[increment][1] == "10001110" || islandLandImages[increment][1] == "10101010" || islandLandImages[increment][1] == "10101110"){div.style.backgroundImage="url(img/rueru.png)";}
			else if(islandLandImages[increment][1] == "00001011" || islandLandImages[increment][1] == "00001111" || islandLandImages[increment][1] == "00101011" || islandLandImages[increment][1] == "00101111" || islandLandImages[increment][1] == "10001011" || islandLandImages[increment][1] == "10001111" || islandLandImages[increment][1] == "10101011" || islandLandImages[increment][1] == "10101111"){div.style.backgroundImage="url(img/ru.png)";}
			else if(islandLandImages[increment][1] == "00010010" || islandLandImages[increment][1] == "00010011" || islandLandImages[increment][1] == "00110010" || islandLandImages[increment][1] == "00110011" || islandLandImages[increment][1] == "10010010" || islandLandImages[increment][1] == "10010011" || islandLandImages[increment][1] == "10110010" || islandLandImages[increment][1] == "10110011"){div.style.backgroundImage="url(img/ulelu.png)";}
			else if(islandLandImages[increment][1] == "00010000" || islandLandImages[increment][1] == "00010001" || islandLandImages[increment][1] == "00010100" || islandLandImages[increment][1] == "00010101" || islandLandImages[increment][1] == "00110000" || islandLandImages[increment][1] == "00110001" || islandLandImages[increment][1] == "00110100" || islandLandImages[increment][1] == "00110101" || islandLandImages[increment][1] == "10010000" || islandLandImages[increment][1] == "10010001" || islandLandImages[increment][1] == "10010100" || islandLandImages[increment][1] == "10010101" || islandLandImages[increment][1] == "10110000" || islandLandImages[increment][1] == "10110001" || islandLandImages[increment][1] == "10110100" || islandLandImages[increment][1] == "10110101"){div.style.backgroundImage="url(img/l.png)";}
			else if(islandLandImages[increment][1] == "00010110" || islandLandImages[increment][1] == "00010111" || islandLandImages[increment][1] == "00110110" || islandLandImages[increment][1] == "00110111" || islandLandImages[increment][1] == "10010110" || islandLandImages[increment][1] == "10010111" || islandLandImages[increment][1] == "10110110" || islandLandImages[increment][1] == "10110111"){div.style.backgroundImage="url(img/ul.png)";}
			else if(islandLandImages[increment][1] == "00011010" || islandLandImages[increment][1] == "00111010" || islandLandImages[increment][1] == "10011010" || islandLandImages[increment][1] == "10111010"){div.style.backgroundImage="url(img/rulerulu.png)";}
			else if(islandLandImages[increment][1] == "00011011" || islandLandImages[increment][1] == "00111011" || islandLandImages[increment][1] == "10011011" || islandLandImages[increment][1] == "10111011"){div.style.backgroundImage="url(img/rulelu.png)";}
			else if(islandLandImages[increment][1] == "00011000" || islandLandImages[increment][1] == "00011001" || islandLandImages[increment][1] == "00011100" || islandLandImages[increment][1] == "00011101" || islandLandImages[increment][1] == "00111000" || islandLandImages[increment][1] == "00111001" || islandLandImages[increment][1] == "00111100" || islandLandImages[increment][1] == "00111101" || islandLandImages[increment][1] == "10011000" || islandLandImages[increment][1] == "10011001" || islandLandImages[increment][1] == "10011100" || islandLandImages[increment][1] == "10011101" || islandLandImages[increment][1] == "10111000" || islandLandImages[increment][1] == "10111001" || islandLandImages[increment][1] == "10111100" || islandLandImages[increment][1] == "10111101"){div.style.backgroundImage="url(img/rl.png)";}
			else if(islandLandImages[increment][1] == "00011110" || islandLandImages[increment][1] == "00111110" || islandLandImages[increment][1] == "10011110" || islandLandImages[increment][1] == "10111110"){div.style.backgroundImage="url(img/ruleru.png)";}
			else if(islandLandImages[increment][1] == "00011111" || islandLandImages[increment][1] == "00111111" || islandLandImages[increment][1] == "10011111" || islandLandImages[increment][1] == "10111111"){div.style.backgroundImage="url(img/rul.png)";}
			else if(islandLandImages[increment][1] == "01001000" || islandLandImages[increment][1] == "01001001" || islandLandImages[increment][1] == "01001100" || islandLandImages[increment][1] == "01001101" || islandLandImages[increment][1] == "11001101" || islandLandImages[increment][1] == "11001000" || islandLandImages[increment][1] == "11001001" || islandLandImages[increment][1] == "11001100"){div.style.backgroundImage="url(img/orero.png)";}
			else if(islandLandImages[increment][1] == "01001010" || islandLandImages[increment][1] == "01001110" || islandLandImages[increment][1] == "11001110"){div.style.backgroundImage="url(img/orueroru.png)";}
			else if(islandLandImages[increment][1] == "01001011" || islandLandImages[increment][1] == "01001111" || islandLandImages[increment][1] == "11001111" || islandLandImages[increment][1] == "11001010" || islandLandImages[increment][1] == "11001011"){div.style.backgroundImage="url(img/oruero.png)";}
			else if(islandLandImages[increment][1] == "11110011" || islandLandImages[increment][1] == "11110010" || islandLandImages[increment][1] == "11010011" || islandLandImages[increment][1] == "11010010"){div.style.backgroundImage="url(img/oulelu.png)";}
			else if(islandLandImages[increment][1] == "11011001" || islandLandImages[increment][1] == "11011000" || islandLandImages[increment][1] == "11011101" || islandLandImages[increment][1] == "11011100"){div.style.backgroundImage="url(img/orlero.png)";}
			else if(islandLandImages[increment][1] == "11011010"){div.style.backgroundImage="url(img/erorulu.png)";}			
			else if(islandLandImages[increment][1] == "11011011"){div.style.backgroundImage="url(img/erolu.png)";}
			else if(islandLandImages[increment][1] == "11011110"){div.style.backgroundImage="url(img/eroru.png)";}
			else if(islandLandImages[increment][1] == "11011111"){div.style.backgroundImage="url(img/ero.png)";}
			else if(islandLandImages[increment][1] == "01000000" || islandLandImages[increment][1] == "01000001" || islandLandImages[increment][1] == "01000100" || islandLandImages[increment][1] == "01000101" || islandLandImages[increment][1] == "01100000" || islandLandImages[increment][1] == "01100001" || islandLandImages[increment][1] == "01100100" || islandLandImages[increment][1] == "01100101" || islandLandImages[increment][1] == "11100101" || islandLandImages[increment][1] == "11000000" || islandLandImages[increment][1] == "11000001" || islandLandImages[increment][1] == "11000100" || islandLandImages[increment][1] == "11000101" || islandLandImages[increment][1] == "11100000" || islandLandImages[increment][1] == "11100001" || islandLandImages[increment][1] == "11100100"){div.style.backgroundImage="url(img/o.png)";}
			else if(islandLandImages[increment][1] == "01000010" || islandLandImages[increment][1] == "01000011" || islandLandImages[increment][1] == "01000110" || islandLandImages[increment][1] == "01000111" || islandLandImages[increment][1] == "01100010" || islandLandImages[increment][1] == "01100011" || islandLandImages[increment][1] == "01100110" || islandLandImages[increment][1] == "01100111" || islandLandImages[increment][1] == "11100111" || islandLandImages[increment][1] == "11000011" || islandLandImages[increment][1] == "11000010" || islandLandImages[increment][1] == "11000110" || islandLandImages[increment][1] == "11000111" || islandLandImages[increment][1] == "11100010" || islandLandImages[increment][1] == "11100011" || islandLandImages[increment][1] == "11100110"){div.style.backgroundImage="url(img/ou.png)";}
			else if(islandLandImages[increment][1] == "01101000" || islandLandImages[increment][1] == "01101001" || islandLandImages[increment][1] == "01101100" || islandLandImages[increment][1] == "01101101" || islandLandImages[increment][1] == "11101101" || islandLandImages[increment][1] == "11101000" || islandLandImages[increment][1] == "11101001" || islandLandImages[increment][1] == "11101100"){div.style.backgroundImage="url(img/or.png)";}
			else if(islandLandImages[increment][1] == "01101010" || islandLandImages[increment][1] == "01101110" || islandLandImages[increment][1] == "11101110" || islandLandImages[increment][1] == "11101010"){div.style.backgroundImage="url(img/orueru.png)";}
			else if(islandLandImages[increment][1] == "01101011" || islandLandImages[increment][1] == "01101111" || islandLandImages[increment][1] == "11101111" || islandLandImages[increment][1] == "11101011"){div.style.backgroundImage="url(img/oru.png)";}
			else if(islandLandImages[increment][1] == "11110101" || islandLandImages[increment][1] == "11010000" || islandLandImages[increment][1] == "11010001" || islandLandImages[increment][1] == "11010100" || islandLandImages[increment][1] == "11010101" || islandLandImages[increment][1] == "11110000" || islandLandImages[increment][1] == "11110001" || islandLandImages[increment][1] == "11110100"){div.style.backgroundImage="url(img/ol.png)";}
			else if(islandLandImages[increment][1] == "11110111" || islandLandImages[increment][1] == "11010110" || islandLandImages[increment][1] == "11010111" || islandLandImages[increment][1] == "11110110"){div.style.backgroundImage="url(img/oul.png)";}
			else if(islandLandImages[increment][1] == "11111010"){div.style.backgroundImage="url(img/erulu.png)";}
			else if(islandLandImages[increment][1] == "11111011"){div.style.backgroundImage="url(img/elu.png)";}
			else if(islandLandImages[increment][1] == "11111101" || islandLandImages[increment][1] == "11111000" || islandLandImages[increment][1] == "11111001" || islandLandImages[increment][1] == "11111100"){div.style.backgroundImage="url(img/orl.png)";}
			else if(islandLandImages[increment][1] == "11111110"){div.style.backgroundImage="url(img/eru.png)";}
			else if(islandLandImages[increment][1] == "11111111"){div.style.backgroundImage="url(img/a.png)";}
			increment++;
		}else{
		div.classList.add("water");	
		}
		document.getElementById("array").appendChild(div);	
	}	
}

function createBlankIsland(){
	for(var i = 0;i < x;i++){
		for(var j = 0;j < y;j++){
		islandTiles.push([i,j,0]);
		}
	}
}

function addCenter() {
	if(xIsEven && yIsEven){
		currentIslandSize += 4;	
		islandTiles[parseInt(xnr+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+ynr,10));
		islandTiles[parseInt((xnr-1)+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt((xnr-1)+""+ynr,10));
		islandTiles[parseInt(xnr+""+(ynr-1),10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+(ynr-1),10));
		islandTiles[parseInt((xnr-1)+""+(ynr-1),10)][2] = 1;
		islandTilesLand.push(parseInt((xnr-1)+""+(ynr-1),10));
	}else if(xIsEven && !yIsEven){
		currentIslandSize += 2;
		islandTiles[parseInt(xnr+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+ynr,10));
		islandTiles[parseInt((xnr-1)+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt((xnr-1)+""+ynr,10));		
	}else if(!xIsEven && yIsEven){
		currentIslandSize += 2;
		islandTiles[parseInt(xnr+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+ynr,10));
		islandTiles[parseInt(xnr+""+(ynr-1),10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+(ynr-1),10));		
	}else{
		currentIslandSize += 1;
		islandTiles[parseInt(xnr+""+ynr,10)][2] = 1;
		islandTilesLand.push(parseInt(xnr+""+ynr,10));
	}	
}

function addTile(){
	while(currentIslandSize < islandSize){
	var choseTile = randomIntBetween(0,islandTilesLand.length-1);
	//console.log(choseTile);
	var tile = islandTilesLand[choseTile];
	//console.log(tile);
	var top = 0;
	var right = 0;
	var bottom = 0;
	var left = 0;
	var tempArray = [];
	for(var i=0;i<islandTilesLand.length;i++){
		if(islandTilesLand[i] == tile-x){top = 1;}
		if(islandTilesLand[i] == tile+1){right = 1;}
		if(islandTilesLand[i] == tile+x){bottom = 1;}
		if(islandTilesLand[i] == tile-1){left = 1;}
	}
	//console.log(top+" "+right+" "+bottom+" "+left);
	if(top != 1 || right != 1 || bottom != 1|| left != 1){
		if(top == 0){tempArray.push('top');}
		if(right == 0){tempArray.push('right');}
		if(bottom == 0){tempArray.push('bottom');}
		if(left == 0){tempArray.push('left');}

	var iChose = tempArray[randomIntBetween(0,tempArray.length-1)];
	//console.log(iChose);

	if(iChose == 'top'){
	currentIslandSize += 1;
	islandTiles[tile-x][2] = 1;
	islandTilesLand.push(tile-x);	
	}else if(iChose == 'right'){
	currentIslandSize += 1;
	islandTiles[tile+1][2] = 1;
	islandTilesLand.push(tile+1);	
	}else if(iChose == 'bottom'){
	currentIslandSize += 1;
	islandTiles[tile+x][2] = 1;
	islandTilesLand.push(tile+x);	
	}else if(iChose == 'left'){
	currentIslandSize += 1;
	islandTiles[tile-1][2] = 1;
	islandTilesLand.push(tile-1);	
	}else{
	//console.log('konnte keines Nehmen');	
	}
	}
}
}
//linksoben,obenmitte,rechtsoben,links,rechts,untenlinks,unten,rechtsunten
function addImg(){
	islandTilesLand.sort(function(a, b){return a-b});
	var octerCode = "";
	for(var i=0;i<islandTilesLand.length;i++){
		var tile=islandTilesLand[i];
		if(islandTiles[(tile-x)-1][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[tile-x][2] == 1){octerCode += "1"}else{octerCode += "0";}
		if(islandTiles[(tile-x)+1][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[tile-1][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[tile+1][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[(tile+x)-1][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[tile+x][2] == 1){octerCode += "1";}else{octerCode += "0";}
		if(islandTiles[(tile+x)+1][2] == 1){octerCode += "1";}else{octerCode += "0";}
	islandLandImages.push([tile,octerCode]);
	octerCode = "";
	}
}

function echo(){
	for(var i=0;i<islandLandImages.length;i++){
	console.log(islandLandImages[i]);
	}
}

const x = <?php echo $x; ?>;
const y = <?php echo $y; ?>;
const islandSize = 15;
var currentIslandSize = 0;

//xvalue,yvalue,choosen
var islandTiles = [];
//id
var islandTilesLand = [];
//id,linksoben,obenmitte,rechtsoben,links,rechts,untenlinks,unten,rechtsunten
var islandLandImages = [];

var xnr = Math.floor(x/2);
var ynr = Math.floor(y/2);

const xIsEven = x%2 == 0; 
const yIsEven = y%2 == 0;

createBlankIsland();
addCenter();
addTile();
addImg();
//echo();
draw();

//console.log(islandTilesLand.length);
</script>
</body>
</html>