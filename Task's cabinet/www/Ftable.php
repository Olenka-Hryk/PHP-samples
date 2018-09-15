<?php
	//print rank checker
	$rank = 0;
	$previous = 0;

	//get data from table
	$text = "";
	if(isset($_GET['article'])) {
		$text = $_GET['article'];
	}
    error_reporting(0);
	// str_word_count() - return words count
	$words = str_word_count($text,1, '0-9'); 
	// array_count_values() - return counted array of elements
	$wordsCount = array_count_values($words);
	// array_unique() - return array without dublicates
	$uniqueWords = array_unique($words);
	// array_combinate(key, value) - create an associate array
	$associative = array_combine($uniqueWords, $wordsCount);
	// arsort() - sort [reversed]
	arsort($associative);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
				<h1 class="text-header" style="color: Maroon; margin: 1px 200px 10px 200px;" align="center">Завдання 1 <small> Побудова частотного словника тексту</small></h1>
			</div>
			<div class="content">
				<form method="GET">
					<textarea class="input-text" name="article" style="margin: 1px 200px 10px 250px;"></textarea></br>
					<input class="" type="submit" value="Get frequency word set" style="cursor:pointer; margin: 1px 200px 10px 256px;">
				</form>
				<h4 style="color: Maroon; margin: 1px 200px 10px 200px;" align="center">Таблиця частоти слів</h4>
				<table class="frequencyWords" style="margin: 1px 200px 10px 250px;">
					<thead>
						<tr>
							<td>Слово</td>
							<td>Кількість</td>
							<td>Ранг</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(empty($associative)) {
								echo "<tr class=\"emptyTableValues\">";
									echo "<td colspan=\"3\">" . "{no data}" . "</td>";
								echo "</tr>";
							}
							foreach($associative as $word => $amount) {
								//check Rank
								if($previous != $amount) {
									$rank++;
									$previous = $amount;
								}
								//print table data
								echo "<tr>";
									echo "<td> $word </td>";
									echo "<td> $amount </td>";
									echo "<td> $rank </td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				<font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 350px;' href='dashboard.php'>Back</a>
			        </font>
			</div>
		</main>
	</div>
</body>
</html>