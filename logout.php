<?php
 include ('connect.php') 
 ?>
<?php
 session_start();

unset($_SESSION['Email']);
unset($_SESSION['Name']);
unset($_SESSION['logged_in']);
unset($_SESSION["cart_item"]);
header('location: index.html');

?>