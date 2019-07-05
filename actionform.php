<?php
$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$email_id=$_POST['email'];
$password=$_POST['password'];

if (!empty($first_name) || !empty($last_name) || !empty($email_id)|| !empty($password))
{
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="form";
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);


if(mysqli_connect_error())
{
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
	$SELECT="SELECT email from login where email=? Limit 1";
	$INSERT="INSERT Into login(firstname,lastname,email,password) values(?,?,?,?)";

	$stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email_id);
     $stmt->execute();
     $stmt->bind_result($email_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	if($rnum==0)
	{
		$stmt->close();
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("ssss",$first_name,$last_name,$email_id,$password);
		$stmt->execute();
		echo "new record adeded succesfully";
	}
	else
	{
		echo "someone allready registered using sam eemail id";
	}
	$stmt->close();
	$conn->close();

}
}
else
{
	echo "All fields are required";
	die();
}

?>