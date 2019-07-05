<?php
$first_name=$_POST['firstname'];
$register_num=$_POST['register'];
$password=$_POST['password'];
$email_id=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$mobile=$_POST['mobilenumber'];



if (!empty($first_name) || !empty($register_num) || !empty($password)|| !empty($email_id) || !empty($address)|| !empty($city)|| !empty($pincode)|| !empty($mobile))
{
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="form";
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);


if(mysqli_connect_error())
{
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}else{
	$SELECT="SELECT email from login where email=? Limit 1";
	$INSERT="INSERT Into login(firstname,register,password,email,address,city,pincode,mobilenumber) values(?,?,?,?,?,?,?,?)";

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
		$stmt->bind_param("ssssssii",$first_name,$register_num,$password,$email_id,$address,$city,$pincode,$mobile);
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
