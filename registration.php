<?php

session_start();
include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name =$_POST['name'];
	$email =$_POST['email'];
	$password=$_POST['password'];

	$query="select * from users where email='$email'";
	$resultingrows=mysqli_query($connect, $query);
	$num=mysqli_num_rows($resultingrows);

	if($num==1){
		echo '<script type="text/javascript"> alert("Email entered already exists, please input a new email") </script>';
	}

	else if(!empty($email) && !empty($password) && !empty($name))
	{
		$query2="insert into users(email,password,name)
		values('$email', '$password','$name')";

		mysqli_query($connect, $query2);
		header('location:dashboard.php');
		}
		
	}

	else{
		echo '<script type="text/javascript"> alert("please enter valid data") </script>';
	}



?>