<?php
session_start();

include('connect.php');

    $rollno= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));
    $flag = 0;
    
    if($db)
    {
	$sql = "select * from studentlogin";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {           // output data of each row
            while($row = $result->fetch_assoc())
              {  
              if ($row['rollno']==$rollno)
                  {   
                   if($row['pass']==$password)
                     {
                         $flag = 1;
                         if(empty($row['email']))
                              { $_SESSION["userRollNo"] = $rollno; header("location:firsttime.php"); break;  }
                         else
                              {
                               $_SESSION["userRollNo"] = $rollno;
                              header("location:pages/student_dashboard.php");
                              break;
                             }
                      }
                  }
               
                  
              
              }
           }
      }
      
      if( $flag == 0 )
      {
         echo "<script>window.location.href='../index.php';alert('Incorrect User Name OR Password');</script> ";
      }
      
?>
<p> Please Wait while Processing.... </p>
         