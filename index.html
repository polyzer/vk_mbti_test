<?php 
	session_start();
	$_SESSION["vk_persontype"]["true_connection"] = "true";
?>

<!DOCTYPE html>
<html>
<head>
    <title>MindTest</title>
    <meta charset="UTF-8" />
	<style>
		body{
			height: 400px;
			width: 1000px;
		}
		.BigDiv_class{
			background-color: #567ca4;
			position: relative;
			top: 0%;
			left: 0%;
			margin: 5% 5% 5% 5%;
			height: auto;
			width: 40%;	
		}
		
		.QuestDiv_class{
			background-color: #C5DAF2;
			position: relative;
			top: 0%;
			left: 0%;
			
			margin: 0px 0px 0px 0px;
			
			text-align: center;
			font-size: 150%;
			
			height: 50%;
			border-top: 5px solid #567ca4;
			padding-top: 10px;
			padding-bottom: 10px;
			
			
		}
		
		
		.Options_class{
			background-color: #EAEAEA;
			position: relative;
			top: 0%;
			left: 0%;
			margin-top: 2px;
			text-align: center;
			height: auto;
			width: 100%;	
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 110%;
			
		}
		.FirstTapDiv_class{
			background-color: white;
			position: absolute;
			top: 0%;
			left:100%;
			height: 100%;
			width: 10%;			
			text-align: center;
			border-right: 0px solid black;
			transition-property: background-color width border-right;
			transition-duration: 0.7s;
			z-index: 1000;
		}
		.SecondTapDiv_class{
			background-color: white;
			position: absolute;
			top: 0%;
			left: 100%;
			height: 100%;
			
			width: 10%;		
			
			text-align: center;
			
			transition-property: background-color width;
			transition-duration: 0.7s;
			z-index: 1000;
		}
		.FirstTapDiv_class:hover{
			background-color: #25FF40;
			width: 12%;
			transition-property: background-color width;
			transition-duration: 0.7s;
		}
		.SecondTapDiv_class:hover{
			background-color: #25FF40;
			width: 12%;
			transition-property: background-color width;
			transition-duration: 0.7s;
		}
		
	</style>

</head>
<body>

<script type="text/javascript">
/////////////=======================HELLO_MESSAGE_CLASS=================	
	var MessageBox = function() {
		var MessageDiv, OKButton, CancelButton;
		
		this.MessageDiv = document.createElement("div");
		this.MessageDiv.setAttribute("class", "MessageDiv_class");
		this.MessageDiv.parent = this;

		this.OKButton = document.createElement("button");
		this.OKButton.setAttribute("class", "MessageButtons_class");
		this.OKButton.parent = this;
		
		this.CancelButton = document.createElement("button");
		this.CancelButton.setAttribute("class", "MessageButtons_class");
		this.CancelButton.parent = this;
//----------------------FUNCTIONS_DEFINITION----------------------------

		this.ShowMessage = function () {
			
		}
		
		this.Accept = function () {
			
		}

//------------------------------HANDLERS--------------------------------
	
	
	
	};	
////////////========================END_OF_HELLO_MESSAGE_CLASS==========
	
