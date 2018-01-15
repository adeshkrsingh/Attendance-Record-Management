<?php

    $rollno= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));
    $flag = 0;

    $x = $_POST['x'];
    $y = $_POST['y'];
echo $x;
echo $y;

?>
this is outside of the page.