<?php
class FileManager {
	var $connection;
	var $tableName;

	public function ConnectionStart() {
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "usersystem";
		$this->connection = new mysqli($host, $user, $pass, $dbname);
		return $this->connection;
	}

	public function FileOpen($fileName) {
		return fopen($fileName, 'w');
	}

	public function SelectDB($dbname) {
		return mysqli_select_db($this->connection, $dbname);
	}

	public function DoQuery($query) {
		return $this->connection->query($query);
	}
}
$file = new FileManager;

if(isset($_GET["tableName"])) {
	$file->tableName = $_GET["tableName"];
	$FileOpen = $file->FileOpen($file->tableName.'.txt');
	$connection = $file->ConnectionStart();
	$selectedDB = $file->SelectDB('usersystem');

	/* insert field values into data.txt */
	$query = "SELECT * FROM ".$file->tableName."";
	$result = $file->DoQuery($query);
	if($result == false) 
	{
		$error = "Error: Table '$file->tableName' is not exist!";
	} 
	else 
	{
		while ($row = mysqli_fetch_array($result)) 
		{
			$error = "File <b> $file->tableName.txt </b> created succesfully";
			$last = end($row);
			$num = mysqli_num_fields($result);
			for($i = 0; $i < $num; $i++) 
			{
				fwrite($FileOpen, $row[$i]);
				if ($row[$i] != $last)
				fwrite($FileOpen, ", ");
			}
			fwrite($FileOpen, "\n");
		}
		fclose($FileOpen);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task 6(3)</title>
</head>
<body background="tlo.jpg">
	<div class="wrapper"style="
		    margin: 50px 100px 30px 350px; /*Відступи*/
			width: 50%; /*ширина*/
			background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
			border: 1px solid pink; /*тінь*/
			box-shadow: 2px 4px 50px Hotpink;
			border-radius: 10px;">

		<main class="wrapper-content">
			<div class="page-header">
				<h1 class="text-header" style="color: Maroon; margin: 1px 200px 10px 200px;" align="center">Завдання 6(3) <small> Менеджер файлів. Програма читання даних з БД у файл. </small></h1>
			</div>
			<div class="content">
				<form method="get">
					<p align="center">Введіть назву файлу для виводу табличних данних БД:</p>
					<input type="text" name="tableName" style="margin: 1px 200px 10px 256px;">
					<?php 
					if(isset($_GET["tableName"]))
						echo "<p>".$error."</p>";
					?>
					<input type="submit" value="Вивід"  style="cursor:pointer; margin: 1px 200px 10px 300px;">
				</form>
				<font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 300px;' href='dashboard.php'>Back</a>
			        </font>
			</div>
		</main>
	</div>
</body>
</html>