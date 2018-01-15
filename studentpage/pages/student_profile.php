<?php include('content1.php');?>

<?php
$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
$dir = $root . '/studentpage/pages/profile/'.$UserID;
$old = umask(0);

if( !is_dir($dir) ) {
    mkdir($dir, 0755, true);
}
umask($old);
    
?>

<section class="content">
    <div class="container-fluid">
            <div class="block-header">
                <h2>TABS</h2>
            </div>
            <!-- Example Tab -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROFILE ACCOUNT
                                <small>Easy way to edit your personal information</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">PERSONAL INFO</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">CHANGE AVATAR</a></li>
                                <li role="presentation"><a href="#messages" data-toggle="tab">CHANGE PASSWORD</a></li>
                                <li role="presentation"><a href="#settings" data-toggle="tab">PRIVACY</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                   <form style="padding-top: 15px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <label for="First Name">Student Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="Name" name="Name" value="<?php echo $Name ;?>" class="form-control" disabled>
                                    </div>
                                </div>
                                
                                <label for="email_address">User Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="UserID" value="<?php echo $UserID;?>"  id="uname" class="form-control" disabled>
                                    </div>
                                </div>
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?php echo $email?>" id="email_address" class="form-control" disabled>
                                    </div>
                                </div>
                                <label for="contact">Mobile NO.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $contact;?>" placeholder="Enter your mobile number">
                                    </div>
                                </div>
                                <label for="interest">Interest</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="interest" value="<?php echo $interest;?>" name="interest" class="form-control" placeholder="Hobbies">
                                    </div>
                                </div>
                                
                                <label for="About">About</label>
                                
                                    <div class="form-group">
                                        <div class="form-line">
                                    <textarea rows="1" class="form-control no-resize auto-growth"  name="about" placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)"><?php echo $about;?></textarea>
                                </div>
                                    </div>
                                
                                

                                
                                
                                <input type="submit" class="btn bg-teal btn-block waves-effect" name="submit" value="SAVE CHANGES">
                            </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <b>Profile Content</b>
                                    <br>
                                      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
								        <img src="<?php if(!empty($img)){echo $img;}  else{echo $default;}?>" id="myImg" 		  class="avatar" width="250px" height="250px" alt="avatar" >
								        <h6>Upload a different photo...</h6>
								        <label class="btn btn-default btn-file" style="background-color:#27ae60;">
								    Browse <input type="file" name="image" style="display: none; ">
								</label>
								<input class="btn btn-primary" name="submit" value="Upload" type="submit">
								</form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    
                                    <form style="padding-top: 15px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <label for="email_address">Curent Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="email_address" class="form-control" placeholder="Enter your Curent Password">
                                    </div>
                                </div>
                                <label for="email_address">New Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="email_address" class="form-control" name="user_pass" placeholder="Enter your New Password">
                                    </div>
                                </div>
                                <label for="email_address">Re-Type Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="email_address" class="form-control" placeholder="Re-Type Password">
                                    </div>
                                </div>
                               
                                
                                <input type="submit"  class="btn bg-teal btn-block waves-effect" name="submit"  value="Change Password">
                                </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <b>Settings Content</b>
                                    <p>
                                       Your each and every activity is monitored under <b> INFORMATION TECHNOLOGY DEPARTMENT BIET-Jhansi </b>.
                                       </br> Any modification in any fields will not be entertained.</br> Kindly upadate your every details and keep
                                        <i> password confidential </i>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php
    include('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="Change Password")
    {
  
  $pass=md5($_POST['user_pass']);
  $sql3="UPDATE studentlogin set pass='$pass' where rollno=".$_SESSION["userRollNo"];
  $result3 = $conn->query($sql3);
  echo "<script>alert('Updated successfully')</script>";
  echo "<script>window.open('student_dashboard.php','_self')</script>";
    }
  else If($SubmitValue=="SAVE CHANGES")
    {
  

  $cont=mysqli_real_escape_string($conn,$_POST['contact']);
  $int=mysqli_real_escape_string($conn,$_POST['interest']);
  $about=mysqli_real_escape_string($conn,$_POST['about']);
  $sql3="UPDATE studentlogin set contact='$cont',interest='$int',about='$about' where rollno=".$_SESSION["userRollNo"];
  $result3 = $conn->query($sql3);
if($result3){
  echo "<script>alert('POST SUBMITTED SUCCESSFULLY')</script>";
  echo "<script>window.open('student_profile.php','_self')</script>";
}
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
         move_uploaded_file($image_tmp,$dir = $root . '/studentpage/pages/profile/'.$UserID.'/'.$post_image);
         $sql3="UPDATE studentlogin set img='$post_image' where rollno='$UserID'";
         $result3 = $conn->query($sql3);
         echo "<script>alert('$post_image Updated successfully')</script>";
         echo "<script>window.open('student_profile.php','_self')</script>";
         }
    }
    
 }
?>
</section>


<script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    
    <script src="js/admin.js"></script>
    
    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script type="text/javascript">
  $(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});
  function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};
</script>
</body>
</html>