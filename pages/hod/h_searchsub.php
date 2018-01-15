<?php
session_start();
 $UserIdLoaded = $_SESSION["HODId"];
 $UserDepartmentLoaded = $_SESSION["Department"];
 
 $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
 $db=mysqli_select_db($conn,"risinola_academics");
 
 $x= $_POST['department'];
 $dbf = "select * from currentsession";
 $r2= $conn->query($dbf);
 if ($r2->num_rows > 0)
   {          
    while($row1 = $r2->fetch_assoc())
     {
      $_SESSION["tempSubLoc"] = $row1[$x]; 
     }
   }
 
 $y= $_SESSION["tempSubLoc"];
 $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
 $db=mysqli_select_db($conn,$y);
 if($y == $UserDepartmentLoaded)
 {
 $sql2 = "SELECT * from submgmt";
 $result = $conn->query($sql2);
  if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        { $r = $row['Subject'] ; $sno = $row['SNo'] ;
          echo "<option value='$sno'> $r </option>"; 
        }
      }
   }
}
else
{
    $sql2 = "SELECT * from submgmt WHERE UserId= "."'".$UserIdLoaded."'";
    $result = $conn->query($sql2);
    if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        { $r = $row['Subject'] ; $sno = $row['SNo'] ;
          echo "<option value='$sno'> $r </option>"; 
        }
      }
   }
}

 exit;

?>