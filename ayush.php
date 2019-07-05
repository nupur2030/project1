<?php
$fn=$_POST['firstname'];
$ps=$_POST['password'];
$em=$_POST['email'];

if(!empty($fn) || !empty($ps) || !empty($em))
{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="nupur";

	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
	$SELECT="SELECT email from practical where email=? Limit 1";
	$INSERT="INSERT Into practical(firstname,password,email) values(?,?,?)";

	$stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $em);
     $stmt->execute();
     $stmt->bind_result($em);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	if($rnum==0)
	{
		$stmt->close();
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("sss",$fn,$ps,$em);
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