//////==============QUESTBOX_DEFINITION=================================	
	var QuestBox = function(num) {
		var QuestDiv, //Объект DIV для отображения вопроса 
			Answer, //Здесь хранится ответ - А или В
			BigDiv, //Это главный DIV в котором хранятся все остальные элементы
			FirstOption, //Первый вариант ответа
			SecondOption, //Второй вариант ответа
			FirstTapDiv, //Это элемент
			SecondTapDiv, //
			FirstOptionText, //
			SecondOptionText, //
			AjaxRequest, //
			QuestionNumber; //
		
		this.QuestionNumber = num;
		this.Answer = "N/A";
		this.AjaxRequest = 'question_number=' + (this.QuestionNumber + 1).toString() + '&operation=get_question';		
		
		this.BigDiv = document.createElement("div");
		this.BigDiv.setAttribute("class", "BigDiv_class");
		this.BigDiv.parent = this;
		
		this.QuestDiv = document.createElement("div");
		this.QuestDiv.setAttribute("class", "QuestDiv_class");
		this.QuestDiv.parent = this;	
		
		this.FirstOption = document.createElement("div");
		this.FirstOption.setAttribute("class", "Options_class");
		this.FirstOption.parent = this;
		
		this.SecondOption = document.createElement("div");
		this.SecondOption.setAttribute("class", "Options_class");
		this.SecondOption.parent = this;
		
		this.FirstOptionText = document.createElement("div");
		this.FirstOptionText.parent = this;
		
		this.SecondOptionText = document.createElement("div");
		this.SecondOptionText.parent = this;	
		
		this.FirstTapDiv = document.createElement("div");
		this.FirstTapDiv.setAttribute("class", "FirstTapDiv_class");
		this.FirstTapDiv.parent = this;
		
		this.SecondTapDiv = document.createElement("div");
		this.SecondTapDiv.setAttribute("class", "SecondTapDiv_class");
		this.SecondTapDiv.parent = this;	

//////-------------------------FUNCTIONS DEFINITION---------------------		
		this.OptionTap = function(ans) {
			this.Answer = ans;
		}
		
		this.setQuestion = function(str) {
			this.QuestDiv.innerHTML += str;
		}
		
		this.setFirstAnswer = function(str) {
			this.FirstOptionText.innerHTML += str;
		}
		this.setSecondAnswer = function(str) {
			this.SecondOptionText.innerHTML += str;
		}		
		
		this.setTapLabel = function() {
			this.FirstTapDiv.innerHTML = '+';
			this.SecondTapDiv.innerHTML = '+';			
		}
		
		this.setPointerCursor = function(Cursor) {
			this.style.cursor = Cursor;
		}
		
		
			
		this.doAjaxRequest = function(datas) {
			var request = new XMLHttpRequest();
			request.parent = this;
			request.open("POST", "/funcs.php", true);
			request.onreadystatechange = function() {
				if (request.readyState === 4 && (request.status === 200 || request.statusText==="OK")) {
					answr = request.responseText.slice(0, -3);//Обрезание боковых скобок и кавычек
					answr = answr.split('&&&');//Создание массива из строки
					for (var i = 0; i < answr.length; i++) {
						answr[i] = answr[i].split('===');//Создание двумерного массива
						answr[answr[i][0]] = answr[i][1];//Создание объекта, со свойствами двумерного массива.
					}
					this.parent.setQuestion(answr["question"]);
					this.parent.setFirstAnswer(answr["first_answer"]);
					this.parent.setSecondAnswer(answr["second_answer"]);
				}
			}
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(datas);
			
		}
			
					

//////---------------------------------HANDLERS-------------------------		
		this.FirstTapDiv.onclick = function() {
			this.parent.OptionTap.apply(this.parent, ["A"]);
			this.parent.BigDiv.style.left = "-100%";
		};
		this.SecondTapDiv.onclick = function() {
			this.parent.OptionTap.apply(this.parent, ["B"]);
			this.parent.BigDiv.style.left = "-100%";
		};
		
		this.FirstTapDiv.onmouseover = function() {
			this.parent.setPointerCursor.apply(this, ["pointer"]);
		};
		this.SecondTapDiv.onmouseover = function() {
			this.parent.setPointerCursor.apply(this, ["pointer"]);
		};		
		
		this.FirstTapDiv.onmouseout = function() {
			this.parent.setPointerCursor.apply(this, ["default"]);
		};
		this.SecondTapDiv.onmouseout = function() {
			this.parent.setPointerCursor.apply(this, ["default"]);
		};	
		
/////----------------------------------CALL INIT METHODS----------------
		this.setTapLabel();
		this.doAjaxRequest(this.AjaxRequest);


//////--------------------------------APPEND CHILD ELEMENTS-------------	
		this.BigDiv.appendChild(this.QuestDiv);
		this.FirstOption.appendChild(this.FirstOptionText);
		this.FirstOption.appendChild(this.FirstTapDiv);
		this.BigDiv.appendChild(this.FirstOption);
		this.SecondOption.appendChild(this.SecondOptionText);
		this.SecondOption.appendChild(this.SecondTapDiv);
		this.BigDiv.appendChild(this.SecondOption);
		document.body.appendChild(this.BigDiv);


	};//////////======END OF QUESTBOX CLASS DEFINITION==================
//======================================================================	
	var QuestArray = [];
	for (var i = 0; i < 8; i++) {
		QuestArray[i] = new QuestBox(i);
	}
	
	
/*
	Все работает!

*/

	function doAjaxRequest() {
		var request = new XMLHttpRequest();

		
		request.open = ("POST", "/funcs.php", true);
		
		request.onreadystatechange = function() {
			
			if (request.readyState === 4 && request.status === 200) {
				var JSONAnswer = request.responseText;
				JSONAnswer = JSON.stringify(JSONAnswer);
				var ServerAnswer = JSON.parse(JSONAnswer);
				
				
				
				
					 				
			} else {
				window.alert(request.statusText);
			}
			
		};
		
		request.setRequestHeader("Content-Type", "text/plane;charset=UTF-8");
		
		
	}




</script>
 
</body>

