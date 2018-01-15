<?php
session_start();
$conn=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($conn,"risinola_academics");


    $UserIdLoaded = $_SESSION["UserId"];
    $UserDepartmentLoaded = $_SESSION["Department"];
    

    $sql = "select * from logindetail";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
                 if ($row['LId']==$UserIdLoaded)
                       {
                        $UserID = $UserIdLoaded;
                        $Name = $row['Name'];
                        $type = $row['UType'];
                        
                                                        }
                                                 }
                                                 
                                        }
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
		echo "<div align='center' style='margin-top:16%;'><img src='/defaultimg/success.png' width='100px' height='100px' />
     
     
     <h1>Thankyou for your valuable feedback!</h1>
     <a href='dashboard.php'>back to home</a>
</div>";

	}
	else{
		echo "not success";
		echo $run;
	}
	 
	 
	 
}
                                        
?>
