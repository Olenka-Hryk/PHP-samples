<?php 
	if(isset($_GET["filename"]) && isset($_GET["tablename"])) {
		$fileName = $_GET["filename"];
		$tableName = $_GET["tablename"];
		$myFile = $fileName;
		$sql = mysqli_connect("localhost", "root", "");
		mysqli_select_db($sql, "usersystem");
		$result = $sql->query("LOAD DATA INFILE '$myFile'" . " INTO TABLE $tableName FIELDS TERMINATED BY ','");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task 6(4)</title>
</head>
<body background="tlo.jpg">
	<div class="wrapper"style="
		    margin: 50px 100px 30px 350px; /*Відступи*/
			width: 50%; /*ширина*/
			background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
			border: 1px solid pink; /*тінь*/
			box-shadow: 2px 4px 50px Hotpink;
			border-radius: 10px;">

        <div class="wrapper">
		<main class="wrapper-content">
			<div class="page-header">
				<h1 class="text-header" style="color: Maroon; margin: 1px 200px 10px 200px;" align="center">Завдання 6(4) <small> Менеджер файлів. Програма читання даних з файлу у БД. </small></h1>
			</div>
			<div class="content">
				<form method="get">
					<p align="center">Читання з файлу до SQL-таблиці:</p>
					<p class="input-header" align="center">Ім'я файлу:</p>
					<input type="text" placeholder="Шлях файлу..." name="filename" style="margin: 1px 200px 10px 256px;">
					<p class="input-header" align="center">Таблиця:</p>
					<input type="text" placeholder="Ім'я таблиці..." name="tablename" style="margin: 1px 200px 10px 256px;">
					<input type="submit" value="Читати" style="cursor:pointer; margin: 1px 200px 10px 300px;">
				</form>
				<font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 300px;' href='dashboard.php'>Back</a>
			        </font>
			</div>
		</main>
	</div>
</body>
</html>