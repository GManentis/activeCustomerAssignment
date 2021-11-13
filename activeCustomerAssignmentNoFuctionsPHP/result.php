<?php 
$numFiles = 0;
$codeLinesPerFile = array();
$limit = 0;
$cores = 0;
$totalExecutionTime = 0;
$error = "";
$response = "";

if(isset($_POST["submit"])){
	if(!isset($_POST["codeLinesPerFile"]) || !is_array($_POST["codeLinesPerFile"])){
		echo "Please insert valid code lines per file<br><br><a href='./'>Click here to return</a>";
		die();
	}
	$codeLinesPerFile = $_POST["codeLinesPerFile"] ? $_POST["codeLinesPerFile"]:array();
	
	if(!isset($_POST["cores"]) || !filter_var($_POST["cores"],FILTER_VALIDATE_INT) || $_POST["cores"] < 1 || $_POST["cores"] > 1000000000){
		echo "Please set valid number of cores<br><br><a href='./'>Click here to return</a>";
		die();
	}
	$cores = $_POST["cores"];

	if(!isset($_POST["numFiles"]) || !filter_var($_POST["numFiles"], FILTER_VALIDATE_INT) || $_POST["numFiles"] < 1 || $_POST["numFiles"] >10000){
		echo "Please set valid number of files<br><br><a href='./'>Click here to return</a>";
		die();
	}
	$numFiles = $_POST["numFiles"];
	
	if(!isset($_POST["limit"]) || !filter_var($_POST["limit"],FILTER_VALIDATE_INT) || $_POST["limit"] < 1 || $_POST["limit"] > 1000000000){
		echo "Please set valid limit for files<br><br><a href='./'>Click here to return</a>";
		die();
	}
	$limit = $_POST["limit"];

	if(count($codeLinesPerFile) != $numFiles){
		echo "The given number of files are not equal to the files given<br><br><a href='./'>Click here to return</a>";
		die();
	}

	$position = 1;
	foreach($codeLinesPerFile as $codeln){
		if(!filter_var($codeln, FILTER_VALIDATE_INT) || $codeln < 1 || $codeln >1000000000){
			echo "Invalid number of code lines in field No".$position."<br><br><a href='./'>Click here to return</a>";
			die();
		}
		++$position;
	}

	
	$total_execution_time = 0;
	$splittable_files = array();
	$unsplittable_files = array();
	foreach($codeLinesPerFile as $codeln){
		if($codeln%$cores == 0){
			array_push($splittable_files,$codeln);
		}else{
			array_push($unsplittable_files,$codeln);
		}
	}
	if(count($splittable_files) != 0){
		rsort($splittable_files);
		if($limit < count($splittable_files)){
			$excluded = array_slice($splittable_files,$limit);
			$unsplittable_files = array_merge($unsplittable_files, $excluded);
			$splittable_files = array_slice($splittable_files,0,$limit);
		}
		foreach($splittable_files as $file){
			$total_execution_time += $file/$cores;
		}
	}
	foreach($unsplittable_files as $u_file){
		$total_execution_time += $u_file;
	}
	echo $response = "Total process time is ".$total_execution_time;
	
}else{
	header("Location:./index.php");
}

?>