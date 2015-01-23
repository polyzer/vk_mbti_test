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
	var MessageBox = function(header_text, msg_text, OKButton_text, CancelButton_text) {
		var MessageDiv, MessageHeaderDiv, MessageTextDiv, MessageButtonsDiv, OKButton, CancelButton, timer;
		
		this.MessageDiv = document.createElement("div");
		this.MessageDiv.setAttribute("class", "MessageDiv_class");
		this.MessageDiv.parent = this;
		
		this.MessageHeaderDiv = document.createElement("div");
		this.MessageHeaderDiv.setAttribute("class", "MessageHeaderDiv_class");
		this.MessageHeaderDiv.parent = this;
		
		this.MessageTextDiv = document.createElement("div");
		this.MessageTextDiv.setAttribute("class", "MessageTextDiv_class");
		this.MessageTextDiv.parent = this;

		this.MessageButtonsDiv = document.createElement("div");
		this.MessageButtonsDiv.setAttribute("class", "MessageButtonsDiv_class");
		this.MessageButtonsDiv.parent = this;

	
		this.OKButton = document.createElement("button");
		this.OKButton.setAttribute("class", "OKButton_class");
		this.OKButton.parent = this;
		this.OKButton.innerHTML = "Начать тест";
		
		this.CancelButton = document.createElement("button");
		this.CancelButton.setAttribute("class", "CancelButton_class");
		this.CancelButton.parent = this;
		this.CancelButton.innerHTML = "Отмена";
//----------------------FUNCTIONS_DEFINITION----------------------------

		this.comeTo = function(to, value, parent) {
			
			if (to == "left") {
				if (Number(parent.MessageDiv.style.left.slice(0, -1)) <= value)
					clearInterval(parent.timer);
				parent.MessageDiv.style.left = (Number(parent.MessageDiv.style.left.slice(0, -1)) - 1).toString() + "%";			
			}
			
			
			if (to == "right") {
				if (Number(parent.MessageDiv.style.left.slice(0, -1)) >= value)
					clearInterval(parent.timer);
				parent.MessageDiv.style.left = (Number(parent.MessageDiv.style.left.slice(0, -1)) + 1).toString() + "%";			
			}
			
			if (to == "top") {
				if (Number(parent.MessageDiv.style.top.slice(0, -1)) <= value)
					clearInterval(parent.timer);
				parent.MessageDiv.style.top = (Number(parent.MessageDiv.style.top.slice(0, -1)) - 1).toString() + "%";			
			}
			
			if (to == "bottom") {
				if (Number(parent.BigDiv.style.top.slice(0, -1)) >= value)
					clearInterval(parent.timer);
				parent.MessageDiv.style.top = (Number(parent.MessageDiv.style.top.slice(0, -1)) + 1).toString() + "%";			
			}
		
		}

		
		this.Accept = function () {
			this.MessageDiv.style.left = "0%";
			this.timer = setInterval(this.comeTo, 15, "top", -500, this);
			//Удаляем Месседж,
			//запускаем приложение!
			createQuestions();
			QuestArray[CurrentQuestBox].timer = setInterval(QuestArray[CurrentQuestBox].comeTo, 15, "top", "0", QuestArray[CurrentQuestBox]);
		}
		this.Cancel = function () {
			window.alert("CLOSE");
			//Закрыть приложение!
		}
		
		this.setMessageHeader = function (header_text) {
			this.MessageHeaderDiv.innerHTML = header_text;
		}
		
		this.setMessageText = function (msg_text) {
			this.MessageTextDiv.innerHTML = msg_text;
		}
		this.setOKButtonText = function(OKButton_text) {
			this.OKButton.innerHTML = OKButton_text;
		}
		this.setCancelButtonText = function(CancelButton_text) {
			this.CancelButton.innerHTML = CancelButton_text;
		}
		this.setTexts = function (header_text, msg_text, OKButton_text, CancelButton_text) {
			this.setMessageHeader(header_text);
			this.setMessageText(msg_text);
			this.setOKButtonText(OKButton_text);
			this.setCancelButtonText(CancelButton_text);
		}

//------------------------------HANDLERS--------------------------------
		this.OKButton.onclick = function () {
			this.parent.Accept();
		}
		
		this.CancelButton.onclick = function () {
			this.parent.Cancel();
		}

//--------------------------FUNCTIONS CALL------------------------------

		this.setMessageHeader("WELCOME");
		this.setMessageText("TEXT!");
		
//----------------------------APPENDS-----------------------------------		
		this.MessageDiv.appendChild(this.MessageHeaderDiv);
		this.MessageDiv.appendChild(this.MessageTextDiv);
		this.MessageButtonsDiv.appendChild(this.OKButton);
		this.MessageButtonsDiv.appendChild(this.CancelButton);
		this.MessageDiv.appendChild(this.MessageButtonsDiv);
		document.body.appendChild(this.MessageDiv);
	
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
		this.AjaxRequest = 'question_number=' + this.QuestionNumber.toString() + '&operation=get_question';		
		
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
			++CurrentQuestBox;
			QuestArray[CurrentQuestBox].timer = setInterval(QuestArray[CurrentQuestBox].comeTo, 15, "top", "0", QuestArray[CurrentQuestBox]);
		};
		this.SecondTapDiv.onclick = function() {
			this.parent.OptionTap.apply(this.parent, ["B"]);
			this.parent.BigDiv.style.left = "0%";
			this.parent.timer = setInterval(this.parent.comeTo, 15, "left", -50,  this.parent);
			++CurrentQuestBox;
			QuestArray[CurrentQuestBox].timer = setInterval(QuestArray[CurrentQuestBox].comeTo, 15, "top", "0", QuestArray[CurrentQuestBox]);
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
		this.BigDiv.style.top = "100%";
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
	
////========================TestResults_CLASS===========================	
	var TestResults = function () {

		var FirstColumn, SecondColumn, 
			FirstA, FirstB, SecondA, SecondB,
			ThirdColumn, FourthColumn,
			ThirdA, ThirdB, FourthA, FourthB,
			 A, B;
		this.A = 0;
		this.B = 0;
		this.FirstA = 0;
		this.FirstB = 0;		
		this.SecondA = 0;
		this.SecondB = 0;
		this.ThirdA = 0;
		this.ThirdB = 0;
		this.FourthA = 0;
		this.FourthB = 0;
		
				
		this.setNullAB = function () {
			this.A = 0;
			this.B = 0;
		}
		this.computingResults = function () {
			for (var i = 1; i <= 7; i++) {
				j = i;
				while (j <= 70) {
					if (QuestArray[j].Answer == "A") {
						this.A++;
					} else {
						this.B++;
					}
					j+=7;
				}
				//Считаем для I|E
				if (i == 1) {
					this.FirstA += this.A;
					this.FirstB += this.B;
					if (this.A <= this.B)
						this.FirstColumn = "I";
					else 
						this.FirstColumn = "E";
					this.setNullAB();
				}
				//Считаем для S|N
				if (i == 2 || i == 3) {
					this.SecondA += this.A;
					this.SecondB += this.B;
					if (i == 3)
						if (this.A <= this.B)
							this.SecondColumn = "N";
						else 
							this.SecondColumn = "S";
					this.setNullAB();
				}
				//Считаем для T|F
				if (i == 4 || i == 5) {
					this.ThirdA += this.A;
					this.ThirdB += this.B;
					if (i == 5)
						if (this.A <= this.B)
							this.FirstColumn = "F";
						else 
							this.FirstColumn = "T";
					this.setNullAB();
				}
				//Считаем для J|P
				if (i == 6 || i == 7) {
					this.FourthA += this.A;
					this.FourthB += this.B;
					if (i == 7)
						if (this.A <= this.B)
							this.FourthColumn = "P";
						else 
							this.FourthColumn = "J";
					this.setNullAB();
				}				
			}
			//Третий заход
			
			
		}
		
		this.Results = function () {
			res = this.FirstColumn + " A:" + this.FirstA + " B:" + this.FirstB + " <br />";
			res += this.SecondColumn + " A:" + this.SecondA + " B:" + this.SecondB + " <br />";
			res += this.ThirdColumn + " A:" + this.ThirdA + " B:" + this.ThirdB + " <br />";
			res += this.FourthColumn + " A:" + this.FourthA + " B:" + this.FourthB + " <br />";
			return res;
		}
		
		
	};
	
	
//====================END_OF_TESTRESULTS_CLASS==========================	
//======================================================================	
	var QuestArray = [];
	var CurrentQuestBox = 1;	
	function createQuestions() {	
		for (var i = 1; i <= 70; i++) {
			QuestArray[i] = new QuestBox(i);
		}
	}
	
	var WelcomeMessage = new MessageBox();
	WelcomeMessage.setTexts("Определение типа личности!",
							"Тест Кейрси для определения теста личности позволяет с высокой точностью определить Ваш тип личности по результатам ответов на предложенные вопросы.",
							"ОК",
							"Отмена");
/*
	Знаю, что говнокод дичайший...
	Время будет - все исправлю...
	А щас надо бы сделать поддержку ВК.

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

