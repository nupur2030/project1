<?php 

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = " ";
    $dbname = "insert";

    $conn= new mysqli_connect($host , $dbUsername , $dbPassword , $dbname);

    if(mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
		
$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Gender = $_POST['gender'];
$City = $_POST['city'];
$Cname = $_POST['cname'];
$Mobilenumbers = $_POST['mobilenumbers'];
$Email = $_POST['email'];
$Password = $_POST['Password'];


    	  $SELECT = "select email From index1 Where email = ? Limit 1";
     $INSERT = "insert Into index1 (firstname, lastname, gender, city, cname, mobilenumbers , email , Password) values(?, ?, ?, ?, ?, ?,?,?)";
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
      else {
      echo "Someone already index1 using this email";
     }
     $stmt->close();
     $conn->close();
	 }
else
{
	echo "All fields are Required";
	die();
}

 ?>