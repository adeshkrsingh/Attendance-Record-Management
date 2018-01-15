<?php
session_start();
$conn=mysqli_connect("localhost","risinola_studnt","q8hPas)[7T~8");
  $db=mysqli_select_db($conn,"risinola_student");

if (isset($_POST['submit'])){
 $fname=$_POST['fname'];
                                    
  $lname=$_POST['lname'];
  
  $email=$_POST['email'];
  $cont=$_POST['contact'];
  $int=$_POST['interest'];
  $about=$_POST['about'];
  $sql3="UPDATE studentlogin set fname='$fname',lname='$lname',email='$email',contact='$cont',interest='$int',about='$about' where rollno=".$_SESSION["userRollNo"];
  $result3 = $conn->query($sql3);
if($result3){
  echo "<script>alert('Post submitted successfully')</script>";
  echo "<script>window.open('student_profile.php','_self')</script>";
}

else{
echo "not";
}
  
  }
?>