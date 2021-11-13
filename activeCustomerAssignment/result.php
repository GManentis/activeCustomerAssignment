<?php 
require_once "functions.php";

if(isset($_POST["submit"])){
	if(!isset($_POST["customers"])){
		echo "Please insert valid customers<br><br><a href='./'>Click here to return</a>";
		die();
	}
			
	if(!isset($_POST["numCustomers"])){
		echo "Please set valid number of customers<br><br><a href='./'>Click here to return</a>";
		die();
	}
	
	echo mostActive($_POST["numCustomers"], $_POST["customers"]);
	
}else{
	header("Location:./index.php");
}

?>