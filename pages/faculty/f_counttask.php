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
	$x = "SELECT COUNT(*) FROM tasks WHERE UserId='".$UserIdLoaded."'" ;
	$q = mysqli_query($con,$x);
	
        $r = $q->fetch_assoc();
         $totalrow = $r["COUNT(*)"];
         echo $totalrow;
 }
exit;
?>