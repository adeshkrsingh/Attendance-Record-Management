<?php
session_start();
//if (!isset($_SESSION['userRollNo'])) {
//    header("location:/index.php");
//}

     
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
                        

                        
                        $email = $row['email'];
                        $dept = $row['dept'];
                        $sem= $row['semester'];
                        $contact = $row['Contact'];
                        $interest= $row['interest'];
                        $about= $row['about'];

                        $imgpresence = $row['img'];
                        if(!empty($imgpresence)) { $img = "/studentpage/pages/profile/".$UserID."/".$imgpresence ; }
                        else { $img = ""; }
                        $default='/defaultimg/user.png';
                                                        }
                                                 }
                                        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


   
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
    
    .icon-name{
    	position: relative;
    top: -8px;
    left: 7px;
    }
    	@media only screen and (max-width: 700px){
    		.col-xs-3 {
    			width: 100%;
    			border-bottom: 1px solid grey;
    			    padding-left: 20%
    }
    .col-lg-8,.col-sm-8,.col-md-8,.col-xs-8{
    		padding: 0px 2px 10px 85px;

    	}
    
}
@media only screen and (min-width: 700px){
    	.col-lg-8,.col-sm-8,.col-md-8,.col-xs-8{
    		padding: 0px 2px 10px 15px;

    	}
    	}

    </style>
    
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader"> 
            <div class="preloader" >
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle" ></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div> 
                    </div> 
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="student_dashboard.php">BUNDELKHAND INSTITUTE OF ENGINEERING AND TECHNOLOGY</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>

                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu" style="list-style: none;">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 new e-book added</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>5 contents</b> deleted</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Your email</b> changed</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Raushan Singh</b> send mail to you</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Website </b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks" style="list-style: none;">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Your Security and privacy measure
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Assignment 6 submit detail
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Assignment 3 submit detail
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                 Assignment 4 submit detail
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Assignment 5 submit detail
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li><a href="logout.php" data-toggle="tooltip" title="Sign Out"><i class="material-icons">input</i></a></li>
                </ul>

            </div>
        </div>
    </nav>
     <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<? echo $img; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $Name;?></div>
                    <div class="email"><?php echo $email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="student_dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" >message</i>
                            <span>Communication</span>
                        </a>
                        <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">Compose</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Archive</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Draft</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Send</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Official Email</a>
                                    </li>
                                    
                                    
                       </ul>
                    </li>
                    <li>
                        <a href="student_profile.php">
                            <i class="material-icons">edit</i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" >
                            <i class="material-icons">notifications</i>
                            <span>View all notification</span>
                        </a>
                        
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">forum</i>
                                    <span>Discussion</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-1.html">View forum</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-2.html">Ask Query</a>
                                    </li>
                                    
                                    
                                </ul>
                            </li>
                            <li>
                               <a href="javascript:void(0);" class="menu-toggle">
                               <i class="material-icons" >message</i>
                               <span>Councils</span>
                               </a>
                                 <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">Literary</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Cultural</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Fine Arts & Hobbies</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Sports</a>
                                    </li>
                                    
                               </ul>
                            </li>
                            
                            <li>
                               <a href="javascript:void(0);" class="menu-toggle">
                               <i class="material-icons" >message</i>
                               <span>Departmental Forums</span>
                               </a>
                                 <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">SCOIT</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">COSSCO</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">MEF</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">CEF</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">FEEE</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">FCE</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">MBA</a>
                                    </li>
                                    
                               </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment</i>
                                    <span>Assignment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="assignment.php">View Assignment</a>
                                    </li>
                                    
                                    
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                <i class="material-icons">assignment_ind</i>
                                    <span>View Attendance</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="syllabus.php" >
                                <i class="material-icons">library_books</i>
                                    <span>Syllabus</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="downloads.php" >
                                <i class="material-icons"><i class="material-icons">file_download</i></i>
                                    <span>Study Material</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="importantdates.php" >
                                <i class="material-icons">date_range</i>
                                    <span>Important Dates</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="student_result.php" >
                                <i class="material-icons">date_range</i>
                                    <span>Results</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="student_scholarship.php" >
                                <i class="material-icons">date_range</i>
                                    <span>UP Scholarship</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="feedback.php" >
                                <i class="material-icons">feedback</i>
                                    <span>Feedback</span>
                                </a>
                                
                            </li>

                        </ul>
                    
            </div>
           
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
    </section>
    <section class="content">
        <div class="container-fluid">
            

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="border-bottom: none; padding: 8px 24px">
                            <h1 style="font-family: Roboto;
    font-weight: 400;
    font-size: 24px;
    font-style: normal;
    line-height: 36px;
    color: #212121 !important;
    box-shadow: none;
     ">
                                All Categories
                            </h1>
                            <h2 style="margin: 0 0 0 0;
   
    font-size: 14px;
    font-family: Roboto;
    font-weight: normal;
    font-style: normal;
    line-height: 48px;
    "><a href="http://www.one-click-forum.com/live-preview/categories/general" style="text-decoration: none; color: #757575;">General</a></h2>
                        </div>

                        <div class="body"><?php include('include/db.php');
                        $sql="SELECT * FROM tblpost";
							$result=mysqli_query($con,$sql);
							
							while($rows=mysqli_fetch_array($result)){
							?>
                        
                        <div class="row clearfix">
                        		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
		                        <div class="image" style="display: block;">
				                    <img src="images/user.png" width="48" height="48" alt="User" style="border-radius: 50%;">
				                </div>
				                </div>
				                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
		                         <div class="comm align-justify" style=" "> <a href="view_que.php?post_id=<?php echo $rows['post_Id'] ;?>"  style="text-decoration: none; color: #0e0e0e; font-size: 16px; font-family: Roboto;font-weight: 400;font-style: normal;line-height: 20px"><?php echo $rows['title'];?>
		                        
		                        </a> </div> 

		                         <div class="discussion" >
		                        	 <span class="label bg-yellow">ANNOUNCEMENT</span>
		                        	 <span class="lcomment" style="padding: 5px; font-size: 12px;line-height: 18px;color: #999999; display: inline-block">Most recent by <a href="#" style="text-decoration: none; color: #0e0e0e;"><?php echo $Name;?></a></span>
		                        	 <span class="LCDate" style="font-size: 12px;line-height: 18px;color: #999999; display: inline-block; padding: 5px;"><time title="March 23, 2015  9:24PM" datetime="2015-03-23T21:24:14+00:00">March 2015</time></span>
		                        	 <span class="Category" style="font-size: 12px;line-height: 18px;color: #999999; "><a href="http://www.one-click-forum.com/live-preview/categories/general" style="text-decoration: none; color: #0e0e0e; padding-left: 5px">General</a></span>
		                        </div>
		                        </div>
		                         <div class=" col-lg-3 col-md-3  col-sm-3  col-xs-3" >
                                    <div class="row">
                                    <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
                                    <i class="material-icons" style="color: #4caf50; ">visibility</i> <span class="icon-name" style="color: #999999;"><?php echo $rows['view'];?></span> 
                                	</div>
                                	<div div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
                                    <i class="material-icons" style="color: #056d63; ">comment</i> <span class="icon-name" style="color: #999999;"><?php echo $rows['reply'];?></span>
                                    </div>
                                	</div>
                                </div>
		                        	
		                        </div>
		                        
<?php } ?>
                        </div>

                    </div>

                </div>

            </div>
            	

<?php include('content2.php'); ?>
