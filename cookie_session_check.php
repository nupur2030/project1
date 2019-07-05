

<?php
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="mydb"; 
$tbl_name="login"; 

$db=mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");

$myusername=$_POST['email'];
$mypassword=$_POST['Password'];

$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and Password='$mypassword'";
$result=mysqli_query($db,$sql);

$count=mysqli_num_rows($result);

if($count==1){
	$row=mysqli_fetch_row($result);
 	$sname=$row[0];
 	session_start();
 	$_SESSION['SName']=$sname;
 	$_SESSION['Status']="Sesion Status: Login Success!!!";
	
	if (isset($_POST['remuser'])){
		setcookie("UName",$myusername,time()+60*60*24);
		setcookie("Pwd",$mypassword,time()+60*60*24);
	}
	else
	{
		setcookie("UName","",time()-5);
		setcookie("Pwd","",time()-5);
	}
	header("location:SC_login.php");
}
else {
	unset($_SESSION['SName']);
	unset($_SESSION['Status']);
	echo "<h2> Login Failed!!!</h2>";
	header("location: cookie_session_login.php");
	}
?>
