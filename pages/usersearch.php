<?php
if(isset($_POST['submit']))
{
$SubmitValue= $_POST['submit'];
   If($SubmitValue=="search")
    { 

     $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
     $db=mysqli_select_db($conn,"risinola_academics");
  
      $UserNameGet = mysqli_real_escape_string($conn,$_POST['userid']);

                  $sql = "select * from logindetail";
                    $result = $conn->query($sql);
                          $a=0;
                           if ($result->num_rows > 0)
                                       {           // output data of each row
                                       while($row = $result->fetch_assoc())
                                                 {
                                                        if ($row['LId']==$UserNameGet)
                                                        { $a=1;
                                                          $emailId = $row['Email'];
                                                         
echo "<form method='post' action='/pages/generateotp.php'>";

echo "<div class='form-group'>";
echo "<input type='hidden' id='userid251' class='form-control' aria-describedby='basic-addon1' name='userid251' value='$UserNameGet' />";
echo "</div>";

echo "<div class='form-group'>";
echo "<input type='text' id='email251' class='form-control' aria-describedby='basic-addon1' value='$emailId'  name='email251' disabled />";
echo "</div>";

echo "<div class='form-group'>";
echo "<input type='submit' id='SendOTP' class='form-control' aria-describedby='basic-addon1' name='submit' value='SendOTP' />";
echo "</div>";

echo "</form>";
                                                          




                                                        
                                                   }     

                                                  }
                                                  if($a!=1)
                                                 {   echo "not found try again after 15 minutes adesh"; echo $_POST['userid'];  }
                                       }
                                       
    }
 }
?>