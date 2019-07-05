<?php

include_once("connect.php");
session_start();
$_SESSION['SName']=$firstname;
				$_SESSION['Status']="Session Status: Login Success!!!";

				if (isset($_POST['sub'])){
					setcookie("email",$email,time()+60*60*24);
					setcookie("password",$pass,time()+60*60*24);
				}
				else
				{
					setcookie("email","",time()-5);
					setcookie("Password","",time()-5);
				}
				header("location:womentechsignup.html");

if (isset($_POST['sub']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	$key = md5($password);
	$query = "select * from index1 where Email = '$email' AND Password = '$key' ";
	$result = mysqli_query($conn, $query);
	$check = mysqli_num_rows($result); 
	$row  = mysqli_fetch_row($result);
	if($check==0)
	{
		echo "<script>alert ('Incorrect Email or Password')</script>";
		echo "<script>window.open('womentechsignup.html', '_self')</script>";
	}
	else
	{
		$_SESSION['logged_in'] = true;
        $_SESSION['Email'] = $email;
        $_SESSION['password'] = $row['1'];
        echo "<script>window.open('reg.php', '_self')</script>";
	}
}

?>