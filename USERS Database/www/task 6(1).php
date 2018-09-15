<?php 
	class SqlManager {
		var $servername;
		var $username;
		var $password;
		var $dbname;
		var $connection;

		function __construct($servername, $username, $password, $dbname) {
			$this->servername = $servername;
			$this->username = $username;
			$this->password = $password;
			$this->dbname = $dbname;
		}

		public function CreateConnection() {
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			return $this->connection;
		}

		public function DisableConnection() {
			$this->connection->close();
		}

		public function CheckConnection() {
			if($this->connection->connect_error) {
				die("Connection failed: ". $this->connection->connect_error);
			}
		}

		public function GetCataloge() {
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
			echo " Наявні таблиці: </br> ";
			while ($row = mysqli_fetch_row($result)) {
				echo "- {$row[0]}\n";
				echo "</br>";
			}
		}

		public function GetTable($tableName) {
			return "SELECT * FROM ".$tableName."";
		}

		public function DoQuery($query) {
			return $this->connection->query($query);
		}

		public function PrintTable($result, $header, $table) {
				$countRows = 0;
				echo "<hr>";
				if($result->num_rows > 0) {
					echo "<h3>".$table."</h3>";
					echo "<table class=\"sql-table\"><thead><tr>";
					for($i = 0; $i < count($header); $i++) {
						echo "<td>".$header[$i]."</td>";
					}
					echo "</tr></thead>";
					while($row = $result->fetch_assoc()) {
						$countRows++;
						echo "<tr>";
						for($i = 0; $i < count($row); $i++) {
							echo "<td>".$row[$header[$i]]."</td>";
						}
						echo "</tr>";
					}
				} else {
					echo "0 results";
				}

				echo "<p> Кількість полів у таблиці = ".$countRows."</p>";
		}
	}

	$context = new SqlManager("localhost", "root", "", "usersystem");
	$connection = $context->CreateConnection();
	$context->CheckConnection();

	if(isset($_GET["tableName"])) {
		$table = $_GET["tableName"];
	}
	else {
		$table = "tbl_users";
	}
	$query = $context->GetTable($table);
	$result = $context->DoQuery($query);
	$context->DisableConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task 6(1)</title>
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
				<h1 class="text-header" style="color: Maroon; margin: 1px 200px 10px 200px;" align="center">Завдання 6(1) <small> Модуль підрахунку полів у БД</small></h1>
			</div>
			<div class="content">
				<?php $context->GetCataloge() ?>
				<form method="GET">
					</br>
					<p align="center">Введьть ім'я таблиці:</p>
					<input type="text" name="tableName" style="margin: 1px 200px 10px 256px;">
					<input type="submit" value="Отримати таблицю" style="cursor:pointer; margin: 1px 200px 10px 300px;">
				</form>
				<?php 
					if($table == "tbl_users") {
						$header = array('name', 'email', 'userName','password','ip');
						if(isset($_GET["tableName"])) {
							$context->PrintTable($result, $header, $table);
						}
					} 
				?>
				<font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 300px;' href='dashboard.php'>Back</a>
			        </font>
			</div>
		</main>
	</div>
</body>
</html>