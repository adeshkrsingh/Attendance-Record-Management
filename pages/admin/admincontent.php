<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if (!isset($_SESSION['AdminId'])) {
    header("location:/index.php");
}
else{   


?>

<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
  	
  <link rel="stylesheet" href="/style/css/bootstrap.min.css">
  <link rel="stylesheet" href="/style/css/style1.css">
  
  <link rel="stylesheet" type="text/css" href="/style/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <script src="/style/js/jquery-1.12.2.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
  <style type="text/css">
    
  </style>
<script type="text/javascript">$(function () {
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
};</script>
  <script>
  $(window).load(function(){
        $("[data-toggle]").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");
        });
         $(".swipe-area").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="right") {
                           $(".container").addClass("open-sidebar");
                           return false;
                      }
                      if (phase=="move" && direction =="left") {
                           $(".container").removeClass("open-sidebar");
                           return false;
                      }
                  }
          }); 
      });
</script>
<?php
    
    $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($conn,"risinola_academics");


    $UserIdLoaded = $_SESSION["AdminId"];
    
    

    $sql = "select * from logindetail";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
                 if ($row['LId']==$UserIdLoaded)
                       {
                        $UserID = $UserIdLoaded;
                        $Name = $row['Name'];
                        $Address = $row['Address'];
                        $Email = $row['Email'];
                        $Contact = $row['Contact'];
                        $imgpresence = $row['img'];
                        if(!empty($imgpresence)) { $img = "/profile/admin/".$Email."/".$imgpresence ; }
                        else { $img = ""; }
                        $default='/defaultimg/user.png';
                                                        }
                                                 }
                                        }
?>


</head>
<body>
<div class="container" style="margin-left: 0px;margin-right: 0px;">
        <div id="sidebar" style="">
          <ul>
            <li><img src="<?php if(!empty($img)){echo $img;} else{echo $default;}?>" class="img-circle" width="120" height="120" style="margin-left:55px; margin-top:45px; margin-bottom:15px;">
            </li>
            <li><a href='a_dashboard.php'>Dashboard</form></a></li>
            <li><a href='a_notices.php'>Notices</a></li>
            <li><a href='#'>Requests</a></li>
            <li><a href='a_memberregistration.php'>Staff Registration</a></li>
            <li><a href='a_studentregistration.php'>Student Registration</a></li>
            <li><a href='a_memberlist.php'>Member Detail</a></li>
            <li><a href='a_memberlist_student.php'>Registered Student</a></li>
            <li><a href='upgrade.php'>Upgrade Semester</a></li>
            <li><a href='#'>Attendence Report</a></li>
            <li><a href='a_resetpassword.php'>Reset Password</a></li>
            <li><a href='adminfeed.php'>Feedback</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul>
        </div>
        <div class="main-content" style="">
          
          <a href="#" data-toggle=".container" id="sidebar-toggle"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>
          

          <div id="header" style="width:100%; height:70px; background-image: url('/defaultimg/header-texture.jpg') ;">
          <div style="padding-top: 10px; float: left;"> <img src="/defaultimg/header-biet-logo.png"  ></div>
          
            <div style="float: right;">
            
            <div class="dropdown">

                        <a href="#" id="menu1" data-toggle="dropdown"><img src="<?php if(!empty($img)){echo $img;} else{echo $default;}?>" class="img-circle" width="60px" height="60px" style="margin-top: 5px; ">
                        <?php echo '<div style="float:left; font-size:20px; padding-top:20px; padding-right:15px; color:#818da2;">'.$Name.'</div>';?><i class="fa fa-caret-down" aria-hidden="true"></i>
                      
                      </a>

                      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="right: 0px; left: auto; margin-top: 6px; color: #5A738E; border-radius: 0px; background-color:#1b262f; ">
                        <li>
                            <a href="a_updateProfile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                      </ul>
              </div>
              
            </div>
            
         
    </div>

<div class="content" style="padding-top:0%;">
<?php } ?>