<?php include('content.php');  

/*
if(!is_dir("profile/".$Email)){
    //Directory does not exist, so lets create it.
$M=mkdir("profile/".$Email, 0755,true);
}
*/
$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
$dir = $root . '/profile/hod/'.$Email;
$old = umask(0);

if( !is_dir($dir) ) {
    mkdir($dir, 0755, true);
}
umask($old);

?>
          
          <div class="panel panel-default" style="margin-top:10px; margin-left:10px;margin-right:10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                
                  <div class="panel-body">PROFILE</div>
          
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12" >
      <div class="panel panel-default" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <div class="panel-heading" style="">UPLOAD PROFILE PICTURE</div>
      <div class="panel-body">
      <div class="text-center">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <img src="<?php if(!empty($img)){echo $img;}  else{echo $default;}?>" id="myImg" class="avatar img-circle" width="250px" height="250px" alt="avatar" >
        <h6>Upload a different photo...</h6>
        <label class="btn btn-default btn-file" style="background-color:#27ae60;">
    Browse <input type="file" name="image" style="display: none; ">
</label>
<input class="btn btn-primary" name="submit" value="Upload" type="submit">
</form>
      </div>
      </div>
      
      </div>
    </div>

    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" >
      <div class="panel-group" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="panel panel-default">
      <div class="panel-heading">PERSONAL INFORMATION</div>
      <div class="panel-body"><form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
      <div class="form-group">
          <label class="col-md-3 control-label">UserId:</label>
          <div class="col-md-8">
            <input class="form-control" name="id" value="<?php echo $UserID;?>" type="text" disabled >
            
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="name" value="<?php echo $Name;?>" type="text">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Address:</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="addr" rows="5" id="comment"  ><?php echo $Address;?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" value="<?php echo $Email;?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Contact:</label>
          <div class="col-lg-8">
            <input class="form-control" name="cont" value="<?php echo $Contact;?>" type="text">
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" name="submit" value="Save Changes" type="submit">
            <span></span>
            
          </div>
        </div>
        
        </div>
      </form></div>
    </div>

    <!-- Now Password Form -->
    <div class="panel panel-default" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <div class="panel-heading">CHANGE PASSWORD</div>
      <div class="panel-body">
      <form class="form-horizontal" name="myForm" role="form" method="post" onsubmit="return(validate());" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ><div class="form-group" >
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" name="user_pass"  type="password" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control"  name="user_pass_check"  type="password" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" name="submit" value="Change Password" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
        </form></div>
    </div>
      
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="Change Password")
    {
  
  $pass=md5($_POST['user_pass']);
  $sql3="UPDATE logindetail set Pass='$pass' where LId='$UserIdLoaded'";
  $result3 = $conn->query($sql3);
  echo "<script>alert('Updated successfully')</script>";
  echo "<script>window.open('dashboard.php','_self')</script>";
    }
  else If($SubmitValue=="Save Changes")
    {
  
  $name=$_POST['name'];
  $add=$_POST['addr'];
  $email=$_POST['email'];
  $cont=$_POST['cont'];
  $sql3="UPDATE logindetail set Name='$name',Address='$add',Email='$email',Contact='$cont' where LId='$UserIdLoaded'";
  $result3 = $conn->query($sql3);
  echo "<script>alert('Post submitted successfully')</script>";
  echo "<script>window.open('dashboard.php','_self')</script>";
    }
  else If($SubmitValue=="Upload")
    {
    
   // $post_image="profile/".$Email."/".$_FILES['image']['name']; //Original
    $file_size=$_FILES['image']['size'];
    $image_tmp=$_FILES['image']['tmp_name'];
    
      
     $root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
     $post_image = $_FILES['image']['name'];


 
    if ($file_size > 5000000) { echo "<script>alert('Sorry, your file is too large.')</script>"; }
    else
        {
         move_uploaded_file($image_tmp,$dir = $root . '/profile/hod/'.$Email.'/'.$post_image);
         $sql3="UPDATE logindetail set img='$post_image' where LId='$UserIdLoaded'";
         $result3 = $conn->query($sql3);
         echo "<script>alert('Updated successfully')</script>";
         echo "<script>window.open('a_dashboard.php','_self')</script>";
         }
    }
    
 }
?>
</div></div></div></div></body></head>