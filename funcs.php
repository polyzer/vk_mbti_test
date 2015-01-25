<?php 
	session_start();
if ($_SESSION["vk_persontype"]["true_connection"] && 
	$_POST["operation"]
   ) 
{
	$operation = $_POST["operation"];

	
	$mysqli = new mysqli("localhost", //адрес хоста БД
						 "root", // имя пользователя
						 "000000", //пароль
						 "person_type"); //база данных
	
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MYSQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error;
	} else {
		$mysqli->set_charset("utf8");
	}
	
	
	if ($operation === "get_question") {
		$question_number = $_POST["question_number"];
		$res = $mysqli->query("SELECT * FROM `questions` WHERE `num`=".$question_number.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}
	
		
	if ($operation === "save_test_result") {
		$first_column = $_POST["first_column"];
		$second_column = $_POST["second_column"];
		$third_column = $_POST["third_column"];//Сделать преобразование $_POST
		$fourth_column = $_POST["fourth_column"];
		$time_date = date("Y-m-d H:i:s");
		$vk_id = $_POST["vk_id"];
		$query_string = "INSERT INTO `results` (`result_id`,
												   `first_column`,
												   `second_column`,
												   `third_column`,
												   `fourth_column`,
												   `time_date`,
												   `vk_id`)
							   VALUES (NULL, 
							           '$first_column',
							           '$second_column',
							           '$third_column',
							           '$fourth_column',
							           '$time_date',
							           '$vk_id');";

		if (!($res = $mysqli->query($query_string)))
			echo $mysqli->error;
		else {
			echo "server_answer===Данные сохранены";
		}
	}

	if ($operation === "get_test_result") {
		$VKID = $_POST["vk_id"];
		$res = $mysqli->query("SELECT * FROM `results` WHERE `vk_id`='".$VKID."';");
		if ($res->num_rows != 0){
			$row = $res->fetch_assoc();
			$return_string = "";
			foreach($row as $key => $value) {
				$return_string .= $key."===".$value."&&&";
			}
			$return_string .= "server_answer===YES_DATA&&&";
			echo $return_string;
		} else {
			echo "server_answer===NO_DATA&&&";
		}
		
		
	}
	
	

} else {
	echo "You have no permission!";
}
?>
