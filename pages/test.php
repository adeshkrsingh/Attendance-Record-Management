<?php
session_start();
  $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
  $db=mysqli_select_db($conn,"risinola_academics");
  
    $UserNameGet = mysqli_real_escape_string($conn,$_POST['userid']);
    $UserPasswordGet = mysqli_real_escape_string($conn,md5($_POST['password']));
    $UserDepartmentGet = mysqli_real_escape_string($conn,$_POST['department']);
    $UserType=  mysqli_real_escape_string($conn,$_POST['typeoflogin']);
   
   	if($db){
	$sql = "select * from logindetail";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {           // output data of each row
            while($row = $result->fetch_assoc())
              {  
              if ($row['LId']==$UserNameGet)
                  {   
                   if ($row['Pass']==$UserPasswordGet)
                        { 
                        if($row['UType']==$UserType && $UserType=='admin')
                              {
                              $_SESSION["AdminId"] = $UserNameGet;
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; } else {$_SESSION["img"] = "5.png"; }
                              header("location:admin/a_dashboard.php");
                              break;
                              }
                        else if($row['UType']==$UserType  && $UserType=='hod' && $UserDepartmentGet == $row['dept'])
                              { 
                              $_SESSION["HODId"] = $UserNameGet;
                              $_SESSION["Password"] = $UserPasswordGet; $abc = $_POST['department'];
                                         $dbf = "select * from currentsession";
                                         $r2= $conn->query($dbf);
                                         if ($r2->num_rows > 0)
                                              {          
                                              while($row1 = $r2->fetch_assoc())
                                                    {
                                                       $_SESSION["Department"] = $row1[$UserDepartmentGet]; 
                                                    }
                                               }
                              
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; }
                              else {$_SESSION["img"] = "5.png"; }
                              header("location:hod/hoddashboard.php");
                              break;
                              }
                        else if($row['UType']==$UserType  && $UserType=='faculty' && $UserDepartmentGet == $row['dept'])
                              {
                              $_SESSION["UserId"] = $UserNameGet;
                              $_SESSION["Password"] = $UserPasswordGet;
                                         $dbf = "select * from currentsession";
                                         $r2= $conn->query($dbf);
                                         if ($r2->num_rows > 0)
                                              {          
                                              while($row1 = $r2->fetch_assoc())
                                                    {
                                                       $_SESSION["Department"] = $row1[$UserDepartmentGet]; 
                                                    }
                                               }
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; }  else {$_SESSION["img"] = "5.png"; }
                              header("location:faculty/dashboard.php");
                              break;
                              }
                          }
                  }
              }
          }
	}
	else{
	echo"not connected";
	}
	
	echo "<script>window.location.href='../index.php';alert('Incorrect User Name or Password');</script> ";
   ?>
