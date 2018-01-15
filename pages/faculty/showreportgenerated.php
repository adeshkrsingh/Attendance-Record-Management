<?php include('facultycontent.php');

echo "<div style='width : 100%; height : 10px'></div>";
?>

<form method="post" style="margin-left : 50px" action="pdfgen.php"  target='_blank' >
<div style=" margin-bottom: 10px"><input type="submit" name="sub" id="sub" class="btn btn-primary"  value="Download Generated Report" style="margin-left: 10px ; width: 25%; " />
</div>
    
<?php    
$arrayrollno = Array();
$arrayname = Array();
$arraypresent = Array();
$arrayTotal ; $arraysubname; $arraysemester; $arraysession; 

         $x = $_SESSION['tempSubLoc'];
         $mysql_host="localhost"; $mysql_user="risinola_ironman"; $mysql_password="ironman123"; $dbname=$x;
         $conn= new mysqli($mysql_host, $mysql_user, $mysql_password, $dbname);
         @mysqli_select_db($dbname);

$opt=$_POST['choose'];
$a=$_POST['strt'];
$b=$_POST['last'];

 $sql2 = 'SELECT * FROM submgmt WHERE SNo='.$opt;
           $result = $conn->query($sql2);
           if($result)
             {
             	if ($result->num_rows > 0)
                           {          
                           while($row = $result->fetch_assoc())
                              { 
                              $subcode= $row['Subject']; $sem = $row['Semester']; $year=$row['Year'];
                               $tbn  = $subcode."_semester".$sem."_".$year;

                                   $arraysubname =  $subcode; $arraysemester = $sem; $arraysession= $year;
                              }
                           }// $TableNameGen = "eit505_lect_semester5_2016_2017";
                      $TableNameGen = $tbn;
                      
                 }     


function dateDiff($start, $end) {
  $start_ts = strtotime($start);
  $end_ts = strtotime($end);
  $diff = $end_ts - $start_ts;
  return round($diff / 86400);
}
function color($y){
  if($y>=75){
    return 'progress-bar progress-bar-success';
  }
  else if ($y>60 && $y<75){
    return 'progress-bar-warning';

  }
  else{
    return 'progress-bar-danger';
  }

}
$r=dateDiff($a, $b);
//echo dateDiff($a, $b).'days';
$query="select * from ".$TableNameGen;
$run=mysqli_query($conn,$query);
echo '<div style="margin-left:10px;margin-right:10px; margin-top: 10px"><table class="table table-bordered" style="padding-top :15px">
    <thead>
      <tr>
        <th>RollNO</th>
        <th>NAME</th>
        <th>TOTAL CLASS</th>
        <th>TOTAL PRESENT</th>
        <th>STATUS</th>

      </tr>
    </thead>
    <tbody>';
    
