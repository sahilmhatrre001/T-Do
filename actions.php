<?php

/**
 * 
 */
class NewTask
{
	public $id;
	public $task;
	public $date;
	public $completed;

	function __construct($id,$task,$date,$completed)
	{
		$this->id = $id;
		$this->task = $task;
		$this->date = $date;
		$this->completed = $completed;
	}
}


if(!file_exists("data.json") or isset($_POST['clear']))
{
	$main_data = json_encode([]);
	$file = fopen("data.json", "w") or die("Unable to open file!");
	fwrite($file, $main_data);
}




if(isset($_POST['submit']))
{
	$inp = file_get_contents('data.json');
	$tempArray = json_decode($inp);
	$task_count = count($tempArray);
	$task = $_POST['new_task'];
	$date = date('d-m-Y');
	$new_task = new NewTask($task_count+1,$task,$date,false);

	array_push($tempArray, $new_task);
	$jsonData = json_encode($tempArray);
	file_put_contents('data.json', $jsonData);
}

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$inp = file_get_contents('data.json');
	$tempArray = json_decode($inp);
	foreach ($tempArray as $tasks) {
		if($tasks->id == $id)
		{
			$tasks->completed = true;
		}
	}
	$jsonData = json_encode($tempArray);
	file_put_contents('data.json', $jsonData);
}

if(isset($_GET['remid']))
{
	$id = $_GET['remid'];
	$inp = file_get_contents('data.json');
	$tempArray = json_decode($inp);
	foreach ($tempArray as $tasks) {
		if($tasks->id == $id)
		{
			unset($tempArray[$id]);
		}
	}
	$jsonData = json_encode($tempArray);
	file_put_contents('data.json', $jsonData);
}