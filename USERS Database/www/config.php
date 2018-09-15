<?php 
session_start();

$con = mysql_connect("localhost","root","");
mysql_select_db("usersystem",$con);

function getUserData($userID){

	$query=mysql_query("select * from tbl_users where userID='$userID' limit 1");

    return mysql_fetch_array($query,1);
}
?>