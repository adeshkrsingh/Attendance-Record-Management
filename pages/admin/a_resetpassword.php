<?php include('admincontent.php'); ?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label">User ID:</label>
             
               <input class="form-control" name="userid" type="text">
             
        </div>
        
        <div class="form-group">
          <label class="control-label">Type</label>
             
                <select name="type" id="type" class="custom-select form-control" >
                   <option value="none">None</option>
                   <option value="staff">Staff</option>
                   <option value="student">Student</option>
                </select>
            
        </div>
        
        <div class="form-group">
             
                <input class="btn btn-primary" name="submit" value="Reset Password" type="submit">
             
        </div>
      </form>
        
        
        
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $SubmitValue= $_POST['submit'];
      If($SubmitValue=="Reset Password")
        {
            $userid=mysqli_real_escape_string($conn,$_POST['userid']);
            $type=mysqli_real_escape_string($conn,$_POST['type']);
            
            if($type == "staff")
            {
              $sql = "select * from logindetail where LId='".$userid."'";
              $result = $conn->query($sql);
                  
             if ($result->num_rows > 0)
                 {         
                 while($row = $result->fetch_assoc())
                    {         
                      $_SESSION["uid"] = $userid;
                          $name = $row['Name'];
                          $Contact = $row['Contact'];
                      echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" enctype="multipart/form-data">
                            
                             <div class="form-group">
                             <label class="control-label">Namme:</label>
                              <input class="form-control" name="name" type="text" value="'.$name.'" disabled>
                             </div>
                             
                             <div class="form-group">
                             <label class="control-label">Contact:</label>
                              <input class="form-control" name="contact" type="text" value="'.$Contact.'" disabled>
                             </div>
                             
                             <div class="form-group">
                             <label class="control-label">Type:</label>
                              <input class="form-control" name="xtype" type="text" value="'.$type.'" disabled>
                             </div>
                             
                            <div class="form-group">
                              <input class="btn btn-primary" name="submit" value="Confirm staff" type="submit">
                           </div>
                         </form>';
                    }
                 }
            }
            else if($type == "student")
            {
                $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
                $db=mysqli_select_db($conn,"risinola_student");
                
                $sql = "select * from studentlogin where rollno='".$userid."'";
                $result = $conn->query($sql);
                  
             if ($result->num_rows > 0)
                 {         
                 while($row = $result->fetch_assoc())
                    {         
                          $_SESSION["uid"] = $userid;
                          $name = $row['name'];
                          $dept = $row['dept'];
                          $sem = $row['semester'];
                      echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" enctype="multipart/form-data">
                            
                             <div class="form-group">
                             <label class="control-label">Namme:</label>
                              <input class="form-control" name="name" type="text" value="'.$name.'" disabled>
                             </div>
                             
                             <div class="form-group">
                             <label class="control-label">Contact:</label>
                              <input class="form-control" name="contact" type="text" value="'.$dept.'" disabled>
                             </div>
                             
                             <div class="form-group">
                             <label class="control-label">Semester:</label>
                              <input class="form-control" name="sem" type="text" value="'.$sem.'" disabled>
                             </div>
                             
                             <div class="form-group">
                             <label class="control-label">Type:</label>
                              <input class="form-control" name="xtype" type="text" value="'.$type.'" disabled>
                             </div>
                             
                            <div class="form-group">
                              <input class="btn btn-primary" name="submit" value="Confirm Student" type="submit">
                           </div>
                         </form>';
                    }
                 }
                
                 
            }
       }
       
       If($SubmitValue=="Confirm staff")
        {
            
            $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
            $db=mysqli_select_db($conn,"risinola_academics");
            $UserIdLoaded = $_SESSION["uid"];
              
            $pass=md5("11111111");
            $sql3="UPDATE logindetail set Pass='$pass' where LId='$UserIdLoaded'";
            $result3 = $conn->query($sql3);
            if($result3) { echo "password reset successful, New Password is : 11111111";}
        }
       If($SubmitValue=="Confirm Student")
        {
            $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
            $db=mysqli_select_db($conn,"risinola_student");
            $userid = $_SESSION["uid"];
            
            $pass=md5("0123456789");
            $sql3="UPDATE studentlogin set pass='$pass' where rollno='".$userid."'";
            $result3 = $conn->query($sql3);
            if($result3) { echo "password reset successful, New Password is : 0123456789";}
        }
}
?>