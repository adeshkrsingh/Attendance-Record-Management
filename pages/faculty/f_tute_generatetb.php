<?php
session_start();
 $UserIdLoaded = $_SESSION["UserId"];
 $UserDepartmentLoaded = $_SESSION["Department"];
 

 $tutetable = $_SESSION["tempSubLoc"];
 
 $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
 $db=mysqli_select_db($conn,"risinola_student");
 
 $dept = $_POST['department'];
 $subcode = $_POST['Subjectcode'];
 
 
 $tutetb = $dept."_tute";
 
 $sql2 = "SELECT * from $tutetb WHERE subcode= "."'".$subcode ."'";
 $result = $conn->query($sql2);
  if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        {  
$sno= $row['SNo']; $teacher= $row['teacher']; $subcode= $row['subcode']; $postdate= $row['postd']; $lastdate= $row['lastds']; $desc= $row['content']; $file= $row['file'];

$fileref = "/assignment/".$dept."/".$subcode."/".$file;

          echo '<tr><td>'.$sno.' </td><td>'.$teacher .'</td><td>'.$subcode .'</td><td>'.$postdate .'</td><td>'.$lastdate .'</td><td>'.$desc .'</td><td><a href='.$fileref.'>'.$file.'</a></td></tr>';
        }
      }
   }
 exit;

?>