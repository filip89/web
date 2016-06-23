<?php
session_start();
$_SESSION['lastPage'] = 'gameXO.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>XO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="gaming.css">
<style>
body {
	padding: 0px;
	marign: 0px;
	background-color: #4d4d4d;
}
table.xo {
	display:none;
	margin: auto;
	margin-top: 100px;
	text-align: center;
	background-color: #333333;
	color: #d9d9d9;
	border: 5px solid #d9d9d9;
}
td {
	width: 40px;
	height: 40px;
	border: 1px solid #d9d9d9;
	cursor: pointer;
	transition: background-color 0.2s;
}
td.active:hover {
	background-color: gold;
}
.menuItem {
	display: block;
	padding: 10px;
	font-size: 20px;
	color: #d9d9d9;
	}
.menuItem:hover {
	color: #d9d9d9;
	background-color: #0d0d0d;
	border-radius: 5px;
	cursor: pointer;
	}
.disabled {
	
}
#restart {
	display: block;
	margin: auto;
	margin-top:20px;
	visibility: hidden;
}
#result {
	margin: auto;
	width: 200px;
	height: 50px;
	margin-top: 50px;
	visibility: hidden;
	text-align: center;
	font-size: 40px;
	color: white;
}
</style>
</head>
<body>
<?php require "menu.php"; ?>
<div class="gameMenu">
	<div class="menuItem">START</div>
</div>
<div id="result"></div>
<table class="xo">
<tr><td class='active' id="0"></td><td class='active' id="1"></td><td class='active' id="2"></td></tr>
<tr><td class='active' id="3"></td><td class='active'id="4"></td><td class='active' id="5"></td></tr>
<tr><td class='active' id="6"></td><td class='active' id="7"></td><td class='active' id="8"></td></tr>
</table>
<button class="btn btn-default btn-sm" id="restart">RESET</button>
<p id="test"></p>
<script>
var jedan, dva, tri, četiri, pet, šest, sedam, osam, devet, prviPotez = 0, condition;
var protivnik, imePolja, index, poljeProtivnika, z, free = "yes", polje;
polja = ["I","I","I","I","I","I", "I", "I", "I"];
start();

$('.gameMenu').click(function(){
	$(this).fadeOut("fast", function() {
		$(".xo").fadeIn();
		$("#restart").css("visibility","visible").hide().fadeIn();
	});
});

function start(){
	if(free == "yes"){
$(document).on("click", "td", function(){
	
	polje = $(this).text();
		if(polje == ""){
			$(this).html("<b>X</b>").hide().fadeIn();
			$(this).removeClass('active');
			imePolja = $(this).attr("id");
			proradiPoljaX();
			if (free == "yes"){
				poljeProtivnika = igraProtivnik();
				obilježavaProtivnik();
			}
			
		}
	
});
}
}

