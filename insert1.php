<?php 


$firstname = $POST['firstname'];
$lastname = $POST['lastname'];
$gender = $POST['gender'];
$city = $POST['city'];
$cname = $POST['cname'];
$mobilenumbers = $POST['mobilenumbers'];
$email = $POST['email'];
$Password = $POST['Password'];


if(!empty($firstname)  || !empty($lastname)  || !empty($gender)  || !empty($city)  || !empty($cname)  || !empty($mobilenumbers)  || !empty($email)  || !empty($Password)){
	
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = " ";
    $dbname = "webtest";

    $conn= new mysqli($host , $dbUsername , $dbPassword , $dbname);

    if(mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	  $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (firstname, lastname, gender, city, cname, mobilenumbers , email , Password) values(?, ?, ?, ?, ?, ?,?,?)";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssiss", $firstname, $lastname, $gender, $city, $cname, $mobilenumbers ,$email,$Password);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
}
else
{
	echo "All fields are Required";
	die();
}

 ?>