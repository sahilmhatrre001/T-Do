<?php
	include 'actions.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>T:Do</title>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
	<div class="md:container md:mx-auto space-y-6 font-mono">
		<div class="block bg-purple-500 rounded-lg shadow shadow-inner-xl" style="font-size: 3rem">
		<div class="grid grid-cols-2 gap-4">
		<div style="margin-left: 0.09em;">T:do</div>
		<div><a href="" style="float: right;"><img style="margin-top:0.12em;margin-right:0.12em; " width="50" height="50" src="git.png"></a></div>
		</div>
		</div>
		<div class="block h-100">
			<form action="index.php" method="POST">
			<input class="border bg-purple-200 hover:border-purple-500 w-full" placeholder="  Add New Task" type="text" name="new_task">
			<br>
			<br>
			<button name="submit"  class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-400 hover:bg-purple-500 md:py-4 md:text-lg md:px-10">
                Add
              </button>
          </form>
		</div>
		<div class="block">
			<div class="flex flex-column md:flex-wrap">
				<div style="width: 40%;">
					<h3>Pending Tasks &#128529</h3>
					<ol id="PendingOl">
						<?php
						$inp = file_get_contents('data.json');
						$tempArray = json_decode($inp);
						if(count($tempArray) != 0)
						{
						foreach ($tempArray as $tasks) {
							if($tasks->completed == false)
							{
						?>
						<li style="display: block;" class="hover:bg-purple-500 hover:border rounded-sm shadow-lg shadow-inner-lg">
							<a href="index.php?id=<?php echo $tasks->id; ?>"><span><?php echo $tasks->task; ?><span> <small><?php echo $tasks->date ?></small></a>
						</li>
						<?php
							}
						}
					}
						?>
					</ol>
				</div>
				<div style="width: 20%;">
					
				</div>
				<div style="width: 40%;" >
					<h3>Completed Tasks &#128526</h3>
					<ol id="completedOL">
						<?php
						if(count($tempArray) != 0)
						{
						foreach ($tempArray as $tasks) {
							if($tasks->completed == true)
							{
						?>
						<li class="text-purple-700 text-opacity-75 rounded-sm shadow-lg shadow-inner-lg">
							<span><?php echo $tasks->task; ?><span> <small><?php echo $tasks->date ?></small>
						</li>
						<?php
								}
							}
						}	
						?>
					</ol>
				</div>
		</div>
	</div>
	<form action="index.php" method="POST">
	<button name="clear" style="float: right;" class=" rounded-lg shadow bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">
		clear
	</button>
	</form>
</body>
</html>
