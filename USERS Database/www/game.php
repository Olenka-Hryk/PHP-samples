<?php
	function win($i, $b)
	{
		return (($b[0]==$i && $b[1]==$i && $b[2] == $i) || ($b[3]==$i && $b[4]==$i && $b[5] == $i) ||
				($b[6]==$i && $b[7]==$i && $b[8] == $i) || ($b[0]==$i && $b[3]==$i && $b[6] == $i) ||
				($b[1]==$i && $b[4]==$i && $b[7] == $i) || ($b[2]==$i && $b[5]==$i && $b[8] == $i) ||
				($b[0]==$i && $b[4]==$i && $b[8] == $i) || ($b[2]==$i && $b[4]==$i && $b[6] == $i));
	}

	$winner = 'n';	
	$box = array('','','','','','','','','');
	if(isset($_POST["submitbtn"])){
		for($i = 0; $i < 9; $i++)
		{
			$box[$i] = $_POST["box$i"];
		}

		//print_r($box);

		if(win('x',$box))
		{
			$winner = 'x';
			print("<h1>x wins</h1>");
		}

		$blank = 0; 
		for($i =0; $i < 9; $i++)
		{
			if($box[$i] == ''){
				$blank = 1; 		// якщо є пусте місце 
				break;
			}
		}

		if($blank == 1 && $winner =='n'){
			$i = rand()%8;
			while($box[$i] !=''){
				$i = rand()%9;
			}
			$box[$i] = 'o';

			if(win('o',$box))
			{
				$winner = 'o';
				print("<h1>o wins</h1>");
			}
		}
		else if($winner == 'n')
		{
			$winner = 't';
			print("<h1>Tied game</h1>");
		}


	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TicTacToe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="tlo.jpg" > 
	<form name ="tictactoe" method="post" action="game.php" align="center">
 		<?php
 			for($i = 0; $i <= 8; $i++)
 			{
 				if($i % 3 == 0)
 					print ("<br>");
 				printf('<input type="text" name="box%s" value="%s" id = "box">',$i,$box[$i]);
 			}

 			if($winner =='n')
 				print('<br> <input type="submit" name="submitbtn" value="Go" id="btn">');
 			else
 			{
				print('<br> <input type="submit" name="newgamebtn" value="Play Again" onclick="window.location.hred=\'index.php\'"id="btn"> ');

 			}
 		?>
 	</form>
 	                <font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 350px;' href='dashboard.php'>Back</a>
			        </font>
</body>
</html>