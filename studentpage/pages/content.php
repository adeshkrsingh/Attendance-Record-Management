<?php
session_start();
if (!isset($_SESSION['userRollNo'])) {
    header("location:/index.php");
}
 


?>
<!DOCTYPE html>
<html>
<head>


<meta charset="utf-8">
  
  <link rel="stylesheet" href="/studentpage/studentstyle/css/s1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="/style/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.co..." integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
</head>

<?php
    
    include('connect.php');

    $userRollNo= $_SESSION["userRollNo"];
    
    $sql = "select * from studentlogin";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
                 if ($row['rollno']==$userRollNo)
                       {
                        $UserID = $userRollNo;
                        $Name = $row['name'];
                        $Address = $row['Address'];
                        $Email = $row['email'];
                        $dept = $row['dept'];
                        $sem= $row['semester'];
                        $Contact = $row['Contact'];
                        $imgpresence = $row['img'];
                        if(!empty($imgpresence)) { $img = "/studentpage/pages/profile/".$Email."/".$imgpresence ; }
                        else { $img = ""; }
                        $default='/defaultimg/user.png';
                                                        }
                                                 }
                                        }
?>

<body>


  <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Student Portal</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
         <ul class="nav navbar-nav">
	  <li class="active"><a href="student_dashboard.php">Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
	  <li ><a href="student_profile.php">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
          <li ><a href="notifications.php">Notifications<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
          <li ><a href="download_assignment.php">Assignmtnts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendence<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a>
		                      <ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="#">Individual Subject</a></li>
						<li><a href="#">Overall</a></li>
						<li><a href="#">lse here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
	    <li><a href="downloads.php">Downloads<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-download"></span></a></li>
	    <li><a href="syllabus.php">Syllabus<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
	    <li><a href="importantdates.php">Important Dates<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
	    <li><a href="feedback.php">Feedback<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-send"></span></a></li>
	    <li ><a href="logout.php">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
				
        </ul>
     </div>
   </div>
</nav>
<script>
function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
		
		$( #dropdown ).click(function()
		{
		 alert('adb');
		});
		
		
	});
</script>
 <!--   <div class="main">    -->
<!-- Content Here -->
<!--  </div>   -->
