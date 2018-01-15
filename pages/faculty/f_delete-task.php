<?php 
session_start();
if (!isset($_SESSION['UserId']))
{
    header("location:/index.php");
}
else
{
	$UserIdLoaded = $_SESSION["UserId"];
    $UserDepartmentLoaded = $_SESSION["Department"];

    $con=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($con,$UserDepartmentLoaded);

	$task_id = strip_tags( $_POST['task_id'] );
	mysqli_query($con,"DELETE FROM tasks WHERE id='$task_id'");
}	

?>