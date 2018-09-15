<?php
require("config.php");
if(file_exists("count.dat"))
{
  $exist_file = fopen("count.dat", "r");
  $new_count = fgets($exist_file, 255);
  $new_count++;
  fclose($exist_file);
  // to be invisible counter comment out next line;
 // print("$new_count people have visited this page");
  $exist_count = fopen("count.dat", "w");
  fputs($exist_count, $new_count);
  fclose($exist_count);
}
else
{
  $new_file = fopen("count.dat", "w");
  fputs($new_file, "1");
  fclose($new_file);
}
  if(isset($_POST['Submit']))
  {
    $userName=$_POST['userName']; 
    $passWord=$_POST['passWord'];

    $query=mysql_query("select userID from tbl_users where userName='$userName' and passWord='$passWord' limit 1");
    if(mysql_num_rows($query) == 1){
      $data = mysql_fetch_array($query,1);
      $_SESSION['userID'] = $data['userID'];
      header("location:dashboard.php");
    }
    else
    {
      // login failed
      $error="Invalid Login";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery-1.5.1.min.js"></script>

</head>

<body background="tlo.jpg" > 
<header style="margin: 30px 500px 160px 450px; /*Відступи*/
      width: 30%; /*ширина*/
      background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
      border: 1px solid pink; /*тінь*/
      box-shadow: 2px 4px 50px Hotpink;
      border-radius: 10px;">
      <img class="photo" src="user.jpeg" align="center" width="300" height="200" vspace="20" hspace="40" style="border-radius: 100px;">
        <font size="3" face="SEGOE PRINT">
        <main>
<div class = "Logo"id = "Logo" onclick="changeSize(this)"></div>
    <div class = "LogoRight"></div>
    <div class = "Search">
     <form action="" method="post">
        <table width="100%" border="0" cellpadding ="3" cellspacing="1" class ="table">
        <?php if(isset($error)){?>
        <tr>
          <td colspan="2" align="center"><strong class="error"></strong><?php echo $error;?></td>  
        </tr>
        <?php }?>
          <tr>
            <td width="33%" align="right">Username:</td>
            <td width="67%"><input name ="userName" type="text"></td>
          </tr>
          
          <tr>
            <td align="right">Password:</td>
            <td><input type="password" name="passWord" id="passWord">  </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td><input type = "submit" name ="Submit" id = "Submit" value="Submit" style="cursor:pointer;"></td>
          </tr> 
        </table>
      </form>
      <h4 style="margin: 10px 10px 10px 50px;">
        No account? <a href='register.php' style="cursor:pointer;">Register!</a>
      </h4>
    </div>
</main>
</body>
</html>