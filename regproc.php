<?php
    require "dbcon.php" ;
    $uname = $_POST ["username"];
    $pass = $_POST ["password"];
    $repass = $_POST ["re-password"];
    $email = $_POST ["email"];

    if ($uname=="" || $pass=="" || $repass=="" || $email=="")
    {
        echo '<script> alert("empty feild") </script>';
        require "register.html";
    }
    else if ($pass != $repass)
    {
        echo '<script> alert("password does not match") </script>';
        require "register.html";
    }
    else if (!filter_var($email , FILTER_VALIDATE_EMAIL))
    {
        echo '<script> alert("Invalid email") </script>';
        require "register.html";
    }
    else
    {
        $sql = "select * from login where name = '$uname'";
        $res = mysqli_query($con , $sql) or die(mysqli_error($con));
        if (mysqli_num_rows($res)>=1)
        {
            echo '<script> alert("name is already taken") </script>';
            require "register.html";
        }
        else
        {
            mysqli_query($con,"insert into login (name , password , email ,message ) values ('$uname' , '$pass' , '$email','' ) ");
            echo '<script> alert("reg. success") </script>';
            require "login.html";
        }
    }
    mysqli_close($con);
?>
