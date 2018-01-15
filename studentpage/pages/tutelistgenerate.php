<?php
session_start();
 $UserIdLoaded = $_SESSION["userRollNo"];
  
include('connect.php');
 $dept = $_POST['dept'];
 $sem= $_POST['sem'];
 $tutetb = $dept."_tute";
 
 $sql2 = "SELECT * from $tutetb WHERE semester= "."'".$sem ."'";
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