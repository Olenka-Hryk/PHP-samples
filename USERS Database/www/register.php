<?php 
$connection = mysql_connect("localhost","root","") or die ("Couldn't connect to the server!");
mysql_select_db("usersystem", $connection) or die ("Couldn't connect to the database!");
error_reporting(0);

if($_POST['register']){
	if($_POST['username'] && $_POST['password']){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string(hash("sha512", $_POST['password']));
		$name = mysql_real_escape_string($_POST['name']);

		$check = mysql_query("SELECT count(*) FROM 'tbl_users' WHERE userName='$username'");
		if ($check >'0'){
			die("That username already exists! Try <i>$username" . rand(1,50) . "</i> instead! <a href='register.php'>&larr; Back</a>");
		}else {
			mysql_query("INSERT INTO `tbl_users` (`passWord`,`userName`,`name`) 
							VALUES ('$password','$username','$name')");
			$userID = mysql_insert_id();
			session_start();
			$_SESSION['userID'] = $userID;
     		header("location:dashboardNEW.php");
		}
			// else
			// 	header("location:dashboard.php");
  }
}

echo"
<body style='background-color: rgba(255, 228, 225,0.8);'>
		<div style='
		    margin: 50px 100px 30px 350px; /*Відступи*/
			width: 50%; /*ширина*/
			background-color: rgba(255, 192, 203,0.8); /*колір фону (0.8-прозорість)*/
			border: 1px solid pink; /*тінь*/
			box-shadow: 2px 4px 50px Hotpink;
			border-radius: 10px;'>
			<img class='photo' src='userwho.jpeg' align='right' width='200' height='200' vspace='20' hspace='40' style='border-radius: 100px;'>
			<font size='6' face='SEGOE PRINT'>
				<h3 style='color: Maroon;' align='center'>Registration</h3>
			<form action='' method='post'>
			     <table>
			     <font style='margin: 30px 10px 10px 50px;'>
			             <tr>
			                <td>
			                    <b style='margin: 30px 10px 10px 50px;'>Name:</b>
			                </td>
			                <td>
                                <input type='text' name='name' style='padding: 4px;'/>
			                </td>
			             </tr>
			          <tr>
			              <td>
			               <b style='margin: 30px 10px 10px 50px;'>Username:</b>
			              </td>
			              <td>
			                  <input type='text' name='username' style='padding: 4px;'/>
			                </td>
			          </tr>
			          <tr>
			               <td>
			                 <b style='margin: 30px 10px 10px 50px;'>Password:</b>
			               </td>
			               <td>
			                  <input type='password' name='password' style='padding: 4px;'/>
			                </td>
			            </tr>
			             <tr>
			                 <tb>
			                 <input type='submit' name='register' value='Register'/>
			                 </tb>
			               </tr>
			               </font>
			        </table>
			        <font size='4' face='book antiqua'>
			        <a style='cursor:pointer; margin: 0 10px 10px 350px;' href='index.php'>Back</a>
			        </font>
			    </form>
			</div>
	</body>
"
?>