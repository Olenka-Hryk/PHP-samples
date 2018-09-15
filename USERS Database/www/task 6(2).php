<?php 
$dbname = 'usersystem';
$connection = new mysqli('localhost', 'root', '');
if (!$connection) {
    echo 'Could not connect to mysql';
    exit;
}

$sql = "SHOW TABLES FROM $dbname";
$result = $connection->query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysqli_fetch_row($result)) {
	echo "
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Task 6(2)</title>	
</head>
<body>
<body background='tlo.jpg'>
	<div class='wrapper' style='
		    margin: 50px 100px 30px 350px; /*Відступи*/
			width: 50%; /*ширина*/
			background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
			border: 1px solid pink; /*тінь*/
			box-shadow: 2px 4px 50px Hotpink;
			border-radius: 10px;'>
		<main class='wrapper-content'>
			<div class='page-header'>
				<h1 class='text-header' style='color: Maroon; margin: 1px 200px 10px 200px;' align='center'>Завдання 6(2) <small> Каталог БД</small></h1>
			</div>
			Таблиці: {$row[0]}\n
			<div class='content'>
				<p align='center'>'usersystem' cataloge</p>
                  <font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 300px;' href='dashboard.php'>Back</a>
			        </font>
			</div>
		</main>
	</div>
</body>
</html>";
}
 ?>

