<?php
session_start();
 $UserIdLoaded = $_SESSION["AdminId"];
  
 $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
  $db=mysqli_select_db($conn,"risinola_student");
 
 $x = $_POST['username'];

 $sql2 = "SELECT * from studentlogin WHERE rollno= "."'".$x."'";
 $result = $conn->query($sql2);
  if($result)
    { 
     if ($result->num_rows > 0)
      {          
       echo "<img src='/defaultimg/not-available.png' style='height : 20px; margin-top : 10px;' />";
      }
     else {echo "<img src='/defaultimg/available.png' style='height : 20px; margin-top : 10px;' />"; } 
 
} 
 exit;

?>