<?php
	require_once('db.php');
	function adCheck($id)
	{
		$conn=getConnection();
		$sql="select * from admin where Id='$id'";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
    function cusCheck($id)
	{
		$conn=getConnection();
		$sql="select * from customer where Id='$id'";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
	function insert($name, $offer)
	{
		$conn=getConnection();
		$sql="insert into car values ($offer) where Name='$name'";
		$res=mysqli_query($conn, $sql);
	}
	function data()
	{
		$conn=getConnection();
		$sql="select * from car";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
	
	
	function update($name, $offer)
	{
		$conn=getConnection();
		$sql="update car set Offer='$offer' where Name='$name'";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
    function update1($name)
	{
		$conn=getConnection();
		$sql="update car set Price = Offer, Offer = NULL where Name='$name'";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
    function update2($name)
	{
		$conn=getConnection();
		$sql="update car set  Offer = NULL where Name='$name'";
		$res=mysqli_query($conn, $sql);
		return $res;
	}
    function data1()
	{
		$conn=getConnection();
		$sql="SELECT * FROM car WHERE offer IS NOT NULL;";
		$res=mysqli_query($conn, $sql);
		return $res;
	}

?>