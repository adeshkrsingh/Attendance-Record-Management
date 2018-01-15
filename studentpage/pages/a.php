<?php
session_start();
include('connect.php');

if (isset($_POST['submit'])) 
{
	 $m=isset($_POST['takes']) ? $_POST['takes'] : '';
	 $z=isset($_POST['t']) ? $_POST['t'] : '';
	 $y=isset($_POST['rate']) ? $_POST['rate'] : '';
	 $t=isset($_POST['comment']) ? $_POST['comment'] : '';
	$a=array();
	 $b=array();
	$c=array();
	 	for ($i=0; $i <3 ; $i++) { 
	 	if(!isset($m[$i])){
	 		$m[$i]='0';
	 		array_push($a, $m[$i]);
	 		array_push($b, $m[$i]);
	 	}
	 	else{
	 		array_push($a, $m[$i]);
	 		array_push($b, $z[$i]);
	 	}

	 }
	 
	 $w=$b[0];
	 $w1=$b[1];
	 $w2=$b[2];
	 $k=implode(',', $a);
	for ($i=0; $i <4 ; $i++) { 
		if(!isset($y[$i])){
			$y[$i]='0';
	 	array_push($c, $y[$i]);
	 }
	 else{
	 	array_push($c, $y[$i]);
	 }
	}

	$query="insert into feed (Name,takes,Question,bug,suggestion,think1,think2,think3,think4,comment) values('$Name','$k','$w','$w1','$w2',$c[0],$c[1],$c[2],$c[3],'$t')";
	$run=mysqli_query($conn,$query);
	if($run){
	            echo "<script>window.open('thanksfeedback.php','_self')</script>";
	            
		
	}
	else{
		echo "not success";
		echo $run;
	}
	 
	 
	 
}
             
?>



