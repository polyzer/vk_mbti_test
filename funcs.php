<?php 
	session_start();
if ($_SESSION["vk_persontype"]["true_connection"] && 
	$_POST["operation"]
   ) 
{
	$operation = $_POST["operation"];
	$question_number = $_POST["question_number"];
	
	$mysqli = new mysqli("localhost", "root", "000000", "person_type");
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MYSQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error;
	} else {
		$mysqli->set_charset("utf8");
	}
	if ($operation === "get_question") {
		$res = $mysqli->query("SELECT * FROM questions WHERE num=".$question_number);
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}	
	if ($operation === "set_test_result") {
		$res = $mysqli->query("INSERT INTO person_type.");
	}

} else {
	echo "You have no permission!";
}
?>