while($row=mysqli_fetch_array($run)){
$z=ltrim(date('m',strtotime($a)),'0');
$v=ltrim(date('m',strtotime($b)),'0');
$q=date('t',strtotime($a));
$c=ltrim(date('d',strtotime($a)),'0');
$xrollno; $xname;
// calculating date difference
if($z==$v){
	if($r>0&&$r<31){
		$t=0;
		$arr = array();
	for($i=ltrim(date('d',strtotime($a)),'0');$i<=date('d',strtotime($b));$i++){
		$y=$row['rollNo'];
		
		// calculating total of individual
		$k="SELECT sum(d".$z.$i.") as total  from ".$TableNameGen." where rollNo=".$y;
		$result=mysqli_query($conn,$k);
		$data=mysqli_fetch_array($result);
		
		$u="SELECT sum(d".$z.$i.") as total  from ".$TableNameGen;
		$result1=mysqli_query($conn,$u);
		$data1=mysqli_fetch_array($result1);
		
		if($data1['total']==0){
			array_push($arr, '1');

		}
		$t=$t+$data['total'];
		

	}
	$p = count($arr);
	$p1=$r+1-$p;
	$s=($t/($r+1-$p))*100;
	
	echo '<tr>
        <td>'.$row['rollNo'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$p1.'</td><td>'.$t.'</td>';
        
         // saving value to array to pass to other page
        $xrollno = $row['rollNo']; $xname = $row['name'];
        array_push($arrayrollno , $xrollno );
        array_push($arrayname , $xname );
        array_push($arraypresent , $t);
        $arrayTotal = $p1;
        
        
        ?>
        <td style="padding-right: 20px; width: 30%;"><div class="progress" >
  <div class="<?php echo color(round($s));?> progress-bar-striped" role="progressbar"
  aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($s);?>%">
  <?php echo round($s).'%
      </td></tr>';
      
    ?>

	
      

	<?php
	}
	else{
		echo "<script>alert('please select forward month')</script>";
		echo "<script>window.location.href='report.php'</script>";
	}
}
else{
	if($r>0){
			if(($v-$z)>1){
				echo "<script>alert('you cannot select more than 1 month')</script>";
				echo "<script>window.location.href='report.php'</script>";
			}
			else{
				$h=0;
				$e=dateDiff($a, $b)+1;
				$y=$row['rollNo'];
				$arr1 = array();
				
				
				
				while($e!=0){
					if($c<=$q){
						$k="SELECT sum(d".$z.$c.") as total  from ".$TableNameGen." where rollNo=".$y;
							$result=mysqli_query($conn,$k);
							$data=mysqli_fetch_array($result);
						
						$k1="SELECT sum(d".$z.$c.") as total  from ".$TableNameGen;
							$result1=mysqli_query($conn,$k1);
							$data1=mysqli_fetch_array($result1);
							$h=$h+$data['total'];
							if($data1['total']==0){
								array_push($arr1, '1');

									}
							
							
						
						$c++;
						$e=$e-1;
					}
					
      
					else{
						for ($i=1; $i <=ltrim(date('d',strtotime($b)),'0' ); $i++) { 
							$k="SELECT sum(d".$v.$i.") as total  from ".$TableNameGen." where rollNo=".$y;
							$result=mysqli_query($conn,$k);
							$data=mysqli_fetch_array($result);
							$k3="SELECT sum(d".$v.$i.") as total  from ".$TableNameGen;
							$result3=mysqli_query($conn,$k3);
							$data3=mysqli_fetch_array($result3);
								if($data3['total']==0){
												array_push($arr1, '1');

													}
				
							$h=$h+$data['total'];
							$e=$e-1;
						}
						
      
					}



				}
				$p1 = count($arr1);
	$p2=$r+1-$p1;
	$s=($h/($r+1-$p1))*100;
	
				echo '<tr>
        <td>'.$row['rollNo'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$p2.'</td><td>'.$h.'</td>';
        
         // saving value to array to pass to other page
        $xrollno = $row['rollNo']; $xname = $row['name'];
        array_push($arrayrollno , $xrollno );
        array_push($arrayname , $xname );
        array_push($arraypresent , $h);
        $arrayTotal = $p2;
        
        ?>
        <td style="padding-right: 20px; width: 30%;"><div class="progress" >
  <div class="<?php echo color(round($s));?> progress-bar-striped" role="progressbar"
  aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($s);?>%">
  <?php echo round($s).'%
      </td></tr>';
				

			}
	}
	
		else{
			echo "<script>alert('please select forward month')</script>";
			echo "<script>window.location.href='report.php'</script>";
		}


		
		
		
	

	}
}
$arraysubname; $arraysemester; $arraysession; 
?>
<input type="hidden" name="vpdfroll" value="<?php echo implode(',', $arrayrollno ); ?>">
<input type="hidden" name="vpdfpresence" value="<?php echo implode(',', $arraypresent ); ?>">
<input type="hidden" name="result" value="<?php echo implode(',', $arrayname); ?>">
<input type="hidden" name="vpdftotal" value="<?php echo $arrayTotal ; ?>">
<input type="hidden" name="vpdfsubname" value="<?php echo $arraysubname; ?>">
<input type="hidden" name="vpdfsemester" value="<?php echo $arraysemester; ?>">
<input type="hidden" name="vpdfsession" value="<?php echo $arraysession; ?>">
</form>
</script>
</body>
</html>