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

	$task = strip_tags( $_POST['task'] );
	$date = date('Y-m-d');
	$time = date('H:i:s');

	
	mysqli_query($con,"INSERT INTO tasks VALUES ('', '$UserIdLoaded', '$task', '$date', '$time')");

	$query = mysqli_query($con,"SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

	while( $row = mysqli_fetch_assoc($query) ){
		$task_id = $row['id'];
		$task_name = $row['task'];
	}

	mysqli_close($con);

	echo '<li  id="'.$task_id.'" ><i id="'.$task_id.'"  class="fa fa-trash-o fa-lg delete-button"></i>
								
								   <span  id="'.$task_id.'" >'.$task_name.'</span>
							  </li>';
exit;
}	
?>