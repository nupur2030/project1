<?php

include_once("connect.php");

     if (isset($_POST['sub']))
        {
            $fname = mysqli_real_escape_string($conn,$_POST['firstname']);
            $lname = mysqli_real_escape_string($conn,$_POST['lastname']);
            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
            $city = mysqli_real_escape_string($conn,$_POST['city']);
            $cname = mysqli_real_escape_string($conn,$_POST['cname']);
            $mobilenumbers = mysqli_real_escape_string($conn,$_POST['mobilenumbers']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['Password']);
            $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
            $key = md5($password);
            if(strlen($password)<8)
            {
                echo "<script>alert ('Password must be greater then 8 letters')</script>";
           exit();
            }
            if ($password==$cpassword)
            {
               $query = "select * from index1 where email = '$email' ";
            $res = mysqli_query($conn, $query);
            $check = mysqli_num_rows($res);
            if ($check==1)
            {
                echo "<script>alert ('Already Registered!!')</script>";
           exit();
            }
      else{
            $query = "insert into index1 (`firstname`,`lastname`,`gender`,`city`,`cname`,`mobilenumbers`, `email`, `password`) values ('$fname','$lname','$gender','$city','$cname','$mobilenumbers', '$email', '$key')";
      echo $query;
            $result = mysqli_query($conn, $query);
            if ($result)
            {

                echo "<script>window.open('womentechlogin.html', '_self')</script>";
            }
                
        }
      }
        else {
            echo "<script>alert ('Password does not match!!')</script>";
           
           exit();
        }
      
    
        mysqli_close($conn);
    }
?>
