<?php

$link = mysqli_connect("localhost", "root", "", "insert");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['email']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['amount']);


 
// Attempt insert query execution
$sql = "INSERT INTO payment (email,amount) VALUES ('$first_name', '$last_name')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>