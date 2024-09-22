<?php
function getConnection()
{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="a";
	$conn=new mysqli($servername,$username,$password,$dbname);
	return $conn;
}
?>