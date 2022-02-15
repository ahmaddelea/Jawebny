<?php
    require "dbcon.php" ;
    $ms_mail = $_POST["ms_mail"];
    $area = $_POST["area"];

    if ($ms_mail==""||!filter_var($ms_mail,FILTER_VALIDATE_EMAIL))
    {
        echo '<script> alert("emmail with wrong format") </script>';
        require "msg.html";
    }
    else if ($area=="")
    {   
        echo '<script> alert("write a message !")';
        require "msg.html";
    }
    
    else
    {
        mysqli_query($con,"update login set message = '$area' where email = '$ms_mail'");
        echo '<script> alert("send successfully") </script>';
        require "msg.html";
    }
    mysqli_close($con);
?>