function igraProtivnik() {
	if (prviPotez == 0 && polja[4] == "x"){
	prviPotez++;
	return 0;
	}
	if (prviPotez == 1 && (polja[3] == "x" || polja[5] == "x"|| polja[1] == "x"|| polja[7] == "x") && polja[0] == "I"){
	prviPotez++;
	return 0;
	}
	prviPotez++;
	if (polja[4] == "I"){
		return 4;
	}
	//You lose
	//prvi red
	if (polja[0] == "o" && polja[1] == "o" && polja[2] == "I"){
		return 2;	
	}
	if (polja[1] == "o" && polja[2] == "o" && polja[0] == "I"){
		return 0;	
	}
	if (polja[0] == "o" && polja[2] == "o" && polja[1] == "I"){
		return 1;	
	}
	//drugi red
	if (polja[3] == "o" && polja[4] == "o" && polja[5] == "I"){
		return 5;	
	}
	if (polja[4] == "o" && polja[5] == "o" && polja[3] == "I"){
		return 3;	
	}
	if (polja[3] == "o" && polja[5] == "o" && polja[4] == "I"){
		return 4;	
	}
	//treći red
	if (polja[6] == "o" && polja[7] == "o" && polja[8] == "I"){
	return 8;
	}
	if (polja[6] == "o" && polja[8] == "o" && polja[7] == "I"){
	return 7;
	}
	if (polja[7] == "o" && polja[8] == "o" && polja[6] == "I"){
	return 6;
	}
	//prvi stupac
	if (polja[0] == "o" && polja[3] == "o" && polja[6] == "I"){
		return 6;	
	}
	if (polja[3] == "o" && polja[6] == "o" && polja[0] == "I"){
		return 0;	
	}
	if (polja[0] == "o" && polja[6] == "o" && polja[3] == "I"){
		return 3;	
	}
	//drugi stupac
	if (polja[7] == "o" && polja[4] == "o" && polja[1] == "I"){
		return 1;	
	}
	if (polja[1] == "o" && polja[4] == "o" && polja[7] == "I"){
		return 7;	
	}
	if (polja[1] == "o" && polja[7] == "o" && polja[4] == "I"){
		return 4;	
	}
	//treći stupac
	if (polja[8] == "o" && polja[5] == "o" && polja[2] == "I"){
	return 2;
	}
	if (polja[2] == "o" && polja[8] == "o" && polja[5] == "I"){
	return 5;
	}
	if (polja[2] == "o" && polja[5] == "o" && polja[8] == "I"){
	return 8;
	}
	//dijagonala
	if (polja[0] == "o" && polja[4] == "o" && polja[8] == "I"){
	return 8;
	}
	if (polja[0] == "o" && polja[8] == "o" && polja[4] == "I"){
	return 4;
	}
	if (polja[4] == "o" && polja[8] == "o" && polja[0] == "I"){
	return 0;
	}
	if (polja[2] == "o" && polja[4] == "o" && polja[6] == "I"){
	return 6;
	}
	if (polja[2] == "o" && polja[6] == "o" && polja[4] == "I"){
	return 4;
	}
	if (polja[4] == "o" && polja[6] == "o" && polja[2] == "I"){
	return 2;
	}
	//Igrač
	//prvi red
	if (polja[0] == "x" && polja[1] == "x" && polja[2] == "I"){
		return 2;	
	}
	if (polja[1] == "x" && polja[2] == "x" && polja[0] == "I"){
		return 0;	
	}
	if (polja[0] == "x" && polja[2] == "x" && polja[1] == "I"){
		return 1;	
	}
	//drugi red
	if (polja[3] == "x" && polja[4] == "x" && polja[5] == "I"){
		return 5;	
	}
	if (polja[4] == "x" && polja[5] == "x" && polja[3] == "I"){
		return 3;	
	}
	if (polja[3] == "x" && polja[5] == "x" && polja[4] == "I"){
		return 4;	
	}
	//treći red
	if (polja[6] == "x" && polja[7] == "x" && polja[8] == "I"){
	return 8;
	}
	if (polja[6] == "x" && polja[8] == "x" && polja[7] == "I"){
	return 7;
	}
	if (polja[7] == "x" && polja[8] == "x" && polja[6] == "I"){
	return 6;
	}
	//prvi stupac
	if (polja[0] == "x" && polja[3] == "x" && polja[6] == "I"){
		return 6;	
	}
	if (polja[3] == "x" && polja[6] == "x" && polja[0] == "I"){
		return 0;	
	}
	if (polja[0] == "x" && polja[6] == "x" && polja[3] == "I"){
		return 3;	
	}
	//drugi stupac
	if (polja[7] == "x" && polja[4] == "x" && polja[1] == "I"){
		return 1;	
	}
	if (polja[1] == "x" && polja[4] == "x" && polja[7] == "I"){
		return 7;	
	}
	if (polja[1] == "x" && polja[7] == "x" && polja[4] == "I"){
		return 4;	
	}
	//treći stupac
	if (polja[8] == "x" && polja[5] == "x" && polja[2] == "I"){
	return 2;
	}
	if (polja[2] == "x" && polja[8] == "x" && polja[5] == "I"){
	return 5;
	}
	if (polja[2] == "x" && polja[5] == "x" && polja[8] == "I"){
	return 8;
	}
	//dijagonala
	if (polja[0] == "x" && polja[4] == "x" && polja[8] == "I"){
	return 8;
	}
	if (polja[0] == "x" && polja[8] == "x" && polja[4] == "I"){
	return 4;
	}
	if (polja[4] == "x" && polja[8] == "x" && polja[0] == "I"){
	return 0;
	}
	if (polja[2] == "x" && polja[4] == "x" && polja[6] == "I"){
	return 6;
	}
	if (polja[2] == "x" && polja[6] == "x" && polja[4] == "I"){
	return 4;
	}
	if (polja[4] == "x" && polja[6] == "x" && polja[2] == "I"){
	return 2;
	}
	if (polja[0] == "I" && polja[4] == "x"){
	return 0;
	}
	if (polja[2] == "I" && polja[4] == "x"){
	return 2;
	}
	if (polja[6] == "I" && polja[4] == "x"){
	return 6;
	}
	if (polja[8] == "I" && polja[4] == "x"){
	return 8;
	}
	else if (polja[1] == "I") {
	return 1;
	}
	protivnik = Math.floor((Math.random() * 8) + 0);
	if(polja[protivnik] == "x" || polja[protivnik] == "o"){
	igraProtivnik()
	}
	return protivnik;	
}

