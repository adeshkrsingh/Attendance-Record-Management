 <html>
<head>
    <title>Reset Account</title>
    <link rel="stylesheet" href="/style/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style/css/securimage.css" media="screen">
    <link rel="stylesheet" href="/style/css/login.css" >
    <script src="/style/js/jquery-1.12.2.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <script type="text/javascript">
     
 </script>
    
    <style type="text/css">
    body {
    padding-top: 15px;
}
.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #029f5b;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}


.btnotp {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btnotp:hover,
.btnotp:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}

</style>
   
</head>
<body style="background: url('/defaultimg/login-background.jpeg'); background-repeat: no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

<div><a href="http://www.anujtestmodule.online/"><img src="/defaultimg/login-logo.png" class="img-responsive center-block" alt="BIET, Jhansi" style="margin-bottom: 10px;"></a></div>


<div class="container">                
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
             <div class="panel panel-login">
                   
                    <div class="panel-heading">
                         <b> Enter your OTP here </b>
                        <hr>
                    </div>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
              <?php
   session_start();
    $SubmitValue= $_POST['submit'];
   If($SubmitValue=="CHECK OTP")
    {
       $emailId = "adesh";
       $UserNameGet = $_SESSION["requesteduserid"];
       $emailId = $_SESSION["requesteduseremail"];
        
        include('connect.php');
  
        $otpget= mysqli_real_escape_string($conn,$_POST['otpvalue']);
        $validotp = 0;
        
        $sql = "select * from studentlogin";
        $result = $conn->query($sql);
        $a=0; 
           if ($result->num_rows > 0)
            {       
              while($row = $result->fetch_assoc())
                { 
                 if ($row['rollno']==$UserNameGet)
                 {   
                    if($row['otp']==$otpget)
                    { 
                   
                    $sqlupdt = "UPDATE `studentlogin` set `otp`='NULL' where `rollno`='$UserNameGet'";
                    $res = $conn->query($sqlupdt);
                    
                    $sqlupdt = "UPDATE  `risinola_student`.`studentlogin` SET  `email` =  '$emailId' WHERE  `studentlogin`.`rollno` ='$UserNameGet'";
                    $res = $conn->query($sqlupdt);
                    
                     $validotp = 1;
                      header("location:pages/student_dashboard.php");
                   
                       break;
                    }
                    }
                    }
                    }
                    
        if($validotp == 0)
         {
              session_destroy();
              header("location:/index.php"); 
         }
    }
  