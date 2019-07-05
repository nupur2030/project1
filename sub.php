<?php

include_once("connect.php");
session_start();

if (isset($_POST['sub']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	$subs=mysqli_real_escape_string($conn,$_POST['subscription']);
	//$query1 = "select * from index1 where email = '$email' ";
	$query = "insert into index1 (`subscription`) values ('$subs') where email='$email' ";
	$result = mysqli_query($conn, $query);
	$query1 = "select * from index1 where email = '$email' ";
	//$check = mysqli_num_rows($result); 
	$result = mysqli_query($conn, $query1);
	$row  = mysqli_fetch_row($result);
	if($row["subscription"]==0)
	{
		echo "<script>alert ('payment first for access')</script>";
		echo "<script>window.open('payment.html', '_self')</script>";
	}
	else
	{
		$_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        echo "<script>alert ('Subscribe it first for access')</script>";
        echo "<script>window.open('blog.html', '_self')</script>";
	}
}

?>