<?php
require("config.php");
if(!isset($_SESSION['userID'])){
	header("location:index.php");
	exit();
}
else
{
	$userData = getUserData($_SESSION['userID']);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>

<body background="tlo.jpg" > 
    <li>
      <font size="4" face="book antiqua">
        <a href="logout.php">Logout</a>
        </font>
      </li>

<header style="margin: 30px 5px 16px 50px; /*Відступи*/
      width: 30%; /*ширина*/
      background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
      border: 1px solid pink; /*тінь*/
      box-shadow: 2px 4px 50px Hotpink;
      border-radius: 10px;">
      <img class="photo" src="usernow.jpeg" align="center" width="300" height="300" vspace="20" hspace="40" style="border-radius: 100px;"> 

<main>
   <div class = "Logo"id = "Logo" onclick="changeSize(this)"></div>
    <div class = "LogoRight"></div>
    <div class = "Search">
    <div id ="mainFrame">
    <div id = "navLeft">
     <ul id="menu">
      </ul>
    </div>

  <div id = "navRight" style="margin: 30px 15px 20px 90px;"><h1> Welcome <?php echo $userData['name']; ?> </h1></div>
    <br class = "clearFix">
  </div>
    </div>
</main>
</header>
   <!-- Програма побудови частотного словника тексту -->
  <header style="margin: 7px 5px 10px 500px; /*Відступи*/
      width: 50%; /*ширина*/
      background-color: rgba(32, 178, 170, 0.5); /*колір фону (0.8-прозорість)*/
      border: 1px solid SteelBlue; /*тінь*/
      box-shadow: 2px 4px 50px SteelBlue;
      border-radius: 10px;">
      <img class="photo" src="exel.png" align="left" width="100" height="100" vspace="20" hspace="40">
      <font size="4" face="book antiqua">
        <h4 style="margin: 90px 0 10px 200px;"> Building program frequency vocabulary text 
            <a href='Ftable.php' style="cursor:pointer;"> (1) </a>
      </h4>
      </font>

  </header>

  <header style="margin: 7px 5px 10px 500px; /*Відступи*/
      width: 50%; /*ширина*/
      background-color: rgba(186, 85, 211, 0.5); /*колір фону (0.8-прозорість)*/
      border: 1px solid DarkMagenta; /*тінь*/
      box-shadow: 2px 4px 50px DarkMagenta;
      border-radius: 10px;">
      <img class="photo" src="0.jpg" align="left" width="100" height="100" vspace="20" hspace="40" style="border-radius: 20px;">
      <font size="4" face="book antiqua">
        <h4 style="margin: 90px 0 10px 200px;"> Tic-tac-toe game
            <a href='game.php' style="cursor:pointer;"> (2) </a>
        </h4>
      </font>

  </header> 

</body>
</html>



