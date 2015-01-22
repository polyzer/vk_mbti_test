<?php 
	session_start();
	$_SESSION["vk_persontype"]["true_connection"] = "true";
?>

<!DOCTYPE html>
<html>
<head>
    <title>MindTest</title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="./style.css" />
</head>
<body>

<script type="text/javascript">
/////////////=======================HELLO_MESSAGE_CLASS=================	
	var MessageBox = function(msg) {
		var MessageDiv, OKButton, CancelButton;
		
		this.MessageDiv = document.createElement("div");
		this.MessageDiv.setAttribute("class", "MessageDiv_class");
		this.MessageDiv.parent = this;
	
		this.MessageTextDiv = document.createElement("div");
		this.MessageTextDiv.setAttribute("class", "MessageDivText_class");
		this.MessageTextDiv.parent = this;
	
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
		this.OKButton.onclick = function () {
		
		
		}
		
		this.CancelButton.onclick = function () {
		
		}
	
	};	
////////////========================END_OF_HELLO_MESSAGE_CLASS==========
	
//////==============QUESTBOX_DEFINITION=================================	
	var QuestBox = function(num) {
		var QuestDiv, //Объект DIV для отображения вопроса 
			Answer, //Здесь хранится ответ - А или В
			BigDiv, //Это главный DIV в котором хранятся все остальные элементы
			FirstOption, //Первый вариант ответа
			SecondOption, //Второй вариант ответа
			FirstTapDiv, //Это элемент для выбора 1 варианта
			SecondTapDiv, // Это элемент для выбора 2 варианта
			FirstOptionText, // Это текст, отображаемый в первом варианте ответа
			SecondOptionText, // Это текст, отображаемый во втором варианте ответа
			FirstOptionNumber,
			SecondOptionNumber,
			AjaxRequest, // Это текст AJAX запроса 
			QuestionNumber, // Это номер вопроса, который следует выбрать из БД
			timer; //Таймер для остановки движения объекта
		
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
		
		this.FirstOptionNumber = document.createElement("div");
		this.FirstOptionNumber.parent = this;
		
		this.FirstTapDiv = document.createElement("div");
		this.FirstTapDiv.setAttribute("class", "TapDiv_class");
		this.FirstTapDiv.parent = this;
		
		this.SecondTapDiv = document.createElement("div");
		this.SecondTapDiv.setAttribute("class", "TapDiv_class");
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
		
		this.comeTo = function(to, value, parent) {
			
			if (to == "left") {
				if (Number(parent.BigDiv.style.left.slice(0, -1)) <= value)
					clearInterval(parent.timer);
				parent.BigDiv.style.left = (Number(parent.BigDiv.style.left.slice(0, -1)) - 1).toString() + "%";			
			}
			
			
			if (to == "right") {
				if (Number(parent.BigDiv.style.left.slice(0, -1)) >= value)
					clearInterval(parent.timer);
				parent.BigDiv.style.left = (Number(parent.BigDiv.style.left.slice(0, -1)) + 1).toString() + "%";			
			}
			
			if (to == "top") {
				if (Number(parent.BigDiv.style.top.slice(0, -1)) <= value)
					clearInterval(parent.timer);
				parent.BigDiv.style.top = (Number(parent.BigDiv.style.top.slice(0, -1)) - 1).toString() + "%";			
			}
			
			if (to == "bottom") {
				if (Number(parent.BigDiv.style.top.slice(0, -1)) >= value)
					clearInterval(parent.timer);
				parent.BigDiv.style.top = (Number(parent.BigDiv.style.top.slice(0, -1)) + 1).toString() + "%";			
			}
		
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
			this.parent.BigDiv.style.left = "0%";
			this.parent.timer = setInterval(this.parent.comeTo, 15, "left", -50,  this.parent);
		};
		this.SecondTapDiv.onclick = function() {
			this.parent.OptionTap.apply(this.parent, ["B"]);
			this.parent.BigDiv.style.left = "0%";
			this.parent.timer = setInterval(this.parent.comeTo, 15, "left", -50,  this.parent);
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

	function AjaxQuery(datas) {
		// datas - запрос, должен быть, в application/x-www-form-urlencoded формате данных
		var request = new XMLHttpRequest();
		request.open = ("POST", "/funcs.php", true);
		request.onreadystatechange = function() {
				if (request.readyState === 4 && (request.status === 200 || request.statusText==="OK")) {
					window.alert(request.responseText);
				}
			}
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(datas);
	}




</script>
 
</body>