function provjeriJelIzgubio(){
	//You lose!
	if(polja[0] == "o" && polja[1] == "o" && polja[2] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[3] == "o" && polja[4] == "o" && polja[5] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[6] == "o" && polja[7] == "o" && polja[8] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[0] == "o" && polja[3] == "o" && polja[6] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[1] == "o" && polja[4] == "o" && polja[7] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[2] == "o" && polja[5] == "o" && polja[8] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[0] == "o" && polja[4] == "o" && polja[8] == "o"){
	condition = "Lose";
	checkEnd();
	}
	if(polja[2] == "o" && polja[4] == "o" && polja[6] == "o"){
	condition = "Lose";
	checkEnd();
	}
}

function provjeriJelPobjedio(){
	//You win!
	if(polja[0] == "x" && polja[1] == "x" && polja[2] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[3] == "x" && polja[4] == "x" && polja[5] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[6] == "x" && polja[7] == "x" && polja[8] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[0] == "x" && polja[3] == "x" && polja[6] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[1] == "x" && polja[4] == "x" && polja[7] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[2] == "x" && polja[5] == "x" && polja[8] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[0] == "x" && polja[4] == "x" && polja[8] == "x"){
	condition = "Win";
	checkEnd();
	}
	if(polja[2] == "x" && polja[4] == "x" && polja[6] == "x"){
	condition = "Win";
	checkEnd();
	}
}

// Funkcija za jel igubio/pobjedio
function checkEnd(){
	$(document).off("click", "td");
	if(condition == "Win"){
		$("#result").text("You won!").css("visibility", "visible").hide().fadeIn("slow");
	}
	else {
		$("#result").text("You lost!").css("visibility", "visible").hide().fadeIn("slow");
	}
	free = "no";
	
}
$('#restart').on("click",function(){
	$("td").empty();
	$("#result").text("").css("visibility", "hidden");
	polja = ["I","I","I","I","I","I", "I", "I", "I"];
	$("td").attr("class","active");
	free = "yes";
	prviPotez = 0;
	start();
});



function obilježavaProtivnik(){
	<!-- turn OFF -->
	$(document).off("click", "td");
	window.setTimeout(function(){
	$("td:eq(" + poljeProtivnika + ")").html("<b>O</b>").hide().fadeIn();
	$("td:eq(" + poljeProtivnika + ")").removeClass('active');
	polja[poljeProtivnika] = "o";
	animacija();
	document.getElementById("test").innerHTML = polja[0] + polja[1] + polja[2] + polja[3] + polja[4] + polja[5] + polja[6] + polja[7] + polja[8];
	provjeriJelIzgubio();
	<!-- turn ON -->
	start();
	}
	,500);}
function proradiPoljaX(){
	polja[imePolja] = "x";
	animacija();
	provjeriJelPobjedio();
}
function animacija(){

}
</script>
</body>
</html>