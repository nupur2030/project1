<?php

$link = mysqli_connect("localhost", "root", "", "insert");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$first_name = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$feedback= mysqli_real_escape_string($link, $_REQUEST['feedback']);


 
// Attempt insert query execution
$sql = "INSERT INTO feedback(`firstname`,`lastname`,`feedbackinfo`) VALUES ('$first_name','$last_name','$feedback')";
if(mysqli_query($link, $sql)){
    echo "<script>alert ('sucessfully feedback submitted')</script>";
    echo "<script>window.open('womentechhome.html', '_self')</script>";
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<script>window.open('feedback.php', '_self')</script>";
}
 
// Close connection
mysqli_close($link);
?>