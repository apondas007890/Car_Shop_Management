<?php
    session_start();
	require_once('../Models/alldb.php');
    if (isset($_GET['admin']))
	{
		header('location:../Views/adminLog.php');
	}
    if (isset($_GET['customer']))
	{
		header('location:../Views/customerLog.php');
	}
    if (isset($_GET['cusLogin']))
	{
		$id=$_GET['id'];
		$name=$_GET['name'];
		$pass=$_GET['pass'];
		if (empty($id) || empty($name) || empty($pass))
		{
			$_SESSION['error']="Please fill the form!";
			header('location: ../Views/customerLog.php');
		}
		else
		{
			if (is_numeric($id))
			{
				if (mysqli_num_rows(cusCheck($id))==1)
				{
					$_SESSION['name']=$name;
					header('location: ../Views/cusHome.php');
				}
				else
				{
					$_SESSION['error']="Incorrect login!";
					header('location: ../Views/customerLog.php');
				}
			}
			else
			{
				$_SESSION['error']="Id must be numeric!";
				header('location: ../Views/customerLog.php');
			}
		}
	}
    if (isset($_GET['adLogin']))
	{
		$id=$_GET['id'];
		$name=$_GET['name'];
		$pass=$_GET['pass'];
		if (empty($id) || empty($name) || empty($pass))
		{
			$_SESSION['error']="Please fill the form!";
			header('location: ../Views/adminLog.php');
		}
		else
		{
			if (is_numeric($id))
			{
				if (mysqli_num_rows(adCheck($id))==1)
				{
					$_SESSION['name']=$name;
					header('location: ../Views/adHome.php');
				}
				else
				{
					$_SESSION['error']="Incorrect login!";
					header('location: ../Views/adminLog.php');
				}
			}
			else
			{
				$_SESSION['error']="Id must be numeric!";
				header('location: ../Views/adminLog.php');
			}
		}
	}
    if (isset($_GET['request']))
	{
		$name=$_GET['request'];
        $offer=$_GET['offer'][$name];
        update($name, $offer);
        $_SESSION['request']="Requested!";
        header('location:../Views/cusHome.php');
	}
    if (isset($_GET['accept']))
	{
		$name=$_GET['accept'];
        $offer=update1($name);
        $_SESSION['message']="Accepted";
        header('location:../Views/adHome.php');
	}
    if (isset($_GET['reject']))
	{
		$name=$_GET['reject'];
        $offer=update2($name);
        $_SESSION['message']="Rejected";
        header('location:../Views/adHome.php');
	}
    if (isset($_GET['logout']))
	{
		unset($_SESSION['name']);
		header('location:../index.php');
	}
?>