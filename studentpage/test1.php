<?php

    $rollno= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));
    $flag = 0;
    
    //header("location:firsttime.php");
       echo $_POST['username']; echo $_GET['password']; echo $_POST['submit'];
       //  echo "<script>window.location.href='../index.php';alert('Incorrect User Name OR Password');</script> ";
  
?>
<p> Please Wait while Processing.... </p>
         