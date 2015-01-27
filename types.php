<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<meta charset="UTF-8" />
	<style>
	#MainDiv{
		position: absolute;
		top: 10%;
		left: 10%;
		width: 70%;
	}
	#HeaderDiv{
		position: relative;
		top: 0%;
		left: 0%;
		height: auto;
		width: 100%;
		text-align: center;
		font-size: 250%;
	}
	#DescriptionDiv{
		position: relative;
		top: 0%;
		left: 0%;
		height: auto;
		width: 100%;
		text-align: center;
		font-size: 130%;
	}
	#TypeMenuDiv{
		position: absolute;
		top: 20%;
		left: 100%;
		height: auto;
		width: 20%;
	}
	.letters{
		border: 1px solid red;
		margin: 5px 5px 5px 5px;
		background-color: #90EE90;
		display: inline;
	}
	
	.LettersCombinationText{
		visibility: hidden;
	}
	
	
	</style>
	
	
</head>

<body>
	<div id="MainDiv">
		<div id="HeaderDiv">HELLO WORLD</div>
		<div id="DescriptionDiv"></div>
		<div id="TypeMenuDiv">
			<div id="E_I">
				<div id="E" class="letters">E</div>
				<div id="I" class="letters">I</div>
			</div>
			<div id="S_N">
				<div id="S" class="letters">S</div>
				<div id="N" class="letters">N</div>
			</div>
			<div id="F_T">
				<div id="F" class="letters">F</div>
				<div id="T" class="letters">T</div>
			</div>
			<div id="J_P">
				<div id="J" class="letters">J</div>
				<div id="P" class="letters">P</div>
			</div>			
		</div>
	</div>
	
	<div id="ESTJ" class="LettersCombinationText">
		THERE IS ESTJ
	</div>
	<div id="ESTP" class="LettersCombinationText">
		THERE IS ESTP
	</div>
	<div id="ESFJ" class="LettersCombinationText">
		THERE IS ESFJ
	</div>
	<div id="ESFP" class="LettersCombinationText">
		THERE IS ESFP
	</div>
	<div id="ENTJ" class="LettersCombinationText">
		THERE IS ESTJ
	</div>
	<div id="ENTP" class="LettersCombinationText">
		THERE IS ENTP
	</div>
	<div id="ENFJ" class="LettersCombinationText">
		THERE IS ENFJ
	</div>
	<div id="ENFP" class="LettersCombinationText">
		THERE IS ENFP
	</div>
	<div id="ISTJ" class="LettersCombinationText">
		THERE IS ISTJ
	</div>
	<div id="ISTP" class="LettersCombinationText">
		THERE IS ISTP
	</div>
	<div id="ISFJ" class="LettersCombinationText">
		THERE IS ISFJ
	</div>
	<div id="ISFP" class="LettersCombinationText">
		THERE IS ISFP
	</div>
	<div id="INTJ" class="LettersCombinationText">
		THERE IS INTJ
	</div>
	<div id="INTP" class="LettersCombinationText">
		THERE IS INTP
	</div>
	<div id="INFJ" class="LettersCombinationText">
		THERE IS INFJ
	</div>
	<div id="INFP" class="LettersCombinationText">
		THERE IS INFP
	</div>

	
	
	
	
	
	
	<script type="text/javascript">

		var LettersCombination = function () {
			
			var LastCombination = new Array(),
				Combination = new Array(),
				CombinationLength = 4,
				DescriptionDiv,
				HeaderDiv;
			

			Combination[1] = "E";
			Combination[2] = "S";
			Combination[3] = "T";
			Combination[4] = "J";
			
			DescriptionDiv = document.getElementById("DescriptionDiv");
			DescriptionDiv.appendChild(document.getElementById("ENTP"));
			HeaderDiv = document.getElementById("HeaderDiv");
			
			LastCombination[1] = "E";
			LastCombination[2] = "N";
			LastCombination[3] = "T";
			LastCombination[4] = "P";
			

			this.setLettersCombination = function (letter, position) {
			
				if (position > 0 && position <= CombinationLength) {
					LastCombination = Combination.slice();
					Combination[position] = letter;
					this.updateVisual();
				}
			
			}
			
			this.updateVisual = function () {
				last_combination = "";
				combination = "";
				for (var i = 1; i <= CombinationLength; i++) {
					last_combination += LastCombination[i];
					combination += Combination[i];
				}
				last_element = document.getElementById(last_combination);
				element = document.getElementById(combination);
				
				window.alert("L C: " + last_combination + " Comb:" + combination);
				
				last_element.style.visibility = "hidden";
				element.style.visibility = "visible";
				document.body.appendChild(last_element);
				DescriptionDiv.appendChild(element);
				
				HeaderDiv.innerHTML = combination;	
				
				window.alert("L C: " + last_combination + " Comb:" + combination);
				
			}
			this.updateVisual();
			
		};
		var E = document.getElementById("E");
		var I = document.getElementById("I");
		var S = document.getElementById("S");
		var N = document.getElementById("N");
		var F = document.getElementById("F");
		var T = document.getElementById("T");
		var J = document.getElementById("J");
		var P = document.getElementById("P");
			
		var LC = new LettersCombination();
		
		E.onclick = function () {
			LC.setLettersCombination("E", 1);
		}
		I.onclick = function () {
			LC.setLettersCombination("I", 1);
		}
		S.onclick = function () {
			LC.setLettersCombination("S", 2);
		}
		N.onclick = function () {
			LC.setLettersCombination("N", 2);
		}
		F.onclick = function () {
			LC.setLettersCombination("F", 3);
		}
		T.onclick = function () {
			LC.setLettersCombination("T", 3);
		}
		J.onclick = function () {
			LC.setLettersCombination("J", 4);
		}
		P.onclick = function () {
			LC.setLettersCombination("P", 4);
		}						
	</script>




</body>

</html>
