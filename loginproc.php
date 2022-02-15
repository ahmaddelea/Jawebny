<?php
    require "dbcon.php";
    $email = $_POST ["email"];
    $pass = $_POST ["password"];
    $query = "select * from login where email='$email' and password='$pass' ";
    $res = mysqli_query($con,$query);
    if (mysqli_num_rows($res)>=1)
    {
        echo '<script> alert("you are validated user logged in successfully") </script>';
        require "msg.html";
    }
    else
    {
        echo '<script> alert("invalid username or password") </script>';
        require "login.html";
    }
    mysqli_close($con);
?>