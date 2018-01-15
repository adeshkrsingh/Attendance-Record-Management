<?php
    $UserNameGet = $_POST['userid'];
    $UserPasswordGet = md5($_POST['password']);
    $UserDepartmentGet = $_POST['department'];
    $UserType=  $_POST['typeoflogin'];
    session_start();         
        $conn=mysqli_connect("localhost","risinola_ironman","ironman123");

$db=mysqli_select_db($con,"risinola_academics");
         if (!$conn) {
    die('Could not connect: ' . mysqli_error());
           }
        $tableName="logindetail";
        

        $sql = "select * from logindetail";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {           // output data of each row
            while($row = $result->fetch_assoc())
              {  echo "<script>alert('bd connected');</script> ";
              if ($row['LId']==$UserNameGet)
                  {   
                   if ($row['Pass']==$UserPasswordGet)
                        { 
                        if($row['UType']==$UserType && $UserType=='admin')
                              {
                              $_SESSION["AdminId"] = $UserNameGet;
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; } else {$_SESSION["img"] = "5.png"; }
                              header("location:admin/admindashboard.php");
                              break;
                              }
                        else if($row['UType']==$UserType  && $UserType=='hod' && $UserDepartmentGet == $row['dept'])
                              { 
                              $_SESSION["HODId"] = $UserNameGet;
                              $_SESSION["Password"] = $UserPasswordGet;
                              $_SESSION["Department"] = $UserDepartmentGet."_2016_2017";
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; }
                              else {$_SESSION["img"] = "5.png"; }
                              header("location:hod/hoddashboard.php");
                              break;
                              }
                        else if($row['UType']==$UserType  && $UserType=='faculty' && $UserDepartmentGet == $row['dept'])
                              {
                              $_SESSION["UserId"] = $UserNameGet;
                              $_SESSION["Password"] = $UserPasswordGet;
                              $_SESSION["Department"] = $UserDepartmentGet."_2016_2017";
                              if($row['img']!=""){$_SESSION["img"] = $row['img']; }  else {$_SESSION["img"] = "5.png"; }
                              header("location:faculty/dashboard.php");
                              break;
                              }
                          }
                  }
              }
          }

          if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else echo "<script>window.location.href='../index.php';alert('Incorrect User Name or Password');</script> ";
   // $conn->close();      
   ?>